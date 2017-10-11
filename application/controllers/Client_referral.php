<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_referral extends MY_Controller {

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
        $this->load->model('Module9_Model');
        $this->load->model('Change_module_number_module');
        $this->load->model('module_setting_model');
        $this->load->model('emailtemplate_model');
        $this->load->model('signature_model');
        $this->load->model('send_sms_model');
        $this->load->model('sms_add_model');

    }
    function index(){
    	

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        //echo 'hello'.$admin_id;echo $role_code;die();
        $cond=" AND status='Active' ";
        $model9_data=$this->Module9_Model->fetch($cond);
        
        //$target_seq_no=$model9_data[0]['target_seq_no'];
        //print_r($target_seq_no);die();
        
        //$cond1=" AND target_seq_no='".$target_seq_no."' ";
        //$targets_data_get=$this->targets_model->fetch($cond1);
        //echo $target_seq_no;die();
        /*echo "<pre>";
        print_r($targets_data_get);
        echo "</pre>";*/

         $this->data['user_data']=$model9_data;

         $this->get_include();
         $this->load->view($this->view_dir . 'operation_master/client_referral/listing', $this->data);



    }
    function view($code='',$id='')
    {
         $firm_seq_no=$this->data['firm_seq_no'];

         $admin_id=$this->data['admin_id'];
         $target_seq_no=base64_decode($code);
         $target_seq_no = base64_decode($this->uri->segment(3));
         //$target_seq_no = $this->data[]
         // echo "$firm_seq_no</br>";
         // echo "$admin_id</br>";
          // echo "$target_seq_no</br>";
           //die();
         $this->data['target_seq_nos']=$target_seq_no;
         $this->data['company_ids']=$firm_seq_no;
       
         $this->db->select('*')->from('plma_target')->where('target_seq_no="'.$target_seq_no.'"');
         $target_data = $this->db->get()->result_array();
         $this->data['user_detail']=$target_data;
         //print_r($target_data);die();

        $user_phone = $target_data[0]['phone'];
        $original_user_phone = $user_phone;
        $length = strlen($original_user_phone);
        if ($length == 10) {
            $country_code1 = '';
        } else if ($length == 11) {
            $country_code1 = substr($original_user_phone, 0, 1);
        } else if ($length == 12) {
            $country_code1 = substr($original_user_phone, 0, 2);
        } else if ($length == 13) {
            $country_code1 = substr($original_user_phone, 0, 3);
        } else if ($length == 14) {
            $country_code1 = substr($original_user_phone, 0, 4);
        }
        else if ($length == 17) {
            $country_code1 = substr($original_user_phone, 0, 3);
        }
        $user_phone_number = substr($original_user_phone, -11);
        
        $this->data['country_code'] = $country_code1;
        $this->data['home_phone_number'] = $user_phone_number;
         
         $condnote = " and admin_id ='".$admin_id."' and target_seq_no='".$target_seq_no."' order by id DESC";
         $note = $this->Allnote_Model->fetch($condnote);
         $this->data['viewallnotes']=$note;

         $get_testimonial=$this->db->select('*')->from('plma_testimonial')->where('target_seq_no="'.$target_seq_no.'"  order by testimonial_seq_no DESC ');
         $get_testimonial_details=$this->db->get()->result_array();

        
         $this->data['testimonial']=$get_testimonial_details;
           
         $this->data['target_seq_nos']=$target_seq_no;

         
         //fetching data from module9
         $cond = " AND admin_id='$admin_id' AND target_seq_no='$target_seq_no' AND firm_seq_no='$firm_seq_no' AND status='Active'";
         //echo $cond;
         //die();
        $fetch_details = $this->Module9_Model->fetch($cond);
        //print_r( $fetch_details);
        // die();
        $contact_id = $fetch_details[0]['module_9_seq_no'];
        $this->data['fetch_details']=$fetch_details;
  
        //print_r($contact_id);
       // die();
        //echo  "$firm_seq_no <hr>";
          //echo $admin_id;
        //die();
        
        //for previous & next
        $iddd= "Select module_9_seq_no from `plma_module9` WHERE module_9_seq_no='$contact_id' and firm_seq_no='$firm_seq_no' and status='Active' order by module_9_seq_no";
        $quu= $this->db->query($iddd);
        $arrr= $quu->result_array();

         $cond_module = "AND module_name = 'module9'";
         $fetch_module_details = $this->module_setting_model->fetch($cond_module);
          $this->data['fetch_module_details'] =  $fetch_module_details;
        $prev_id=$arrr[0]['module_9_seq_no']-1;
       //echo $prev_id;
        //die();
        $iddd_prev = "select max(target_seq_no) as target_seq_no from plma_module9 where target_seq_no < $target_seq_no AND firm_seq_no=$firm_seq_no and status='Active'";
        $quu_prev= $this->db->query($iddd_prev);
        $arrr_prev= $quu_prev->result_array();

        $next_id=$arrr[0]['module_9_seq_no']+1;
        // echo   $next_id ;
       // die();
        $iddd_next= "select min(target_seq_no) as target_seq_no from plma_module9 where target_seq_no > $target_seq_no AND firm_seq_no=$firm_seq_no and status='Active'";
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

        $cond = " AND form_model='module9' AND form_id=$admin_id AND to_id=$target_seq_no";
        $fetch_sms_details = $this->send_sms_model->fetch($cond);
        $this->data['sms_content'] = $fetch_sms_details;
        
        $fetch_cond = " AND module_name='module9' AND firm_seq_no='$firm_seq_no' AND status=1";
        $module_details = $this->sms_add_model->fetch($fetch_cond);
        $this->data['module_details']= $module_details;

        $this->get_include();
       
        $row = $this->Change_module_number_module->fetch();
        $this->data['notes'] = $row;
        $this->load->view($this->view_dir . 'operation_master/client_referral/view', $this->data);

    }
    
    public function refferal_not_add(){
        $admin_id=$this->data['admin_id'];
        
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_session_data['firm_seq_no'];
        
        $target_seq_no=$this->input->post("target_seq_no");
        
        $target_data=$this->Targets_model->fetch(' AND target_seq_no="'.$target_seq_no.'"','*');
       
        $target_first_name=$target_data[0]['target_first_name'];
        $target_last_name=$target_data[0]['target_last_name'];
        $target_name=$target_first_name.''.$target_last_name;
        
        $arry_module10=array('admin_id'=>$admin_id,'target_seq_no'=>$target_seq_no,'name'=>$target_name,'status'=>'Active','added_date'=>time(),'purchase_again'=>'yes','firm_seq_no'=>$firm_seq_no);
        $add_module10=$this->db->insert('plma_module10',$arry_module10);
        
        $arry_edt_module9=array('status'=>'Inactive');
        $this->db->where('target_seq_no',$target_seq_no,'admin_id',$admin_id);
        $edt_module9=$this->db->update('plma_module9',$arry_edt_module9);

        if($add_module10 && $edt_module9){
            echo "1";
        }
    }
            
    function add_client_referral()
    {
        $admin_id=$this->data['admin_id'];
        //echo $admin_id;die;
        $fetch_cond = "AND user_seq_no = '$admin_id'";
        $fetch_attr = $this->attorney_model->fetch($fetch_cond);
        $attr_seq_no = $fetch_attr[0]['attorney_seq_no'];

        $this->db->select('list_id')->from('plma_assign_list_to_call_user')->where('user_seq_no',$attr_seq_no);

        $fetch_list = $this->db->get()->result_array();

        $firm_seq_no=$this->data['firm_seq_no'];
        $target_seq_no=$this->input->post("target_seq_no");
        $contact_first_name=$this->input->post("contact_first_name");
        //echo $contact_first_name.''.$contact_email;
        $contact_last_name=$this->input->post("contact_last_name");
        $contact_email=$this->input->post("contact_email");
        
        $contact_phone=$this->input->post("contact_phone");
        $country_code1=$this->input->post("country_code1");
        $phone_number = $country_code1 . $contact_phone;
        
        $category=$this->input->post("category");
        $company_name=$this->input->post("company_name");
        $ref_address=$this->input->post("ref_address");
        $date_contacted=$this->input->post("date_contacted");
         
        $target_data=$this->Targets_model->fetch(' AND target_seq_no="'.$target_seq_no.'"','*');
       
        $target_first_name=$target_data[0]['target_first_name'];
        $target_last_name=$target_data[0]['target_last_name'];
        $target_name=$target_first_name.''.$target_last_name;
        //echo $target_seq_no;die;
 
        $arry_insert_target=array('list_id'=>$fetch_list[0]['list_id'], 'firm_seq_no'=>$firm_seq_no,'target_first_name'=>$contact_first_name,'target_last_name'=>$contact_last_name,'email'=>$contact_email,'phone'=>$phone_number,'referral_id'=>$target_seq_no,'company'=>$company_name,'address'=>$ref_address,'updated_date'=>$date_contacted,'categories'=>$category,'status'=>1);

        //$target_add_contact=$this->Targets_model->add($arry_insert_target);

          $target_add_contact=$this->db->insert('plma_target',$arry_insert_target);


        
        $name=$contact_first_name.' '.$contact_last_name;
        //$arry_module10=array('admin_id'=>$admin_id,'target_seq_no'=>$target_seq_no,'name'=>$name,'status'=>'Active','added_date'=>time(),'purchase_again'=>'yes');


        $arry_module10=array('admin_id'=>$admin_id,'target_seq_no'=>$target_seq_no,'name'=>$target_name,'status'=>'Active','added_date'=>time(),'purchase_again'=>'yes','firm_seq_no'=>$firm_seq_no);

        $add_module10=$this->db->insert('plma_module10',$arry_module10);

        
        $arry_edt_module9=array('status'=>'Inactive');
        //$edt_module9=$this->Module9_Model->edit_cond($arry_edt_module9," target_seq_no='".$target_seq_no."'  and  admin_id='".$admin_id."'  ");

         //$data_upt=array('name'=>$template_name,'content'=>$msg);
         $this->db->where('target_seq_no',$target_seq_no,'admin_id',$admin_id);
         $edt_module9=$this->db->update('plma_module9',$arry_edt_module9);
         //echo $this->db->last_query();die;

        

        if($add_module10 && $target_add_contact && $edt_module9)
        {
            echo "1";
        }
       

    }
    function do_not_call_client_referral()
    {
        $admin_id=$this->data['admin_id'];
        $do_not_call_referral_notes=$this->input->post("do_not_call_referral_notes");
        $target_seq_no=$this->input->post("target_seq_no");
        //echo $target_seq_no;
        $arry_clt_ref=array('status'=>'3');
        //$edit_target=$this->Targets_model->edit_cond($arry_clt_ref,$target_seq_no);

         //$data_upt=array('name'=>$template_name,'content'=>$msg);
         $this->db->where('target_seq_no',$target_seq_no);
         $edit_target=$this->db->update('plma_target',$arry_clt_ref);


         $this->db->where('target_seq_no',$target_seq_no);
         $del_module9=$this->db->delete('plma_module9');

        //$del_module9=$this->Targets_model->delete($target_seq_no);

        $module='module9';
        $note_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$do_not_call_referral_notes,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>$module);
         $note_referral=$this->Allnote_Model->add($note_arry);

        if($edit_target && $del_module9 && $note_referral)
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
       $data=array('name'=>$first_name.' '.$last_name,'email'=>$email,'phone'=>$country_code1.$phione , 'mobile' => $mobile,'address'=>$address1,'company_name'=>$target_company_name, 'categories'=>$industry_type);
       //$res=$this->appointment_details_module->edit($data,$seq_no);
       $this->db->where('target_seq_no',$target_seq_no);
       $res = $this->db->update('plma_module9', $data);
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
       $this->load->view($this->view_dir . 'operation_master/client_referral/send_message_module9', $this->data);

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