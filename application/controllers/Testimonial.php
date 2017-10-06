<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonial extends MY_Controller {
  function __construct() {
    parent::__construct();
    $this->isLogin();
     $this->load->model('Change_module_number_module');

     $this->load->model('Model8');


     $this->load->model('module_setting_model');
     $this->load->model('add_contact_model');
     $this->load->model('Targets_model');
     $this->load->model('emailtemplate_model');
     $this->load->model('Allnote_Model');
     $this->load->model('signature_model');
     $this->load->model('user_model');
     $this->load->model('send_sms_model');

  }

  function index() {
    $admin_all_session = $this->session->userdata('admin_session_data');

    $this->db->select('plma_module8.*,plma_target.type')
              ->from('plma_module8')
              ->join('plma_target', 'plma_module8.target_seq_no = plma_target.target_seq_no', 'INNER')
              ->where('plma_module8.status = "Active" AND plma_module8.firm_seq_no="'.$admin_all_session['firm_seq_no'].'"')
              ->order_by('plma_module8.module_8_seq_no DESC');

    $this->data['result_details'] = $this->db->get()->result_array();
    $this->get_include();
    $this->load->view($this->view_dir . 'app_transaction/testimonial/listing', $this->data);
  }

  function details($target_seq_no = '' , $company_id = '') {
    $admin_all_session = $this->session->userdata('admin_session_data');
    $target_seq_no = base64_decode($this->uri->segment(3));
    $firm_seq_no=$this->data['firm_seq_no'];
    //echo " $target_seq_no<hr>";
    //die();
      $this->data['target_seq_nos']=$target_seq_no;
      $this->data['company_ids']=$firm_seq_no;
    
    $admin_id = $this->data['admin_id'];
    
        
         $cond = " AND admin_id='$admin_id' AND target_seq_no='$target_seq_no' AND firm_seq_no='$firm_seq_no' AND status='Active'";
        $fetch_details = $this->Model8->fetch($cond);
        
        $contact_id = $fetch_details[0]['module_8_seq_no'];
        $this->data['fetch_details'] = $fetch_details;

       // print_r( $contact_id );
       // die();
        //echo  "$firm_seq_no <hr>";
          //echo $admin_id;
        //die();
    
    
    $this->db->select('plma_all_notes.*,plma_user.user_first_name,plma_user.user_last_name')
             ->from('plma_all_notes')
             ->join('plma_user', 'plma_all_notes.user_seq_no = plma_user.user_seq_no')
             ->where('target_seq_no="'.$target_seq_no.'"')
             ->order_by('plma_all_notes.id DESC');
    $this->data['all_notes'] = $this->db->get()->result_array();

    $this->db->select('plma_target.*, plma_target_contact.first_name,
                      plma_target_contact.last_name,plma_target_contact.is_primary_contact,plma_target_contact.phone as contact_phone')
             ->from('plma_target')
             ->join('plma_target_contact', 'plma_target.target_seq_no = plma_target_contact.target_seq_no', 'LEFT')
             ->where('plma_target.target_seq_no="'.$target_seq_no.'"');

    $this->data['target_details'] = $this->db->get()->result_array();

    
     //for previous & next
        $iddd= "Select module_8_seq_no from `plma_module8` WHERE module_8_seq_no='$contact_id' and firm_seq_no='$firm_seq_no' and status='Active' order by module_8_seq_no";
        $quu= $this->db->query($iddd);
        $arrr= $quu->result_array();

            $cond_module = "AND module_name = 'module8'";
         $fetch_module_details = $this->module_setting_model->fetch($cond_module);
          $this->data['fetch_module_details'] =  $fetch_module_details;
          
        $prev_id=$arrr[0]['module_8_seq_no']-1;
       // echo $prev_id;
        //die();
        $iddd_prev = "select max(target_seq_no) as target_seq_no from plma_module8 where target_seq_no < $target_seq_no AND firm_seq_no=$firm_seq_no and status='Active'";
        $quu_prev= $this->db->query($iddd_prev);
        $arrr_prev= $quu_prev->result_array();

        $next_id=$arrr[0]['module_8_seq_no']+1;
        // echo   $next_id ;
       // die();
        $iddd_next= "select min(target_seq_no) as target_seq_no from plma_module8 where target_seq_no > $target_seq_no AND firm_seq_no=$firm_seq_no and status='Active'";
        $quu_next= $this->db->query($iddd_next);
        $arrr_next= $quu_next->result_array();

        $this->data['next_target_seq_no'] = $arrr_next[0]['target_seq_no'];
        $this->data['prev_target_seq_no'] = $arrr_prev[0]['target_seq_no'];
        //end 

        //-------------primary contact details---------------//
        $cond123 = " AND firm_seq_no='$firm_seq_no' AND target_seq_no='$target_seq_no'";
        $fetch_add_contact_details = $this->add_contact_model->fetch($cond123);
            //echo $this->db->last_query();die;
        $this->data['fetch_add_contact_details'] = $fetch_add_contact_details[0];

        $primary_contact_phone = $fetch_add_contact_details[0]['phone'];
        //--------end------------//
        $cond = " AND form_model='module8' AND form_id=$admin_id AND to_id=$target_seq_no";
        $fetch_sms_details = $this->send_sms_model->fetch($cond);
        $this->data['sms_content'] = $fetch_sms_details;
    

        $this->get_include();
    
        $row = $this->Change_module_number_module->fetch();
                   $this->data['notes'] = $row;
    
    
        $this->load->view($this->view_dir . 'app_transaction/testimonial/details', $this->data);
    
    
  }

  function do_not_call_again() {
      $admin_all_session = $this->session->userdata('admin_session_data');
      $notes = $this->input->post('notes');
      $target_seq_no = $this->input->post('target_seq_no');
      $firm_seq_no = $this->input->post('firm_seq_no');

      $getdata=array('user_seq_no'=>$admin_all_session['admin_id'],'admin_id'=>$admin_all_session['admin_id'],'target_seq_no'=>$target_seq_no,'content'=>$notes,'status'=>"Inactive",'added_date'=>time(),'module'=>"module8");
      $last_note_id=$this->db->insert('plma_all_notes',$getdata);
      if($last_note_id) {
        $update_module_8 = array(
          'modified_date' => time(),
          'status' => 'Inactive'
        );
        $this->db->where('target_seq_no',$target_seq_no);
        $update_id = $this->db->update('plma_module8', $update_module_8);
        if($update_id) {
          $update_arr = array(
            'status' => '3'
          );
          $this->db->where('target_seq_no', $target_seq_no);
          if($this->db->update('plma_target', $update_arr)) {
            echo "1";
          }
          else {
            echo "0";
          }
        }
      }
  }

  function add_allnotes() {
    $admin_all_session = $this->session->userdata('admin_session_data');
    $note = $this->input->post('note');
    $target_seq_no = $this->input->post('target_seq_no');

    $getdata=array('user_seq_no'=>$admin_all_session['admin_id'],'admin_id'=>$admin_all_session['admin_id'],'target_seq_no'=>$target_seq_no,'content'=>$note,'status'=>"Inactive",'added_date'=>time(),'module'=>"module8");
    $last_note_id=$this->db->insert('plma_all_notes',$getdata);
    if($last_note_id) {
      echo "1";
    }
    else {
      echo "0";
    }
  }

  function add_testimonial() {
      $admin_id = $this->data['admin_id'];
      
    $admin_all_session = $this->session->userdata('admin_session_data');
    $testimonial_date = $this->input->post('testimonial_date');
    $testimonial_notes = $this->input->post('testimonial_notes');
    $firm_seq_no = $this->input->post('firm_seq_no');
    $target_seq_no = $this->input->post('target_seq_no');

    $testimonial_array = array(
      'target_seq_no' => $target_seq_no,
      'firm_seq_no' => $admin_all_session['firm_seq_no'],
      'admin_id' => $admin_all_session['admin_id'],
      'testimonial_notes' => $testimonial_notes,
      'testimonial_date' => $testimonial_date,
      'status' => 'Active',
      'added_date' => time(),
      'added_by' => $admin_all_session['admin_id']
    );

    $testimonial_id = $this->db->insert('plma_testimonial', $testimonial_array);
    if($testimonial_id) {
      $this->db->select('*')->from('plma_target')->where('target_seq_no="'.$target_seq_no.'"');
      $target_details = $this->db->get()->result_array();
      $module_9_array = array(
        'admin_id' => $admin_all_session['admin_id'],
        'target_seq_no' => $target_details[0]['target_seq_no'],
        'firm_seq_no' => $target_details[0]['firm_seq_no'],
        'name' => ucwords($target_details[0]['target_first_name']." ".$target_details[0]['target_last_name']),
        'email' => $target_details[0]['email'],
        'phone' => $target_details[0]['phone'],
        'mobile' => $target_details[0]['mobile'],
        'address' => $target_details[0]['address'],
        'company_name' => $target_details[0]['company'],
        'categories' => $target_details[0]['categories'],
        'status' => "Active",
        'type' => $target_details[0]['type']?$target_details[0]['type']:'I',
        'added_date' => time(),
        'added_by' => $admin_all_session['admin_id']
      );

      $last_module_id = $this->db->insert('plma_module9', $module_9_array);
      if($last_module_id) {
        $module_8_array = array(
          'status' => 'Inactive'
        );
        $this->db->where('target_seq_no', $target_seq_no);
        $this->db->update('plma_module8',$module_8_array);
        
        $data_field = array(
            'user_seq_no'=>$admin_id,
            'admin_id'=> $admin_id,
            'target_seq_no'=> $target_seq_no,
            'content'=> $testimonial_notes,
            'status'=> 'Active',
            'added_date'=>time()
        );
        $add_appiontment_notes = $this->db->insert('plma_all_notes',$data_field);
        
        echo "1";
      }
      else {
        echo "0";
      }
    }
  }






  //-----------------------edit details for module8-----------------------//
   function edit_details()
    {
       $first_name=$this->input->post("first_name");
       $last_name=$this->input->post("last_name");
       $email=$this->input->post("email");
       $country_code1=$this->input->post("country_code1");
       $mobile=$this->input->post("mobile");
       $address1=$this->input->post("address1");
       $target_company_name=$this->input->post("target_company_name");
       $industry_type=$this->input->post("industry_type");
       $phione = $this->input->post("phione");
       $target_seq_no = $this->input->post("target_seq_no");

       //update table module8 data
       $data=array('name'=>$first_name.' '.$last_name,'email'=>$email,'phone'=>$country_code1.$phione , 'mobile' => $mobile,'address'=>$address1,'company_name'=>$target_company_name, 'categories'=>$industry_type);
       //$res=$this->appointment_details_module->edit($data,$seq_no);
       $this->db->where('target_seq_no',$target_seq_no);
       $res = $this->db->update('plma_module8', $data);
       //echo $this->db->last_query();die;

       //update table target (module1)
       $target_data=array('target_first_name'=>$first_name,'target_last_name'=>$last_name,'email'=>$email,'phone'=>$country_code1.$phione , 'mobile' => $mobile,'address'=>$address1,'company'=>$target_company_name, 'categories'=>$industry_type);
       $target_res=$this->Targets_model->edit($target_data,$target_seq_no);
       if($res && $target_res)
       {
         echo "1";
       }
    }
    function temp_email($id= '', $company_id= ' ')
    {
       $target_seq_no=base64_decode($id);
        $firm_seq_no=base64_decode($company_id);
        //echo $target_seq_no.'#'.$firm_seq_no;die();
        $admin_id = $this->data['admin_id'];

       $cond = "AND created_by=$firm_seq_no";
       $user_login_template = $this->emailtemplate_model->fetch($cond);
       
       $this->data['user_login_template'] = $user_login_template;
       $this->data['aid'] = $admin_id;
       //print_r($user_login_template);die();

       $contact_id = base64_decode($id);
       $company_id = base64_decode($company_id);
       //echo $contact_id.'#'.$company_id;die();
       $cond = " and firm_seq_no='{$firm_seq_no}' AND target_seq_no=$target_seq_no";
       //$a=$this->targets_model->fetch($cond);
       $this->data['fetch_details']=$this->Targets_model->fetch($cond);
       //echo $contact_id;die();
         /*echo "<pre>";
       print_r($a);
       echo "</pre>";die();*/
       $this->data['contact_id'] = $contact_id;
       $this->data['firm_seq_no'] = $this->data['fetch_details'][0]['firm_seq_no'];
       $this->data['target_seq_no']=$target_seq_no;

       $this->db->select('*')->from('plma_document');
       $row=$this->db->get()->result_array();
       $this->data['document']=$row;
       
       $this->get_include();
       $this->load->view($this->view_dir . 'app_transaction/testimonial/send_message_module8', $this->data);

    }
    function get_email_template()
    {
        $firm_seq_no=$this->data['firm_seq_no'];
        $this->db->select('*')->from('plma_signature')->where('firm_seq_no="'.$firm_seq_no.'"');
        $template_details = $this->db->get();
        echo json_encode($template_details->result_array());
    }
    function temp_sendmail() {
       $admin_session_data = $this->session->userdata('admin_session_data');
       $admin_id = $admin_session_data['admin_id'];
       $firm_seq_no = $admin_session_data['firm_seq_no'];
       $email = $this->input->post('email');
       $subject = $this->input->post('sub');
       $message_text = $this->input->post('msg');
      
       $target_seq_no=$this->input->post('target_seq_no');
       $attach_array = $this->input->post('attach_array');
       //$appt_seq_no=$this->data['appt_seq_no'];
       
       //$this->db->select('*')->from('plma_module2')->where('target_seq_no="'.$target_seq_no.'"');
      // $module2_view = $this->db->get()->result_array();
       
       
       $this->db->select('*')->from('plma_target')->where('target_seq_no="'.$target_seq_no.'"');
       $target_details = $this->db->get()->result_array();
        
       $cond = "AND user_seq_no=$admin_id";
       $user_login_details = $this->user_model->fetch($cond);

       $this->db->select('*')->from('plma_target')->where('email="'.$email.'"');
       $target_details = $this->db->get()->result_array();

        $cond123 = " AND firm_seq_no='$firm_seq_no'";
        $fetch_signature_details = $this->signature_model->fetch($cond123);

      $message_text = str_ireplace('$name', ucwords($target_details[0]['target_first_name']." ".$target_details[0]['target_last_name']), $message_text);
       $message_text = str_ireplace('$address', $target_details[0]['address'], $message_text);
       $message_text = str_ireplace('$phone', $target_details[0]['phone'], $message_text);
       $message_text = str_ireplace('$email', $target_details[0]['email'], $message_text);
       $message_text = str_ireplace('$company', $target_details[0]['company'], $message_text);
       $message_text = str_ireplace('$categories', $target_details[0]['categories'], $message_text);

       $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'sitemail.isqweb.it',
            'smtp_port' => 587,
            'smtp_user' => 'digital1crm@isqweb.com',
            'smtp_pass' => 'grT54rDDy6k',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        
       $this->load->library('email');
       $this->email->from($user_login_details[0]['user_id'], $user_login_details[0]['user_first_name']." ".$user_login_details[0]['user_last_name']);
        $this->email->to($email);
        $this->email->set_mailtype("html");
        $this->email->subject($subject);
        $msg="<html><body>".$message_text."<br>".$this->input->post('signature_content')."</body></html>";
        $this->email->message($msg);
        
        if(count($attach_array) > 0){
            for($i=0;$i<count($attach_array);$i++){
                $file_name = trim($attach_array[$i]);
                $this->email->attach("./assets/upload/attachments/$file_name");
            }
            
        }  
        $this->email->send();
        /*$last_id = $this->db->query( 'CALL UpdateModule2(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', array(
            $admin_id,
            $firm_seq_no,
            $message_text,
            $target_details[0]['target_seq_no'],
            $target_details[0]['target_first_name'],
            $target_details[0]['target_last_name'],
            $target_details[0]['email'],
            $target_details[0]['company_id'],
            $target_details[0]['phone'],
            $target_details[0]['mobile'],
            $target_details[0]['address'],
            $target_details[0]['company'],
            $target_details[0]['categories'],
            $target_details[0]['type'],
            time()
        ));*/
       
           $note_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$message_text,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module2');
           $note_data=$this->Allnote_Model->add($note_arry);
           
        if($note_data) {
            echo "1";
        }
        else {
            echo "0";
        }
            
    }
    //----------------end-------------------//


}