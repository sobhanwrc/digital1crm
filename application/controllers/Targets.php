<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Targets extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('managelist_model');
        $this->load->model('attorney_model');
        $this->load->model('user_model');
        $this->load->model('address_model');
        $this->load->model('city_model');
        $this->load->model('country_model');
        $this->load->model('county_model');
        $this->load->model('states_model');
        $this->load->model('firm_model');
        $this->load->model('firm_address_model');
        $this->load->model('targets_model');
        $this->load->model('codes_model');
        $this->load->model('attorney_model');
        $this->load->model('target_attorney_model');
        $this->load->model('target_contact_model');
        $this->load->model('app_users_model');
        $this->load->model('super_master_model');
        $this->load->model('signature_model');
        $this->load->model('change_module_number_module');
        $this->load->model('module_setting_model');   
        $this->load->model('add_contact_model');
        $this->load->model('emailtemplate_model');
        $this->load->model('Module4_Model');
        $this->load->model('sms_add_model');
    }

    function index() {
        $company_session = $this->session->userdata('admin_session_data');
        //t($company_session);die;
        ///////////////////// Code for Filtering Firms /////////////////////
        
        $admin_id = $this->data['admin_id'];
        $role_code = $company_session['role_code'];
        $company_id = $company_session['firm_seq_no'];
        $attorney_cond = " AND user_seq_no = $admin_id";
        $attorney_fetch_details = $this->attorney_model->fetch($attorney_cond);
        $attorney_list_id = $attorney_fetch_details[0]['list_id'];
        $attr_seq_no = $attorney_fetch_details[0]['attorney_seq_no'];
        $this->data['attorney_list_id'] = $attorney_list_id;
        //echo $this->data['attorney_list_id'];die;
        $back_from_browser = $this->session->userdata('for_locked');
       // echo $role_code; SITEADMdie();
//        echo $hello;die();
        if($back_from_browser){
            $this->load->model('temorary_module_lock');

            $cond = " AND admin_id = $admin_id";
            $fetch = $this->temorary_module_lock->delete_cond($cond);

            $this->session->unset_userdata('for_locked');

        }


        if ($role_code == 'FIRMADM') {

            $cond = "AND user_seq_no=$admin_id";
            $fetch_company_id_from_user_table = $this->user_model->fetch($cond);

//            $company_id = $fetch_company_id_from_user_table[0]['firm_seq_no'];

            $cond1 = " AND company_id=$company_id AND (status=1 OR status=3)";
            $fetch_details_master_contacts = $this->targets_model->fetch($cond1);
            //echo $this->db->last_query();die;
//            t($fetch_details_master_contacts);die();

            $this->data['admin_id'] = $admin_id;

            $this->data['fetch_details_master_contacts'] = $fetch_details_master_contacts;
        }
        elseif ($role_code == 'ATTR') {
//            echo $attr_seq_no;

            $this->db->select('plma_target.*')->from('plma_target')
            ->join('plma_assign_list_to_call_user','plma_target.list_id = plma_assign_list_to_call_user.list_id','INNER')
            ->where('plma_assign_list_to_call_user.user_seq_no',$attr_seq_no)
            ->where('plma_target.status != "Inactive"')
            ->where('plma_assign_list_to_call_user.firm_seq_no',$company_id);
            
            $fetch_details_master_contacts = $this->db->get()->result_array();
            //echo $this->db->last_query();die;
            $this->data['admin_id'] = $admin_id;

            $this->data['firm_id'] = $company_id;

            $this->data['fetch_details_master_contacts'] = $fetch_details_master_contacts;
        }

        elseif ($role_code == 'SITEADM') {

                $fetch_super_master_target = $this->super_master_model->fetch();
                $this->load->model('industry_Type_model');
                $this->data['industry_type'] = $this->industry_Type_model->list_industry_type();
                $this->data['fetch_details_master_contacts'] = $fetch_super_master_target;

        }


        $this->get_include();

        if ($role_code == 'FIRMADM') {
                $this->load->view($this->view_dir . 'operation_master/targets/listing1', $this->data);
        }

        elseif ($role_code == 'SITEADM') {

                $this->load->model('Industry_Type_model');
                $this->data['industry_type_list'] = $this->Industry_Type_model->list_industry_type();

                $this->load->model('PostGroup_model');
                $this->data['postcode_group'] = $this->PostGroup_model->post_group_list();
                $this->load->view($this->view_dir . 'operation_master/targets/siteadm_listing', $this->data);
        }

        else {
                $this->load->view($this->view_dir . 'operation_master/targets/listing', $this->data);
        }
    }

    function fetchTargets($param) {
//         echo "ok"; exit;
        $firm_id = $this->input->post('fimrs');
        // echo $firm_id; exit;
        $admin_id = $this->data['admin_id'];
        if ($firm_id == 'all' || $firm_id == '') {
//             echo "ok"; exit;
            $sql = "Select tgt.*,f.firm_name, f.firm_seq_no from plma_target as tgt inner join plma_firm as f "
                    . " on tgt.firm_seq_no=f.firm_seq_no";
        } else {
//             echo "ok"; exit;
            $sql = "Select tgt.*,f.firm_name, f.firm_seq_no from plma_target as tgt inner join plma_firm as f "
                    . " on tgt.firm_seq_no=f.firm_seq_no where f.firm_seq_no=$firm_id";
        }
//        echo $sql; exit;
        $res = $this->db->query($sql);
        $row1 = $res->result_array();
//        $this->data['all_targets1'] = $row1;
//        foreach ($row1 as $key => $value) {
//            $status_tgt = $value['association_status'];
//            $cond1 = "AND code = '$status_tgt' AND category_type='Target Status'";
//            $status = $this->codes_model->fetch($cond1);
//
//            $ind_1 = $value['industry_type'];
//            $cond2 = "AND code = '$ind_1' AND category_type='Industry Type'";
//            $ind_type = $this->codes_model->fetch($cond2);
//
//            $row1[$key]['association_status'] = $status[0]['short_description'];
//            $row1[$key]['industry_type'] = $ind_type[0]['short_description'];
//        }
        $this->data['all_targets'] = $row1;
//        t( $this->data['all_targets']); exit;

        $select = "firm_seq_no,firm_name";
        $cond = " AND firm_admin_seq_no = '" . $admin_id . "'";
        $this->data['firms'] = $this->firm_model->fetch('', $select, $cond);
        $this->data['firm_id'] = $firm_id;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/target_conversion/listing', $this->data);
    }

    function add() {
        $admin_id = $this->data['admin_id'];
//        echo $admin_id; exit;
        $role_code = $this->data['role_code'];

        $sql = "SELECT `short_description`,`code` FROM `plma_codes` WHERE `category_type`='Target Status'";
//        echo $sql; exit;
        $query = $this->db->query($sql);
        $status = $query->result_array();
        $this->data['status'] = $status;
//        t($this->data['status']); exit;
        $sql1 = "SELECT `short_description`,`code` FROM `plma_codes` WHERE `category_type`='Industry Type'";
//        echo $sql; exit;
        $query1 = $this->db->query($sql1);
        $ind_type = $query1->result_array();
        $this->data['ind_type'] = $ind_type;

        $sql2 = "SELECT pfirm.firm_seq_no, pfirm.firm_admin_seq_no, pattr.attorney_first_name, pattr.attorney_last_name, pattr.attorney_seq_no FROM plma_attorney pattr JOIN plma_firm pfirm ON pattr.firm_seq_no = pfirm.firm_seq_no WHERE pfirm.firm_admin_seq_no = '" . $admin_id . "'";
        $query2 = $this->db->query($sql2);
        $attorney = $query2->result_array();
        $this->data['attorney'] = $attorney;
//        t($this->data['attorney']); exit;
//        $admin_all_session = $this->session->userdata('admin_session');


        //when firm admin add targets
        if ($role_code == 'FIRMADM') {
            $sql = "select pfirm.firm_seq_no from plma_firm pfirm where pfirm.firm_admin_seq_no='" . $admin_id . "'";
            $res = $this->db->query($sql);
//                 echo $this->db->last_query(); exit;
            $row = $res->result_array();
            $firm_seq_no = $row[0]['firm_seq_no'];

            $attorney_seq_no = $this->input->post('attorney_seq_no');
        }
        // when attorney add targets
        if ($role_code == 'ATTR') {
            $sql1 = "select pattr.firm_seq_no from plma_firm pfirm, plma_attorney pattr where pattr.user_seq_no= '" . $admin_id . "' AND pfirm.firm_seq_no = pattr.firm_seq_no";
            $res1 = $this->db->query($sql1);
//                 echo $this->db->last_query(); exit;
            $row1 = $res1->result_array();
            $firm_seq_no = $row1[0]['firm_seq_no'];

            $sql = "select pattr.attorney_seq_no from plma_attorney pattr where pattr.user_seq_no='" . $admin_id . "'";
            $res = $this->db->query($sql);
//                 echo $this->db->last_query(); exit;
            $row = $res->result_array();
            $attorney_seq_no = $row[0]['attorney_seq_no'];
        }
        $submit = $this->input->post('add_target');
        if (isset($submit)) {
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
            $addr_line_1 = $this->input->post('addr_line_1');
            $addr_line_2 = $this->input->post('addr_line_2');
            $addr_line_3 = $this->input->post('addr_line_3');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
//            $county = $this->input->post('county');
            $city = $this->input->post('city');
            $postal_code = $this->input->post('postal_code');
            $addr_remarks = $this->input->post('remarks1');
            $twit = $this->input->post('twit');
            $g = $this->input->post('goog');
            $link = $this->input->post('link');
            $yout = $this->input->post('yout');
            $im = $this->input->post('im');

            $data1 = array(
                'address_line1' => $addr_line_1,
                'address_line2' => $addr_line_2,
                'address_line3' => $addr_line_3,
                'city' => $city,
                'state' => $state,
                'postal_code' => $postal_code,
                'country' => $country,
//                'county' => $county,
                'email' => $email,
                'phone' => $phone,
                'fax' => $fax,
                'mobile_cell' => $mobile,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
                'remarks_notes' => $addr_remarks,
                'twitter' => $twit,
                'linkedin' => $link,
                'youtube' => $yout,
                'google_plus' => $g,
                'im' => $im,
                'created_by' => $admin_id,
                'created_date' => time(),
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
//            echo "<pre>"; print_r($data1); exit;
            $insertid = $this->address_model->add($data1);

//            $attorney_seq_no = $this->input->post('attorney_seq_no');
             $inor = $this->input->post('inor');
            $target_first_name = $this->input->post('target_first_name');
            $target_last_name = $this->input->post('target_last_name');
            $target_company_name = $this->input->post('target_company_name');
            $target_id = $this->input->post('target_id');
            $target_code = $this->input->post('target_code');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day = $this->input->post('day');
            $whole_date = array($day, $month, $year);
            $target_dob = implode("-", $whole_date);
            $target_gender = $this->input->post('target_gender');
            $org_name = $this->input->post('org_name');
            $org_id = $this->input->post('org_id');
            $org_code = $this->input->post('org_code');
            $target_status = $this->input->post('target_status');
            $industry_type = $this->input->post('industry_type');
            $social_security_no = $this->input->post('social_security_no');
            $social_security_no = $this->removeSSNMask($social_security_no);
            $remarks = $this->input->post('remarks');

            //insert to target
            if($inor== 'I'){
            $data2 = array(
                'firm_seq_no' => $firm_seq_no,
                'attorney_seq_no' => $attorney_seq_no,
                'target_first_name' => $target_first_name,
                'target_last_name' => $target_last_name,
                'target_company_name' => $target_company_name,
                'target_id' => $target_id,
                'target_code' => $target_code,
                'target_dob' => $target_dob,
                'target_gender' => $target_gender,
                'industry_type' => $industry_type,
                'social_security_no' => $social_security_no,
                'address_seq_no' => $insertid,
                'association_status' => $target_status,
                'remarks_notes' => $remarks,
                'type' => $inor,
                'created_by' => $admin_id,
                'created_date' => time()
            );
            } else {
                 $data2 = array(
                'firm_seq_no' => $firm_seq_no,
                'attorney_seq_no' => $attorney_seq_no,
                'target_first_name' => $org_name,
                //'target_last_name' => $target_last_name,
                'target_company_name' => $org_name,
                'target_id' => $org_id,
                'target_code' => $org_code,
               // 'target_dob' => $target_dob,
               // 'target_gender' => $target_gender,
                'industry_type' => $industry_type,
                'social_security_no' => $social_security_no,
                'address_seq_no' => $insertid,
                'association_status' => $target_status,
                'type' => $inor,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date' => time()
            );
            }
//            echo "<pre>"; print_r($data2); exit;

            $insertid2 = $this->targets_model->add($data2);

            if ($insertid2) {
                $msg = 'Target added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets');
            } else {
                $msg = 'error in adding Target';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets/add');
            }
        } else {

//            $cond1 = " and category_type = 'Gender' ";
//            $this->data['all_genders'] = $this->codes_model->fetch($cond1);

            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/targets/add', $this->data);
        }
    }

    function send_module2($code=''){
       $id = base64_decode($code);

       $admin_id = $this->data['admin_id'];

       $cond = " AND user_seq_no=$admin_id AND status=1";
       $fetch_user_details = $this->user_model->fetch($cond);
       $company_id = $fetch_user_details[0]['firm_seq_no'];
//       t($fetch_user_details);die();
//       echo $admin_id;die();

       if($_POST['submit']){
           $corporate = $this->input->post('corporate');
           $individual = $this->input->post('individual');
           $target_type = ($corporate ? $corporate : $individual) ;
           $first_name = $this->input->post('target_first_name');
           $last_name = $this->input->post('target_last_name');
           $email = $this->input->post('email_target_id');

           $country_code = $this->input->post('country_code1');
           $home_phone = $this->input->post('home_phone');
           $phone = $country_code . $home_phone;

           $mobile = $this->input->post('mobile');
           $address = $this->input->post('address1');
           $next_call_date = $this->input->post('next_call_date');
           $next_call_time = $this->input->post('next_call_time');
           $do_not_call_me = $this->input->post('do_not_call_me');
           $appt_call_date = $this->input->post('appt_call_date');
           $appt_call_date1 = $this->input->post('appt_call_date1');
           $appt_call_time = $this->input->post('appt_call_time');
           $appt_call_time1 = $this->input->post('appt_call_time1');
           $apptmnt_users = $this->input->post('apptmnt_users');
           $apptmnt_venu = $this->input->post('venu');
           $target_company_name = $this->input->post('target_company_name');
           $company_type = $this->input->post('industry_type');
           $date_contacted = $this->input->post('date_contacted');
           $keep_in_touch_1 = $this->input->post('keep_in_touch_1');
           $keep_in_touch_date_1 = $this->input->post('keep_in_touch_date_1');
           $email_1 = $this->input->post('email_1');
           $phone_1 = $this->input->post('phone_1');
           $designation_1 = $this->input->post('designation_1');


           if($do_not_call_me == 1){
               $data = array(
                   'status' => 2
               );

               $edit = $this->targets_model->edit($data,$id);
               if($edit){
                   redirect($base_url . 'targets');
               }
           }

           $data_target = array(
                'type' => $target_type
            );
           $edit_target_type = $this->targets_model->edit($data_target,$id);
           if(!empty($apptmnt_users)){
               $this->load->model('Callappointment_Model');
               $this->load->model('appointment_details_module');

               $cond = " AND email='$apptmnt_users'";
               $fetch_appt_details = $this->Callappointment_Model->fetch($cond);

               $data = array(
                   'target_seq_no' => $id,
                   'admin_id' => $admin_id,
                   'appt_seq_no' => $fetch_appt_details[0]['appt_seq_no'],
                   'firm_seq_no' => $fetch_appt_details[0]['firm_seq_no'],
                   'user_seq_no' => $fetch_appt_details[0]['user_seq_no'],
                   'user_name' => $first_name . ' ' . $last_name,
                   'email' => $email,
                   'appointment_date' => $appt_call_date,
                   'appointment_time' => $appt_call_time .' - '. $appt_call_time1,
                   'appointment_venu' => $apptmnt_venu,
                   'status' => 'Active',
                   'added_date' => time(),
                   'modified_date' => time()
               );

               $add = $this->appointment_details_module->add($data);
               if($add){
                    $data = array(
                        'status' => "Inactive"
                    );
                    $edit = $this->targets_model->edit($data,$id);

                    redirect($base_url . 'targets');
               }
           }

           $data_field = array(
               'admin_id' => $admin_id,
               'target_seq_no' => $id,
               'company_id' => $company_id,
               'first_name' => 	$first_name,
               'last_name' => $last_name,
               'email' => $email,
               'phione' => $phone,
               'mobile' => $mobile,
               'address' => $address,
               'company_name' => $target_company_name,
               'categories' => $company_type,
               'date_contacted' => $date_contacted,
               'notes' => $notes,
               'first_name_1' => $keep_in_touch_1[0],
               'last_name_1' => $keep_in_touch_date_1[0],
               'email_1' => $email_1[0],
               'phone_1' => $phone_1[0],
               'designation_1' => $designation_1[0],
               'first_name_2' => $keep_in_touch_1[1],
               'last_name_2' => $keep_in_touch_date_1[1],
               'email_2' => $email_1[1],
               'phone_2' => $phone_1[1],
               'designation_2' => $designation_1[2],
               'first_name_3' => $keep_in_touch_1[2],
               'last_name_3' => $keep_in_touch_date_1[2],
               'email_3' => $email_1[2],
               'phone_3' => $phone_1[2],
               'designation_3' => $designation_1[2],
               'first_name_4' => $keep_in_touch_1[3],
               'last_name_4' => $keep_in_touch_date_1[3],
               'email_4' => $email_1[3],
               'phone_4' => $phone_1[3],
               'designation_4' => $designation_1[3],
               'do_not_call_me' => $do_not_call_me,
               'next_call_date' => $next_call_date,
               'next_call_time' => $next_call_time,
               'appointment_time' => $appt_call_time .' - '. $appt_call_time1,
               'appointment_date' => $appt_call_date,
               'appointment_user' => $apptmnt_users,
               'appointment_venu' => $apptmnt_venu,
               'status' => 1,
               'added_date' => time(),
               'modified_date' => time(),
               'type' => $target_type
           );
//           t($data_field);die();

           $this->load->model('module2');
           $add_module2 = $this->module2->add($data_field);
           if($add_module2){
               $data = array(
                   'status' => "Inactive"
               );
               $edit = $this->targets_model->edit($data,$id);

               redirect($base_url . 'targets');
           }

       }
    }

    function next_contact($id = ''){
        $id = base64_decode($id);

        $admin_id = $this->data['admin_id'];

       $idd= "Select target_seq_no from `plma_target` WHERE target_seq_no='$id'";
       $qu= $this->db->query($idd);
       $arr= $qu->result_array();

//       echo $this->db->last_query();
//       t($arr);

       $au_id=($arr[0]['target_seq_no']+1);
       $iddd= "Select target_seq_no from `plma_target` WHERE target_seq_no='{$au_id}' and status=1";
       $quu= $this->db->query($iddd);
       $arrr= $quu->result_array();
       if(!empty($arrr)){
            $next_id = $arrr[0]['target_seq_no'];

            $back_from_browser = $this->session->userdata('for_locked');
//          echo $back_from_browser;die();
            if($back_from_browser){
                $this->load->model('temorary_module_lock');

                $prev_id = $au_id-1;

                $cond = " AND admin_id = $admin_id AND id=$prev_id";
                $fetch = $this->temorary_module_lock->delete_cond($cond);

    //            $this->session->unset_userdata('for_locked');

            }
       }

//       echo $this->db->last_query();
//       t($arrr);die();

       //$filter_condition = $this->session->userdata('filter_condition');
//       $sql= "SELECT `id` FROM `tbl_master_names` WHERE `id` = {$arrr[0]['id']}";
//       $query = $this->db->query($sql);
//       $array=$query->result_array();
//       foreach ($array as $key => $value) {
//           $id = $value['id'];
//
//       }
       redirect($base_url . 'targets/details/' . base64_encode($next_id));
//       echo $id; die();

   }

    function previous_contact($id = ''){
       $id = base64_decode($id);
       $idd= "Select target_seq_no from `plma_target` WHERE target_seq_no='$id'";
       $qu= $this->db->query($idd);
       $arr= $qu->result_array();

       $au_id=($arr[0]['target_seq_no']-1);
       $iddd= "Select target_seq_no from `plma_target` WHERE target_seq_no='{$au_id}' and status=1";
       $quu= $this->db->query($iddd);
       $arrr= $quu->result_array();
       if(!empty($arrr)){
           $prev_id = $arrr[0]['target_seq_no'];
       }

       redirect($base_url . 'targets/details/' . base64_encode($prev_id));
//       echo $id; die();

   }
   
    function check_user_notification(){
        $user_id = $this->input->post('call_user_id');
        
        $cond = " AND user_seq_no=$user_id";
        $fetch = $this->user_model->fetch($cond);
        $notification = $fetch[0]['notification'];
        echo $notification;
        exit();
    }
    
    function details($code = '', $b= '') {
        $admin_all_session = $this->session->userdata('admin_session_data');
        $admin_id = $admin_all_session['admin_id'];
        
        //fetch_notification settings
        $cond = " AND user_seq_no=$admin_id";
        $notification = $this->user_model->fetch($cond);
//        t($notification);die();
        $get_notification_opt = $notification[0]['notification'];
        $this->data['get_notification_opt'] = $get_notification_opt;
        //end
        
        $role_code = $admin_all_session['role_code'];
        //echo $role_code;die;
        $code = base64_decode($code);
        $cond = "AND target_seq_no = '" . $code . "'";
        if($role_code == 'SITEADM'){
            $row = $this->super_master_model->fetch($cond);
        } else {
            $row = $this->targets_model->fetch($cond);
        }

//        $session = $this->session->set_userdata('for_locked',1);
        $_SESSION['for_locked'] = '1';
//         t($_SESSION);die();

        $company_id = $row[0]['company_id'];
        $admin_id = $this->data['admin_id'];
        $cond = " AND user_seq_no='$admin_id' AND firm_seq_no='$company_id' AND status=1";
        $fetch_details = $this->user_model->fetch($cond);
        if(!empty($fetch_details)){
            $data = array(
                'id' => $code,
                'admin_id' => $admin_id,
                'company_id' => $company_id
            );
            $this->load->model('temorary_module_lock');
            $add = $this->temorary_module_lock->add($data);
        }

        $fetch_cond = " AND module_name='module1' AND firm_seq_no='".$admin_all_session['firm_seq_no']."' AND status=1";
        $module_details = $this->sms_add_model->fetch($fetch_cond);
        $this->data['module_details']= $module_details;
//        echo $this->db->last_query();
//        t($row);exit;

        $this->load->model('Callappointment_Model');
        $cond = " AND firm_seq_no='".$admin_all_session['firm_seq_no']."'";
        $fetch_appointment_details = $this->Callappointment_Model->fetch($cond);
        $this->data['fetch_appointment_details'] = $fetch_appointment_details;


        $this->data['targets1'] = $row[0];
//        t($this->data['targets1']); exit;
        foreach ($row as $key => $value) {
            $gend = $value['target_gender'];
            $cond1 = "AND code = '$gend' AND category_type = 'Gender'";
//           echo $this->db->last_query(); exit;
            $genders = $this->codes_model->fetch($cond1);

            $stat = $value['association_status'];
            $cond2 = "AND code = '$stat' And category_type = 'Target Status'";
            $status = $this->codes_model->fetch($cond2);

            $ind = $value['industry_type'];
            $cond3 = "AND code = '$ind' And category_type = 'Industry Type'";
            $industry_type = $this->codes_model->fetch($cond3);

            $attr = $value['attorney_seq_no'];
            $cond4 = "AND attorney_seq_no = '" . $attr . "'";
            $attorney = $this->attorney_model->fetch($cond4);

            $row[$key]['target_gender'] = $genders[0]['short_description'];
            //$row[$key]['association_status'] = $status[0]['short_description'];
            $row[$key]['industry_type'] = $industry_type[0]['short_description'];
            $row[$key]['attorney_seq_no'] = $attorney[0]['attorney_first_name'] . ' ' . $attorney[0]['attorney_last_name'];

            $home_phone = $value['phone'];
            $original_home_phone = $home_phone;

            $length = strlen($original_home_phone);
            $first_element=$original_home_phone[0];

//           if($first_element=="(")
//           {
            if ($length == 10) {
                $country_code1 = '';
            } else if ($length == 11) {
                $country_code1 = substr($original_home_phone, 0, 2);
            } else if ($length == 12) {
                $country_code1 = substr($original_home_phone, 0, 3);
            } else if ($length == 13) {
                $country_code1 = substr($original_home_phone, 0, 3);
            } else if ($length == 14) {
                $country_code1 = substr($original_home_phone, 0, 5);
            } else if ($length == 17) {
                $country_code1 = substr($original_home_phone, 0, 3);
            }

            if($length == 13){
                $home_phone_number = substr($original_home_phone, -10);
            }else{
                $home_phone_number = substr($original_home_phone, -11);
            }



            $mobile_super_master = $value['mobile'];
            $original_mobile = $mobile_super_master;

            $length = strlen($original_mobile);
            $first_element_mobile=$original_mobile[0];

//           if($first_element=="(")
//           {
            if ($length == 10) {
                $country_code2 = '';
            } else if ($length == 11) {
                $country_code2 = substr($original_mobile, 0, 2);
            } else if ($length == 12) {
                $country_code2 = substr($original_mobile, 0, 3);
            } else if ($length == 13) {
                $country_code2 = substr($original_mobile, 0, 3);
            } else if ($length == 14) {
                $country_code2 = substr($original_mobile, 0, 5);
            } else if ($length == 17) {
                $country_code2 = substr($original_mobile, 0, 3);
            }


//           }
//           else if($first_element=="+")
//           {
//                if ($length == 10) {
//                $country_code1 = '';
//               } else if ($length == 11) {
//                $country_code1 = substr($original_home_phone, 0, 2);
//               } else if ($length == 12) {
//                $country_code1 = substr($original_home_phone, 0, 2);
//               } else if ($length == 13) {
//                $country_code1 = substr($original_home_phone, 0, 3);
//               } else if ($length == 14) {
//                $country_code1 = substr($original_home_phone, 0, 4);
//               }
//
//           }
             //echo $country_code1;die();

            if($length == 13){
            	$home_mobile = substr($original_mobile, -10);
            }else{
            	$home_mobile = substr($original_mobile, -11);
            }

            $originalhome_phone_number = $this->madePhoneformate_ios_android($original_home_phone);
            $home_no = $this->madePhoneformate($home_phone_number);
            $row[$key]['home_phone'] = $originalhome_phone_number;
            $row[$key]['home_phone_10'] = $home_no;
            $row[$key]['country_code1'] = $country_code1;

            $original_mobile_no = $this->madePhoneformate_ios_android($original_mobile);
            $home_no = $this->madePhoneformate($home_mobile);
            $row[$key]['home_mobile'] = $original_mobile;
            $row[$key]['home_mobile_10'] = $home_no;
            $row[$key]['country_code2'] = $country_code2;

            /*echo $originalhome_phone_number."</br>";
             echo $home_no."</br>";
              echo $country_code1;die();*/

        }
        $this->data['targets'] = $row[0];
//        t($this->data['targets']);die;
        $target_seq_id = $row[0]['target_seq_no'];
        if (count($row) > 0) {
            $cond2 = " and address_seq_no = '" . $row[0]['address_seq_no'] . "'";
            $row2 = $this->address_model->fetch($cond2);
            $this->data['address_info'] = $row2[0];

            foreach ($row2 as $key => $value) {

                $country_1 = $value['country'];
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
            }
            $this->data['address'] = $row2[0];
           // t($this->data['address']); exit;
        }

        $target = $code;
        $firm = base64_decode($b);
        $this->data['firm_seq_no'] = $firm;
        $cond1 = "AND target_seq_no=$target AND firm_seq_no=$firm";
        $target_con = $this->target_contact_model->fetch($cond1);
        $this->data['all_contact'] =$target_con;


        //for previous & next
        $company_session = $this->session->userdata('admin_session_data');
        $firm_seq_no = $company_session['firm_seq_no'];

        $iddd= "Select target_seq_no from `plma_target` WHERE target_seq_no='$target' and firm_seq_no='$firm_seq_no' and status='1' order by target_seq_no";
        $quu= $this->db->query($iddd);
        $arrr= $quu->result_array();

        $prev_id=$arrr[0]['target_seq_no']-1;
        $iddd_prev = "select max(target_seq_no) as target_seq_no from plma_target where target_seq_no < $code AND firm_seq_no=$firm_seq_no and status='1'";
        $quu_prev= $this->db->query($iddd_prev);
        $arrr_prev= $quu_prev->result_array();

        $next_id=$arrr[0]['target_seq_no']+1;
        $iddd_next= "select min(target_seq_no) as target_seq_no from plma_target where target_seq_no > $code AND firm_seq_no=$firm_seq_no and status='1'";
        $quu_next= $this->db->query($iddd_next);
        $arrr_next= $quu_next->result_array();

        $this->data['next_target_seq_no'] = $arrr_next[0]['target_seq_no'];
        $this->data['prev_target_seq_no'] = $arrr_prev[0]['target_seq_no'];
        //end

        $admin_all_session = $this->session->userdata('admin_session_data');

        $venue_details_sql = "SELECT venue_seq_no,venue_name FROM plma_venue pv,plma_user pu WHERE pv.created_by=pu.user_seq_no AND pu.firm_seq_no='".$admin_all_session['firm_seq_no']."'";
        $venue_details_query = $this->db->query($venue_details_sql);
        $this->data['venue_details'] = $venue_details_query->result_array();


        $cond_module = "AND module_name = 'module1'";
        $fetch_module_details = $this->module_setting_model->fetch($cond_module);
        $this->data['fetch_module_details'] =  $fetch_module_details;

        //-------------primary contact details---------------//
        $cond123 = " AND firm_seq_no='$company_id' AND target_seq_no='$target'";
        $fetch_add_contact_details = $this->add_contact_model->fetch($cond123);
            //echo $this->db->last_query();die;
        $this->data['fetch_add_contact_details'] = $fetch_add_contact_details[0];

        $primary_contact_phone = $fetch_add_contact_details[0]['phone'];
        //--------end------------//


        $this->get_include();
        $row = $this->change_module_number_module->fetch();
        $this->data['row'] = $row;
        $this->load->view($this->view_dir . 'operation_master/targets/target_view', $this->data);
    }

    function madePhoneformate_ios_android($mobile_no) {
//        $mobile_no = preg_replace('/[^A-Za-z0-9]/', '', $mobile_no);
        $original_mobile_no = str_replace(array('(', ')'), '', $mobile_no);
        $original_mobile_no1 = str_replace("-", '', $original_mobile_no);
        $original_mobile_no2 = str_replace(" ", '', $original_mobile_no1);
        $length = strlen($original_mobile_no2);
        if ($length == 10) {
            $mobile_no1 = '';
        } else if ($length == 11) {
//            $mobile_no1 = substr($mobile_no, 0, 1);
            $mobile_no1 = substr($original_mobile_no2, 0, 1);
        } else if ($length == 12) {
//            $mobile_no1 = substr($mobile_no, 0, 2);
            $mobile_no1 = substr($original_mobile_no2, 0, 2);
        } else if ($length == 13) {
//            $mobile_no1 = substr($mobile_no, 0, 3);
            $mobile_no1 = substr($original_mobile_no2, 0, 3);
        } else if ($length == 14) {
//            $mobile_no1 = substr($mobile_no, 0, 4);
            $mobile_no1 = substr($original_mobile_no2, 0, 4);
        }

//        $mobile_no = substr($mobile_no, -10);
        $mobile_no = substr($original_mobile_no2, -10);
        $mobile_no2 = substr($mobile_no, 0, 3);
        if ($mobile_no2) {
            $mobile_no2 = "(" . $mobile_no2 . ")";
        }
        $mobile_no3 = substr($mobile_no, 3, 3);
        if ($mobile_no3) {
            $mobile_no3 = " " . $mobile_no3;
        }
        $mobile_no4 = substr($mobile_no, 6, 4);
        if ($mobile_no4) {
            $mobile_no4 = "-" . $mobile_no4;
        }
        $mobile_no = $mobile_no1 . $mobile_no2 . $mobile_no3 . $mobile_no4;
//        echo $mobile_no;die();exit;
        return $mobile_no;
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

    function edit($code = '') {

        $code = base64_decode($code);
        $admin_id = $this->data['admin_id'];

//        $cond1 = " AND category_type = 'Gender' ";
//        $this->data['all_genders'] = $this->codes_model->fetch($cond1);
//
//        $cond2 = " AND category_type = 'Target Status' ";
//        $this->data['status'] = $this->codes_model->fetch($cond2);
//
//        $cond3 = " AND category_type = 'Industry Type' ";
//        $this->data['industry_type'] = $this->codes_model->fetch($cond3);

        $sql2 = "SELECT pfirm.firm_seq_no, pfirm.firm_admin_seq_no, pattr.attorney_first_name, pattr.attorney_last_name, pattr.attorney_seq_no "
                . "FROM plma_attorney pattr "
                . "JOIN plma_firm pfirm "
                . "ON pattr.firm_seq_no = pfirm.firm_seq_no "
                . "WHERE pfirm.firm_admin_seq_no = '" . $admin_id . "'";
//        echo $sql2;
        $query2 = $this->db->query($sql2);
        $attorney = $query2->result_array();
        $this->data['attorney'] = $attorney;
//        t($attorney); exit;
        $select = "firm_seq_no, attorney_seq_no, add_flag, target_id, target_code, target_first_name, target_last_name,type,target_dob, target_gender, social_security_no, target_company_name, address_seq_no, association_status, industry_type, remarks_notes as target_remarks";
        $cond = "AND target_seq_no = '" . $code . "'";
        $row = $this->targets_model->fetch($cond, $select);
//        echo $this->db->last_query();
       // t($row);
      //  exit;
//        $admin_all_session = $this->session->userdata('admin_session');
//        $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];
//        $address_id = $row[0]['address_seq_no'];
//        echo $admin_id; exit;
        $submit = $this->input->post('edit_target');
        if (isset($submit)) {
//            echo 123; exit;
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
            $addr_line_1 = $this->input->post('addr_line_1');
            $addr_line_2 = $this->input->post('addr_line_2');
            $addr_line_3 = $this->input->post('addr_line_3');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
            $county = $this->input->post('county');
            $city = $this->input->post('city');
            $postal_code = $this->input->post('postal_code');
            $addr_remarks = $this->input->post('remarks1');
            $twit = $this->input->post('twit');
            $g = $this->input->post('goog');
            $link = $this->input->post('link');
            $yout = $this->input->post('yout');
            $im = $this->input->post('im');

            $data_edit1 = array(
                'address_line1' => $addr_line_1,
                'address_line2' => $addr_line_2,
                'address_line3' => $addr_line_3,
                'city' => $city,
                'state' => $state,
                'postal_code' => $postal_code,
                'country' => $country,
                'county' => $county,
                'email' => $email,
                'phone' => $phone,
                'fax' => $fax,
                'mobile_cell' => $mobile,
                'website_url' => $web_url,
                'twitter' => $twit,
                'linkedin' => $link,
                'youtube' => $yout,
                'google_plus' => $g,
                'im' => $im,
                'social_media_url' => $social_url,
                'remarks_notes' => $addr_remarks,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
//            echo "<pre>"; print_r($data_edit1); exit;
        $editid = $this->address_model->edit($data_edit1, $row[0]['address_seq_no']);
//        echo $this->db->last_query(); exit;

            $target_first_name = $this->input->post('target_first_name');
            $target_last_name = $this->input->post('target_last_name');
            $org_name = $this->input->post('org_name');
            $org_id = $this->input->post('org_id');

            $target_company_name = $this->input->post('target_company_name');
            $target_id = $this->input->post('target_id');
            $target_code = $this->input->post('target_code');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day = $this->input->post('day');
            $whole_date = array($day, $month, $year);
            $target_dob = implode("-", $whole_date);
            $target_gender = $this->input->post('target_gender');
            $target_status = $this->input->post('target_status');
            $social_security_no = $this->input->post('social_security_no');
            $social_security_no = $this->removeSSNMask($social_security_no);
            $remarks = $this->input->post('remarks');
            $type = $this->input->post('type');

            //insert to target
            if($type == 'I'){
            $data_edit2 = array(
                'target_first_name' => $target_first_name,
                'target_last_name' => $target_last_name,
                'target_company_name' => $target_company_name,
                'target_id' => $target_id,
                'target_code' => $target_code,
                'target_dob' => $target_dob,
                'target_gender' => $target_gender,
                'social_security_no' => $social_security_no,
                'address_seq_no' => $row[0]['address_seq_no'],
                'association_status' => $target_status,
                'remarks_notes' => $remarks,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
            } else {
                $data_edit2 = array(
                'target_first_name' => $org_name,
                //'target_last_name' => $target_last_name,
                'target_company_name' => $org_name,
                'target_id' => $org_id,
                //'target_code' => $org_code,
                //'target_dob' => $target_dob,
               // 'target_gender' => $target_gender,
                'social_security_no' => $social_security_no,
                'address_seq_no' => $row[0]['address_seq_no'],
                'association_status' => $target_status,
                'remarks_notes' => $remarks,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
            }
     // t($data_edit2); exit;

            $editid2 = $this->targets_model->edit($data_edit2, $code);
//            echo $this->db->last_query();
//            exit;
            if ($editid2) {
                $msg = 'Target edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets/edit/' . base64_encode($code));
            } else {
                $msg = 'error in editing Target';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets/edit/' . base64_encode($code));
            }
            redirect($base_url . 'targets/edit/' . base64_encode($code));
        }

        else {
            if (count($row) > 0) {
                $this->data['target_info'] = $row[0];
                $target_dob_1 = $row[0]['target_dob'];
                $target_dob = explode("-", $target_dob_1);
                $day = $target_dob[0];
                $month = $target_dob[1];
                $year = $target_dob[2];
                $this->data['day'] = $day;
                $this->data['month'] = $month;
                $this->data['year'] = $year;

                $cond2 = " and address_seq_no = '" . $row[0]['address_seq_no'] . "'";
                $row2 = $this->address_model->fetch($cond2);
                $this->data['address'] = $row2[0];
//                t($this->data['address']);
//                exit;

                $this->data['country_info'] = $this->fetch_country($row2[0]['country']);
//                t($this->data['country_info']); exit;
                $this->data['state_info'] = $this->fetch_state($row2[0]['country'], $row2[0]['state']);
                $this->data['county_info'] = $this->fetch_county($row2[0]['country'], $row2[0]['state'], $row2[0]['county']);
                $this->data['city_info'] = $this->fetch_city($row2[0]['country'], $row2[0]['state'], $row2[0]['city']);
            }
            $this->data['countries'] = $this->country_model->fetch();


             $sql = "SELECT attr.*, pfirm.* FROM plma_attorney as attr JOIN plma_firm as pfirm ON attr.firm_seq_no = pfirm.firm_seq_no WHERE pfirm.firm_admin_seq_no = $admin_id ";
        $res = $this->db->query($sql);
        $row_1 = $res->result_array();
        $this->data['attorneys'] = $row_1;
//        t($row_1); exit;
        $sql_1 = "SELECT `patr`.*, `ptgtat`.* FROM `plma_attorney` patr, `plma_tgt_attorney` ptgtat  WHERE `patr`.`attorney_seq_no` = `ptgtat`.`ref_attorney_seq_no` AND `ptgtat`.`target_seq_no` = '" . $code . "'";
      //  echo $sql_1; exit;
        $res_1 = $this->db->query($sql_1);
 //       echo $this->db->last_query(); exit;
        $row_2 = $res_1->result_array();
        $this->data['target_attr'] = $row_2;

//        t($this->data['target_attr']); exit;
//        t($row_2); exit;
        foreach ($row_2 as $key => $value) {
            $jury = $value['attorney_jurisdiction'];
            $cond1 = "AND code = '$jury' AND category_type = 'Jurisdictions'";
            $jurisdiction = $this->codes_model->fetch($cond1);

            $ind_type = $value['industry_type'];
            $cond2 = "AND code = '$ind_type' AND category_type = 'Industry Type'";
            $industry_type1 = $this->codes_model->fetch($cond2);

            $jobs = $value['full_part_time'];
            $cond3 = "AND code = '$jobs' AND category_type = 'Job Type'";
            $all_job_type = $this->codes_model->fetch($cond3);

            $row_2[$key]['attorney_jurisdiction'] = $jurisdiction[0]['short_description'];
            $row_2[$key]['industry_type'] = $industry_type1[0]['short_description'];
            $row_2[$key]['full_part_time'] = $all_job_type[0]['short_description'];
        }
        $this->data['target_attorney'] = $row_2;
        $this->data['code'] = $code;
//       t($this->data['target_attorney']); exit;
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/targets/edit', $this->data);
        }

    }

    function target_id_check() {
        $target_id = $this->input->post('target_id');
        if ($target_id != '') {
            $cond = " and target_id = '" . $target_id . "'";
            $row = $this->targets_model->fetch($cond);
            $this->data['target_id'] = $row;
            $row_1 = count($this->data['target_id']);
            if ($row_1 > 0) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    function is_target_exists() {
        $target_id = $this->input->post('target_id');
        $orig_target_id = $this->input->post('target_id_original');
        if ($target_id != '') {
            if ((!isset($orig_target_id) && $orig_target_id != '') || $target_id == $orig_target_id) {
                echo 'true';
            } else {
                $cond2 = " and target_id = '" . $target_id . "'";
                $res = $this->targets_model->fetch($cond2);
                $this->data['target_id'] = $res;
                $res_1 = count($this->data['target_id']);
                if ($res_1 > 0) {
                    echo 'false';
                } else {
                    echo 'true';
                }
            }
        }
    }

    function link_attorney($code = '') {
//        echo "ok"; exit;
       $code = base64_decode($code);
        $cond = " AND target_seq_no = '" . $code . "'";
        $row = $this->targets_model->fetch($cond);
        $target_seq_no = $row[0]['target_seq_no'];
//        t($row,1);

        $link_attr = $this->input->post('linkAttorneySubmit');

        if (isset($link_attr)) {
//          echo "ok"; die();
//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

//            $sql = "SELECT `target_seq_no` FROM `plma_target`";
//            $res = $this->db->query($sql);
//            $row = $res->result_array();
////            echo $this->db->last_query();
////            t($row[0]['target_seq_no']); exit;
//            $target_seq_no = $row[0]['target_seq_no'];


            $attorney_seq_no = $this->input->post('attorney_seq_no');
            $remarks = $this->input->post('remarks_ag');

            $data_link = array(
                'target_seq_no' => $target_seq_no,
                'ref_attorney_seq_no' => $attorney_seq_no,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//            echo "<pre>"; print_r($data_link); exit;
            $insert_1 = $this->target_attorney_model->add($data_link);

            if ($insert_1) {
                $msg = 'Attorney linked successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets/edit/' . base64_encode($code));
            } else {
                $msg = 'error in linking Target';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets/edit/' . base64_encode($code));
            }
        }
    }

    function edit_attorney_link($code = '') {
//      echo "ok"; die();
        $code = base64_decode($code);

        $cond = " and tgt_attorney_seq_no = '" . $code . "'";
        $row = $this->target_attorney_model->fetch($cond);
//        echo $this->db->last_query(); exit;

        $link_attr = $this->input->post('EditlinkAttorneySubmit');

        if (isset($link_attr)) {
//          echo "ok"; die();
//            $admin_all_session = $this->session->userdata('admin_session');
             $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            $sql = "SELECT `target_seq_no` FROM `plma_target`";
            $res = $this->db->query($sql);
            $row1 = $res->result_array();
            //t($row[0]['firm_seq_no']); exit;
            $target_seq_no = $row1[0]['target_seq_no'];

            $attorney_seq_no = $this->input->post('attorney_seq_no');
            $remarks = $this->input->post('remarks_ag');

            $data_link = array(
                'target_seq_no' => $target_seq_no,
                'ref_attorney_seq_no' => $attorney_seq_no,
                'remarks_notes' => $remarks,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
//            echo "<pre>"; print_r($data_link); exit;
            $edit_1 = $this->target_attorney_model->edit($data_link, $code);
//            echo $this->db->last_query(); exit;

            if ($edit_1) {
                $msg = 'Edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets/edit/' . base64_encode($code));
            } else {
                $msg = 'error in Editing Target';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets/edit/' . base64_encode($code));
            }
        }
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/targets/edit', $this->data);
    }

    function fetch_country($selected = '') {

        $cond = "order by country_id='US' desc";
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
                $opt2 .= '<option value="' . $value['city_seq_no'] . '" selected="selected">' . $value['city_name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['city_seq_no'] . '" >' . $value['city_name'] . '</option>';
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

    function import_file(){
        $admin_id = $this->data['admin_id'];
        if($this->input->is_ajax_request()) {
              $this->load->library('PHPExcel');
              $this->load->library('PHPExcel/IOFactory');

              $fileSize = $_FILES['upload_excel']['size'];
              $fileName = $_FILES['upload_excel']['name'];
              $file_name = isset($fileName) ? $fileName : '';

              if ($file_name != '') {
              $config['upload_path'] = $this->config->item('upload_path') . 'xls_file/';
              $RemoveFileSpace = preg_replace('/\s+/', '', $file_name);
              $expStr = explode('.', $RemoveFileSpace);
              $FileExt = strtolower(end($expStr));
              if ($FileExt == 'xls' || $FileExt == 'xlx' || $FileExt == 'xlsx' && $fileSize > 0) {
                  $temp_file = $expstr[0] . time() . '.' . $FileExt;

                  if (move_uploaded_file($_FILES['upload_excel']['tmp_name'], $config['upload_path'] . $temp_file)) {
                      $excel_file = $config['upload_path'] . $temp_file;

                      $objReader = new PHPExcel_Reader_Excel2007($this->phpexcel);

                      ob_end_clean();

                      $objPHPExcel = $objReader->load($excel_file);
                      foreach ($objPHPExcel->getWorksheetIterator() as $key => $worksheet) {
                        $worksheetTitle = $worksheet->getTitle();
                        $highestRow = $worksheet->getHighestRow(); // e.g. 10
                        $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
                        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
                        $nrColumns = ord($highestColumn) - 64;
                        $exceldata = array();
                        for ($row = 1; $row <= $highestRow; ++$row)
                        {
                            $values = array();
                            for ($col = 0; $col < $highestColumnIndex; ++$col)
                            {
                                $cell = $worksheet->getCellByColumnAndRow($col, $row);
                                $val = $cell->getValue();
                                 if (isset($val) && $val)
                                 $exceldata[$row][$col] = $val;
                            }
                        }
                      }
                      $main_array = $exceldata;
                      $arr =array();
                      try {
                        
                        foreach($main_array as $k=>$v){


                              if($k > 1){
                                    $phone_no1 = trim(preg_replace('/[^A-Za-z0-9]/', '', $v[6]));
                                    $phone_no = substr($phone_no1, -10);
                                    $total_phone_number_with_format = $this->madePhoneformate_for_upload($phone_no);

                                  $arr['firm_seq_no'] = $this->input->post('firm_seq_no');
                                  $arr['company'] = $v[0];
                                  $arr['categories'] = $v[1];
                                  $arr['address'] = $v[2];
                                  $arr['website'] = $v[3];
                                  $contact_person_name = explode(" ",$v[4],2);

                                  $arr['target_first_name'] = $contact_person_name[0];
                                  $arr['target_last_name'] = $contact_person_name[1];
                                  $arr['job_role'] = $v[5];
                                  $arr['phone'] = $total_phone_number_with_format;
                                  $arr['email'] = $v[7];
                                  $arr['type'] = 'C';
                                  $arr['industry_type_seq_no'] = $this->input->post('industry_type_seq_no');
                                  $arr['created_by'] = $admin_id;
                                  $arr['created_date'] = time();
                                  $arr['status'] = '1';
                                  $insertid2 = $this->super_master_model->add($arr);

                              }
                          }
                      }
                      catch (Exception $e) {
                        echo json_encode(array('status'=>'0','msg'=>'Not uploaded. Try Again.'));
                      }
                      echo json_encode(array('status'=>'1','msg'=>'Uploaded successfully'));
                  }
                }
              }
            }
    }

    function madePhoneformate_for_upload($mobile_no){
        $mobile_no = preg_replace('/[^A-Za-z0-9]/', '', $mobile_no);

        $mobile_no1 = substr($mobile_no, 0, 4);
        if ($mobile_no1) {
           $mobile_no1 = $mobile_no1 ;
        }
        $mobile_no2 = substr($mobile_no, 4, 10);
        if ($mobile_no2) {
           $mobile_no2 = $mobile_no2;
        }

        $new_mobile_no = '+44'.'(0)'.$mobile_no1.' '.$mobile_no2;

        return $new_mobile_no;
    }


    //new implement function import contacts by sobhan 22-03-17
    function contacts_import(){
        $admin_id = $this->data['admin_id'];

        $cond = "AND user_seq_no=$admin_id";
        $fetch_company_details = $this->app_users_model->fetch($cond);
        $fetch_company_id = $fetch_company_details[0]['firm_seq_no'];
//        t($fetch_company_details);die();

        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');

        $filetype = $this->input->post('filetype');

        $csv = $filetype . 'excel';
        $vcardfile = $_FILES[$csv]['name'];
        $fileName = isset($_FILES[$csv]['name']) ? $_FILES[$csv]['name'] : '';
//echo $fileName;
//exit;
       // if ($fileName != '') {
//            $fileName = "A_iPhone Names for Testing_All Mapped 10 WhiteWater.xlsx";
            $config['upload_path'] = $this->config->item('upload_path');
//            $config['upload_path'] = $this->config->item('upload_path') . 'contacts_clean_sheet/';

            $RemoveFileSpace = preg_replace('/\s+/', '', $fileName);
            $expStr = explode('.', $RemoveFileSpace);
            $FileExt = strtolower(end($expStr));
//echo $FileExt;die();
            //if ($FileExt == 'xlsx' || $FileExt == 'xlx' || $FileExt == 'xls') {
                //$NewFileName = $expStr[0] . time() . '.' . $FileExt;
//                echo $NewFileName;die();
                //if (move_uploaded_file($_FILES[$csv]['tmp_name'], $config['upload_path'] . $NewFileName)) {
                    // read the text file
                    $excelFile = $config['upload_path'] . "SME's Database for ZYPHA (2).xlsx";
//                    echo $excelFile;die();
                    $objReader = new PHPExcel_Reader_Excel2007($this->phpexcel);
//                     $inputFileType = PHPExcel_IOFactory::identify($excelFile);
//                     $objReader = PHPExcel_IOFactory::createReader($inputFileType);
//                     $objReader = new PHPExcel_Reader_Excel5($this->phpexcel);
//                     $objReader = PHPExcel_IOFactory::load($excelFile);
                    ob_end_clean();
                    $objPHPExcel = $objReader->load($excelFile);
                    //Itrating through all the sheets in the excel workbook and storing the array data
                    foreach ($objPHPExcel->getWorksheetIterator() as $key => $worksheet) {
                        $main_array[] = $worksheet->toArray(NULL, TRUE, TRUE);
                        //$main_array2 = $worksheet->toArray(NULL, TRUE, TRUE);
                       // $main_array = $this->removeEmptyCell($main_array);
//                        $arrayData[$worksheet->getTitle()] = $main_array;
                    }
//                    t($main_array[0]);
//                    die();


                    foreach($main_array[0] as $k=>$v){
                        if($k > 0){
//                            $clean_mobile_no = $this->clean_iphone($v[4]);
                            $clean_phone_no = $this->clean_iphone($v[3]);

                            $result = $this->clean_iphone_name($v[4]);

                            $arr[$k]['target_first_name'] = $result['fname'];
                            $arr[$k]['target_last_name'] = $result['lname'];
//                            $arr[$k]['mobile'] = $clean_mobile_no;
                            $arr[$k]['company'] = $v[0];
                            $arr[$k]['address'] = $v[1];
//                            $arr[$k]['categories'] = $v[7];
                            $arr[$k]['email'] = $v[6];
                            $arr[$k]['website'] = $v[7];
                            $arr[$k]['phone'] = $clean_phone_no;
                            $arr[$k]['firm_seq_no'] = $admin_id;
                            $arr[$k]['company_id'] = $fetch_company_id;
                        }
                    }
//                    t($arr);die();
                    foreach($arr as $key=>$value){
//                        t($value);
                        $add = $this->targets_model->add($value);
                    }
//                    die();
                    if($add){
                        echo "Upload successfully";
                    }else{
                        echo "Upload failed";
                    }
                //}
            //}
   // }

}
    function clean_iphone($val){

        $val2 = trim($this->removeEmoji($val));
        $val2 = @iconv("UTF-8", "UTF-8//IGNORE", $val2 ); // allow all type of charecters
       // $val2 = str_replace(' ', '', $val2);
        $string = str_replace("'", "", $val2);
        //$string = trim($string," ");
        $string = str_replace(' ','',$string);
        $string = str_replace(array("(",")","+","-"), array("","","",""), $string);
        $string_first = substr($string,-10);
//        if($string_first!='44' || $string_first!='+4'){
//         $string = '+44'.substr($string,2);
//        }
        if(!empty($string_first)){
            return '+44'.$string_first;
        }else{
            return '';
        }

    }
    function clean_iphone_name($res){
        $output = explode(" ",$res);
        return array('fname'=>$output[0],'lname'=>$output[1]);
    }

    function removeEmoji($text) {

        $clean_text = "";

        // Match Emoticons
        $regexEmoticons = '/[\x{1F600}-\x{1F64F}]/u';
        $clean_text = preg_replace($regexEmoticons, '', $text);

        $clean_text = preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $clean_text);

        // Match Miscellaneous Symbols and Pictographs
        $regexSymbols = '/[\x{1F300}-\x{1F5FF}]/u';
        $clean_text = preg_replace($regexSymbols, '', $clean_text);

        // Match Miscellaneous Symbols and Pictographs
        $regexSymbols = '/[\x{F3BE}-\x{1F5FF}]/u';
        $clean_text = preg_replace($regexSymbols, '', $clean_text);

        // Match Transport And Map Symbols
        $regexTransport = '/[\x{1F680}-\x{1F6FF}]/u';
        $clean_text = preg_replace($regexTransport, '', $clean_text);

        // Match Miscellaneous Symbols
        $regexMisc = '/[\x{2600}-\x{26FF}]/u';
        $clean_text = preg_replace($regexMisc, '', $clean_text);

        // Match Dingbats
        $regexDingbats = '/[\x{2700}-\x{27BF}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        // Match flags (iOS)
        $regexTransport = '/[\x{1F1E0}-\x{1F1FF}]/u';
        $clean_text = preg_replace($regexTransport, '', $clean_text);

        return $clean_text;
    }
    //end

     function add_contact($a = '', $b = ''){

        $this->data['target'] = $a;
         $this->data['firm'] = $b;

         $b= base64_decode($a);
         $cond1 = "AND target_seq_no='$b'";
         $c = $this->targets_model->fetch($cond1);
         //echo $this->db->last_query();  exit();
         $this->data['cli_name'] =$c;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/targets/contact', $this->data);
    }
    
    function send_module2_from_call () {
        
        $target_seq_no = base64_decode($this->input->post('target_seq_no'));
        $firm_seq_no = base64_decode($this->input->post('firm_seq_no'));
        $target_first_name = $this->input->post('target_first_name');
        $target_last_name = $this->input->Post('target_last_name');
        $email_target_id = $this->input->post('email_target_id');

        $country_code1 = $this->input->post('country_code1');
        $home_phone = $this->input->post('home_phone');
        $phone_number = $country_code1.$home_phone;

        $mobile = $this->input->post('mobile');
        $address1 = $this->input->post('address1');
        $target_company_name = $this->input->post('target_company_name');
        $industry_type = $this->input->post('industry_type');
        $date_contacted = $this->input->post('date_contacted');
        $individual = $this->input->post('individual');
        $corporate = $this->input->post('corporate');
        
        $data_field = array(
            'admin_id' => $this->data['admin_id'],
            'target_seq_no' => $target_seq_no,
            'company_id' => $firm_seq_no,
            'firm_seq_no' => $firm_seq_no,
            'first_name' =>  $target_first_name,
            'last_name' => $target_last_name,
            'email' => $email_target_id,
            'phione' => $phone_number,
            'mobile' => $mobile,
            'address' => $address1,
            'company_name' => $target_company_name,
            'categories' => $industry_type,
            'date_contacted' => $date_contacted,
            'status' => 1,
            'added_date' => time(),
            'modified_date' => time(),
            'type' => $corporate ? $corporate : $individual
        );
//           t($data_field);die();

        $this->load->model('module2');
        $add_module2 = $this->module2->add($data_field);
        if($add_module2){
            $data = array(
                'status' => "Inactive",
                'type' => $corporate ? $corporate : $individual
            );
            $edit = $this->targets_model->edit($data,$target_seq_no);
//                echo "1";
        }
        
    }
            
    function send_module2_from_sms () {
        $target_seq_no = base64_decode($this->input->post('target_seq_no'));
        $firm_seq_no = base64_decode($this->input->post('firm_seq_no'));
        $target_first_name = $this->input->post('target_first_name');
        $target_last_name = $this->input->Post('target_last_name');
        $email_target_id = $this->input->post('email_target_id');

        $country_code1 = $this->input->post('country_code1');
        $home_phone = $this->input->post('home_phone');
        $phone_number = $country_code1.$home_phone;

        $mobile = $this->input->post('mobile');
        $address1 = $this->input->post('address1');
        $target_company_name = $this->input->post('target_company_name');
        $industry_type = $this->input->post('industry_type');
        $date_contacted = $this->input->post('date_contacted');
        $individual = $this->input->post('individual');
        $corporate = $this->input->post('corporate');
        
        $data_field = array(
            'admin_id' => $this->data['admin_id'],
            'target_seq_no' => $target_seq_no,
            'company_id' => $firm_seq_no,
            'firm_seq_no' => $firm_seq_no,
            'first_name' =>  $target_first_name,
            'last_name' => $target_last_name,
            'email' => $email_target_id,
            'phione' => $phone_number,
            'mobile' => $mobile,
            'address' => $address1,
            'company_name' => $target_company_name,
            'categories' => $industry_type,
            'date_contacted' => $date_contacted,
            'status' => 1,
            'added_date' => time(),
            'modified_date' => time(),
            'type' => $corporate ? $corporate : $individual
        );
//           t($data_field);die();

        $this->load->model('module2');
        $add_module2 = $this->module2->add($data_field);
        if($add_module2){
            $data = array(
                'status' => "Inactive",
                'type' => $corporate ? $corporate : $individual
            );
            $edit = $this->targets_model->edit($data,$target_seq_no);
//                echo "1";
         }
        
    }

    function add_notes() {
        $newnotes = $this->input->post('newnotes');
        $target_seq_no = base64_decode($this->input->post('target_seq_no'));
        $firm_seq_no = base64_decode($this->input->post('firm_seq_no'));
        $target_first_name = $this->input->post('target_first_name');
        $target_last_name = $this->input->Post('target_last_name');
        $email_target_id = $this->input->post('email_target_id');

        $country_code1 = $this->input->post('country_code1');
        $home_phone = $this->input->post('home_phone');
        $phone_number = $country_code1.$home_phone;

        $mobile = $this->input->post('mobile');
        $address1 = $this->input->post('address1');
        $target_company_name = $this->input->post('target_company_name');
        $industry_type = $this->input->post('industry_type');
        $date_contacted = $this->input->post('date_contacted');
        $individual = $this->input->post('individual');
        $corporate = $this->input->post('corporate');

        if($newnotes && $target_seq_no){
            $note_data=array('target_seq_no'=>$target_seq_no,'admin_id'=>$this->data['admin_id'],'content'=>$newnotes,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module1');
            $note_insert=$this->db->insert('plma_all_notes',$note_data);
            if($note_insert) {
                $data_field = array(
               'admin_id' => $this->data['admin_id'],
               'target_seq_no' => $target_seq_no,
               'company_id' => $firm_seq_no,
               'firm_seq_no' => $firm_seq_no,
               'first_name' =>  $target_first_name,
               'last_name' => $target_last_name,
               'email' => $email_target_id,
               'phione' => $phone_number,
               'mobile' => $mobile,
               'address' => $address1,
               'company_name' => $target_company_name,
               'categories' => $industry_type,
               'date_contacted' => $date_contacted,
               'status' => 1,
               'added_date' => time(),
               'modified_date' => time(),
               'type' => $corporate ? $corporate : $individual
           );
//           t($data_field);die();

               $this->load->model('module2');
               $add_module2 = $this->module2->add($data_field);
               if($add_module2){
                   $data = array(
                       'status' => "Inactive",
                       'type' => $corporate ? $corporate : $individual
                   );
                   $edit = $this->targets_model->edit($data,$target_seq_no);
                   echo "1";
                }
            }
            else {
                echo "0";
            }
        }
    }

    function add_do_not_call() {
        $do_not_call = $this->input->post('do_not_call');
        $target_seq_no = base64_decode($this->input->post('target_seq_no'));
        $firm_seq_no = base64_decode($this->input->post('firm_seq_no'));
        $note_data=array('target_seq_no'=>$target_seq_no,'admin_id'=>$this->data['admin_id'],'content'=>$do_not_call,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module1');
        $note_insert=$this->db->insert('plma_all_notes',$note_data);
        if($note_insert) {
            $update_array = array(
                'status' => 3
            );
            $update_id = $this->targets_model->edit($update_array, $target_seq_no);
            if($update_id) {
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

    function add_contacts() {
        $target_seq_no = base64_decode($this->input->post('target_seq_no'));
        $firm_seq_no = base64_decode($this->input->post('firm_seq_no'));
        $target_first_name = $this->input->post('target_first_name');
        $target_last_name = $this->input->Post('target_last_name');
        $email_target_id = $this->input->post('email_target_id');

        $country_code1 = $this->input->post('country_code1');
        $home_phone = $this->input->post('home_phone');
        $home_phone1 = $country_code1 . $home_phone;

        $mobile = $this->input->post('mobile');
        $address1 = $this->input->post('address1');
        $target_company_name = $this->input->post('target_company_name');
        $industry_type = $this->input->post('industry_type');
        $date_contacted = $this->input->post('date_contacted');
        $individual = $this->input->post('individual');
        $corporate = $this->input->post('corporate');
        $contact_first_name = $this->input->post('contact_first_name');
        $contact_last_name = $this->input->post('contact_last_name');
        $contact_email = $this->input->post('contact_email');

        $contact_phone = $this->input->post('contact_phone');
        $add_contact_phone_country_code = $this->input->post('add_contact_phone_country_code');
        $contact_phone1 = $add_contact_phone_country_code . $contact_phone;

        $contact_designation = $this->input->post('contact_designation');
        $contact_primary = $this->input->post('contact_primary');


        $data_field = array(
               'admin_id' => $this->data['admin_id'],
               'target_seq_no' => $target_seq_no,
               'company_id' => $firm_seq_no,
               'firm_seq_no' => $firm_seq_no,
               'first_name' =>  $target_first_name,
               'last_name' => $target_last_name,
               'email' => $email_target_id,
               'phione' => $home_phone1,
               'mobile' => $mobile,
               'address' => $address1,
               'company_name' => $target_company_name,
               'categories' => $industry_type,
               'date_contacted' => $date_contacted,
               'status' => 1,
               'added_date' => time(),
               'modified_date' => time(),
               'type' => $corporate ? $corporate : $individual
           );

       $this->load->model('module2');
       $add_module2 = $this->module2->add($data_field);
       if($add_module2) {
            $contact_data_array = array(
                'firm_seq_no' => $firm_seq_no,
                'target_seq_no' => $target_seq_no,
                'first_name' => $contact_first_name,
                'last_name' => $contact_last_name,
                'designation' => $contact_designation,
                'phone' => $contact_phone1,
                'email' => $contact_email,
                'created_by' => $this->data['admin_id'],
                'created_date' => time(),
                'is_primary_contact' => $contact_primary
            );
            $insert_contact_data = $this->target_contact_model->add($contact_data_array);
            if($insert_contact_data) {
                $update_array = array(
                    'status' => 'Inactive'
                );
                $update_id = $this->targets_model->edit($update_array, $target_seq_no);
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


    function add_next_call() {
        $target_seq_no = base64_decode($this->input->post('target_seq_no'));
        $firm_seq_no = base64_decode($this->input->post('firm_seq_no'));
        $target_first_name = $this->input->post('target_first_name');
        $target_last_name = $this->input->Post('target_last_name');
        $email_target_id = $this->input->post('email_target_id');
        $country_code1 = $this->input->post('country_code1');
        $home_phone = $this->input->post('home_phone');
        $mobile = $this->input->post('mobile');
        $address1 = $this->input->post('address1');
        $target_company_name = $this->input->post('target_company_name');
        $industry_type = $this->input->post('industry_type');
        $date_contacted = $this->input->post('date_contacted');
        $individual = $this->input->post('individual');
        $corporate = $this->input->post('corporate');
        $next_call_date = $this->input->post('next_call_date');
        $next_call_time = $this->input->post('next_call_time');
        $next_call_date_notes = $this->input->post('next_call_date_notes');

        $admin_all_session = $this->session->userdata('admin_session_data');
        $data_field = array(
               'admin_id' => $this->data['admin_id'],
               'target_seq_no' => $target_seq_no,
               'company_id' => $admin_all_session['firm_seq_no'],
               'firm_seq_no' => $admin_all_session['firm_seq_no'],
               'first_name' =>  $target_first_name,
               'last_name' => $target_last_name,
               'email' => $email_target_id,
               'phione' => $country_code1.$home_phone,
               'mobile' => $mobile,
               'address' => $address1,
               'company_name' => $target_company_name,
               'categories' => $industry_type,
               'date_contacted' => $date_contacted,
               'status' => 1,
               'added_date' => time(),
               'modified_date' => time(),
               'type' => $corporate ? $corporate : $individual,
               'next_call_date' => $next_call_date,
               'next_call_time' => $next_call_time

           );


       $this->load->model('module2');
       $add_module2 = $this->module2->add($data_field);
       if($add_module2) {
            $note_data=array('target_seq_no'=>$target_seq_no,'admin_id'=>$this->data['admin_id'],'content'=>$next_call_date_notes,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module1');
            $note_insert=$this->db->insert('plma_all_notes',$note_data);
            if($note_insert) {
                $update_array = array(
                    'status' => 'Inactive'
                );
                $update_id = $this->targets_model->edit($update_array, $target_seq_no);
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

    function add_appointment() {
          $target_seq_no = base64_decode($this->input->post('target_seq_no'));
          $firm_seq_no = base64_decode($this->input->post('firm_seq_no'));
          $target_first_name = $this->input->post('target_first_name');
          $target_last_name = $this->input->post('target_last_name');
          $email_target_id = $this->input->post('email_target_id');
          $country_code1 = $this->input->post('country_code1');
          $home_phone = $this->input->post('home_phone');
          $mobile = $this->input->post('mobile');
          $address1 = $this->input->post('address1');
          $target_company_name = $this->input->post('target_company_name');
          $industry_type = $this->input->post('industry_type');
          $date_contacted = $this->input->post('date_contacted');
          $individual = $this->input->post('individual');
          $corporate = $this->input->post('corporate');
          $from_appt_date = $this->input->post('to_appt_date');
          $from_appt_time = $this->input->post('from_appt_time');
          $to_appt_time = $this->input->post('to_appt_time');
          $to_appt_date = $this->input->post('to_appt_date');
          $apptmnt_users = $this->input->post('apptmnt_users');
          $venu = $this->input->post('venu');
          $appointment_notes = $this->input->post('appointment_notes');

          $this->db->select('*')->from('plma_appointment_user')->where('appt_seq_no',$apptmnt_users);
          $appt_user_details = $this->db->get()->result_array();

          $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'sitemail.isqweb.it',
                    'mailpath'  => "/usr/bin/sendmail",
                    'smtp_port' => 587,
                    'smtp_user' => 'digital1crm@isqweb.com',
                    'smtp_pass' => 'grT54rDDy6k',
                    'mailtype'  => 'html', 
                    'charset'   => 'iso-8859-1'
                );

   
                
                $this->load->library('email',$config);                
                
                $this->email->from('digital1crm@isqweb.com', 'Digital1CRM');
                $this->email->to($appt_user_details[0]['email']);
                $this->email->subject("Appointment Details");
                $this->email->message($appointment_notes);
                $this->email->set_newline("\r\n"); 
                
                
                $send = $this->email->send();
                

          $admin_all_session = $this->session->userdata('admin_session_data');
          $data_field = array(
             'admin_id' => $admin_all_session['admin_id'],
             'target_seq_no' => $target_seq_no,
             'firm_seq_no' => $admin_all_session['firm_seq_no'],
             'first_name' =>  $target_first_name,
             'last_name' => $target_last_name,
             'email' => $email_target_id,
             'phione' => $country_code1.$home_phone,
             'mobile' => $mobile,
             'address' => $address1,
             'company_name' => $target_company_name,
             'categories' => $industry_type,
             'date_contacted' => $date_contacted,
             'status' => 'Active',
             'added_date' => time(),
             'modified_date' => time(),
             'appointment_date' => $from_appt_date,
             'appointment_time' => $from_appt_time,
             'appointment_time1' => $to_appt_time,
             'appointment_date1' => $to_appt_date,
             'appt_seq_no' => $apptmnt_users,
             'appointment_venu' => $venu,
             'appointment_user' => $apptmnt_users
         );
          $appointment_module = $this->db->insert('plma_appointment_details',$data_field);
          if($appointment_module) {
            $note_data=array('target_seq_no'=>$target_seq_no,'admin_id'=>$admin_all_session['admin_id'],'content'=>$appointment_notes,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module1');
            $note_insert=$this->db->insert('plma_all_notes',$note_data);
            if($note_insert) {
                $update_array = array(
                    'status' => 'Inactive'
                );
                $update_id = $this->targets_model->edit($update_array, $target_seq_no);
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

    function add_new_contact() {
      $admin_id = $this->data['admin_id'];
      $cond = " and user_seq_no = '" . $admin_id . "'";
      $fetch_details = $this->attorney_model->fetch($cond);

      $attr_id = $fetch_details[0]['attorney_seq_no'];
      $contact_fetch = $this->db->select('list_id')->from('plma_assign_list_to_call_user')->where('user_seq_no',$attr_id);
      $row = $this->db->get()->result_array();

      $new_contact_first_name = $this->input->post('new_contact_first_name');
      $new_contact_last_name = $this->input->post('new_contact_last_name');
      $new_contact_email = $this->input->post('new_contact_email');

      $new_contact_phone = $this->input->post('new_contact_phone');
      $new_contact_phone_country_code = $this->input->post('new_contact_phone_country_code');
      $phone_number = $new_contact_phone_country_code . $new_contact_phone;

      $new_contact_mobile = $this->input->post('new_contact_mobile');
      $new_contact_address = $this->input->post('new_contact_address');
      $new_contact_company = $this->input->post('new_contact_company');
      $new_contact_category = $this->input->post('new_contact_category');
      $new_contact_date = $this->input->post('new_contact_date');
      $new_contact_type = $this->input->post('new_contact_type');
      $target_image_name = '';
      if(isset($_FILES['new_contact_image'])) {
          $config['upload_path']          = './assets/upload/';
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 10000;
          $config['max_width']            = 1024;
          $config['max_height']           = 768;
          $config['encrypt_name']         = TRUE;
          $this->load->library('upload', $config);
          if ($this->upload->do_upload('new_contact_image'))
          {
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);
            $target_image_name = $data['upload_data']['file_name'];

          }
          else {
            //$error = array('error' => $this->upload->display_errors());
            //print_r($error);
            $target_image_name = '';
          }

      }
      $admin_all_session = $this->session->userdata('admin_session_data');
      $data_field = array(
         'list_id' => $row[0]['list_id'],
         'firm_seq_no' => $admin_all_session['firm_seq_no'],
         'target_first_name' => $new_contact_first_name,
         'company_id' => $admin_all_session['firm_seq_no'],
         'target_last_name' =>  $new_contact_last_name,
         'email' => $new_contact_email,
         'phone' => $phone_number,
         'mobile' => $new_contact_mobile,
         'address' => $new_contact_address,
         'company' => $new_contact_company,
         'categories' => $new_contact_category,
         'type' => $new_contact_type,
         'status' => 1,
         'created_by' => $admin_all_session['admin_id'],
         'created_date' => time(),
         'target_image' => $target_image_name
         );

       if(!empty($new_contact_first_name))
       {

         $last_target_id = $this->db->insert('plma_target',$data_field);
       }

       if($last_target_id) {
         echo "1";
       }
       else {
         echo "0";
       }
    }

     function insert_con(){

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        if ($_POST['client_first_name']) {

            $client= $this->input->post('client');
            $firm = $this->input->post('firm');
            $client= base64_decode($client);
            $firm= base64_decode($firm);
            $client_first_name = $this->input->post('client_first_name');
            $client_last_name = $this->input->post('client_last_name');
            $designation = $this->input->post('designation');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $phone = $this->removePhoneMask($phone);

            $fax = $this->input->post('fax');
            $fax = $this->removePhoneMask($fax);

            $social_url = $this->input->post('social_url');

            $twit = $this->input->post('twit');
            $g = $this->input->post('goog');
            $link = $this->input->post('link');
            $yout = $this->input->post('yout');
            $im = $this->input->post('im');

            $data1 = array(
                'first_name' => $client_first_name,
                'last_name' => $client_last_name,
                'designation' => $designation,
                'firm_seq_no' => $firm,
                'target_seq_no' => $client,
                'email' => $email,
                'phone' => $phone,
                'fax' => $fax,
                'facebook' => $social_url,
                'twitter' => $twit,
                'linkedin' => $link,
                'youtube' => $yout,
                'google_plus' => $g,
                'im' => $im,
                'created_date' => time()
            );

             //t($data1,1);

            $insertid = $this->target_contact_model->add($data1);

           if ($insertid) {
                $msg = 'Target contact added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets');
            } else {
                $msg = 'Error in adding contact';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets');
            }


        }


    }

      function view_contact($a = '', $b = '')
    {
        $target = base64_decode($a);
        $firm = base64_decode($b);

         $cond1 = "AND target_seq_no=$target AND firm_seq_no=$firm";
            $target_con = $this->target_contact_model->fetch($cond1);
            $this->data['all_contact'] =$target_con;

             $cond= "AND target_seq_no=$target";
            $c= $this->targets_model->fetch($cond);
            $this->data['name'] =$c;


             $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/targets/client_contact_list', $this->data);

    }


    function add_cont(){

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        if ($role_code == 'FIRMADM' || $role_code == 'ATTR') {
            ////////////////fetch firm seq no///////////////////
            $sql = "select pfirm.firm_seq_no from plma_firm pfirm where pfirm.firm_admin_seq_no=$admin_id";
            $res = $this->db->query($sql);
            //echo $this->db->last_query();
            $row = $res->result_array();
            $firm_seq_no = $row[0]['firm_seq_no'];

        }

         $this->data['firm'] = $firm_seq_no;

        $cond1 = "AND firm_seq_no='$firm_seq_no' AND type='O'";
            $client = $this->targets_model->fetch($cond1);
           // echo $this->db->last_query(); exit;
            $this->data['all_client'] =$client;
       //t($this->data['all_client'],1);



        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/targets/morec_con', $this->data);
    }

    function insert_cont(){

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        if ($_POST['client_first_name']) {

            $client= $this->input->post('client');
            $firm = $this->input->post('firm');
            //$client= base64_decode($client);
            //$firm= base64_decode($firm);
            $client_first_name = $this->input->post('client_first_name');
            $client_last_name = $this->input->post('client_last_name');
            $designation = $this->input->post('designation');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $phone = $this->removePhoneMask($phone);

            $fax = $this->input->post('fax');
            $fax = $this->removePhoneMask($fax);

            $social_url = $this->input->post('social_url');

            $twit = $this->input->post('twit');
            $g = $this->input->post('goog');
            $link = $this->input->post('link');
            $yout = $this->input->post('yout');
            $im = $this->input->post('im');

            $data1 = array(
                'first_name' => $client_first_name,
                'last_name' => $client_last_name,
                'designation' => $designation,
                'firm_seq_no' => $firm,
                'target_seq_no' => $client,
                'email' => $email,
                'phone' => $phone,
                'fax' => $fax,
                'facebook' => $social_url,
                'twitter' => $twit,
                'linkedin' => $link,
                'youtube' => $yout,
                'google_plus' => $g,
                'im' => $im,
                'created_date' => time()
            );

             //t($data1,1);

            $insertid = $this->target_contact_model->add($data1);

           if ($insertid) {
                $msg = 'Target contact added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets');
            } else {
                $msg = 'Error in adding contact';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'targets');
            }


        }


    }

    function con_view($a= ''){

            $client = base64_decode($a);
            $cond1 = "AND contact_seq_no=$client";
            $client_con = $this->target_contact_model->fetch($cond1);
            $this->data['all_contact'] =$client_con;
            //t($this->data['all_contact'],1);

            $n=  $this->data['all_contact'][0]['target_seq_no'];
            $cond1 = "AND target_seq_no=$n";
            $b = $this->targets_model->fetch($cond1);
            $this->data['c'] =$b;
            //t($this->data['c'],1);
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/targets/single_contact', $this->data);
      }

    function con_edit($code = '') {

        $code = base64_decode($code);
        $submit = $this->input->post('add_new_cli_contact_btn');

        if (isset($submit)) {

            $client= $this->input->post('client');
            $firm = $this->input->post('firm');
            $client_first_name = $this->input->post('client_first_name');
            $client_last_name = $this->input->post('client_last_name');
            $designation = $this->input->post('designation');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $phone = $this->removePhoneMask($phone);

            $fax = $this->input->post('fax');
            $fax = $this->removePhoneMask($fax);

            $social_url = $this->input->post('social_url');

            $twit = $this->input->post('twit');
            $g = $this->input->post('goog');
            $link = $this->input->post('link');
            $yout = $this->input->post('yout');
            $im = $this->input->post('im');

            $data1 = array(
                'first_name' => $client_first_name,
                'last_name' => $client_last_name,
                'designation' => $designation,
                'firm_seq_no' => $firm,
                'target_seq_no' => $client,
                'email' => $email,
                'phone' => $phone,
                'fax' => $fax,
                'facebook' => $social_url,
                'twitter' => $twit,
                'linkedin' => $link,
                'youtube' => $yout,
                'google_plus' => $g,
                'im' => $im,
                'updated_date' => time()
            );


            $insertid = $this->target_contact_model->edit($data1, $code);

            if ($insertid) {
                $msg = 'Contact updated successfully.';
                $this->session->set_flashdata('suc_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'targets/con_edit/'.base64_encode($code));
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('err_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliure!</strong> ' . $msg . ' </div>');
               redirect($base_url . 'targets/con_edit/'.base64_encode($code));
            }
        } else {

            $cond1 = "AND contact_seq_no=$code";
            //echo $cond1; die();
            $client_con = $this->target_contact_model->fetch($cond1);
            $this->data['all_contact'] =$client_con;
            //t($this->data['all_contact'],1);
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/targets/edit_contact', $this->data);

        }
    }


    //for sending email
    function editorupload(){

        $profile_upload_to = $_SERVER['DOCUMENT_ROOT'] . '/digital1crm/assets/upload/image/';
        $abc = time() . '_' . rand(0,9999999).".png";
        $pic_name = $profile_upload_to . $abc;
        $r = explode(',',$_POST['img']);
        $data = base64_decode($r[1]);
             //echo $data;die();
        file_put_contents($pic_name, $data);
        echo base_url().'assets/upload/image/'.$abc;
    }

    function temp_email($id= '', $company_id= ' ' ){
       
       $admin_id = $this->data['admin_id'];
       $firm_seq_no = $this->data['firm_seq_no'];
       //echo $admin_id.'##'.$firm_seq_no;die();
       //
       $cond = "AND created_by=$firm_seq_no";
       $user_login_template = $this->emailtemplate_model->fetch($cond);
       $this->data['user_login_template'] = $user_login_template;
       $this->data['aid'] = $admin_id;
       //print_r($user_login_template);die();

       $contact_id = base64_decode($id);
       $company_id = base64_decode($company_id);

       $cond = " AND target_seq_no=$contact_id";
       $this->data['fetch_details']=$this->targets_model->fetch($cond);
       
       
       $this->data['contact_id'] = $contact_id;
       $this->data['firm_seq_no'] = $this->data['fetch_details'][0]['firm_seq_no'];
       
       $this->db->select('*')->from('plma_document')->where(' firm_seq_no="'.$firm_seq_no.'"');
       $this->data['document'] = $this->db->get()->result_array();
       
           
       $this->get_include();
       $this->load->view($this->view_dir . 'operation_master/targets/send_message2', $this->data);
    }
    function email_content()
    {
        $admin_id = $this->data['admin_id'];
        /*$temp_id=$this->input->post("temp_id");
            $this->db->select('*')->from('plma_template')->where('id="'.$template_id.'"');
        $template_details = $this->db->get();
        echo json_encode($template_details->result_array());*/


        $cond = "AND created_by=$admin_id";
        $template_content=$this->emailtemplate_model->fetch($cond);
        //$this->data['template_content'] = $template_content;
        echo json_encode($template_content[0]['content']);
         
    }
    function get_email_template()
    {
        $firm_seq_no=$this->data['firm_seq_no'];
        $this->db->select('*')->from('plma_signature')->where('firm_seq_no="'.$firm_seq_no.'"');
        $template_details = $this->db->get();
        echo json_encode($template_details->result_array());
    }
    function generate_pdf() {

     $this->load->helper('pdf');
     $template_id = base64_decode($this->uri->segment(3));
     $target_seq_no = base64_decode($this->uri->segment(4));
      echo $template_id.'#'.$target_seq_no;die();
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

    function temp_sendmail() {
       $admin_session_data = $this->session->userdata('admin_session_data');
       $admin_id = $admin_session_data['admin_id'];
       $firm_seq_no = $admin_session_data['firm_seq_no'];
       $email = $this->input->post('email');
       $subject = $this->input->post('sub');
       $message_text = $this->input->post('msg');
       $attach_array = $this->input->post('attach_array');

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
        $this->load->library('email', $config);
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
        $last_id = $this->db->query( 'CALL UpdateModule2(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', array(
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
        ));

        if($last_id) {
            echo "1";
        }
        else {
            echo "0";
        }
            
    }


    function abc() {
        $apikey = '2bd4f82040d60a75f763c5cf965f8863-us16';


        $message = array(
            'html'=>'Yo, this is the <b>html</b> portion',
            'text'=>'Yo, this is the *text* portion',
            'subject'=>'This is the subject',
            'from_name'=>'Me!',
            'from_email'=>'sobhan@wrctechnologies.com',
            'to_email'=>'moumita@wrctechnologies.com',
            'to_name'=>'Moumita'
        );

        $tags = array('WelcomeEmail');

        $params = array(
            'apikey'=>$apikey,
            'message'=>$message,
            'track_opens'=>true,
            'track_clicks'=>false,
            'tags'=>$tags
        );

        $ch = curl_init();
        $url = "http://us1.sts.mailchimp.com/1.0/SendEmail";
        
        curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        echo $result;
        $a = curl_close ($ch);
        if ($a === FALSE) {
            die("Curl failed: " . curL_error($ch));
        }
        //var_dump($result);
        $data = json_decode($result);
        t($data);

        echo "Status = ".$data->status."\n";
        echo 1;
            
    }

    /************ santanu_13.04.17  **********/

    function view_details($code = '', $b= '') {
       // echo "aaaaaa"; die();
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $code = base64_decode($code);

        $cond = "AND target_seq_no = '" . $code . "'";
        $row = $this->targets_model->fetch($cond);
        $_SESSION['for_locked'] = '1';
//         t($_SESSION);die();

        $company_id = $row[0]['company_id'];
        $admin_id = $this->data['admin_id'];
        $cond = " AND user_seq_no='$admin_id' AND firm_seq_no='$company_id' AND status=1";
        $fetch_details = $this->user_model->fetch($cond);
        if(!empty($fetch_details)){
            $data = array(
                'id' => $code,
                'admin_id' => $admin_id,
                'company_id' => $company_id
            );
            $this->load->model('temorary_module_lock');
            $add = $this->temorary_module_lock->add($data);
        }

//        echo $this->db->last_query();
//        t($row);exit;

        $this->load->model('Callappointment_Model');
        $cond = " AND firm_seq_no=$company_id";
        $fetch_appointment_details = $this->Callappointment_Model->fetch($cond);
        $this->data['fetch_appointment_details'] = $fetch_appointment_details;


        $this->data['targets1'] = $row[0];
//        t($this->data['targets1']); exit;
        foreach ($row as $key => $value) {
            $gend = $value['target_gender'];
            $cond1 = "AND code = '$gend' AND category_type = 'Gender'";
//           echo $this->db->last_query(); exit;
            $genders = $this->codes_model->fetch($cond1);

            $stat = $value['association_status'];
            $cond2 = "AND code = '$stat' And category_type = 'Target Status'";
            $status = $this->codes_model->fetch($cond2);

            $ind = $value['industry_type'];
            $cond3 = "AND code = '$ind' And category_type = 'Industry Type'";
            $industry_type = $this->codes_model->fetch($cond3);

            $attr = $value['attorney_seq_no'];
            $cond4 = "AND attorney_seq_no = '" . $attr . "'";
            $attorney = $this->attorney_model->fetch($cond4);

            $row[$key]['target_gender'] = $genders[0]['short_description'];
            //$row[$key]['association_status'] = $status[0]['short_description'];
            $row[$key]['industry_type'] = $industry_type[0]['short_description'];
            $row[$key]['attorney_seq_no'] = $attorney[0]['attorney_first_name'] . ' ' . $attorney[0]['attorney_last_name'];

            $home_phone = $value['phone'];
            $original_home_phone = $home_phone;
            $length = strlen($original_home_phone);
            if ($length == 10) {
                $country_code1 = '';
            } else if ($length == 11) {
                $country_code1 = substr($original_home_phone, 0, 1);
            } else if ($length == 12) {
                $country_code1 = substr($original_home_phone, 0, 2);
            } else if ($length == 13) {
                $country_code1 = substr($original_home_phone, 0, 3);
            } else if ($length == 14) {
                $country_code1 = substr($original_home_phone, 0, 4);
            }
            $home_phone_number = substr($original_home_phone, -10);
            $originalhome_phone_number = $this->madePhoneformate_ios_android($original_home_phone);
            $home_no = $this->madePhoneformate($home_phone_number);
            $row[$key]['home_phone'] = $originalhome_phone_number;
            $row[$key]['home_phone_10'] = $home_no;
            $row[$key]['country_code1'] = $country_code1;
        }
        $this->data['targets'] = $row[0];
      
         $this->get_include();
        //t( $this->data); die();
        $this->load->view($this->view_dir . 'operation_master/targets/firmadmin_view', $this->data);
        }
        

/****************   End     **************/
   //end

    /***************** Santanu 19.04.17   ***************************/
    function add_super_master_contact()
    {
        $firm_seq_no =  $this->input->post('firm_seq_no');
        $first_name = $this->input->post('new_contact_first_name');
        $last_name = $this->input->post('new_contact_last_name');
        $email = $this->input->post('new_contact_email');
        $country_code1 = $this->input->post('country_code1');
        $phone = $this->input->post('new_contact_phone');
        $country_code2 = $this->input->post('country_code2');
        $mobile = $this->input->post('new_contact_mobile');
        $address = $this->input->post('new_contact_address');
        $company = $this->input->post('new_contact_company');
        $contact_category = $this->input->post('new_contact_category');
        $contact_date = $this->input->post('new_contact_date');
        $new_contact_type = $this->input->post('new_contact_type');
        //$contact_image = $this->input->post('new_contact_image');

          $config['upload_path']   = './assets/upload/image';
          $config['allowed_types']  = 'gif|jpg|png|jpeg';
          $config['max_size']  = 50000;
          $config['max_width']  = 1024;
          $config['max_height']  = 768;
          $this->load->library('upload', $config);
           if ($this->upload->do_upload('new_contact_image'))
          {
              //echo "aaaaa";
               
                $image_detail  =  $this->upload->data();
                $full_path = $image_detail["full_path"];

                $image_config["image_library"] = "gd2";
                $image_config["source_image"] = $image_detail["full_path"];
                $image_config['create_thumb'] = FALSE;
                $image_config['maintain_ratio'] = FALSE;
                //$image_config['maintain_ratio'] = TRUE;
                $image_config['new_image'] = $image_detail["file_path"] . $data['file_name'];
                $image_config['quality'] = "100%";
                $image_config['width'] = 250;
                $image_config['height'] = 80;
                $dim = (intval($image_detail["image_width"]) / intval($image_detail["image_height"])) - ($image_config['width'] / $image_config['height']);
                $image_config['master_dim'] = ($dim > 0) ? "height" : "width";
                $this->load->library('image_lib');
                $this->image_lib->initialize($image_config);
                $this->image_lib->resize();


                $file_name = $image_detail ["file_name"];
               // echo  $file_name;
        }


        $cond = "AND email = '$email' ";
        $chkData = $this->super_master_model->fetch($cond);
        
         if (count($chkData) > 0) {
            echo 2;
            exit;
        }
        else
        {
                $data = array(
                'firm_seq_no' =>  $firm_seq_no,
                'target_first_name' => $first_name,
                'target_last_name' => $last_name,
                'email' => $email,
                'phone' => $country_code1.$phone,
                'mobile' =>  $country_code2.$mobile,
                'address' => $address,
                'company' => $company,
                'categories' => $contact_category,
                'target_image' =>   $file_name,
                'type' =>  $new_contact_type,
                'created_date' => time(),
                 'updated_date' => time(),
                 'status' => 1,

            );
        //$add = $this->faq_model->add_topic_model('tbl_topic', $data);
         $add = $this->super_master_model->add($data);
         //echo $this->db->last_query();die;
          if ($add) {
                echo 1;
                exit;
            }
        // echo  'aaaa'.$first_name. $last_name.$email;
        }
    }
   /********************* End **********************/

   function edit_super_master_contact()
    {
        $firm_seq_no =  base64_decode($this->input->post('firm_seq_no'));
        $target_seq_no = base64_decode($this->input->post('target_seq_no'));
        $first_name = $this->input->post('target_first_name');
        $last_name = $this->input->post('target_last_name');
        $email = $this->input->post('email_target_id');
        $country_code1 = $this->input->post('country_code1');
        $phone = $this->input->post('home_phone');
        $country_code2 = $this->input->post('country_code2');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address1');
        $company = $this->input->post('target_company_name');
        $contact_category = $this->input->post('industry_type');
        $contact_date = $this->input->post('date_contacted');
        $new_contact_type = $this->input->post('new_contact_type');
        //$contact_image = $this->input->post('new_contact_image');

        $edit_data = array(
            'target_first_name' => $first_name,
            'target_last_name' => $last_name,
            'email' => $email,
            'phone' => $country_code1.$phone,
            'mobile' =>  $country_code2.$mobile,
            'address' => $address,
            'company' => $company,
            'categories' => $contact_category,
            'type' =>  $new_contact_type,
            'created_date' => time(),
             'updated_date' => time(),

        );
        //$add = $this->faq_model->add_topic_model('tbl_topic', $data);
         $edit_details = $this->super_master_model->edit($edit_data,$target_seq_no);
         //echo $this->db->last_query();die;
          if ($edit_details) {
                echo 1;
                exit;
        // echo  'aaaa'.$first_name. $last_name.$email;
        }
    }

    /************************ File Upload ********************/
    function  upload_excel_file()
    {
       // echo "aaaaa"; die();
        $admin_id = $this->data['admin_id'];
        $cond = "AND user_seq_no=$admin_id";
        $fetch_company_details = $this->app_users_model->fetch($cond);
        $fetch_company_id = $fetch_company_details[0]['firm_seq_no'];

         $this->load->library('PHPExcel');
         $this->load->library('PHPExcel/IOFactory');


           $config['upload_path']   = './assets/upload/xls_file';
          $config['allowed_types']  = 'xls|xlsx';
          $config['max_size']  = 1000;
          $config['max_width']  = 10240;
          $config['max_height']  = 7680;
          $this->load->library('upload', $config);
           if ( ! $this->upload->do_upload('upload_excel'))
          {
              //echo "aaaaa";
               $error = array('error' => $this->upload->display_errors());
               print_r($error);
          }
        else {
                $excel_detail  =  $this->upload->data();
               // print_r ($excel_detail);
                $file_name = $excel_detail[file_name];
                 $config['upload_path']   = './assets/upload/xls_file/';
               // echo  $file_name;
                $excelFile = $config['upload_path'] . $file_name;
                //echo  $excelFile; die();
                $objReader = new PHPExcel_Reader_Excel2007($this->phpexcel);
                ob_end_clean();
                $objPHPExcel = $objReader->load($excelFile);
                 foreach ($objPHPExcel->getWorksheetIterator() as $key => $worksheet)
                 {
                      // $main_array[] = $worksheet->toArray(NULL, TRUE, TRUE);
                        $worksheetTitle = $worksheet->getTitle();
                        $highestRow = $worksheet->getHighestRow(); // e.g. 10
                        $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
                        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
                        $nrColumns = ord($highestColumn) - 64;
                        $exceldata = array();
                        for ($row = 1; $row <= $highestRow; ++$row)
                        {
                            $values = array();
                            for ($col = 0; $col < $highestColumnIndex; ++$col)
                            {
                                $cell = $worksheet->getCellByColumnAndRow($col, $row);
                                $val = $cell->getValue();
                                 if (isset($val) && $val)
                                 $exceldata[$row][$col] = $val;
                            }
                        }

                }
                   $main_array = $exceldata;
                   $arr =array();
//                    t($main_array);
                  //t($main_array); die();
                  foreach($main_array as $k=>$v){
                      //echo $k; die();
                        if($k > 1){

                           $firm_name = $v[0];
                          // echo  $firm_name;
                           $cond1 = "AND firm_name = '$firm_name'";
                           $firm_details = $this->firm_model->fetch($cond1);
                           $count1 = count($firm_details);
                          // print_r($firm_details);
                           //echo $firm_details[0]['firm_seq_no']; die();
                            $arr['firm_seq_no'] = $firm_details[0]['firm_seq_no'];
                            $arr['target_first_name'] = $v[1];
                            $arr['target_last_name'] = $v[2];
                            $arr['email'] = $v[3];
                            $arr['phone'] = $v[4];
                            $arr['mobile'] = $v[5];
                            $arr['address'] = $v[6];
                            $arr['company'] = $v[7];
                            $arr['website'] = $v[8];
                            $arr['categories'] = $v[9];
                            $arr['type'] = $v[10];
                            if( $count1> 0){
                           // count($firm_details)> 0{
                            $this->super_master_model->add($arr);
                            if ($add)
                             {
                                      echo 1;
                                     exit;
                               }

                           }
                        }
                    }


        }
}

function populate_postcode() {
  if($this->input->is_ajax_request()) {
    $query = $this->input->get('term');
    $data = json_decode(file_get_contents("http://api.postcodes.io/postcodes/".$query."/autocomplete"));
    $json = [];
    $store_data=[];

    foreach ($data->result as $key => $value) {
      array_push($json, $value);
    }

    for($i=0;$i<count($json);$i++)
    {
       $exp_data=explode(" ",$json[$i]);
       $store_data[0]=$exp_data[0];
    }
    echo json_encode($store_data);
  }
}

function search_by_postcode() {
  if($this->input->is_ajax_request()) {
    $query = $this->input->get('term');
    $this->db->select('')->from('plma_super_master_target');
    $res = $this->db->get()->result_array();
    $json = [];
    $SlNo = 1;
    foreach ($res as $key => $value) {
      $json[] = $SlNo++;
      $json[] = $value['target_first_name'].' '.$value['target_last_name'];
      $json[] = $value['email'];
      $json[] = $value['company'];
      $json[] = $value['phone'];
      $json[] = $value['mobile'];
    }
    echo json_encode($json);
  }
}

function search_data() {
  $search_by_postcode = $this->input->post('search_by_postcode');
  $condition = '';
  $condition1 = '';

  $this->db->select('*')->from('plma_super_master_target');
  if($search_by_postcode) {
    $condition = ' address LIKE "%'.$search_by_postcode.'%"';
    $this->db->where($condition);
  }
  if($this->input->post('search_by_industry_type')) {
    $condition = ' industry_type_seq_no ="'.$this->input->post('search_by_industry_type').'"';
    $this->db->where($condition);
  }
  if($this->input->post('search_by_postcode_group')) {
    $group_array = explode(",",$this->input->post('search_by_postcode_group'));
    $condition1 .= '(';
    for($i=0;$i<count($group_array);$i++) {
      if($i == count($group_array)-1)
      {
        $condition1 .= ' address LIKE "%'.$group_array[$i].'%")';
      }
      else {
        $condition1 .= ' address LIKE "%'.$group_array[$i].'%" OR ';
      }
    }
    $condition = $condition1;
    $this->db->where($condition);
  }
  $this->data['fetch_details_master_contacts'] = $this->db->get()->result_array();
  $this->load->model('PostGroup_model');
  $this->data['postcode_group'] = $this->PostGroup_model->post_group_list();
  $this->load->model('industry_Type_model');
  $this->data['industry_type_list'] = $this->industry_Type_model->list_industry_type();
  $this->get_include();
  $this->load->view($this->view_dir . 'operation_master/targets/siteadm_listing', $this->data);
}

public function upload()
    {
        
        $config['upload_path'] = './assets/upload/attachments';
        $config['allowed_types'] = 'doc|docx|jpg';
        $config['max_size'] = '50000000000';
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file'))
        {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);

        }
        else {
           $upload_data = $this->upload->data(); 
           $file_name = $upload_data['file_name'];
           echo $file_name;
        }
        
    }

    
    public function removeFiles() {
        if ($this->input->post('file_to_remove')) 
        {
            $file_to_remove = $this->input->post('file_to_remove');
            unlink("./assets/upload/attachments" . $file_to_remove);  
        }
    }

    function send_sms()
    {

        $this->load->library('Twilio');
        
        $from = '+441244470576';
        $to = '+447908774990';
        $message = 'This is a test...';

        $response = $this->twilio->sms($from, $to, $message);


        if($response->IsError)
        {
            echo "<pre>";
            print_r($response);
            die();
            echo 'Error: ' . $response->ErrorMessage;
        }  
        else
        {

            echo 'Sent message to ' . $to;
        }
    }

    // move event related contacts to module4 finction //
    function add_to_module4() {
        $admin_all_session = $this->session->userdata('admin_session_data');
        $admin_id = $admin_all_session['admin_id'];
        try {
            $checked_ids = $this->input->post('checked_ids');
            foreach ($checked_ids as $key => $value) {

                $cond = " AND target_seq_no=$value";
                $fetch_contact_details = $this->targets_model->fetch($cond);
                $array_data=array();

                $array_data['target_seq_no']=$fetch_contact_details[0]['target_seq_no'];
                $array_data['admin_id']=$admin_id;
                $array_data['firm_seq_no']=$fetch_contact_details[0]['firm_seq_no'];
                $array_data['target_first_name']=$fetch_contact_details[0]['target_first_name'];
                $array_data['target_last_name']=$fetch_contact_details[0]['target_last_name'];
                $array_data['email_target_id']=$fetch_contact_details[0]['email'];
                $array_data['home_phone']=$fetch_contact_details[0]['phone'];
                $array_data['mobile']=$fetch_contact_details[0]['mobile'];
                $array_data['address1']=$fetch_contact_details[0]['address'];
                $array_data['company_name']=$fetch_contact_details[0]['company'];
                $array_data['categories']=$fetch_contact_details[0]['categories'];
                $array_data['created_date']=time();

                $addtomodule4 = $this->Module4_Model->add($array_data);
                if($addtomodule4){
                    $data = array(
                        'status' => "Inactive"
                    );
                    $edit = $this->targets_model->edit($data,$array_data['target_seq_no']);
               }
            }
               echo "1";
        }

            
        catch (Exception $e) {
            echo "0";
        }
    }

    //end//
}
