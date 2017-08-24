<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_purchase extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->data['page'] = 'Dashboard';

        $this->load->model('firm_model');
        $this->load->model('module2');
        $this->load->model('user_model');
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
        $this->load->model('Module10_Model');
        $this->load->model('Change_module_number_module');
        $this->load->model('module_setting_model');
        $this->load->model('emailtemplate_model');
        $this->load->model('signature_model');
        $this->load->model('send_sms_model');

    }
    function index()
    {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $status='Active';
        //echo 'hello'.$admin_id;echo $role_code;die();
        $this->db->select('plma_target.*')
                 ->from('plma_target')
                 ->join('plma_module10','plma_module10.target_seq_no = plma_target.target_seq_no','INNER')
                 ->where('plma_module10.status="'.$status.'" ');
        $this->data['user_data'] = $this->db->get()->result_array();  

         $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/client_purchase/listing', $this->data);

    }
    function view($code='',$id='')
    {
       $admin_id=$this->data['admin_id'];
      // $target_seq_no=base64_decode($code);
       $id=base64_decode($id);
       //echo $target_seq_no;echo $admin_id ;die();
        
       
       
       
        
        $firm_seq_no=$this->data['firm_seq_no'];
         $target_seq_no = base64_decode($this->uri->segment(3));
         $this->data['target_seq_nos']=$target_seq_no;
         $this->data['company_ids']=$firm_seq_no;
         
       
       //fetching data from module10
         $cond = " AND admin_id='$admin_id' AND target_seq_no='$target_seq_no' AND firm_seq_no='$firm_seq_no' AND status='Active'";
        // echo $cond;
        // die();
        $fetch_details = $this->Module10_Model->fetch($cond);
        /*print_r( $fetch_details);
         die();*/
        $contact_id = $fetch_details[0]['module_9_seq_no'];
        $this->data['fetch_details'] = $fetch_details;
  
       
       
        $cond1=" AND target_seq_no='".$target_seq_no."' ";
        $targets_data_view=$this->Targets_model->fetch($cond1);
        $this->data['user_detail']=$targets_data_view;

         $condnote = " and admin_id ='".$admin_id."' and target_seq_no='".$target_seq_no."' order by id DESC";
         $note = $this->Allnote_Model->fetch($condnote);
         $this->data['viewallnotes']=$note;

         /*echo "<pre>";
         print_r($targets_data_view);
         echo "</pre>"; die();*/
        $this->data['target_seq_no']=$target_seq_no;
        $cond_module = "AND module_name = 'module10'";
        $fetch_module_details = $this->module_setting_model->fetch($cond_module);
      $this->data['fetch_module_details'] =  $fetch_module_details;

          $cond123 = " AND firm_seq_no='$firm_seq_no' AND target_seq_no='$target_seq_no'";
        $fetch_add_contact_details = $this->add_contact_model->fetch($cond123);
        //echo $this->db->last_query();die;
        $this->data['fetch_add_contact_details'] = $fetch_add_contact_details[0];

        $primary_contact_phone = $fetch_add_contact_details[0]['phone'];
        
        $row = $this->Change_module_number_module->fetch();
        $this->data['notes'] = $row;

        $cond = " AND form_model='module10' AND form_id=$admin_id AND to_id=$target_seq_no";
        $fetch_sms_details = $this->send_sms_model->fetch($cond);
        $this->data['sms_content'] = $fetch_sms_details;
    

        $this->get_include();
        $this->load->view($this->view_dir.'operation_master/client_purchase/view', $this->data);

    }
    function add_client_purchase()
    {

        $admin_id=$this->data['admin_id'];

        $cond = " and user_seq_no = '" . $admin_id . "'";
        $fetch_details = $this->attorney_model->fetch($cond);

        $attr_id = $fetch_details[0]['attorney_seq_no'];
        $contact_fetch = $this->db->select('list_id')->from('plma_assign_list_to_call_user')->where('user_seq_no',$attr_id);
        $row = $this->db->get()->result_array();


        $write_notes=$this->input->post("write_notes");
        $target_seq_no=$this->input->post("target_seq_no");
        //echo $target_seq_no;die;
        $rad=$this->input->post("rad");
        
         $cond1=" AND target_seq_no='".$target_seq_no."' ";
         $targets_data_get=$this->Targets_model->fetch($cond1);
        
        if($rad=="Y")
         {
           $arry_data=array('status'=>'Inactive','added_date'=>time());
           $clt_purch= $this->Module10_Model->edit_cond($arry_data," target_seq_no = '" . $target_seq_no. "'  and  admin_id='".$admin_id."'  ");
         
         
         $target_edit_arry=array('status'=>'Inactive');
         
         //$target_edit_old_data=$this->Targets_model->edit($target_edit_arry,$target_seq_no);

         $this->db->where('target_seq_no',$target_seq_no);
         $target_edit_old_data=$this->db->update('plma_target',$target_edit_arry);

         $target_insert_data=array();
         $target_insert_data['list_id']=$row[0]['list_id'];
         $target_insert_data['firm_seq_no']=$targets_data_get[0]['firm_seq_no'];
         $target_insert_data['attorney_seq_no']=$targets_data_get[0]['attorney_seq_no'];
         $target_insert_data['add_flag']=$targets_data_get[0]['add_flag'];
         $target_insert_data['target_id']=$targets_data_get[0]['target_id'];
         $target_insert_data['target_code']=$targets_data_get[0]['target_code'];
         $target_insert_data['target_first_name']=$targets_data_get[0]['target_first_name'];
         $target_insert_data['company_id']=$targets_data_get[0]['company_id'];
         $target_insert_data['target_last_name']=$targets_data_get[0]['target_last_name'];
         $target_insert_data['email']=$targets_data_get[0]['email'];
         $target_insert_data['phone']=$targets_data_get[0]['phone'];
          $target_insert_data['mobile']=$targets_data_get[0]['mobile'];
         $target_insert_data['address']=$targets_data_get[0]['address'];
         $target_insert_data['company']=$targets_data_get[0]['company'];
         $target_insert_data['website']=$targets_data_get[0]['website'];
         $target_insert_data['categories']=$targets_data_get[0]['categories'];
         $target_insert_data['type']=$targets_data_get[0]['type'];
         $target_insert_data['target_dob']=$targets_data_get[0]['target_dob'];
         $target_insert_data['target_gender']=$targets_data_get[0]['target_gender'];
         $target_insert_data['social_security_no']=$targets_data_get[0]['social_security_no'];
         $target_insert_data['target_company_name']=$targets_data_get[0]['target_company_name'];
         $target_insert_data['address_seq_no']=$targets_data_get[0]['address_seq_no'];
         $target_insert_data['association_status']=$targets_data_get[0]['association_status'];
         $target_insert_data['industry_type']=$targets_data_get[0]['industry_type'];
         $target_insert_data['remarks_notes']=$targets_data_get[0]['remarks_notes'];
         $target_insert_data['created_by']=$targets_data_get[0]['created_by'];
         $target_insert_data['created_date']=time();
         $target_insert_data['updated_by']=$targets_data_get[0]['updated_by'];
         $target_insert_data['updated_date']=time();
         $target_insert_data['target_image']=$targets_data_get[0]['target_image'];
         $target_insert_data['status']='Active';

         $targets_data_add_new_record=$this->Targets_model->add($target_insert_data);


        $module='module10';
        $note_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$write_notes,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>$module);
         $note=$this->Allnote_Model->add($note_arry);
        //echo $this->db->last_query();die;


        
         if($clt_purch  && $targets_data_add_new_record && $target_edit_old_data && $note)
         {
            echo "1";
         }

       }
       else if($rad=="N") 
       {
             $arry_data=array('status'=>'Inactive','added_date'=>time());
           //$clt_purch= $this->Module10_Model->edit_cond($arry_data," target_seq_no = '" . $target_seq_no. "'  and  admin_id='".$admin_id."'  ");

           $this->db->where('target_seq_no',$target_seq_no,'admin_id',$admin_id);
           $clt_purch=$this->db->update('plma_module10',$arry_data);

           $module='module10';
           $note_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$write_notes,'status'=>'Inactive','added_date'=>time(),'modified_date'=>time(),'module'=>$module);
         $note=$this->Allnote_Model->add($note_arry);

             if($clt_purch && $note)
             {
                echo "2";
             }
         }  

    }
    function do_not_call_purchase_again()
    {
      $admin_id=$this->data['admin_id'];
      $do_not_call_purchase_notes=$this->input->post("do_not_call_purchase_notes");
      $target_seq_no=$this->input->post("target_seq_no");
      


       $this->db->where('target_seq_no',$target_seq_no);
       $dtl_record=$this->db->delete('plma_module10');
     // $dtl_record=$this->Module10_Model->delete($target_seq_no);


      $target_edit_arry=array('status'=>'3');
      //$target_edit_old_data=$this->Targets_model->edit($target_edit_arry,$target_seq_no);

       $this->db->where('target_seq_no',$target_seq_no);
       $target_edit_old_data=$this->db->update('plma_target',$target_edit_arry);


      $module='module10';
      $note_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$do_not_call_purchase_notes,'status'=>'Inactive','added_date'=>time(),'modified_date'=>time(),'module'=>$module);
         $do_not_note=$this->Allnote_Model->add($note_arry);

      if($target_edit_old_data && $dtl_record && $do_not_note)
      {
        echo "1";
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
       $data=array('name'=>$first_name.' '.$last_name);
       //$res=$this->appointment_details_module->edit($data,$seq_no);
       $this->db->where('target_seq_no',$target_seq_no);
       $res = $this->db->update('plma_module10', $data);
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
       $this->load->view($this->view_dir . 'operation_master/client_purchase/send_message_module10', $this->data);

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

       /*echo "<pre>";
       print_r($attach_array);
       echo "</pre>"; */
       /*$explode=explode(",",$attach_array);
       $arr=array();
       for($j=0;$j<count($explode);$j++)
       {
        $arr[$j]=$explode[$j];
       } */
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
        
        $file_name=array();

        if(count($attach_array) > 0){
            for($i=0;$i<count($attach_array);$i++){
                $file_name[] = trim($attach_array[$i]);
                $this->email->attach("./assets/upload/attachments/$file_name");
            }
            
        }  

       /* echo "<pre>";
        print_r($file_name);
        echo "</pre>";*/
        //$this->email->send();
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



}