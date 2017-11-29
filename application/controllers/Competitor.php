<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Competitor extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->isLogin();
        
        $this->load->model('competitor_model');
        $this->load->model('address_model');
        $this->load->model('country_model');
        $this->load->model('states_model');
        $this->load->model('county_model');
        $this->load->model('city_model');
        $this->load->model('codes_model');
        $this->load->model('firm_model');
        $this->load->model('comp_aty_rank_model');
        $this->load->model('Targets_model');
        $this->load->model('Callappointment_Model');
        $this->load->model('Allnote_Model');
        //$this->load->model('Contract_Model');
        $this->load->model('venue_model');
        $this->load->model('appointment_details_module');
        $this->load->model('Model5');
        $this->load->model('user_model');
        $this->load->model('add_contact_model');
        $this->load->model('Appointment_Model');
        $this->load->model('Module6_Model');
        $this->load->model('Module4_Model');
        $this->load->model('Target_contact_model');
        $this->load->model('module_setting_model');
        $this->load->model('Change_module_number_module');
        $this->load->model('send_sms_model');
        $this->load->model('emailtemplate_model');
        $this->load->model('signature_model');
        $this->load->model('sms_add_model');

    }
   function index($code='')
    {

       $module_no =base64_decode($code);

       $admin_id = $this->data['admin_id'];
       $role_code = $this->data['role_code'];

        $cond = " AND user_seq_no=$admin_id";
        $fetch_user_details = $this->user_model->fetch($cond);
       // t($fetch_user_details); die();
//        $company_id = $fetch_user_details[0]['firm_seq_no'];
        $company_session = $this->session->userdata('admin_session_data');
        $company_id = $company_session['firm_seq_no'];


        if($role_code=='APPT')
         {
            $this->db->select('plma_appointment_details.*,plma_venue.venue_seq_no,plma_venue.venue_name, plma_target.type')
                     ->from('plma_appointment_details')
                     ->join('plma_venue','plma_appointment_details.appointment_venu=plma_venue.venue_seq_no')
                     ->join('plma_target', 'plma_appointment_details.target_seq_no=plma_target.target_seq_no')
                     ->where('presentation_done=0 AND plma_appointment_details.admin_id="'.$admin_id.'" AND firm_seq_no="'.$company_id.'"');
            $fetch_appointment_details=$this->db->get()->result_array();
            $this->data['competitor'] =$fetch_appointment_details;
         }
         else
         {
         $this->db->select('plma_appointment_details.*,plma_venue.venue_seq_no,plma_venue.venue_name, plma_target.type')
                  ->from('plma_appointment_details')
                  ->join('plma_venue','plma_appointment_details.appointment_venu=plma_venue.venue_seq_no')
                  ->join('plma_target', 'plma_appointment_details.target_seq_no=plma_target.target_seq_no')
                  ->where('presentation_done=0 AND plma_appointment_details.firm_seq_no="'.$company_id.'"' . "order by target_seq_no");
         $fetch_appointment_details=$this->db->get()->result_array();
         $this->data['competitor'] =$fetch_appointment_details;
         }
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/competitor/listing', $this->data);
    }
    function view($code = '', $b= '', $id='')
    {
        $company_session = $this->session->userdata('admin_session_data');
        $firm_seq_no = $company_session['firm_seq_no'];
        
        $admin_id = $this->data['admin_id'];
//        $firm_seq_no = $this->data['firm_seq_no'];

        
        $cond = " and firm_seq_no = '" . $company_session['firm_seq_no'] . "'";
        
        

        $fetch_module_script = $this->Change_module_number_module->fetch($cond);

        $fetch_module3 = $fetch_module_script[0]['note3'];
        
        $fetch_module4 = $fetch_module_script[0]['note4'];
//        $fetch_module3_script= "<html><body>".$fetch_module3."</body></html>";
        $this->data['fetch_module3_script'] = $fetch_module3;
        $this->data['fetch_module4_script'] = $fetch_module4;

        $cond = " AND user_seq_no=$admin_id";
        $fetch_user_details = $this->user_model->fetch($cond);
        $role_code = $fetch_user_details[0]['role_code'];
        $company_id = $fetch_user_details[0]['firm_seq_no'];

        $fetch_cond = " AND module_name='module3' AND firm_seq_no='".$company_id."' AND status=1";
        $module_details = $this->sms_add_model->fetch($fetch_cond);
        $this->data['module_details']= $module_details;


         $id =base64_decode($id);
         //echo $id;die();
         $code =base64_decode($code);
         $this->data['target_seq_nos']=$code;
         $this->data['company_ids']=$firm_seq_no;
         //echo $code;die();
//         $firm_seq_no=base64_decode($b);
       // echo $code;$b;die();
         $module_no=base64_decode($module);
         //echo $module_no;
         //echo $code."</br>";
         //echo $b;die();
         /*$cond = "AND target_seq_no = '".$code."'";
         $rows = $this->targets_model->fetch($cond);
         $this->data['targets'] =$rows;*/


         $this->db->from('plma_target');
         $this->db->select('plma_target.*,plma_appointment_details.id,plma_appointment_details.appointment_date,plma_appointment_details.appointment_time,plma_appointment_details.appointment_venu,plma_appointment_details.appt_seq_no,plma_appointment_details.target_seq_no,plma_appointment_details.first_name_1,plma_appointment_details.last_name_1,plma_appointment_details.email_1,plma_appointment_details.phone_1,plma_appointment_details.designation_1,plma_appointment_details.primary_contact');
         $this->db->join('plma_appointment_details','plma_target.target_seq_no=plma_appointment_details.target_seq_no and plma_appointment_details.id="'.$id.'"');
         $q=$this->db->get();
         //echo $this->db->last_query();die;
         $result_array=$q->result_array();
         $this->data['targets'] =$result_array;

        $this->load->model('Callappointment_Model');
        $cond = " AND firm_seq_no=$company_id";
        $fetch_appointment_details = $this->Callappointment_Model->fetch($cond);

        $this->data['fetch_appointment_details'] = $fetch_appointment_details;
        // echo "<pre>";
        //  print_r($result_array);die();
        $target_seq_no= $result_array[0]['target_seq_no'];
        
        //echo $id.'#'.$target_seq_no;die();

        $cond1=" AND target_seq_no='".$code."' and firm_seq_no='".$firm_seq_no."' and id='".$id."' and status='Active'";
        $user_data=$this->appointment_details_module->fetch($cond1);
        $contact_id = $user_data[0]['id'];
        //print_r($user_data);die();
        $this->data['user_detail']=$user_data;
        $this->data['id']=$id;
         //echo 'hello'.$id;die();
         //----------------------phone no-------------------------
            $home_phone = explode("-", $user_data[0]['phione']);            
            $this->data['country_code1'] = $home_phone[0];
            $this->data['home_no'] = $home_phone[1];

         //--------------for add data----------------------------
             $cond=" AND target_seq_no='".$target_seq_no."' ";
             $get_contact_data=$this->Target_contact_model->fetch($cond);
             
            $add_contact_phone_no = $get_contact_data[0]['phone'];
            $length_of_phone_no = strlen($add_contact_phone_no);
            if($length_of_phone_no == 17){
                $country_code2 = substr($add_contact_phone_no, 0, 3);
            }
            $add_contact_phone_number = substr($add_contact_phone_no, -11);
            $add_contact_phone_number_new = $this->madePhoneformate($add_contact_phone_number);

            $this->data['get_contact_data']=$get_contact_data;
            $this->data['get_contact_data_country_code']=$country_code2;
            $this->data['get_contact_data_phone_number']=$add_contact_phone_number_new;
         //-------------------------------------------------------

//         echo $target_seq_no;echo $admin_id;die();
         $condnote = " and admin_id ='".$admin_id."' and target_seq_no=$target_seq_no order by id DESC";
         $note = $this->Allnote_Model->fetch($condnote);
         $this->data['viewallnotes']=$note;

         $this->data['module_no']=$module_no;

         $this->db->select('*')->from('plma_venue');
         $this->data['venue_list'] = $this->db->get()->result_array();

         $this->db->select('*')->from('plma_appointment_user');
         $this->data['user_list'] = $this->db->get()->result_array();

         //for previous & next
        $iddd= "Select id from `plma_appointment_details` WHERE id='$contact_id' and firm_seq_no='$firm_seq_no' and status='Active' order by id";
        $quu= $this->db->query($iddd);
        $arrr= $quu->result_array();

        $prev_id=$arrr[0]['id']-1;
        $iddd_prev = "select max(target_seq_no) as target_seq_no from plma_appointment_details where target_seq_no < $code AND firm_seq_no=$firm_seq_no and status='Active' and presentation_done=0";
        $quu_prev= $this->db->query($iddd_prev);
        $arrr_prev= $quu_prev->result_array();

        $next_id=$arrr[0]['id']+1;
        $iddd_next = "select min(target_seq_no) as target_seq_no from plma_appointment_details where target_seq_no > $code AND firm_seq_no=$firm_seq_no and status='Active' and presentation_done=0";
        $quu_next= $this->db->query($iddd_next);
        $arrr_next= $quu_next->result_array();

        $this->data['next_target_seq_no'] = $arrr_next[0]['target_seq_no'];
        $this->data['prev_target_seq_no'] = $arrr_prev[0]['target_seq_no'];
        
        
         $cond_module = "AND module_name = 'module3'";
         $fetch_module_details = $this->module_setting_model->fetch($cond_module);
         $this->data['fetch_module_details'] =  $fetch_module_details;

        $cond123 = " AND firm_seq_no='$company_id' AND target_seq_no='$target_seq_no'";
        $fetch_add_contact_details = $this->add_contact_model->fetch($cond123);
        $this->data['fetch_add_contact_details'] = $fetch_add_contact_details[0];

        $primary_contact_phone = $fetch_add_contact_details[0]['phone'];
        
        
        //end
        
        $cond = " AND form_model='module3' AND form_id=$admin_id AND to_id=$target_seq_no";
        $fetch_sms_details = $this->send_sms_model->fetch($cond);
        $this->data['sms_content'] = $fetch_sms_details;

        $this->get_include();
       // $row = $this->Change_module_number_module->fetch();
      //  $this->data['notes'] = $row;
        $this->load->view($this->view_dir . 'operation_master/competitor/competitor_details', $this->data);




    }
    
    function madePhoneformate($mobile_no) {
        $mobile_no = preg_replace('/[^A-Za-z0-9]/', '', $mobile_no);
        $mobile_no1 = substr($mobile_no, 0, 4);
        if ($mobile_no1) {
           $mobile_no1 = $mobile_no1 ;
        }
        $mobile_no2 = substr($mobile_no, 4, 9);
        if ($mobile_no2) {
            $mobile_no2 = " " . $mobile_no2;
        }
        $mobile_no = $mobile_no1 . $mobile_no2 ;
        return $mobile_no;
    }

    function view_backup($code = '', $b= '',$module='')
    {

        $admin_id = $this->data['admin_id'];


        $cond = " AND user_seq_no=$admin_id";
        $fetch_user_details = $this->user_model->fetch($cond);
        $role_code = $fetch_user_details[0]['role_code'];
        $company_id = $fetch_user_details[0]['firm_seq_no'];

         $code =base64_decode($code);
         $firm_seq_no=base64_decode($b);
       // echo $code;$b;die();
         $module_no=base64_decode($module);
         //echo $module_no;
         //echo $code."</br>";
         //echo $b;die();
         /*$cond = "AND target_seq_no = '".$code."'";
         $rows = $this->targets_model->fetch($cond);
         $this->data['targets'] =$rows;*/


         $this->db->from('plma_target');
         $this->db->select('plma_target.*,plma_appointment_details.appointment_date,plma_appointment_details.appointment_time,plma_appointment_details.appointment_venu,plma_appointment_details.appt_seq_no,plma_appointment_details.target_seq_no');
         $this->db->join('plma_appointment_details','plma_target.target_seq_no=plma_appointment_details.target_seq_no and plma_target.target_seq_no="'.$code.'"');
         $q=$this->db->get();
         $result_array=$q->result_array();
         $this->data['targets'] =$result_array;

        $this->load->model('Callappointment_Model');
        $cond = " AND firm_seq_no=$company_id";
        $fetch_appointment_details = $this->Callappointment_Model->fetch($cond);

        $this->data['fetch_appointment_details'] = $fetch_appointment_details;

        $target_seq_no= $result_array[0]['target_seq_no'];
         //echo $target_seq_no;die();

        $cond1=" AND target_seq_no='".$code."' and firm_seq_no='".$firm_seq_no."' ";
        $user_data=$this->appointment_details_module->fetch($cond1);
        $this->data['user_detail']=$user_data;
         /*echo "<pre>";
         print_r($user_data);
         echo "</pre>";die();*/



//         echo $target_seq_no;echo $admin_id;die();
         $condnote = " and admin_id ='".$admin_id."' and target_seq_no=$target_seq_no order by id DESC";
         $note = $this->Allnote_Model->fetch($condnote);
         $this->data['viewallnotes']=$note;

         $this->data['module_no']=$module_no;

        $this->get_include();


        $this->data['notes'] = $row;
        $this->load->view($this->view_dir . 'operation_master/competitor/competitor_details', $this->data);
   }
   function contract_view()
   {
//        $firm_seq_no = $this->data['firm_seq_no'];
        $company_session = $this->session->userdata('admin_session_data');
        $firm_seq_no = $company_session['firm_seq_no'];
         
        
        $admin_id = $this->data['admin_id'];
        $this->data['company_id']=$firm_seq_no;
        $this->load->helper('url');
        $target_seq_no = base64_decode($this->uri->segment(3));

         $this->data['target_seq_nos']=$target_seq_no;
         $this->data['company_ids']=$firm_seq_no;

        /*************Get All Notes Of That Target Sequence *********************/
//        $this->db->select('plma_all_notes.content,plma_all_notes.added_date,
//        plma_user.user_first_name, plma_user.user_last_name')->from('plma_all_notes')
//        ->join('plma_user', 'plma_all_notes.admin_id = plma_user.user_seq_no')
//        ->where('target_seq_no="'.$target_seq_no.'"')->order_by('id');
//        $all_notes_query = $this->db->get();
//        $this->data['all_notes'] = $all_notes_query->result_array();
//        echo $this->db->last_query();
//        t($this->data['all_notes']);die();
        
        $condnote = " AND  target_seq_no ='".$target_seq_no."' and admin_id='".$admin_id."' and status!='Inactive' order by id DESC";
        $note=$this->Allnote_Model->fetch($condnote);
        $this->data['all_notes']=$note;
        /******************End**************************************/

        $fetch_cond = " AND module_name='module4' AND firm_seq_no='".$firm_seq_no."' AND status=1";
        $module_details = $this->sms_add_model->fetch($fetch_cond);
        $this->data['module_details']= $module_details;

        /*************Contact Details and his/her primary contact *********************/

        $this->db->select('plma_target.target_seq_no,
        plma_target.company_id,plma_target.company,plma_target.target_first_name,
        plma_target.target_last_name,plma_target.phone as target_phone,plma_target.company,plma_target.target_image,
        plma_target.email as target_email,plma_target.mobile,plma_target.address,plma_target.categories,plma_target.lead_source_and_date,
        plma_target_contact.first_name,plma_module4.module_4_seq_no,
        plma_target_contact.last_name,plma_target_contact.email,plma_target_contact.phone, plma_module4.contract_status,plma_module4.contract_signed')
        ->from('plma_target')
        ->join('plma_target_contact','plma_target.target_seq_no = plma_target_contact.target_seq_no', 'LEFT')
        ->join('plma_module4', 'plma_module4.target_seq_no = plma_target.target_seq_no', 'INNER')
        ->where('plma_target.target_seq_no ="'.$target_seq_no.'"');

        $target_contact_details = $this->db->get();
        $target_contact_details1 = $target_contact_details->result_array();
        $this->data['target_contact_details'] = $target_contact_details1;
        
        $view_details_module4_no = explode("-", $target_contact_details1[0]['target_phone']);        
        $this->data['country_code'] = $view_details_module4_no[0];
        $this->data['home_no'] = $view_details_module4_no[1];
        /******************End**************************************/


        /*************Email Templates Details *********************/

        $this->db->select('*')->from('plma_template');
        $template_details = $this->db->get();
        $this->data['template_details'] = $template_details->result_array();

        $this->data['target_seq_no'] = $target_seq_no;
        //$this->data['company_id'] = $firm_seq_no;
        //$this->data['new_firm_seq_no']=$new_firm_seq_no;
         //echo $target_seq_no.'#'.$new_firm_seq_no;die();
        /******************End**************************************/

        //for previous & next
        $iddd= "Select module_4_seq_no from `plma_module4` WHERE target_seq_no=$target_seq_no and firm_seq_no='$firm_seq_no' and contract_signed='NO' order by module_4_seq_no";
        $quu= $this->db->query($iddd);
        $arrr= $quu->result_array();

        $prev_id=$arrr[0]['module_4_seq_no']-1;
        $iddd_prev = "select max(target_seq_no) as target_seq_no from plma_module4 where target_seq_no < $target_seq_no AND firm_seq_no=$firm_seq_no and contract_signed='NO'";
        $quu_prev= $this->db->query($iddd_prev);
        $arrr_prev= $quu_prev->result_array();

        $next_id=$arrr[0]['module_4_seq_no']+1;
        $iddd_next= "select min(target_seq_no) as target_seq_no from plma_module4 where target_seq_no > $target_seq_no AND firm_seq_no=$firm_seq_no and contract_signed='NO'";
        $quu_next= $this->db->query($iddd_next);
        $arrr_next= $quu_next->result_array();

        $this->data['next_target_seq_no'] = $arrr_next[0]['target_seq_no'];
        $this->data['prev_target_seq_no'] = $arrr_prev[0]['target_seq_no'];
        //end
        
        $cond_module = "AND module_name = 'module4'";
        $fetch_module_details = $this->module_setting_model->fetch($cond_module);
        $this->data['fetch_module_details'] =  $fetch_module_details;

        //-------------primary contact details---------------//
        $cond123 = " AND firm_seq_no='$firm_seq_no' AND target_seq_no='$target_seq_no'";
        $fetch_add_contact_details = $this->add_contact_model->fetch($cond123);
            //echo $this->db->last_query();die;
        $this->data['fetch_add_contact_details'] = $fetch_add_contact_details[0];

        $primary_contact_phone = $fetch_add_contact_details[0]['phone'];
        //--------end------------//
        
        
        $cond = " AND form_model='module4' AND form_id=$admin_id AND to_id=$target_seq_no";
        $fetch_sms_details = $this->send_sms_model->fetch($cond);
        $this->data['sms_content'] = $fetch_sms_details;

        $this->get_include();
        $row = $this->Change_module_number_module->fetch();
                   $this->data['notes'] = $row;
      
                   //print_r($this->data['notes']);
                  // die();
        
        
        
        
        $this->load->view($this->view_dir . 'operation_master/competitor/competitor_contractdetails', $this->data);
   }
   
   function get_email_template() {
     $template_id = base64_decode($this->input->post('template_id'));
     $this->db->select('*')->from('plma_template')->where('id="'.$template_id.'"');
     $template_details = $this->db->get();
     echo json_encode($template_details->result_array());
   }

   function generate_pdf() {

     $this->load->helper('pdf');
     $template_id = base64_decode($this->uri->segment(3));
     $target_seq_no = base64_decode($this->uri->segment(4));

     $this->db->select('*')->from('plma_target')->where('target_seq_no="'.$target_seq_no.'"');
     $target_details = $this->db->get()->result_array();

     $this->db->select('content')->from('plma_template')->where('id="'.$template_id.'"');
     $template_details = $this->db->get();
     $this->data['content'] = $template_details->result_array();
     $this->data['content'] = str_ireplace('$name', ucwords($target_details[0]['target_first_name']." ".$target_details[0]['target_last_name']), $this->data['content'][0]['content']);
     $this->data['content'] = str_ireplace('$address', $target_details[0]['address'], $this->data['content']);
     $this->data['content'] = str_ireplace('$phone', $target_details[0]['phone'], $this->data['content']);
     $this->data['content'] = str_ireplace('$email', $target_details[0]['email'], $this->data['content']);
     $this->data['content'] = str_ireplace('$company', $target_details[0]['company'], $this->data['content']);
     $this->data['content'] = str_ireplace('$categories', $target_details[0]['categories'], $this->data['content']);
     $this->load->view($this->view_dir . 'operation_master/competitor/pdf_preview', $this->data);
   }


   function add_new_template() {
     $template_id = base64_decode($this->input->post('template_id'));
     $content = $this->input->post('content');
     $template_name = $this->input->post('template_name');
     $admin_all_session = $this->session->userdata('admin_session_data');

     $this->db->select('*')->from('plma_template')
                  ->where('created_by="'.$admin_all_session['admin_id'].'" AND id="'.$template_id.'"');
     $result = $this->db->get()->result_array();

     if(empty($result)) {
         $new_array = array(
           'name' => $template_name,
           'content' => $content,
           'created_by' => $admin_all_session['admin_id']
         );
         $last_id = $this->db->insert('plma_template', $new_array);
         if($last_id) {
           echo "1";
         }
         else {
           echo "0";
         }
     }
     else {
       $update_array = array(
         'name' => $template_name,
         'content' => $content
       );
       $this->db->where('id', $template_id);
       $update_id = $this->db->update('plma_template', $update_array);
       if($update_id) {
         echo "1";
       }
       else {
         echo "0";
       }
     }
   }

   function add_do_not_call() {
     $do_not_call_notes = $this->input->post('do_not_call_notes');
     $target_seq_no = base64_decode($this->input->post('target_seq_no'));
     $admin_all_session = $this->session->userdata('admin_session_data');

     $note_data=array('target_seq_no'=>$target_seq_no,'admin_id'=>$admin_all_session['admin_id'],'content'=>$do_not_call_notes,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module4');
     $note_insert=$this->db->insert('plma_all_notes',$note_data);
     if($note_insert) {
         $update_array = array(
             'status' => 3
         );
         $update_id = $this->Targets_model->edit($update_array, $target_seq_no);
         if($update_id) {
           $this->db->where('target_seq_no', $target_seq_no);
           $this->db->delete('plma_module4');
           echo "1";
         }
         else {
           echo "0";
         }
     }
     else {
         echo "0";
     }
   }

   function add_contract_signed() {
     $admin_all_session = $this->session->userdata('admin_session_data');
     $target_seq_no = $this->input->post('target_seq_no');
     //echo $target_seq_no;die;
     $contract_signed_date = $this->input->post('contract_signed_date');
     //echo $target_seq_no;die;
     $contract_signed_notes = $this->input->post('contract_signed_notes');

     $note_data=array('target_seq_no'=>$target_seq_no,'admin_id'=>$admin_all_session['admin_id'],'content'=>$contract_signed_notes,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module4');
     //t($note_data);die;
     $note_insert=$this->db->insert('plma_all_notes',$note_data);
     if($note_insert) {
       $update_array = array(
         'contract_signed' => "YES",
         'contract_signed_date' => $contract_signed_date,
         'updated_date' => time()
       );
       $this->db->where('target_seq_no', $target_seq_no);
       $update_id = $this->db->update('plma_module4', $update_array);
       //echo $this->db->last_query();die;
       if($update_id) {
         $this->db->select('*')->from('plma_target')->where('target_seq_no="'.$target_seq_no.'"');
         $module_4_details = $this->db->get()->result_array();

         $module_5_array = array(
           'admin_id' => $admin_all_session['admin_id'],
           'target_seq_no' => $target_seq_no,
           'firm_seq_no' => $admin_all_session['firm_seq_no'],
           'name' => ucwords($module_4_details[0]['target_first_name']." ".$module_4_details[0]['target_last_name']),
           'address1' => $module_4_details[0]['address'],
           'phone' => $module_4_details[0]['phone'],
           'mobile' => $module_4_details[0]['mobile'],
           'company_name' => $module_4_details[0]['company'],
           'categories' => $module_4_details[0]['categories'],
           'email' => $module_4_details[0]['email'],
           'e_signature' => 'Yes',
           'send_contact' => 'Yes',
           'status' => 'Active',
           'type' => $module_4_details[0]['type']
         );

         $insert_id = $this->db->insert('plma_module5', $module_5_array);
         if($insert_id) {
           echo "1";
         }
         else {
           echo "0";
         }
       }
     }
   }

   function send_contract_details() {
     $admin_all_session = $this->session->userdata('admin_session_data');
     $send_contract_date = $this->input->post('send_contract_date');
     $is_sending = $this->input->post('is_sending');
     $send_contract_note = $this->input->post('send_contract_note');
     $target_seq_no = base64_decode($this->input->post('target_seq_no'));
     $template_id = base64_decode($this->input->post('template_id'));



     $note_data=array('target_seq_no'=>$target_seq_no,'admin_id'=>$admin_all_session['admin_id'],'content'=>$send_contract_note,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module4');
     $note_insert=$this->db->insert('plma_all_notes',$note_data);

     if($note_insert) {
       $update_array = array(
         'contract_status' => "1",
         'send_contract_date' => $send_contract_date,
         'updated_date' => time()
       );
       $this->db->where('target_seq_no', $target_seq_no);
       $update_id = $this->db->update('plma_module4', $update_array);
       if($update_id) {
           $this->db->select('*')->from('plma_target')->where('target_seq_no="'.$target_seq_no.'"');
           $target_details = $this->db->get()->result_array();

           $this->db->select('content')->from('plma_template')->where('id="'.$template_id.'"');
           $template_details = $this->db->get();
           $this->data['content'] = $template_details->result_array();
           $this->data['content'] = str_ireplace('$name', ucwords($target_details[0]['target_first_name']." ".$target_details[0]['target_last_name']), $this->data['content'][0]['content']);
           $this->data['content'] = str_ireplace('$address', $target_details[0]['address'], $this->data['content']);
           $this->data['content'] = str_ireplace('$phone', $target_details[0]['phone'], $this->data['content']);
           $this->data['content'] = str_ireplace('$email', $target_details[0]['email'], $this->data['content']);
           $this->data['content'] = str_ireplace('$company', $target_details[0]['company'], $this->data['content']);
           $this->data['content'] = str_ireplace('$categories', $target_details[0]['categories'], $this->data['content']);
           $this->load->helper('pdf');
           tcpdf();
           $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
           $obj_pdf->SetCreator(PDF_CREATOR);
           $title = "PDF Report";
           $obj_pdf->SetTitle($title);
           $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
           $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
           $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
           $obj_pdf->SetDefaultMonospacedFont('helvetica');
           $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
           $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
           $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
           $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
           $obj_pdf->SetFont('helvetica', '', 9);
           $obj_pdf->setFontSubsetting(false);
           $obj_pdf->AddPage();

           $obj_pdf->writeHTML($this->data['content'], false, false, false, false, '');

           $fileName = 'receipt.pdf';
           $fileatt = $obj_pdf->Output($fileName, 'E');
           $attachment = $fileatt;
            $to = "manomit@wrctechnologies.com";
            $subject = "Contract";
            $from = "partho@wrctechnologies.com";
            $headers = "From: $from\r\n";
            $headers .= "MIME-Version: 1.0\r\n"
              ."Content-Type: multipart/mixed; boundary=\"1a2a3a\"";

            $message .= "If you can see this MIME than your client doesn't accept MIME types!\r\n"
              ."--1a2a3a\r\n";

            $message .= "Content-Type: text/html; charset=\"iso-8859-1\"\r\n"
              ."Content-Transfer-Encoding: 7bit\r\n\r\n"
              .$this->data['content']
              ."--1a2a3a\r\n";



            $message .= "Content-Type: application/octet-stream; name=\"".$fileName."\"\r\n"
              ."Content-Transfer-Encoding: base64\r\n"
              ."Content-disposition: attachment; file=\"".$fileName."\"\r\n"
              ."\r\n"
              .chunk_split(base64_encode($attachment))
              ."--1a2a3a--";
            $success = mail($to,$subject,$message,$headers);
               if (!$success) {
              echo "0";
               }else {
              echo "1" ;
               }

       }
       else {
         echo "0";
       }
     }
   }
   function view_mo5($code = '', $b= '')
   {

       $admin_id = $this->data['admin_id'];
       $role_code = $this->data['role_code'];


        $cond = " AND user_seq_no=$admin_id";
        $fetch_user_details = $this->user_model->fetch($cond);
        $role_code = $fetch_user_details[0]['role_code'];
        $company_id = $fetch_user_details[0]['firm_seq_no'];

         $code =base64_decode($code);
         $b=base64_decode($b);



         $this->db->from('plma_target');
         $this->db->select('plma_target.*,plma_appointment_details.appointment_date,plma_appointment_details.appointment_time,plma_appointment_details.appointment_venu,plma_appointment_details.appt_seq_no,plma_appointment_details.target_seq_no,plma_appointment_details.user_seq_no');
         $this->db->join('plma_appointment_details','plma_target.target_seq_no=plma_appointment_details.target_seq_no and plma_target.target_seq_no="'.$code.'"');
         $q=$this->db->get();
         $result_array=$q->result_array();
         $this->data['targets'] =$result_array;

        $this->load->model('Callappointment_Model');
        $cond = " AND firm_seq_no=$company_id";
        $fetch_appointment_details = $this->Callappointment_Model->fetch($cond);

        $this->data['fetch_appointment_details'] = $fetch_appointment_details;


         $condnote = "order by id DESC";
         $note=$this->Allnote_Model->fetch($condnote);
         $this->data['viewallnotes']=$note;

         //code for showing notice in script


        $this->get_include();
       $row = $this->change_module_number_module->fetch();
        $this->data['row'] = $row;
        //$this->load->view($this->view_dir . 'operation_master/competitor/competitor_contractdetails', $this->data);
        $this->load->view($this->view_dir. 'operation_master/competitor/competitor_contractdetails', $this->data);




   }
   function details($code = '')
    {

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $cond_firm = " and firm_admin_seq_no = '".$admin_id."'";
        $res_firm = $this->firm_model->fetch($cond_firm, 'firm_seq_no');
        $this->data['firm_seq_no'] = $res_firm[0]['firm_seq_no'];
//        t(); exit;

//        echo"ok"; exit;
        $code = base64_decode($code);
//        $submit = $this->input->post('competitor_tab');

        $cond = " and competitor_seq_no = '".$code."'";
        $row = $this->competitor_model->fetch( $cond );
//        echo $this->db->last_query(); exit;
       $this->data['competitor_info'] = $row[0];
//       t($this->data['competitor_info']); exit;

        $sql_1 = "SELECT `code`, `short_description` FROM `plma_codes` WHERE `category_type` = 'Competitor Rank'";
        $query1 = $this->db->query($sql_1);
        $row_1 = $query1->result_array();
        $this->data['competitor_rank'] = $row_1;
//        t($this->data['competitor_rank'], 1);

       foreach ($row as $key=> $value){

            $best_1 = $value['best'];
            $cond2 = "AND code = '" . $best_1 . "' and category_type='Competitor Rank'";
            $best = $this->codes_model->fetch($cond2);

            $ind_1 = $value['independent_ranking'];
            $cond3 = "AND code = '" . $ind_1 . "' and category_type='Competitor Rank'";
            $independent_rankings = $this->codes_model->fetch($cond3);

            $chamber_1 = $value['chambers_ranking'];
            $cond4 = "AND code = '" . $chamber_1 . "' and category_type='Competitor Rank'";
            $chambers_ranking = $this->codes_model->fetch($cond4);

            $martindale_1 = $value['martindale'];
            $cond5 = "AND code = '" . $martindale_1 . "' and category_type='Competitor Rank'";
            $martindale = $this->codes_model->fetch($cond5);

            $super_1 = $value['super_lawyers'];
            $cond6 = "AND code = '" . $super_1 . "' and category_type='Competitor Rank'";
            $super_lawyers = $this->codes_model->fetch($cond6);
//            t($best, 1);
//            echo $this->db->last_query(); exit;
            $row[$key]['best'] = $best[0]['short_description'];
            $row[$key]['independent_ranking'] = $independent_rankings[0]['short_description'];
            $row[$key]['chambers_ranking'] = $chambers_ranking[0]['short_description'];
            $row[$key]['martindale'] = $martindale[0]['short_description'];
            $row[$key]['super_lawyers'] = $super_lawyers[0]['short_description'];
        }

        $this->data['det'] = $row[0];
//        t($this->data['det'], 1);
        $sql = "SELECT `short_description`,`code` FROM `plma_codes` WHERE `category_type`='Industry Type' ";
         $query = $this->db->query($sql);
         $ind_type = $query->result();
         $this->data['ind_type'] = $ind_type;


//        if (isset($submit)) {
////            echo"ok"; exit;
//            $admin_all_session = $this->session->userdata('admin_session');
//            $admin_id = $admin_all_session['admin_id'];
//
//            //EDIT COMPETITOR
//
//            $competitor_id = $this->input->post('competitor_id');
//            if (isset($competitor_id)) {
////                echo "ok"; die();
//            $competitor_code = $this->input->post('competitor_code');
//            $first_name = $this->input->post('first_name');
//            $last_name = $this->input->post('last_name');
//            $competitor_dob = $this->input->post('competitor_dob');
//            $industry_type = $this->input->post('industry_type');
//            $experience = $this->input->post('experience');
//            $bar_date = $this->input->post('bar_date');
//            $bar_state = $this->input->post('bar_state');
//            $independent = $this->input->post('independent');
//            $chambers = $this->input->post('chambers');
//            $best = $this->input->post('best');
//            $martindale = $this->input->post('martindale');
//            $super_lawyers = $this->input->post('super_lawyers');
//            $remarks = $this->input->post('remarks');
//
//                //Enter Address
//                $email = $this->input->post('email');
//                $phone = $this->input->post('phone');
//                $mobile = $this->input->post('mobile');
//                $web_url = $this->input->post('web_url');
//                $social_url = $this->input->post('social_url');
//                $address_line_1 = $this->input->post('address_line_1');
//                $address_line_2 = $this->input->post('address_line_2');
//                $address_line_3 = $this->input->post('address_line_3');
//                $country = $this->input->post('country');
//                $state = $this->input->post('state');
//                $county = $this->input->post('county');
//                $city = $this->input->post('city');
//                $postal_code = $this->input->post('postal_code');
//                $remarks_1 = $this->input->post('remarks');
//
//
//                 $data_1= array(
//                'address_line1' => $address_line_1,
//                'address_line2' => $address_line_2,
//                'address_line3' => $address_line_3,
//                'city' => $city,
//                'state' => $state,
//                'postal_code' =>$postal_code,
//                'country' => $country,
//                'county' => $county,
//                'email' => $email,
//                'phone' => $phone,
//                'mobile_cell' => $mobile,
//                'website_url' => $web_url,
//                'social_media_url' => $social_url,
//                'updated_by' => $admin_id,
//                'updated_date' => time(),
//                'remarks_notes' => $remarks_1
//            );
////                 echo "<pre>";  print_r($data_1); exit;
//
//              // $insertid_1 = $this->address_model->edit($data_1, $row[0]['address_seq_no']);
//             //echo "<pre>"; print_r($insertid_1); die();
//
//                //insert into user table
//                $data_arr_2 = array(
//                'competitor_id' => $competitor_id,
//                'competitor_code' => $competitor_code,
//                'competitor_first_name' => $first_name,
//                'competitor_last_name' => $last_name,
//                'competitor_dob' => $competitor_dob,
//                'industry_type' => $industry_type,
//                'address_seq_no' => $insertid_1,
//                'bar_date' => $bar_date,
//                'state' => $bar_state,
//                'experience' => $experience,
//                'independent_ranking' => $independent,
//                'chambers_ranking' => $chambers,
//                'best' => $best,
//                'martindale' => $martindale,
//                'super_lawyers' => $super_lawyers,
//                'remarks_notes' => $remarks,
//                'updated_by' => $admin_all_session['admin_id'],
//                'updated_date' => time()
//
//            );
//
//                // $insertid_2 = $this->competitor_model->edit($data_arr_2, $code);
////                echo "<pre>"; print_r($insertid_2); die();
//                if($insertid_2) {
////                    echo"ok"; die();
//                    $msg = 'Competitor updated successfully';
//                    $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
//                    redirect($base_url . 'competitor/details/' . base64_encode($code));
//                }else{
//                    $msg = 'error in updating Competitor';
//                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
//                    redirect($base_url . 'competitor/details/' . base64_encode($code));
//                }
//
//                redirect($base_url . 'competitor/details/' . base64_encode($code));
//
//            }
//        }

            if(count($row) > 0) {
//                echo "ok"; die();

                $this->data['competitor_info'] = $row[0];

//                t($row[0], 1);

                $cond2 = " and address_seq_no = '".$row[0]['address_seq_no']."'";
                $row2 = $this->address_model->fetch( $cond2 );
                $this->data['address_info'] = $row2[0];

                 foreach ($row2 as $key => $value) {

                    $country_1= $value['country'];
                    $cond1 = "AND country_seq_no = '$country_1'";
                    $country = $this->country_model->fetch($cond1);

                    $state_1 = $value['state'];
                    $cond4 = "AND state_seq_no = '$state_1'";
                    $state = $this->states_model->fetch($cond4);

                    $city_1 = $value['city'];
                    $cond5 = "AND city_seq_no = '$city_1'";
                    $city = $this->city_model->fetch($cond5);

                    $county_1 = $value['county'];
                    $cond6 = "AND county_seq_no = '$county_1'";
                    $county = $this->county_model->fetch($cond6);

                    $row2[$key]['country'] = $country[0]['name'];
                    $row2[$key]['state'] = $state[0]['state_name'];
                    $row2[$key]['county'] = $county[0]['county_name'];
                    $row2[$key]['city'] = $city[0]['city_name'];

                     // echo $row2[$key]['country']; exit;

                 }
                 $this->data['address'] = $row2[0];

            }


            $sql = "SELECT "
                . "plc.competitor_seq_no, plc.comp_att_rank_seq_no, plc.created_by, plc.competitor_ranking, plc.remarks_notes, plc.created_date, pcom.competitor_first_name, pcom.competitor_last_name, pcom.competitor_seq_no, pusr.user_first_name, pusr.user_last_name, pusr.role_code, pusr.user_seq_no "
                . "FROM plma_cmp_aty_rank plc "
                . "INNER JOIN plma_competitor pcom ON plc.competitor_seq_no = pcom.competitor_seq_no "
                . "INNER JOIN plma_user pusr ON plc.created_by = pusr.user_seq_no "
                . "WHERE plc.competitor_seq_no = '" . $code . "'";
        $query_1 = $this->db->query($sql);
//        echo $this->db->last_query(); exit;
        $row1 = $query_1->result_array();
        $this->data['all_competitor_rank_1'] = $row1;
//        t($this->data['all_competitor_rank_1'], 1);
        foreach($row1 as $key => $value){
            $com_rank_1 = $value['competitor_ranking'];
            $cond2 = "AND code = '" . $com_rank_1 . "' AND category_type='Competitor Rank'";
            $com_rank = $this->codes_model->fetch($cond2);
//           t($com_rank, 1);
            $row1[$key]['competitor_ranking'] = $com_rank[0]['short_description'];

            $role_code_1 = $value['role_code'];
            $cond1 = "AND code = '" . $role_code_1. "'";
            $role_code = $this->codes_model->fetch($cond1);
//            t($created_by, 1);
            $row1[$key]['role_code'] = $role_code[0]['short_description'];
        }
        $this->data['all_competitor_rank'] = $row1;
//        t($this->data['all_competitor_rank'], 1);
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/competitor/competitor_view', $this->data);


    }
    function send_module4($code='')
    {
       $code=base64_decode($code);
       //echo $code;die();
       $admin_id  =  $this->data['admin_id'];
       //echo $code;
       //echo $admin_id;die();
       $data_arry=$this->input->post();


      /* echo "<pre>";
       print_r($data_arry);
       echo "</pre>";*/
       $module_no=$data_arry['module_no'];
       unset($data_arry['module_no']);
       //echo $data_arry['keep_in_touch_1'][0];
       //die();
       $data_array=array();

        $data_array['target_seq_no']=$code;

        $data_array['admin_id']=$admin_id;
        $data_array['appt_seq_no']=$data_arry['appt_seq_no'];
        $data_array['firm_seq_no']=$data_arry['firm_seq_no'];
        //$data_arry['user_seq_no']=$data_arry[''];



         $data_array['target_first_name']=$data_arry['target_first_name'].''.$data_arry['target_last_name'];
         $data_array['email_target_id']=$data_arry['email_target_id'];
         $data_array['home_phone']=$data_arry['home_phone'];
         $data_array['mobile']=$data_arry['mobile'];
         $data_array['address1']=$data_arry['address1'];
         $data_array['appointment_user']=$data_arry['apptmnt_users'];
        $data_array['appointment_date']=$data_arry['appt_call_date'];
        $data_array['appointment_time']=$data_arry['appt_call_time'].'-'.$data_arry['appt_call_time1'];
        $data_array['appointment_venu']=$data_arry['venu'];
        $data_array['status']='';
        //$data_arry['appointment_user']=$data_arry[''];
        $data_array['company_name']=$data_arry['target_company_name'];
        $data_array['categories']=$data_arry['industry_type'];
        $data_array['date_contacted']=$data_arry['date_contacted'];
        $content=$data_arry['note'];
        $data_array['notes']=$data_arry['note'];
        //$data_arry['notes']=$data_arry[''];
        if(isset($data_arry['keep_in_touch_1'][0]))
        {
          $data_array['first_name_1']=$data_arry['keep_in_touch_1'][0];
          $data_array['last_name_1']=$data_arry['keep_in_touch_date_1'][0];
          $data_array['email_1']=$data_arry['email_1'][0];
          $data_array['phone_1']=$data_arry['phone_1'][0];
          $data_array['designation_1']=$data_arry['designation_1'][0];

        }
        if(isset($data_arry['keep_in_touch_1'][1]))
        {
            $data_array['first_name_2']=$data_arry['keep_in_touch_1'][1];
            $data_array['last_name_2']=$data_arry['keep_in_touch_date_1'][1];
            $data_array['email_2']=$data_arry['email_1'][1];
            $data_array['phone_2']=$data_arry['phone_1'][1];
            $data_array['designation_2']=$data_arry['designation_1'][1];

        }
        if(isset($data_arry['keep_in_touch_1'][2]))
        {
           $data_array['first_name_3']=$data_arry['keep_in_touch_1'][2];
           $data_array['last_name_3']=$data_arry['keep_in_touch_date_1'][2];
           $data_array['email_3']=$data_arry['email_1'][2];
           $data_array['phone_3']=$data_arry['phone_1'][2];
           $data_array['designation_3']=$data_arry['designation_1'][2];
        }
        if(isset($data_arry['keep_in_touch_1'][3]))
        {
          $data_array['first_name_4']=$data_arry['keep_in_touch_1'][3];
          $data_array['last_name_4']=$data_arry['keep_in_touch_date_1'][3];
          $data_array['email_4']=$data_arry['email_1'][3];
          $data_array['phone_4']=$data_arry['phone_1'][3];
          $data_array['designation_4']=$data_arry['designation_1'][3];

        }
        $data_array['status']=$data_arry['chk'];
        //$data_array['module']=$module_no;

        $adddate=date('Y-m-d');
        $modifydate=date('Y-m-d');
        unset($data_arry['submit']);

       /*echo "<pre>";
       print_r($data_array);
       echo "</pre>";
       die();*/
        if($data_arry['chk']=="Inactive")
        {

         // $note_data=array('appt_seq_no'=>$data_array['appt_seq_no'],'user_seq_no'=>$admin_id,'target_seq_no'=>$data_array['target_seq_no'],'admin_id'=>$admin_id,'content'=>$content,'status'=>'Active','added_date'=>$adddate,'modified_date'=>$modifydate,'module'=>$module_no);
           //$note_insert=$this->db->insert('plma_all_notes',$note_data);
           $note_update=array('status'=>'Active');
           $array = array('user_seq_no' => $admin_id, 'target_seq_no' =>$data_array['target_seq_no'],'module'=>$module_no);
           $this->db->where($array);
           $this->db->update('plma_all_notes',$note_update);

          //$res=$this->db->insert('plma_all_notes',$data_array);

         $data1=array('status'=>'Inactive');
         $this->db->where('target_seq_no',$code);
         $this->db->update('plma_appointment_details',$data1);

          $data_array['status']='Active';
          $res=$this->db->insert('plma_module4',$data_array);

          redirect($base_url . 'competitor/index/');

         // $this->db->where('username',$username,'status',$status);
      }




    function edit($code = '')
    {

        $code = base64_decode($code);
        $submit = $this->input->post('competitor_tab');

        $cond = " and competitor_seq_no = '".$code."'";
        $row = $this->competitor_model->fetch( $cond );
//        echo $this->db->last_query(); exit;
//        $this->data['competitor_info'] = $row[0];
//        t($this->data['competitor_info'], 1);
            $address_id = $row[0]['address_seq_no'];
            $sql = "SELECT `short_description`,`code` FROM `plma_codes` WHERE `category_type`='Industry Type' ";
         $query = $this->db->query($sql);
         $ind_type = $query->result();
         $this->data['ind_type'] = $ind_type;

         $sql_1 = "SELECT `short_description`,`code` FROM `plma_codes` WHERE `category_type`='Competitor Rank' ";
         $query_1 = $this->db->query($sql_1);
         $rank = $query_1->result_array();
         $this->data['rank'] = $rank;
//         t($this->data['rank']); exit;

        if (isset($submit)) {
//            echo"ok"; exit;
//            $admin_all_session = $this->session->userdata('admin_session');
          $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            //EDIT COMPETITOR

            $competitor_id = $this->input->post('competitor_id');
            if (isset($competitor_id))
             {
//                echo "ok"; die();
            $competitor_code = $this->input->post('competitor_code');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day= $this->input->post('day');
            $whole_date = array($day, $month, $year);
            $competitor_dob = implode("-", $whole_date);
            $industry_type = $this->input->post('industry_type');
            $experience = $this->input->post('experience');
            $bar_date = $this->input->post('bar_date');
            $bar_state = $this->input->post('bar_state');
            $independent = $this->input->post('independent');
            $chambers = $this->input->post('chambers');
            $best = $this->input->post('best');
            $martindale = $this->input->post('martindale');
            $super_lawyers = $this->input->post('super_lawyers');
            $remarks = $this->input->post('remarks');

                //Enter Address
                $email = $this->input->post('email');
                $phone = $this->input->post('phone');
                $phone = $this->removePhoneMask($phone);
                $mobile = $this->input->post('mobile');
                $mobile = $this->removePhoneMask($mobile);
                $fax = $this->input->post('fax');
                $fax = $this->removePhoneMask($fax);
                $web_url = $this->input->post('web_url');
                $social_url = $this->input->post('social_url');
                $address_line_1 = $this->input->post('addr_line_1');
                $address_line_2 = $this->input->post('addr_line_2');
                $address_line_3 = $this->input->post('addr_line_3');
                $country = $this->input->post('country');
                $state = $this->input->post('state');
                $county = $this->input->post('county');
                $city = $this->input->post('city');
                $postal_code = $this->input->post('postal_code');
                $remarks_1 = $this->input->post('remarks');


                 $data_1= array(
                'address_line1' => $address_line_1,
                'address_line2' => $address_line_2,
                'address_line3' => $address_line_3,
                'city' => $city,
                'state' => $state,
                'postal_code' =>$postal_code,
                'country' => $country,
                'county' => $county,
                'email' => $email,
                'phone' => $phone,
                'fax' => $fax,
                'mobile_cell' => $mobile,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
                'updated_by' => $admin_id,
                'updated_date' => time(),
                'remarks_notes' => $remarks_1
            );
//                 echo "<pre>";  print_r($data_1); exit;

              $insertid_1 = $this->address_model->edit($data_1, $address_id);
             //echo "<pre>"; print_r($insertid_1); die();

                //insert into user table
                $data_arr_2 = array(
                'competitor_id' => $competitor_id,
                'competitor_code' => $competitor_code,
                'competitor_first_name' => $first_name,
                'competitor_last_name' => $last_name,
                'competitor_dob' => $competitor_dob,
                'industry_type' => $industry_type,
                'address_seq_no' => $address_id,
                'bar_date' => $bar_date,
                'state' => $bar_state,
                'experience' => $experience,
                'independent_ranking' => $independent,
                'chambers_ranking' => $chambers,
                'best' => $best,
                'martindale' => $martindale,
                'super_lawyers' => $super_lawyers,
                'remarks_notes' => $remarks,
                'updated_by' => $admin_id,
                'updated_date' => time()

            );
//                echo "<pre>"; print_r($data_arr_2); die();

                $insertid_2 = $this->competitor_model->edit($data_arr_2, $code);
//
                if($insertid_2) {
//                    echo"ok"; die();
                    $msg = 'Competitor updated successfully';
                    $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'competitor/edit/' . base64_encode($code));
                }else{
                    $msg = 'error in updating Competitor';
                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'competitor/edit/' . base64_encode($code));
                }

                redirect($base_url . 'competitor/edit/' . base64_encode($code));

            }
        }
        else{
            if(count($row) > 0) {
//                echo "ok"; die();

                $this->data['competitor_info'] = $row[0];
//                t($row[0], 1);
                $competitor_dob_1 = $row[0]['competitor_dob'];
                $competitor_dob = explode("-", $competitor_dob_1 );
                $day = $competitor_dob[0];
                $month = $competitor_dob[1];
                $year = $competitor_dob[2];
                $this->data['day'] = $day;
                $this->data['month'] = $month;
                $this->data['year'] = $year;

                $cond2 = " and address_seq_no = '".$row[0]['address_seq_no']."'";
                $row2 = $this->address_model->fetch( $cond2 );
                $this->data['address_info'] = $row2[0]; //t($row2[0]); die();

                $this->data['country_info'] = $this->fetch_country($row2[0]['country']);
                $this->data['state_info'] = $this->fetch_state($row2[0]['country'], $row2[0]['state']);
                $this->data['county_info'] = $this->fetch_county($row2[0]['country'], $row2[0]['state'], $row2[0]['county']);
                $this->data['city_info'] = $this->fetch_city($row2[0]['country'], $row2[0]['state'],$row2[0]['city']);
            }

            $this->data['countries'] = $this->country_model->fetch();


            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/competitor/edit', $this->data);
        }

    }
  }

 function send_module5($code='')
    {


      $code=base64_decode($code);
      //echo $code;die();
      $admin_id  =  $this->data['admin_id'];
      $data_arry=$this->input->post();
      $data_arry['admin_id']=$admin_id;
      unset($data_arry['submit']);
      unset($data_arry['country_code1']);
      unset($data_arry['industry_type']);

      $data_arry['name']=$data_arry['target_first_name'].''.$data_arry['target_last_name'];
      $data_arry['added_date']=$data_arry['date_contacted'];
      unset($data_arry['target_last_name']);
      unset($data_arry['target_first_name']);
      unset($data_arry['date_contacted']);
      $target_seq_no=$data_arry['target_seq_no'];
      $data_arry['email']=$data_arry['email_target_id'];
      unset($data_arry['email_target_id']);
      $data_arry['phone']=$data_arry['home_phone'];
      unset($data_arry['home_phone']);
      $data_arry['company_name']=$data_arry['target_company_name'];
      unset($data_arry['target_company_name']);
      $data_arry['status']='Active';
       /*echo "<pre>";
       print_r($data_arry);
       echo "</pre>";
       die();*/

         $data_upt=array('status'=>'Inactive');
         $this->db->where('target_seq_no',$target_seq_no);
         $this->db->update('plma_module4',$data_upt);


       $user_add = $this->Contract_Model->add($data_arry);
       redirect($base_url . 'competitor/contract_view/');


    }

    function contract_list() {
      $admin_all_session = $this->session->userdata('admin_session_data');
      $this->db->select('plma_module4.*,plma_target.type')->from('plma_module4')
      ->join('plma_target', 'plma_module4.target_seq_no = plma_target.target_seq_no', 'INNER')
      ->where('plma_module4.admin_id = "'.$admin_all_session['admin_id'].'" AND plma_module4.firm_seq_no="'.$admin_all_session['firm_seq_no'].'" AND contract_signed= "NO"' . "order by target_seq_no");

      $query = $this->db->get();
      //echo $this->db->last_query();die;
      $res = $query->result_array();

      $this->data['contract_list'] = $res;
      //t($this->data['contract_list']);die;
           
      $this->get_include();
      
      
      
      $this->load->view($this->view_dir . 'operation_master/competitor/listing_module4', $this->data);
    }

     function add_rank($code = '')
    {
//                echo"ok"; exit;
        $code = base64_decode($code);
//        $submit = $this->input->post('competitor_tab');
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        ///////////Fetch Attorney///////////////
//        $sql = "SELECT `attorney_seq_no` From `plma_attorney` WHERE `user_seq_no` = '" . $admin_id . "'";
//        $res = $this->db->query($sql);
//        $row_a = $res->result_array();
//        $attorney_seq_no = $row_a[0]['attorney_seq_no'];

        //////////Fetch Competitor////////////////
        $cond = " and competitor_seq_no = '".$code."'";
        $row = $this->competitor_model->fetch( $cond );
        $competitor_seq_no = $row[0]['competitor_seq_no'];
//        echo $this->db->last_query(); exit;

        $submit = $this->input->post('general_save_change_attr');
        if (isset($submit)) {
//            echo"ok"; exit;

            $competitor = $this->input->post('competitor_ranking');
            $remarks = $this->input->post('remarks_notes');

            $add_data = array(
                'competitor_seq_no' => $competitor_seq_no,
                'user_seq_no' => $admin_id,
                'competitor_ranking' => $competitor,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date' => time(),
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
//            t($add_data);
          $insertid_2 = $this->comp_aty_rank_model->add($add_data);
//           echo $this->db->last_query(); exit;
        }
         if ($insertid_2) {
            $msg = 'Competitor ranked successfully';
            $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'competitor/details/' . base64_encode($code));
        } else {
            $msg = 'Error in ranking competitor';
            $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'competitor/details/' . base64_encode($code));
        }

        $this->data['competitor_info_1'] = $row;

        foreach($row as $key => $value){
            $ind_type_1 = $value['industry_type'];
            $cond2 = "AND code = '" . $ind_type_1 . "' and category_type='Industry Type'";
            $ind_type = $this->codes_model->fetch($cond2);

            $row[$key]['industry_type'] = $ind_type[0]['short_description'];

        }
        $this->data['competitor_info'] = $row[0];

//        t($this->data['competitor_info'], 1);
//        $address_id = $row[0]['address_seq_no'];
         $sql = "SELECT `short_description`,`code` FROM `plma_codes` WHERE `category_type`='Industry Type' ";
         $query = $this->db->query($sql);
         $ind_type = $query->result();
         $this->data['ind_type'] = $ind_type;

         $sql_1 = "SELECT `short_description`,`code` FROM `plma_codes` WHERE `category_type`='Competitor Rank' ";
         $query_1 = $this->db->query($sql_1);
         $rank = $query_1->result_array();
         $this->data['rank'] = $rank;
//         t($this->data['rank']); exit;

        if(count($row) > 0) {
//                echo "ok"; die();

                $cond2 = " and address_seq_no = '".$row[0]['address_seq_no']."'";
                $row2 = $this->address_model->fetch( $cond2 );
                $this->data['address_info'] = $row2[0];

                 foreach ($row2 as $key => $value) {

                    $country_1= $value['country'];
                    $cond1 = "AND country_seq_no = '$country_1'";
                    $country = $this->country_model->fetch($cond1);

                    $state_1 = $value['state'];
                    $cond4 = "AND state_seq_no = '$state_1'";
                    $state = $this->states_model->fetch($cond4);

                    $city_1 = $value['city'];
                    $cond5 = "AND city_seq_no = '$city_1'";
                    $city = $this->city_model->fetch($cond5);

                    $county_1 = $value['county'];
                    $cond6 = "AND county_seq_no = '$county_1'";
                    $county = $this->county_model->fetch($cond6);

                    $row2[$key]['country'] = $country[0]['name'];
                    $row2[$key]['state'] = $state[0]['state_name'];
                    $row2[$key]['county'] = $county[0]['county_name'];
                    $row2[$key]['city'] = $city[0]['city_name'];

                     // echo $row2[$key]['country']; exit;
                 }
                 $this->data['address'] = $row2[0];
        }
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/competitor/competitor_view_attr', $this->data);
    }
    function view_rank(){
//        echo 123; exit;

        $sql = "SELECT "
                . "plc.competitor_seq_no, plc.comp_att_rank_seq_no, plc.created_by, plc.competitor_ranking, plc.remarks_notes, plc.created_date, pcom.competitor_first_name, pcom.competitor_last_name, pcom.competitor_seq_no, pusr.user_first_name, pusr.user_last_name, pusr.role_code, pusr.user_seq_no "
                . "FROM plma_cmp_aty_rank plc "
                . "INNER JOIN plma_competitor pcom ON plc.competitor_seq_no = pcom.competitor_seq_no "
                . "INNER JOIN plma_user pusr ON plc.created_by = pusr.user_seq_no ";
        $query = $this->db->query($sql);
//        echo $this->db->last_query(); exit;
        $row = $query->result_array();
        $this->data['all_competitor_rank_1'] = $row;
//        t($this->data['all_competitor_rank'], 1);
        foreach($row as $key => $value){
            $com_rank_1 = $value['competitor_ranking'];
            $cond2 = "AND code = '" . $com_rank_1 . "' AND category_type='Competitor Rank'";
            $com_rank = $this->codes_model->fetch($cond2);
//           t($com_rank, 1);
            $row[$key]['competitor_ranking'] = $com_rank[0]['short_description'];

            $role_code_1 = $value['role_code'];
            $cond1 = "AND code = '" . $role_code_1. "'";
            $role_code = $this->codes_model->fetch($cond1);
//            t($created_by, 1);
            $row[$key]['role_code'] = $role_code[0]['short_description'];
        }
        $this->data['all_competitor_rank'] = $row;
//        t($this->data['all_competitor_rank'], 1);
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/competitor/competitor_view_attr', $this->data);
    }
    function add()
    {


         $sql = "SELECT `short_description`,`code` FROM `plma_codes` WHERE `category_type`='Industry Type' ";
         $query = $this->db->query($sql);
         $ind_type = $query->result();
         $this->data['ind_type'] = $ind_type;
         // t($this->data['ind_type']); exit;
         //fetching of ranking codes
          $sql_1 = "SELECT `short_description`,`code` FROM `plma_codes` WHERE `category_type`='Competitor Rank' ";
         $query_1 = $this->db->query($sql_1);
         $rank = $query_1->result_array();
         $this->data['rank'] = $rank;
//         t($this->data['rank']); exit;
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        //ADD COMPETITOR

        $competitor_id = $this->input->post('competitor_id');
        if(isset($competitor_id))
        {
            $competitor_code = $this->input->post('competitor_code');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day= $this->input->post('day');
            $whole_date = array($day, $month, $year);
            $competitor_dob = implode("-", $whole_date);
            $industry_type = $this->input->post('industry_type');
            $experience = $this->input->post('experience');
            $bar_date = $this->input->post('bar_date');
            $bar_state = $this->input->post('bar_state');
            $independent = $this->input->post('independent');
            $chambers = $this->input->post('chambers');
            $best = $this->input->post('best');
            $martindale = $this->input->post('martindale');
            $super_lawyers = $this->input->post('super_lawyers');

            //// Enter Address
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $phone = $this->removePhoneMask($phone);
            $mobile = $this->input->post('mobile');
            $mobile = $this->removePhoneMask($mobile);
            $fax = $this->input->post('fax');
            $fax = $this->removePhoneMask($fax);
            $web_url = $this->input->post('web_url');
            $social_url = $this->input->post('social_url');
            $addr_line_1 = $this->input->post('addr_line_1');
            $addr_line_2 = $this->input->post('addr_line_2');
            $addr_line_3 = $this->input->post('addr_line_3');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
            $county = $this->input->post('county');
            $city = $this->input->post('city');
            $postal_code = $this->input->post('postal_code');

            $data_addr = array(
               'address_line1' => $addr_line_1,
               'address_line2' => $addr_line_2,
               'address_line3' => $addr_line_3,
               'city' => $city,
               'state' => $state,
               'postal_code' =>$postal_code,
               'country' => $country,
               'county' => $county,
               'email' => $email,
               'phone' => $phone,
               'fax' => $fax,
               'mobile_cell' => $mobile,
               'website_url' => $web_url,
               'social_media_url' => $social_url,
               'created_by' => $admin_id,
               'created_date' => time(),
               'updated_by' => $admin_id,
               'updated_date' => time()
           );
//            t($data_addr); exit;

            $insertid = $this->address_model->add($data_addr);

            $remarks = $this->input->post('remarks');

            $data_add = array(
                'competitor_id' => $competitor_id,
                'competitor_code' => $competitor_code,
                'competitor_first_name' => $first_name,
                'competitor_last_name' => $last_name,
                'competitor_dob' => $competitor_dob,
                'industry_type' => $industry_type,
                'address_seq_no' => $insertid,
                'bar_date' => $bar_date,
                'state' => $bar_state,
                'experience' => $experience,
                'independent_ranking' => $independent,
                'chambers_ranking' => $chambers,
                'best' => $best,
                'martindale' => $martindale,
                'super_lawyers' => $super_lawyers,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date' => time(),
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
//           t($data_add); exit;
           $add_data = $this->competitor_model->add($data_add);
//            echo $this->db->last_query(); exit;

           if ($add_data) {
                 $msg = 'Competitor added successfully';
                 $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                 redirect($base_url . 'competitor');
             }else{
                 $msg = 'Error in adding Employee';
                 $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                 redirect($base_url . 'competitor/add');
             }
       }


        $this->get_include();
        $this->load->view($this->view_dir .'operation_master/competitor/add', $this->data);
    }

    //    function edit()
//    {
//        $this->get_include();
//        $this->load->view($this->view_dir . 'operation_master/competitor/edit', $this->data);
//    }
    function fetch_country($selected = '') {

        $cond="order by country_id='US' desc";
        $return = $this->country_model->fetch($cond);
        $array1 = array();
        $opt = ''; //<option value="">Country</option>
        foreach ($return as $key => $value) {
            if ($value['country_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['country_seq_no'] . '" selected="selected">' . $value['name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['country_seq_no'] . '" >' . $value['name'] . '</option>';
            }
        }
        return $opt;
    }

    function fetch_state($country_id = '', $selected = '') {
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }

        $cond = " and country_seq_no = '" . $country_id . "'";
        $return = $this->states_model->fetch($cond);
        $array1 = array();
        $opt = ''; //<option value="">State</option>
        foreach ($return as $key => $value) {
            if ($value['state_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['state_seq_no'] . '" selected="selected">' . $value['state_name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['state_seq_no'] . '" >' . $value['state_name'] . '</option>';
            }
        }
        return $opt;
    }

    function fetch_county($country_id = '', $state_id = '', $selected = '') {
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }
        if ($state_id == '') {
            $state_id = $this->input->post('state_id');
        }
        $cond = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "'";
        $return = $this->county_model->fetch($cond);
        $opt = ''; //<option value="">County</option>
        foreach ($return as $key => $value) {
            if ($value['county_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['county_seq_no'] . '" selected="selected">' . $value['county_name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['county_seq_no'] . '" >' . $value['county_name'] . '</option>';
            }
        }
      $cond2 = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "' "; //and county_seq_no = '".$value['county_seq_no']."'
            $return2 = $this->city_model->fetch($cond2);
            foreach ($return2 as $key => $value) {
            if ($value['city_seq_no'] == $selected) {
                $opt2 .= '<option value="'.$value['city_seq_no'].'" selected="selected">'.$value['city_name'].'</option>';
            }else{
                $opt .= '<option value="'.$value['city_seq_no'].'" >'.$value['city_name'].'</option>';
            }
        }

            $a = array(
            'county' => $opt,
            'city' => $opt2
        );
            //t($a); exit;
        return $a;
    }

    function fetch_city($country_id = '', $state_id = '', $selected = '') {
       if($country_id == '') { $country_id = $this->input->post('country_id'); }
        if($state_id == '') { $state_id = $this->input->post('state_id'); }
        //if($county_seq_no == '') { $county_seq_no = $this->input->post('county_seq_no'); }
       // if($city_seq_no == '') { $city_seq_no = $this->input->post('city_seq_no'); }
        $cond = " and country_seq_no = '".$country_id."' and state_seq_no = '".$state_id."'";
        $return =  $this->city_model->fetch($cond); $opt = ''; //<option value="">City/Town</option>
        foreach ($return as $key => $value) {
            if ($value['city_seq_no'] == $selected) {
                $opt .= '<option value="'.$value['city_seq_no'].'" selected="selected">'.$value['city_name'].'</option>';
            }else{
                $opt .= '<option value="'.$value['city_seq_no'].'" >'.$value['city_name'].'</option>';
            }
        }
//        t($opt); exit;
        return $opt;

    }

    function add_allnotes($code='')
    {

        $code = base64_decode($code);

        $admin_id = $this->data['admin_id'];

        $role_code = $this->data['role_code'];
        $data=$this->input->post("note");
        $module_no=$this->input->post("module_no");
        $target_seq_no=$this->input->post("target_seq_no");
        $status = $this->input->post("status");
//        $date=date('Y-m-d');
        $date = time();
        $getdata=array('user_seq_no'=>$admin_id,'admin_id'=>$admin_id,'target_seq_no'=>$target_seq_no,'content'=>$data,'status'=>$status,'added_date'=>$date,'module'=>$module_no);
        $res=$this->db->insert('plma_all_notes',$getdata);
        // redirect($base_url . 'competitor/view/');


    }
    function edit_appt_date()
    {
       $admin_id = $this->data['admin_id'];
       $edit_appointment_date=$this->input->post("edit_appointment_date");
       $edit_appointment_time=$this->input->post("edit_appointment_time");
       $edit_appointment_date_notes=$this->input->post("edit_appointment_date_notes");
       $target_seq_no=$this->input->post("target_seq_no");
       $user_company_id=$this->input->post("user_company_id");
       $appointment_venu=$this->input->post("appointment_venu");
       $appointment_user=$this->input->post("appointment_user");

       $note_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$edit_appointment_date_notes,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module3');
       $note_data=$this->Allnote_Model->add($note_arry);

       $data=array('appointment_date'=>$edit_appointment_date,'appt_seq_no'=>$appointment_user,'appointment_time'=>$edit_appointment_time,'appointment_venu' => $appointment_venu,'added_date'=>time(),'modified_date'=>time());
       $this->db->where('target_seq_no',$target_seq_no);
       $res=$this->db->update('plma_appointment_details',$data);
       if($res && $note_data)
       {
         echo "1";
       }



    }



    function product_purchase(){
        $company_session = $this->session->userdata('admin_session_data');
        
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $company_id = $company_session['firm_seq_no'];

        if($role_code == 'ATTR'){
            $cond = "AND user_seq_no=$admin_id";
            $fetch_company_id_from_user_table = $this->user_model->fetch($cond);
//            $company_id = $fetch_company_id_from_user_table[0]['firm_seq_no'];

            $cond1 = " AND firm_seq_no=$company_id AND status='Active' AND admin_id=$admin_id AND e_signature='Yes' order by target_seq_no";
            $fetch_details_from_module5 = $this->Model5->fetch($cond1);
            $this->data['fetch_details_from_module5'] = $fetch_details_from_module5;
        }

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/competitor/listing_module5', $this->data);
    }

    function detials_module5($target_seq_no = '' , $company_id = ''){
        $target_seq_no = base64_decode($target_seq_no);
        $company_id = base64_decode($company_id);

        $cond1 = " AND target_seq_no='$target_seq_no'";
        $select = "target_image, lead_source_and_date";
        $details_from_target_table = $this->Targets_model->fetch($cond1,$select);
        $contact_image = $details_from_target_table[0]['target_image'];
        $this->data['lead_source'] = $details_from_target_table[0]['lead_source_and_date'];
        $this->data['contact_image'] = $contact_image;

        $admin_id = $this->data['admin_id'];
//        $firm_seq_no = $this->data['firm_seq_no'];
        $company_session = $this->session->userdata('admin_session_data');
        $firm_seq_no = $company_session['firm_seq_no'];
         
          $this->data['target_seq_nos']=$target_seq_no;
          $this->data['company_ids']=$firm_seq_no;

        $cond = " AND admin_id='$admin_id' AND target_seq_no='$target_seq_no' AND firm_seq_no='$company_id' AND status='Active'";
        $fetch_details = $this->Model5->fetch($cond);
        $contact_id = $fetch_details[0]['id'];
        $this->data['fetch_details'] = $fetch_details;

        $fetch_cond = " AND module_name='module5' AND firm_seq_no='".$firm_seq_no."' AND status=1";
        $module_details = $this->sms_add_model->fetch($fetch_cond);
        $this->data['module_details']= $module_details;

        $contact_phone = explode("-", $fetch_details[0]['phone']);
        $this->data['country_code'] = $contact_phone[0];
        $this->data['home_phone_number'] = $contact_phone[1];

        $cond123 = " AND firm_seq_no='$company_id' AND target_seq_no='$target_seq_no'";
        $fetch_add_contact_details = $this->add_contact_model->fetch($cond123);
        $this->data['fetch_add_contact_details'] = $fetch_add_contact_details[0];

        $primary_contact_phone = explode("-",$fetch_add_contact_details[0]['phone']);
        $this->data['country_code2'] = $primary_contact_phone[0];
        $this->data['primary_contact_phone_number'] = $primary_contact_phone[1];

        $condnote = " AND  target_seq_no ='".$target_seq_no."' and admin_id='".$admin_id."' and status!='Inactive' order by id DESC";
        $note=$this->Allnote_Model->fetch($condnote);
//             echo $this->db->last_query();
//             t($note);die();
        $this->data['viewallnotes']=$note;

        $cond3 = " AND user_seq_no=$admin_id;";
        $call_user_admin = $this->user_model->fetch($cond3);
        $call_user_admin_name = $call_user_admin[0]['user_first_name'].' '.$call_user_admin[0]['user_last_name'];
        $this->data['call_user_admin_name'] = $call_user_admin_name;

        //for previous & next
        $iddd= "Select id from `plma_module5` WHERE id='$contact_id' and firm_seq_no='$firm_seq_no' and status='Active' order by id";
        $quu= $this->db->query($iddd);
        $arrr= $quu->result_array();

        $prev_id=$arrr[0]['id']-1;
        $iddd_prev = "select max(target_seq_no) as target_seq_no from plma_module5 where target_seq_no < $target_seq_no AND firm_seq_no=$firm_seq_no and status='Active'";
        $quu_prev= $this->db->query($iddd_prev);
        $arrr_prev= $quu_prev->result_array();

        $next_id=$arrr[0]['id']+1;
        $iddd_next= "select min(target_seq_no) as target_seq_no from plma_module5 where target_seq_no > $target_seq_no AND firm_seq_no=$firm_seq_no and status='Active'";
        $quu_next= $this->db->query($iddd_next);
        $arrr_next= $quu_next->result_array();

        $this->data['next_target_seq_no'] = $arrr_next[0]['target_seq_no'];
        $this->data['prev_target_seq_no'] = $arrr_prev[0]['target_seq_no'];
        //end
        
        $cond_module = "AND module_name = 'module5'";
        $fetch_module_details = $this->module_setting_model->fetch($cond_module);
        $this->data['fetch_module_details'] =  $fetch_module_details;
        
        
        $cond = " AND form_model='module5' AND form_id=$admin_id AND to_id=$target_seq_no";
        $fetch_sms_details = $this->send_sms_model->fetch($cond);
        $this->data['sms_content'] = $fetch_sms_details;

        $this->get_include();
        
         $row = $this->Change_module_number_module->fetch();
        $this->data['notes'] = $row;
        
        
        $this->load->view($this->view_dir . 'operation_master/competitor/details_module5', $this->data);
    }

    function do_not_call_again(){
        $admin_id = $this->data['admin_id'];

        $user_company_id = $this->input->post('user_company_id');
        $target_seq_no = $this->input->post('target_seq_no');
        $do_not_call_note = $this->input->post('note');

        if(!empty($target_seq_no)){
            $cond = " AND admin_id=$admin_id AND target_seq_no=$target_seq_no and firm_seq_no=$user_company_id";
            $fetch_module_two_user = $this->Model5->fetch($cond);
            $id = $fetch_module_two_user[0]['id'];

            $data_field = array(
                'status' => 'Inactive'
            );
            $edit = $this->Model5->edit($data_field,$id);

            $cond1 = " AND target_seq_no=$target_seq_no AND company_id=$user_company_id";
            $fetch_user_status_from_target_table = $this->Targets_model->fetch($cond1);
            $data = array(
                'status' => 3
            );
            $edit1 = $this->Targets_model->edit($data,$fetch_user_status_from_target_table[0]['target_seq_no']);

            if(count($edit) > 0){
                $data_field = array(
                    'user_seq_no'=>$admin_id,
                    'admin_id'=> $admin_id,
                    'target_seq_no'=> $target_seq_no,
                    'content'=> $do_not_call_note,
                    'status'=> 'Inactive',
                    'added_date'=>time()
                );
                $add_do_not_call_notes = $this->db->insert('plma_all_notes',$data_field);
                if(count($add_do_not_call_notes) > 0){
                    echo 1;
                    exit;
                }
            }
        }
    }

    function module5_add_contact(){
        $admin_id = $this->data['admin_id'];

        $fisrt_name = $this->input->post('fisrt_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');

        $country_code1 = $this->input->post('country_code1');
        $phone = $this->input->post('phone');
        $total_phone_no = $country_code1 .'-'. $phone;

        $designation = $this->input->post('designation');

        $primary_contact = $this->input->post('primary_contact');

        $target_seq_no = $this->input->post('target_seq_no');
        $user_company_id = $this->input->post('user_company_id');

        if(!empty($target_seq_no)){
            $cond = " AND target_seq_no=$target_seq_no AND firm_seq_no=$user_company_id";
            $fetch_details = $this->add_contact_model->fetch($cond);

            if(count($fetch_details) > 0){
                $contact_id = $fetch_details[0]['contact_seq_no'];

                $data_field = array(
                    'first_name' => $fisrt_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'phone' => $total_phone_no,
                    'designation' => $designation,
                    'is_primary_contact' => $primary_contact,
                    'firm_seq_no' => $user_company_id,
                    'target_seq_no' => $target_seq_no,
                    'created_by' => $admin_id,
                    'updated_date' => time(),
                    'created_date' => time()
                );

                $edit = $this->add_contact_model->edit($data_field,$contact_id);
            }else{
                $data_field = array(
                    'first_name' => $fisrt_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'phone' => $total_phone_no,
                    'designation' => $designation,
                    'is_primary_contact' => $primary_contact,
                    'firm_seq_no' => $user_company_id,
                    'target_seq_no' => $target_seq_no,
                    'created_by' => $admin_id,
                    'updated_date' => time(),
                    'created_date' => time()
                );
                $edit = $this->add_contact_model->add($data_field);
            }
            if(count($edit) > 0){
                echo 1;
                exit;
            }
        }
    }

    function client_product_purchase(){
        //echo "shgshgshg";die;
        $admin_id = $this->data['admin_id'];

        $product_purchased_date = $this->input->post('product_purchased_date');
        $product_purchase = $this->input->post('product_purchase');
        $product_purchased_notes = $this->input->post('product_purchased_notes');
        $target_seq_no = $this->input->post('target_seq_no');
        $user_company_id = $this->input->post('user_company_id');
        //echo $target_seq_no;die;
        if(!empty($target_seq_no)){
           // echo "jshdjshdjh";die;
            $cond = " AND target_seq_no=$target_seq_no AND firm_seq_no=$user_company_id AND status='Active'";
            $fetch_user_details = $this->Model5->fetch($cond);
            $fetch_user_id = $fetch_user_details[0]['id'];

            $data = array(
                'admin_id' => $admin_id,
                'target_seq_no' => $target_seq_no,
                'firm_seq_no' => $user_company_id,
                'name' => $fetch_user_details[0]['name'],
                'address' => $fetch_user_details[0]['address1'],
                'email' => $fetch_user_details[0]['email'],
                'phone' => $fetch_user_details[0]['phone'],
                'mobile' => $fetch_user_details[0]['mobile'],
                'company_name' => $fetch_user_details[0]['company_name'],
                'categories' => $fetch_user_details[0]['categories'],
                'client_product_purchased' => $product_purchase,
                'type' => $fetch_user_details[0]['type'],
                'purchased_date' => $product_purchased_date,
                'status' => 'Active',
                'added_date' => time(),
                'modified_date' => time()

            );
           // t($data);die();
            $add = $this->Module6_Model->add($data);

            if(!empty($product_purchased_notes)){
                $data_field = array(
                    'user_seq_no'=>$admin_id,
                    'admin_id'=> $admin_id,
                    'target_seq_no'=> $target_seq_no,
                    'content'=> $product_purchased_notes,
                    'status'=> 'Active',
                    'added_date'=>time()
                );
                $add_appiontment_notes = $this->db->insert('plma_all_notes',$data_field);
                
            }

            $data12 = array(
                'status' => 'Inactive'
            );
            $edit = $this->Model5->edit($data12,$fetch_user_id);

            if($edit){
                echo 'success';
            }
        }
    }


    function presentation_done()
    {
        $admin_id=$this->data['admin_id'];
        $presentation_notes=$this->input->post("presentation_notes");
        $target_seq_no=$this->input->post("target_seq_no");
        $user_company_id=$this->input->post("user_company_id");
        //echo $target_seq_no;die;

       $cond=" AND target_seq_no='".$target_seq_no."' ";
       $getdata=$this->Appointment_Model->fetch($cond);

       $this->db->select('*')->from('plma_appointment_details')->where('target_seq_no="'.$target_seq_no.'"');
       $getdata = $this->db->get()->result_array();
       //echo $this->db->last_query();die;
       //  t($getdata);die();
       $array_data=array();

       $array_data['target_seq_no']=$getdata[0]['target_seq_no'];
       $array_data['admin_id']=$admin_id;
       $array_data['appt_seq_no']=$getdata[0]['appt_seq_no'];
       $array_data['firm_seq_no']=$getdata[0]['firm_seq_no'];
       $array_data['target_first_name']=$getdata[0]['first_name'];
       $array_data['target_last_name']=$getdata[0]['last_name'];
       $array_data['email_target_id']=$getdata[0]['email'];
       $array_data['home_phone']=$getdata[0]['phione'];
       //$array_data['phone']=$getdata[0]['phione'];
       $array_data['mobile']=$getdata[0]['mobile'];
       $array_data['address1']=$getdata[0]['address'];
       $array_data['appointment_date']=$getdata[0]['appointment_date'];
       $array_data['appointment_time']=$getdata[0]['appointment_time'];
       $array_data['appointment_venu']=$getdata[0]['appointment_venu'];
       //$array_data['contract_status']=$getdata[0]['email'];
       $array_data['appointment_user']=$getdata[0]['user_seq_no'];
       $array_data['company_name']=$getdata[0]['company_name'];
       $array_data['categories']=$getdata[0]['categories'];
//       $array_data['date_contacted']=$getdata[0]['date_contacted'];

       $array_data['created_date']=time();
       //t($array_data);die;

       $addmodule4=$this->db->insert('plma_module4',$array_data);
       //echo $this->db->last_query();die;
       $module_no="module3";
       $note_prest_add=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$presentation_notes,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>$module_no);
       $note_add=$this->Allnote_Model->add($note_prest_add);

       $edit_data_val=array('presentation_done'=>1);
       $this->db->where('target_seq_no',$target_seq_no);
       $updatemodule3=$this->db->update('plma_appointment_details',$edit_data_val);
       //echo $this->db->last_query();die;

     //--------------------mail send----------------------------------------
            //$user_email= $user_email;




           // $this->load->library('email');
            /*$email = $this->input->post('email');
            $subject = $this->input->post('sub');
            $message = $this->input->post('msg');*/

           // $email="atanuray123@gmail.com";
            //$subject="test mail";
            //$message="hello how are u";

            //$msg="<html><body>".$message."</body></html>";

            //$from ="atanu@wrctechnologies.com";
            //$headers = "MIME-Version: 1.0" . "\r\n";
            //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            //$headers .= "X-Priority: 1\r\n";
            //$headers .= "X-Mailer: smail-PHP ".phpversion()."\r\n";
            //$headers .= "From: Digital1 CRM <". $from . ">" . "\r\n";

            //if (mail($email,$subject,$msg,$headers)) {
//                $this->session->set_flashdata('sess_message', 'Mail Sent Successfully.');
                //echo 1;
                //redirect($base_url . 'master_name/edit/' . base64_encode($id));
            //} else {
                //$this->session->set_flashdata('sess_message', 'Mail Not Sent.');
                //echo 1;
                //redirect($base_url . 'master_name/edit/' . base64_encode($id));
            //}


     //---------------------------------------------------------------------

       if($addmodule4 && $updatemodule3 && $note_add)
       {
         echo "1";
       }
   }

   function module3_add_contact()
   {
    $admin_id=$this->data['admin_id'];
    $contact_first_name=$this->input->post("contact_first_name");
    $contact_last_name=$this->input->post("contact_last_name");
    $contact_email=$this->input->post("contact_email");
    
    $contact_phone=$this->input->post("contact_phone");
    $country_code=$this->input->post("country_code");
    $phone_number = $country_code .'-'. $contact_phone;
    
    $contact_designation=$this->input->post("contact_designation");
    $primary_contact=$this->input->post("contact_primary");

    $target_seq_no=$this->input->post("target_seq_no");
    $firm_seq_no=$this->input->post("user_company_id");

    $arry_tgt_cont_add=array('firm_seq_no'=>$firm_seq_no,'target_seq_no'=>$target_seq_no,'first_name'=>$contact_first_name,'last_name'=>$contact_last_name,'email'=>$contact_email,'phone'=>$phone_number,'designation'=>$contact_designation,'is_primary_contact'=>$primary_contact,'created_date'=>time());

    $cond=" AND target_seq_no='".$target_seq_no."' ";
    $edt_data=$this->Target_contact_model->fetch($cond);
    if(empty($edt_data))
    {
        $edt_data=$this->Target_contact_model->add($arry_tgt_cont_add);
    }
    else
    {
         $arry_tgt_cont_edt=array('first_name'=>$contact_first_name,'last_name'=>$contact_last_name,'email'=>$contact_email,'phone'=>$contact_phone,'designation'=>$contact_designation,'is_primary_contact'=>$primary_contact,'created_date'=>time());

         $id=$edt_data[0]['contact_seq_no'];
         $edt_data=$this->Target_contact_model->edit($arry_tgt_cont_edt,$id);

    }
    if($edt_data)
    {
        echo "1";
    }


   }
   function do_not_call_again_mod3()
   {
       $admin_id=$this->data['admin_id'];
       $note=$this->input->post("note");
       $target_seq_no=$this->input->post("target_seq_no");
       $user_company_id=$this->input->post("user_company_id");

       $module_no=$this->input->post("module_no");
       $id=$this->input->post("uid");

        // echo $note.'#'.$admin_id.'#'.$target_seq_no.'#'.$user_company_id.'#'.$module_no.'#'.$id;
         $this->db->where('target_seq_no', $target_seq_no);
         $dt_data=$this->db->delete('plma_appointment_details');

       //$dt_data=$this->Appointment_Model->delete($id);

       $edt_ary=array('status'=>'3');
       $edt_data=$this->Targets_model->edit($edt_ary,$target_seq_no);


       $note_dt_add=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$note,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>$module_no);
       $note_dt=$this->Allnote_Model->add($note_dt_add);

       if($edt_data && $note_dt)
       {
        echo "1";
       }


   }



   //-----------------------edit details for module3-----------------------//
   function edit_details()
    {
       $first_name=$this->input->post("first_name");
       $last_name=$this->input->post("last_name");
       $email=$this->input->post("email");
       $country_code1=trim($this->input->post("country_code1"));
       $mobile=$this->input->post("mobile");
       $address1=$this->input->post("address1");
       $seq_no=$this->input->post("seq_no");
       $target_company_name=$this->input->post("target_company_name");
       $industry_type=$this->input->post("industry_type");
       $phione = trim($this->input->post("phione"));
       $target_seq_no = $this->input->post("target_seq_no");

       //update table module3 data
       $data=array('first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'phione'=>$country_code1.'-'.$phione , 'mobile' => $mobile,'address'=>$address1,'company_name'=>$target_company_name, 'categories'=>$industry_type);
       $res=$this->appointment_details_module->edit($data,$seq_no);
       //echo $this->db->last_query();die;

       //update table target (module1)
       $target_data=array('target_first_name'=>$first_name,'target_last_name'=>$last_name,'email'=>$email,'phone'=>$country_code1.'-'.$phione , 'mobile' => $mobile,'address'=>$address1,'company'=>$target_company_name, 'categories'=>$industry_type);
       $target_res=$this->Targets_model->edit($target_data,$target_seq_no);
       if($res && $target_res)
       {
         echo "1";
       }
    }
    //----------------end-------------------//


    //----------------------- edit_details_module4-----------------------//
   function edit_details_module4()
    {
       //$admin_id = $this->data['admin_id'];
       $first_name=$this->input->post("first_name");
       $last_name=$this->input->post("last_name");
       $email=$this->input->post("email");
       $country_code1=$this->input->post("view_details_country_code_module4");
       $mobile=$this->input->post("mobile");
       $address1=$this->input->post("address1");
       $seq_no=$this->input->post("seq_no");
       $target_company_name=$this->input->post("target_company_name");
       $industry_type=$this->input->post("industry_type");
       $phione = $this->input->post("module4_contact_phone");
       $target_seq_no = $this->input->post("target_seq_no");

       //update module4 table
       $data=array('target_first_name'=>$first_name,'target_last_name'=>$last_name,'email_target_id'=>$email,'home_phone'=>$country_code1.'-'.$phione , 'mobile' => $mobile,'address1'=>$address1,'company_name'=>$target_company_name, 'categories'=>$industry_type);
       //t($data);die;
       $res=$this->Module4_Model->edit($data,$seq_no);
       //echo $this->db->last_query();die;

       //update target table
       $target_data=array('target_first_name'=>$first_name,'target_last_name'=>$last_name,'email'=>$email,'phone'=>$country_code1.'-'.$phione , 'mobile' => $mobile,'address'=>$address1,'company'=>$target_company_name, 'categories'=>$industry_type);
       $target_res=$this->Targets_model->edit($target_data,$target_seq_no);
       if($res && $target_res)
       {
         echo "1";
       }
    }
    //----------------end-------------------//





    //----------------------- edit_details_module5-----------------------//
   function edit_details_module5()
    {
       //$admin_id = $this->data['admin_id'];
       $last_name=$this->input->post("last_name");
       $email=$this->input->post("email");
       $country_code1=$this->input->post("country_code1");
       $mobile=$this->input->post("mobile");
       $address1=$this->input->post("address1");
       $seq_no=$this->input->post("seq_no");
       $target_company_name=$this->input->post("target_company_name");
       $industry_type=$this->input->post("industry_type");
       $phione = $this->input->post("phione");
       $target_seq_no = $this->input->post("target_seq_no");

       $data=array('name'=>$last_name,'email'=>$email,'phone'=>$country_code1.'-'.$phione , 'mobile' => $mobile,'address1'=>$address1,'company_name'=>$target_company_name, 'categories'=>$industry_type);
       //t($data);die;
       $res=$this->Model5->edit($data,$seq_no);
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
        $admin_session_data = $this->session->userdata('admin_session_data');
        // echo $firm_seq_no = $admin_session_data['firm_seq_no'];echo "<br>";

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
       $cond = " and firm_seq_no='{$firm_seq_no}' AND target_seq_no=$contact_id";
       $this->data['fetch_details']=$this->Targets_model->fetch($cond);

       $this->data['contact_id'] = $contact_id;
       $this->data['firm_seq_no'] = $this->data['fetch_details'][0]['firm_seq_no'];
       $this->data['target_seq_no']=$target_seq_no;

       $this->db->select('*')->from('plma_document');
       $this->db->where('firm_seq_no', $firm_seq_no);
       $row=$this->db->get()->result_array();
       $this->data['document']=$row;

       $this->get_include();
       $this->load->view($this->view_dir . 'operation_master/competitor/send_message4', $this->data);
    }
    function email_template_signature()
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
       $appt_seq_no=$this->data['appt_seq_no'];
       
       $this->db->select('*')->from('plma_module2')->where('target_seq_no="'.$target_seq_no.'"');
       $module2_view = $this->db->get()->result_array();
       
       
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
       
           $last_id=$note_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$message_text,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module2');
           $note_data=$this->Allnote_Model->add($note_arry);
           
        if($last_id) {
            echo "1";
        }
        else {
            echo "0";
        }
            
    }
    function temp_email4($id= '', $company_id= ' ')
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
       $cond = " and company_id='{$company_id}' AND target_seq_no=$contact_id";
       $this->data['fetch_details']=$this->Targets_model->fetch($cond);

       $this->data['contact_id'] = $contact_id;
       $this->data['firm_seq_no'] = $this->data['fetch_details'][0]['firm_seq_no'];
       $this->data['target_seq_no']=$target_seq_no;

       $this->db->select('*')->from('plma_document');
       $row=$this->db->get()->result_array();
       $this->data['document']=$row;

       $this->get_include();
       $this->load->view($this->view_dir . 'operation_master/competitor/send_message_module4', $this->data);


    }
     function email_template_signature4()
     {
        $firm_seq_no=$this->data['firm_seq_no'];
        $this->db->select('*')->from('plma_signature')->where('firm_seq_no="'.$firm_seq_no.'"');
        $template_details = $this->db->get();
        echo json_encode($template_details->result_array());
     }
     function temp_sendmail4() {
       $admin_session_data = $this->session->userdata('admin_session_data');
       $admin_id = $admin_session_data['admin_id'];
       $firm_seq_no = $admin_session_data['firm_seq_no'];
       $email = $this->input->post('email');
       $subject = $this->input->post('sub');
       $message_text = $this->input->post('msg');
      
       $target_seq_no=$this->input->post('target_seq_no');
       $attach_array = $this->input->post('attach_array');
       $appt_seq_no=$this->data['appt_seq_no'];
       
       //$this->db->select('*')->from('plma_module2')->where('target_seq_no="'.$target_seq_no.'"');
       //$module2_view = $this->db->get()->result_array();
       
       
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
       
           $last_id=$note_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$message_text,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module2');
           $note_data=$this->Allnote_Model->add($note_arry);
           
        if($last_id) {
            echo "1";
        }
        else {
            echo "0";
        }
            
    }
    function temp_email5($id= '', $company_id= ' ')
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
       
       $this->data['fetch_details']=$this->Targets_model->fetch($cond);
       //echo $contact_id;die();
         /*echo "<pre>";
       print_r($a);
       echo "</pre>";die();*/
       $this->data['contact_id'] = $contact_id;
       //$this->data['firm_seq_no'] = $this->data['fetch_details'][0]['firm_seq_no'];
       $this->data['firm_seq_no'] = $firm_seq_no;
       $this->data['target_seq_no']=$target_seq_no;

       $this->db->select('*')->from('plma_document');
       $row=$this->db->get()->result_array();
       $this->data['document']=$row;

       $this->get_include();
       $this->load->view($this->view_dir . 'operation_master/competitor/send_message_module5', $this->data);


    }
    function get_email_template5()
    {


        $firm_seq_no=$this->data['firm_seq_no'];
        $this->db->select('*')->from('plma_signature')->where('firm_seq_no="'.$firm_seq_no.'"');
        $template_details = $this->db->get();
        echo json_encode($template_details->result_array());
    }
    function temp_sendmail5() {
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
