<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Activity_Payment extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->data['page'] = 'Dashboard';

        $this->load->model('firm_model');
        $this->load->model('module2');
        
        $this->load->model('address_model');
        $this->load->model('country_model');
        $this->load->model('county_model');
        $this->load->model('states_model');
        $this->load->model('city_model');
        $this->load->model('firm_codes_model');
        $this->load->model('codes_model');
        $this->load->model('firm_attorney_model');
        $this->load->model('attorney_model');
        $this->load->model('client_model');
        $this->load->model('cli_att_model');
        $this->load->model('client_revenue_model');
        $this->load->model('client_cases_model');
        $this->load->model('client_contact_model');
        $this->load->model('company_model');

        $this->load->model('contacts_model');
        $this->load->model('Targets_model');
        $this->load->model('Allnote_Model');
        
        $this->load->model('venue_model');
        $this->load->model('add_contact_model');
        $this->load->model('Module7_Model');
        $this->load->model('Module6_Model');
        $this->load->model('Change_module_number_module');
        $this->load->model('module_setting_model'); 
        $this->load->model('emailtemplate_model');
        $this->load->model('signature_model');
        $this->load->model('send_sms_model');
        $this->load->model('sms_add_model');

    }
    function index()
    {
    	//echo 'hello';die();
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        //echo 'hello'.$admin_id;echo $role_code;die();
        $cond=" AND status='Active' ";
        $model7_data=$this->Module7_Model->fetch($cond);

        //$target_seq_no=$model7_data[0]['target_seq_no'];
        
        //$cond1=" AND target_seq_no='".$target_seq_no."' ";
        //$targets_data_get=$this->targets_model->fetch($cond1);
        //echo $target_seq_no;die();
        /*echo "<pre>";
        print_r($targets_data_get);
        echo "</pre>";*/

        $this->data['user_data']=$model7_data;

         $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/activity_payment/listing', $this->data);



    }
    function view($code='',$id='',$target_seq_no = '' , $company_id = '')
    {
      
        $target_seq_no=base64_decode($code);
       //echo $target_seq_no;
      // die();
        $admin_id = $this->data['admin_id'];
        $firm_seq_no = $this->data['firm_seq_no'];
        //echo  $firm_seq_no;
        //  echo $admin_id;
        //die();
        $this->data['target_seq_nos']=$target_seq_no;
        $this->data['company_ids']=$firm_seq_no;

        $cond1=" AND target_seq_no='".$target_seq_no."' ";
        $targets_data_view=$this->Targets_model->fetch($cond1);
       // echo $this->db->last_query();die;
        $this->data['user_detail']=$targets_data_view;

         $condnote = " and admin_id ='".$admin_id."' and target_seq_no='".$target_seq_no."' order by id DESC";
         $note = $this->Allnote_Model->fetch($condnote);
         $this->data['viewallnotes']=$note;

         $fetch_cond = " AND module_name='module7' AND firm_seq_no='".$firm_seq_no."' AND status=1";
        $module_details = $this->sms_add_model->fetch($fetch_cond);
        $this->data['module_details']= $module_details;
         
         
        $user_phone = explode("-",$targets_data_view[0]['phone']);        
        $this->data['country_code'] = $user_phone[0];
        $this->data['home_phone_number'] = $user_phone[1];

        $this->data['target_seq_no']=$target_seq_no;
        //fetching data from module7
        $cond = " AND admin_id='$admin_id' AND target_seq_no='$target_seq_no' AND firm_seq_no='$firm_seq_no' AND status='Active'";
        $fetch_details = $this->Module7_Model->fetch($cond);
        $this->data['fetch_details'] = $fetch_details[0];
        
        $contact_id = $fetch_details[0]['module_7_seq_no'];
       // $this->data['fetch_details'] = $fetch_details;
        $cond_module = "AND module_name = 'module7'";
        $fetch_module_details = $this->module_setting_model->fetch($cond_module);
         $this->data['fetch_module_details'] =  $fetch_module_details;

        //print_r( $contact_id );
       // die();
        //for previous & next
        $iddd= "Select module_7_seq_no from `plma_module7` WHERE module_7_seq_no='$contact_id' and firm_seq_no='$firm_seq_no' and status='Active' order by module_7_seq_no";
        $quu= $this->db->query($iddd);
        $arrr= $quu->result_array();

        $prev_id=$arrr[0]['module_7_seq_no']-1;
       // echo $prev_id;
        //die();
        $iddd_prev = "select max(target_seq_no) as target_seq_no from plma_module7 where target_seq_no < $target_seq_no AND firm_seq_no=$firm_seq_no and status='Active'";
        $quu_prev= $this->db->query($iddd_prev);
        $arrr_prev= $quu_prev->result_array();

        $next_id=$arrr[0]['module_7_seq_no']+1;
         //echo   $next_id ;
        //die();
        $iddd_next= "select min(target_seq_no) as target_seq_no from plma_module7 where target_seq_no > $target_seq_no AND firm_seq_no=$firm_seq_no and status='Active'";
        $quu_next= $this->db->query($iddd_next);
        $arrr_next= $quu_next->result_array();

        //-------------primary contact details---------------//
        $cond123 = " AND firm_seq_no='$firm_seq_no' AND target_seq_no='$target_seq_no'";
        $fetch_add_contact_details = $this->add_contact_model->fetch($cond123);
            //echo $this->db->last_query();die;
        $this->data['fetch_add_contact_details'] = $fetch_add_contact_details[0];

        $primary_contact_phone = $fetch_add_contact_details[0]['phone'];
        //--------end------------//

        $this->data['next_target_seq_no'] = $arrr_next[0]['target_seq_no'];
        $this->data['prev_target_seq_no'] = $arrr_prev[0]['target_seq_no'];
        //end 
        $cond = " AND form_model='module7' AND form_id=$admin_id AND to_id=$target_seq_no";
        $fetch_sms_details = $this->send_sms_model->fetch($cond);
        $this->data['sms_content'] = $fetch_sms_details;
        
        

        $this->get_include();
        
        $row = $this->Change_module_number_module->fetch();
        
        
        $this->data['notes'] = $row;


        
        
        
        $this->load->view($this->view_dir . 'operation_master/activity_payment/view', $this->data);

    }
    function add_note()
    {
         $admin_id=$this->data['admin_id'];
         $target_seq_no=$this->input->post("target_seq_no");
         $write_notes=$this->input->post("write_notes");
         $module='module7';
    	 //$condnote = " and admin_id ='".$admin_id."' and target_seq_no='".$target_seq_no."' order by id DESC";

    	 $note_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$write_notes,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>$module);
         $note = $this->Allnote_Model->add($note_arry);
         
         if($note)
         {
         	echo '1';
         }


    }
    function add_payment()
    {
        $admin_id=$this->data['admin_id'];

        $payment_add_notes=$this->input->post("payment_add_notes");
        $target_seq_no=$this->input->post("target_seq_no");
        $payment_add_date=$this->input->post("payment_add_date");
        //$cond1=" AND target_seq_no='".$target_seq_no."' and admin_id='".$admin_id."' ";
         $updt_arry=array('status'=>'Inactive');
        //$updt_pament=$this->Module7_Model->edit($updt_arry,$cond1);

         $this->db->where('target_seq_no',$target_seq_no,'admin_id',$admin_id);
         $updt_pament=$this->db->update('plma_module7',$updt_arry);
         

         $cond1=" AND target_seq_no='".$target_seq_no."' ";
         $frm_sq_no=$this->Module7_Model->fetch($cond1);

         $firm_seq_no=$frm_sq_no[0]['firm_seq_no'];
          

          $cond=" AND target_seq_no='".$target_seq_no."' ";
          $model7_data=$this->Targets_model->fetch($cond);
          $name=$model7_data[0]['target_first_name'].''.$model7_data[0]['target_last_name'];
          $email=$model7_data[0]['email'];
          $phone=$model7_data[0]['phone'];
          $mobile=$model7_data[0]['mobile'];
          $address=$model7_data[0]['address'];
          $company=$model7_data[0]['company'];
          $categories=$model7_data[0]['categories'];
          //$name=$model7_data[0]['categories'];
          //$name=$model7_data[0][''];
          //$name=$model7_data[0][''];


         $add_mod8_arry=array('admin_id'=>$admin_id,'firm_seq_no'=>$firm_seq_no,'target_seq_no'=>$target_seq_no,'name'=>$name,'email'=>$email,'phone'=>$phone,'mobile'=>$mobile,'company_name'=>$company,'  categories'=>$categories,'address'=>$address,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'payment_date'=>$payment_add_date);
         $add_mod8=$this->db->insert('plma_module8',$add_mod8_arry);
         //echo $this->db->last_query();die;

         $module='module7';
         $note_pay_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$payment_add_notes,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>$module);
         $payment_note=$this->Allnote_Model->add($note_pay_arry);
         //echo $this->db->last_query();die;

        if($updt_pament && $add_mod8 && $payment_note)
        {
        	echo '1';
        }

    }
    function do_not_call_again_mod7()
    {
         $admin_id=$this->data['admin_id'];
         $target_seq_no=$this->input->post("target_seq_no");
         $do_not_call_payment_note=$this->input->post("do_not_call_notes_payment");


         $this->db->where('target_seq_no',$target_seq_no,'admin_id',$admin_id);
         $delete_record_mod7=$this->db->delete('plma_module7'); 

         
         $module='module7';
         $do_not_call_note_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$do_not_call_payment_note,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>$module);
         $do_not_call_payment_note_add=$this->Allnote_Model->add($do_not_call_note_arry);

        
        $updt_target_table=array('status'=>3);
        $this->db->where('target_seq_no',$target_seq_no);
        $target_table=$this->db->update('plma_target',$updt_target_table);

         if($delete_record_mod7 && $do_not_call_payment_note_add && $target_table)
         {
            echo '1';
         }

    }


    //----------------------- edit_details for module7-----------------------//
   function edit_details()
    {
       //$admin_id = $this->data['admin_id'];
       $first_name=$this->input->post("first_name");
       $last_name=$this->input->post("last_name");
       $email=$this->input->post("email");
       $country_code1=$this->input->post("country_code1");
       $mobile=$this->input->post("mobile");
       $address1=$this->input->post("address1");
       //$seq_no=$this->input->post("seq_no");
       $target_company_name=$this->input->post("target_company_name");
       $industry_type=$this->input->post("industry_type");
       $phione = $this->input->post("phione");
       $target_seq_no = $this->input->post("target_seq_no");

       $data=array('target_first_name'=>$first_name,'target_last_name' =>$last_name,'email_target_id'=>$email,'home_phone'=>$country_code1.'-'.$phione , 'mobile' => $mobile,'address'=>$address1,'company_name'=>$target_company_name, 'categories'=>$industry_type);
       //t($data);die;
        $this->db->where('target_seq_no',$target_seq_no);
        $res=$this->db->update('plma_module7',$data);
       //$res=$this->Module7_Model->edit($data,$target_seq_no);
       //echo $this->db->last_query();die;


       $target_data=array('target_first_name'=>$first_name,'target_last_name'=>$last_name,'email'=>$email,'phone'=>$country_code1.'-'.$phione , 'mobile' => $mobile,'address'=>$address1,'company'=>$target_company_name, 'categories'=>$industry_type);
       $target_res=$this->Targets_model->edit($target_data,$target_seq_no);
       if($res && $target_res)
       {
         echo "1";
       }
    }
    function temp_email($id= '', $company_id= ' ')
    {
       $target_seq_no=base64_decode($id);
        //$firm_seq_no=base64_decode($company_id);
        //echo $target_seq_no.'#'.$firm_seq_no;die();
        //$admin_id = $this->data['admin_id'];
       $admin_session_data = $this->session->userdata('admin_session_data');
       $admin_id = $admin_session_data['admin_id'];
       $firm_seq_no = $admin_session_data['firm_seq_no'];

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
       $this->load->view($this->view_dir . 'operation_master/activity_payment/send_message_module7', $this->data);

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