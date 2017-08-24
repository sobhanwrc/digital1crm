<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_master extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->data['page'] = 'Dashboard';

        $this->load->model('firm_model');
        $this->load->model('module2');
        $this->load->model('signature_model');
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
        $this->load->model('targets_model');
        $this->load->model('Allnote_Model');
        
        $this->load->model('venue_model');
        $this->load->model('add_contact_model');
        $this->load->model('Change_module_number_module');
        $this->load->model('module_setting_model');
        $this->load->model('send_sms_model');
        $this->load->model('emailtemplate_model');
        

    }

    function index() {
        $company_session = $this->session->userdata('admin_session_data');
        
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $company_id = $company_session['firm_seq_no'];
        
       // echo  $role_code; die();

//        $sql_f = "SELECT `firm_seq_no` FROM `plma_firm` WHERE `firm_admin_seq_no` = '" . $admin_id . "'";
//        $res = $this->db->query($sql_f);
//        $rowf = $res->result_array();
//        $firm_seq_no = $rowf[0]['firm_seq_no'];
////    exit;
//
//        $sql_a = "SELECT `attorney_seq_no` FROM `plma_attorney` WHERE `user_seq_no` = '" . $admin_id . "'";
//        $res_1 = $this->db->query($sql_a);
//        $rowa = $res_1->result_array();
//        $attorney_seq_no = $rowa[0]['attorney_seq_no'];
//t($rowa); exit;

        if ($role_code == 'SITEADM') {
//            $sql = "SELECT 
//        `pfirm`.*, `paddr`.`address_line1`, `paddr`.`address_line2`, `paddr`.`address_line3`, `pcountry`.`country_seq_no`, `pcountry`.`name`,`pstate`.`state_seq_no`, `pstate`.`state_name`, `pcounty`.`county_seq_no`, `pcounty`.`county_name`, `pcity`.`city_seq_no`, `pcity`.`city_name`, `paddr`.`postal_code`, `paddr`.`email`, `paddr`.`phone`, `paddr`.`mobile_cell`, `paddr`.`website_url`, `paddr`.`social_media_url`, `pcodes`.`short_description` 
//        FROM 
//        `plma_client` `pfirm` left join `plma_address` `paddr` on `paddr`.`address_seq_no` = `pfirm`.address_seq_no
//        left join `plma_city` `pcity` on `pcity`.`city_seq_no` = `paddr`.`city`
//        left join `plma_country` `pcountry` on `pcountry`.`country_seq_no` = `paddr`.`country`
//        left join `plma_county` `pcounty` on `pcounty`.`county_seq_no` = `paddr`.`county`
//        left join `plma_states` `pstate` on `pstate`.`state_seq_no` = `paddr`.`state`
//        left join `plma_codes` `pcodes` on `pcodes`.`code` = `pfirm`.client_gender";
        } elseif ($role_code == 'FIRMADM') {
//            $sql = "SELECT 
//        `pfirm`.*, `paddr`.`address_line1`, `paddr`.`address_line2`, `paddr`.`address_line3`, `pcountry`.`country_seq_no`, `pcountry`.`name`,`pstate`.`state_seq_no`, `pstate`.`state_name`, `pcounty`.`county_seq_no`, `pcounty`.`county_name`, `pcity`.`city_seq_no`, `pcity`.`city_name`, `paddr`.`postal_code`, `paddr`.`email`, `paddr`.`phone`, `paddr`.`mobile_cell`, `paddr`.`website_url`, `paddr`.`social_media_url`, `pcodes`.`short_description` 
//        FROM 
//        `plma_client` `pfirm` left join `plma_address` `paddr` on `paddr`.`address_seq_no` = `pfirm`.address_seq_no
//        left join `plma_city` `pcity` on `pcity`.`city_seq_no` = `paddr`.`city`
//        left join `plma_country` `pcountry` on `pcountry`.`country_seq_no` = `paddr`.`country`
//        left join `plma_county` `pcounty` on `pcounty`.`county_seq_no` = `paddr`.`county`
//        left join `plma_states` `pstate` on `pstate`.`state_seq_no` = `paddr`.`state`
//        left join `plma_codes` `pcodes` on `pcodes`.`code` = `pfirm`.client_gender WHERE `pfirm`.`firm_seq_no` = '" . $firm_seq_no . "'";
            
            $cond = "AND user_seq_no=$admin_id";
            $fetch_company_id_from_user_table = $this->user_model->fetch($cond);
            
            $company_id = $fetch_company_id_from_user_table[0]['firm_seq_no'];
            
            $cond1 = " AND company_id=$company_id AND status=1 AND admin_id=$admin_id";
            $fetch_details_module2 = $this->module2->fetch($cond1);
//            echo $this->db->last_query();
//            t($fetch_details_master_contacts);die();
            
            $this->data['admin_id'] = $admin_id;
            
            $this->data['fetch_details_master_contacts'] = $fetch_details_master_contacts;
            
        } elseif ($role_code == 'ATTR') {
//            $sql = "SELECT  
//        `pfirm`.*, `pattr`.`attorney_seq_no`, `paddr`.`address_line1`, `paddr`.`address_line2`,
//        `paddr`.`address_line3`, `pcountry`.`country_seq_no`, `pcountry`.`name`,
//        `pstate`.`state_seq_no`, `pstate`.`state_name`, `pcounty`.`county_seq_no`,
//        `pcounty`.`county_name`, `pcity`.`city_seq_no`, `pcity`.`city_name`, `paddr`.`postal_code`,
//        `paddr`.`email`, `paddr`.`phone`, `paddr`.`mobile_cell`, `paddr`.`website_url`, 
//        `paddr`.`social_media_url`, `pcodes`.`short_description` 
//         FROM  
//         `plma_client` `pfirm` left join `plma_address` `paddr` on `paddr`.`address_seq_no` = `pfirm`.address_seq_no
//        left join `plma_city` `pcity` on `pcity`.`city_seq_no` = `paddr`.`city`
//        left join `plma_country` `pcountry` on `pcountry`.`country_seq_no` = `paddr`.`country`
//        left join `plma_county` `pcounty` on `pcounty`.`county_seq_no` = `paddr`.`county`
//        left join `plma_states` `pstate` on `pstate`.`state_seq_no` = `paddr`.`state`
//        left join `plma_attorney` `pattr` on `pattr`. `attorney_seq_no` = `pfirm` . `attorney_seq_no`
//        left join `plma_codes` `pcodes` on `pcodes`.`code` = `pfirm`.client_gender
//        where `pfirm`.`attorney_seq_no` = '" . $attorney_seq_no . "'";
            
            $cond = "AND user_seq_no=$admin_id";
            $fetch_company_id_from_user_table = $this->user_model->fetch($cond);
            
//            $company_id = $fetch_company_id_from_user_table[0]['firm_seq_no'];
            
            $cond1 = " AND firm_seq_no=$company_id AND status=1 AND admin_id=$admin_id order by target_seq_no" ;
            $fetch_details_module2 = $this->module2->fetch($cond1);
           // t($fetch_details_module2);die();
            
            $this->data['admin_id'] = $admin_id;
            
            $this->data['fetch_details_module2'] = $fetch_details_module2;
            
        }

        
//        $query = $this->db->query($sql);
//        $this->data['all_clients'] = $query->result_array();

//        foreach ($this->data['all_clients'] as $key => $value) {
//            $client_seq_no = $value['client_seq_no'];
//            $cond = "AND client_seq_no=$client_seq_no";
//            $client_revenue = $this->client_revenue_model->fetch($cond);
//            
//            $cond1 = "AND client_seq_no=$client_seq_no";
//            $client_con = $this->client_contact_model->fetch($cond1);
//            $this->data['all_clients'][$key]['revenue'] = count($client_revenue);
//            $this->data['all_clients'][$key]['con'] = count($client_con);
//        }
//        echo $this->db->last_query();
//        t($this->data['all_clients']);
//        exit;

//        $select = "firm_seq_no,firm_name";
//        $this->data['firms'] = $this->firm_model->fetch('', $select);

//        t($this->data['all_clients']);
//        echo $this->db->last_query();
//        exit;
        ////////////////////////ALL ATTORNEYS UNDER FIRM////////////////////////                                                                                            
//        $cond_a = "AND firm_seq_no = '" . $firm_seq_no . "'";
//        $sel_a = "attorney_seq_no, attorney_first_name, attorney_last_name";
//        $row_a = $this->attorney_model->fetch($cond_a, $sel_a);
//        $this->data['all_attr'] = $row_a;
//        t($row_a); exit;



    //################# COMPANY FETCH FOR CONTACTS IMPORT #######################//

//        $sql_company = "SELECT * FROM `plma_company` WHERE 1";
//        $res_company = $this->db->query($sql_company);
//        $row_company = $res_company->result_array($res_company);
//        $this->data['all_company'] = $row_company;
        // t($row_company); exit;
        // echo $role_code; exit;



        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/client/listing', $this->data);
    }

    function fetchClients($param) {

        $firm_id = $this->input->post('fimrs');

        if ($firm_id == 'all' || $firm_id == '') {
            $sql = "SELECT 
        `pfirm`.*, `paddr`.`address_line1`, `paddr`.`address_line2`, `paddr`.`address_line3`, `pcountry`.`country_seq_no`, `pcountry`.`name`,`pstate`.`state_seq_no`, `pstate`.`state_name`, `pcounty`.`county_seq_no`, `pcounty`.`county_name`, `pcity`.`city_seq_no`, `pcity`.`city_name`, `paddr`.`postal_code`, `paddr`.`email`, `paddr`.`phone`, `paddr`.`mobile_cell`, `paddr`.`website_url`, `paddr`.`social_media_url`, `pcodes`.`short_description` 
        FROM 
        `plma_client` `pfirm` left join `plma_address` `paddr` on `paddr`.`address_seq_no` = `pfirm`.address_seq_no
        left join `plma_city` `pcity` on `pcity`.`city_seq_no` = `paddr`.`city`
        left join `plma_country` `pcountry` on `pcountry`.`country_seq_no` = `paddr`.`country`
        left join `plma_county` `pcounty` on `pcounty`.`county_seq_no` = `paddr`.`county`
        left join `plma_states` `pstate` on `pstate`.`state_seq_no` = `paddr`.`state`
        left join `plma_codes` `pcodes` on `pcodes`.`code` = `pfirm`.client_gender";
        } else {
            $sql = "SELECT 
        `pfirm`.*, `paddr`.`address_line1`, `paddr`.`address_line2`, `paddr`.`address_line3`, `pcountry`.`country_seq_no`, `pcountry`.`name`,`pstate`.`state_seq_no`, `pstate`.`state_name`, `pcounty`.`county_seq_no`, `pcounty`.`county_name`, `pcity`.`city_seq_no`, `pcity`.`city_name`, `paddr`.`postal_code`, `paddr`.`email`, `paddr`.`phone`, `paddr`.`mobile_cell`, `paddr`.`website_url`, `paddr`.`social_media_url`, `pcodes`.`short_description` 
        FROM 
        `plma_client` `pfirm` left join `plma_address` `paddr` on `paddr`.`address_seq_no` = `pfirm`.address_seq_no
        left join `plma_city` `pcity` on `pcity`.`city_seq_no` = `paddr`.`city`
        left join `plma_country` `pcountry` on `pcountry`.`country_seq_no` = `paddr`.`country`
        left join `plma_county` `pcounty` on `pcounty`.`county_seq_no` = `paddr`.`county`
        left join `plma_states` `pstate` on `pstate`.`state_seq_no` = `paddr`.`state`
        left join `plma_codes` `pcodes` on `pcodes`.`code` = `pfirm`.client_gender where pfirm.created_by=$firm_id";
        }

        $query = $this->db->query($sql);
        $this->data['all_clients'] = $query->result_array();

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/client/listing', $this->data);
    }
   

    function details($code = '', $read = '', $b= '') {

        $code = base64_decode($code);
        $cond = "AND target_seq_no = '" . $code . "'";
        $row = $this->targets_model->fetch($cond);
        $company_id = $this->data['firm_seq_no'];
        
        
        $contact_image = $row[0]['target_image'];
        $this->data['contact_image'] = $contact_image;
        //echo $code.'#'.$company_id;die();

        $this->data['target_seq_nos']=$code;
        $this->data['company_ids']=$this->data['firm_seq_no'];
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
       // echo $admin_id;die();
        $role_code = $this->data['role_code'];
 
        $sql = "SELECT 
        `pfirm`.*, `pattr`.`attorney_first_name`, `pattr`.`attorney_last_name`, `pattr`.`attorney_seq_no`, `paddr`.`address_line1`, `paddr`.`address_line2`, `paddr`.`address_line3`, `pcountry`.`country_seq_no`, `pcountry`.`name`,`pstate`.`state_seq_no`, `pstate`.`state_name`, `pcounty`.`county_seq_no`, `pcounty`.`county_name`, `pcity`.`city_seq_no`, `pcity`.`city_name`, `paddr`.`postal_code`, `paddr`.`email`, `paddr`.`phone`, `paddr`.`fax`, `paddr`.`mobile_cell`, `paddr`.`website_url`, `paddr`.`social_media_url`,`paddr`.`twitter`,`paddr`.`linkedin`,`paddr`.`youtube`,`paddr`.`google_plus`,`paddr`.`im`,`pcodes`.`short_description` , `pcodes2`.`short_description` `industrytype`
        FROM 
        `plma_client` `pfirm` left join `plma_address` `paddr` on `paddr`.`address_seq_no` = `pfirm`.address_seq_no
        left join `plma_city` `pcity` on `pcity`.`city_seq_no` = `paddr`.`city`
        left join `plma_country` `pcountry` on `pcountry`.`country_seq_no` = `paddr`.`country`
        left join `plma_county` `pcounty` on `pcounty`.`county_seq_no` = `paddr`.`county`
        left join `plma_states` `pstate` on `pstate`.`state_seq_no` = `paddr`.`state`
        left join `plma_codes` `pcodes` on `pcodes`.`code` = `pfirm`.client_gender 
        left join `plma_codes` `pcodes2` on `pcodes2`.`code` = `pfirm`.industry_type
        left join `plma_attorney` `pattr` on `pattr`.`attorney_seq_no` = `pfirm`.`attorney_seq_no`
        WHERE `pfirm`.client_seq_no = '" . $code . "'";

        $query = $this->db->query($sql);

        $row = $query->result_array();
        $this->data['thisclient'] = $row;
//        t($row, 1);
        $client_dob_1 = $row[0]['client_dob'];
        $client_dob = explode("-", $client_dob_1);
        $day = $client_dob[0];
        $month = $client_dob[1];
        $year = $client_dob[2];
        $this->data['day'] = $day;
        $this->data['month'] = $month;
        $this->data['year'] = $year;


        $this->get_include();

        $cond1 = " and category_type = 'Gender' ";
        $this->data['all_genders'] = $this->codes_model->fetch($cond1);

        $cond2 = " and category_type = 'Industry Type' ";
        $this->data['all_industrytypes'] = $this->codes_model->fetch($cond2);

        $cond3 = "SELECT patt.attorney_first_name, patt.attorney_last_name, patt.attorney_seq_no, pfirm.firm_seq_no, pfirm.firm_admin_seq_no FROM plma_attorney patt INNER JOIN plma_firm pfirm ON patt.firm_seq_no = pfirm.firm_seq_no WHERE patt.attorney_seq_no not in ( SELECT `plma_cli_attorney`.`ref_attorney_seq_no` FROM `plma_cli_attorney` WHERE  `plma_cli_attorney`.`client_seq_no` = '" . $code . "' ) AND pfirm.firm_admin_seq_no = '" . $admin_id . "'";
        $query11 = $this->db->query($cond3);
        $this->data['all_ref_att'] = $query11->result_array();
//        t($this->data['all_ref_att']); exit;

        $cond4 = " and category_type = 'Status' ";
        $this->data['all_association_status'] = $this->codes_model->fetch($cond4);

        $sql2 = "SELECT `attorney_first_name`,`attorney_last_name`, `attorney_seq_no` FROM `plma_attorney` WHERE '1'";
        $query2 = $this->db->query($sql2);
        $attorney = $query2->result_array();
        $this->data['attorney'] = $attorney;

        $cond44 = "SELECT * FROM `plma_attorney` WHERE `plma_attorney`.`attorney_seq_no` in ( SELECT `plma_cli_attorney`.`ref_attorney_seq_no` FROM `plma_cli_attorney` WHERE  `plma_cli_attorney`.`client_seq_no` = '" . $code . "' )";
        $query44 = $this->db->query($cond44);
        $this->data['all_ref_attorney'] = $query44->result_array(); //t($query44->result_array(), 1);

        if ($read != '') {
            
            $client = $code;
            $firm = base64_decode($b);
        
            $cond1 = "AND client_seq_no=$client AND firm_seq_no=$firm";
            $client_con = $this->client_contact_model->fetch($cond1);
            $this->data['all_contact'] =$client_con;
            
//            $cond= "AND client_seq_no=$client";
//            $c= $this->client_model->fetch($cond);
//            $this->data['name'] =$c;
            
            $this->load->view($this->view_dir . 'operation_master/client/view', $this->data);
        } else {
            // form submit for general info edit;
            $add_new_cli_btn = $this->input->post('add_new_cli_btn');
            $attorney_add_btn1 = $this->input->post('attorney_add_btn1');
            if (isset($add_new_cli_btn)) {

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
//                $county = $this->input->post('county');
                $city = $this->input->post('city');
                $postal_code = $this->input->post('postal_code');
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
                    'county' => '-',
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
                    'updated_by' => $admin_id,
                    'updated_date' => time()
                );
                $insertid = $this->address_model->edit($data1, $row[0]['address_seq_no']);

                $client_first_name = $this->input->post('client_first_name');
                $client_last_name = $this->input->post('client_last_name');
                $org_name = $this->input->post('org_name');
                $org_id = $this->input->post('org_id');
                //$org_code = $this->input->post('org_code');
                $client_gender = $this->input->post('client_gender');
                $industry_type = $this->input->post('industry_type');
                $year = $this->input->post('year');
                $month = $this->input->post('month');
                $day = $this->input->post('day');
                $whole_date = array($day, $month, $year);
                $client_dob = implode("-", $whole_date);
                $client_company_name = $this->input->post('client_company_name');
                $social_security_no = $this->input->post('social_security_no');
                $social_security_no = $this->removeSSNMask($social_security_no);
                $remarks = $this->input->post('remarks');
                $type = $this->input->post('type');
                
                if($type == 'I'){
                $data2 = array(
                    'client_first_name' => $client_first_name,
                    'client_last_name' => $client_last_name,
                    'client_gender' => $client_gender,
                    'industry_type' => $industry_type,
                    'client_dob' => $client_dob,
                    'client_company_name' => $client_company_name,
                    'social_security_no' => $social_security_no,
                    'remarks_notes' => $remarks,
                    'updated_by' => $admin_id,
                    'updated_date' => time()
                );
                } else
                {
                   $data2 = array(
                
                
                'client_id' => $org_id,
                //'client_code' => $org_code,
                'client_first_name' => $org_name,
                //'client_last_name' => $client_last_name,
                //'client_gender' => $client_gender,
                'industry_type' => $industry_type,
                //'client_dob' => $client_dob,
                'client_company_name' => $org_name,
                'social_security_no' => $social_security_no,
                'remarks_notes' => $remarks,
                'updated_by' => $admin_id,
                'updated_date' => time()
            ); 
                }
                  // t($data2); exit;

                $insertid2 = $this->client_model->edit($data2, $code);

                if ($insertid2) {
                    $msg = 'Client updated successfully';
                    $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'client-master');
                } else {
                    $msg = 'Error in updating attorney';
                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'client-master');
                }
            } else if (isset($attorney_add_btn1)) {
                $client_seq_no = $code; //$this->input->post('client_seq_no');
                $ref_attorney_seq_no = $this->input->post('ref_attorney_seq_no');
                $duration_from_date = $this->input->post('duration_from_date');
                $duration_to_date = $this->input->post('duration_to_date');
                $association_remarks = $this->input->post('association_remarks');
                $association_status = $this->input->post('association_status');
                $remarks_notes = $this->input->post('remarks_notes');



                $data2 = array(
                    'client_seq_no' => $client_seq_no,
                    'ref_attorney_seq_no' => $ref_attorney_seq_no,
                    'duration_from_date' => $duration_from_date,
                    'duration_to_date' => $duration_to_date,
                    'association_remarks' => $association_remarks,
                    'remarks_notes' => $remarks_notes,
                    'created_by' => $admin_id,
                    'created_date' => time()
                );
                //            echo "<pre>"; print_r($data2); exit;

                $insertid2 = $this->cli_att_model->add($data2);

                if ($insertid2) {
                    $msg = 'Client added successfully';
                    $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'client-master');
                } else {
                    $msg = 'Error in adding attorney';
                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'client-master/add');
                }
            } else {

                $cond11 = " and client_seq_no = '" . $code . "'";
                $res11 = $this->client_cases_model->fetch($cond11); //t($res11); exit;
                $this->data['allcases'] = $res11;
//                t($this->data['allcases'], 1);

                $this->data['case_type'] = $this->data['codes']['Case Type'];
                $cond2 = " and address_seq_no = '" . $row[0]['address_seq_no'] . "'";
                $row2 = $this->address_model->fetch($cond2);
                $this->data['address_info'] = $row2[0]; //t($row2[0]); die();

                $this->data['country_info'] = $this->fetch_country($row2[0]['country']);
                $this->data['state_info'] = $this->fetch_state($row2[0]['country'], $row2[0]['state']);
                $this->data['county_info'] = $this->fetch_county($row2[0]['country'], $row2[0]['state'], $row2[0]['county']);
                $this->data['city_info'] = $this->fetch_city($row2[0]['country'], $row2[0]['state'], $row2[0]['city']);

                $this->data['all_firms'] = $this->firm_model->fetch();

                $this->data['client_code'] = $code;
                
                
//            $firm = base64_decode($this->uri->segment(3)); 
            //echo $firm; die();
            $cond1 = "AND  target_seq_no = $code AND status=1";
            $target_con = $this->module2->fetch($cond1);
            $contact_id = $target_con[0]['id'];
            
            $cond2 = " AND user_seq_no=$admin_id;";
            $call_user_admin = $this->user_model->fetch($cond2);
            $call_user_admin_name = $call_user_admin[0]['user_first_name'].' '.$call_user_admin[0]['user_last_name'];
            $this->data['call_user_admin_name'] = $call_user_admin_name;
//            echo $this->db->last_query();
//            t($target_con); 
            //$this->module2->fetch
            //$this->data['all_contact'] =$target_con;
            $home_phone = $target_con[0]['phione'];
            $original_home_phone = $home_phone;
            $length = strlen($original_home_phone);
            //echo $length;
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
            else if ($length == 17) {
                $country_code1 = substr($original_home_phone, 0, 3);
            }
//            echo $country_code1;
            $home_phone_number = substr($original_home_phone, -11);
//            echo $home_phone_number; die();
                        
            
            $this->data['country_code'] = $country_code1;
            $this->data['home_phone_number'] = $home_phone_number;
            
            
            $this->data['targets'] =$target_con;
             
            $this->load->model('Callappointment_Model');
            $cond=" AND firm_seq_no=$company_id";
            $fetch_appointment_details =$this->Callappointment_Model->fetch($cond);
            $this->data['fetch_appointment_details']=$fetch_appointment_details;
            
            /*echo "<pre>";
            print_r($target_con);
            echo "</pre>";
            die();*/
             $target_seq_no= $target_con[0]['target_seq_no'];
              
               //echo $target_seq_no;echo $admin_id;die();

             $condnote = " AND  target_seq_no ='".$target_seq_no."' and admin_id='".$admin_id."' and status!='Inactive' order by id DESC";
             $note=$this->Allnote_Model->fetch($condnote);
//             echo $this->db->last_query();
//             t($note);die();
             $this->data['viewallnotes']=$note;
             
            $cond123 = " AND firm_seq_no='$company_id' AND target_seq_no='$target_seq_no' AND is_primary_contact='1' "; 
            $fetch_add_contact_details = $this->add_contact_model->fetch($cond123);
            $this->data['fetch_add_contact_details'] = $fetch_add_contact_details[0];
            
            //for add contact phone number
            $phone_no = $fetch_add_contact_details[0]['phone'];
            $original_phone_no = $phone_no;
            $length = strlen($original_phone_no);
            //echo $length;
            if ($length == 10) {
                $add_contact_country_code = '';
            } else if ($length == 11) {
                $add_contact_country_code = substr($original_phone_no, 0, 1);
            } else if ($length == 12) {
                $add_contact_country_code = substr($original_phone_no, 0, 2);
            } else if ($length == 13) {
                $add_contact_country_code = substr($original_phone_no, 0, 3);
            } else if ($length == 14) {
                $add_contact_country_code = substr($original_phone_no, 0, 4);
            }
            else if ($length == 17) {
                $add_contact_country_code = substr($original_phone_no, 0, 3);
            }
            $add_contact_phone_number = substr($original_phone_no, -11);
            
            
            $this->data['add_contact_country_code'] = $add_contact_country_code;
            $this->data['add_contact_phone_number'] = $add_contact_phone_number;
            //end
             
             
            $sql1= "SELECT  plma_user.user_seq_no, plma_user.firm_seq_no, plma_venue.venue_name, plma_venue.venue_seq_no  FROM plma_user INNER JOIN plma_venue ON plma_user.user_seq_no = plma_venue.created_by   WHERE  plma_user.firm_seq_no = '" . $this->data['firm_seq_no'] . "' ";            
            $query = $this->db->query($sql1);
            
            //for previous & next
//            $firm_seq_no = $this->data['firm_seq_no'];
            $company_session = $this->session->userdata('admin_session_data');
            $firm_seq_no = $company_session['firm_seq_no'];
            
            $iddd= "Select id from `plma_module2` WHERE id='$contact_id' and company_id='$firm_seq_no' and status='1' order by id";
            $quu= $this->db->query($iddd);
            $arrr= $quu->result_array();

            $prev_id=$arrr[0]['id']-1;
            $iddd_prev = "select max(target_seq_no) as target_seq_no from plma_module2 where target_seq_no < $target_seq_no AND company_id=$firm_seq_no and status='1'";
            $quu_prev= $this->db->query($iddd_prev);
            $arrr_prev= $quu_prev->result_array();

            $next_id=$arrr[0]['id']+1;
            $iddd_next= "select min(target_seq_no) as target_seq_no from plma_module2 where target_seq_no > $target_seq_no AND company_id=$firm_seq_no and status='1'";        
            $quu_next= $this->db->query($iddd_next);
            $arrr_next= $quu_next->result_array();

            $this->data['next_target_seq_no'] = $arrr_next[0]['target_seq_no'];
            $this->data['prev_target_seq_no'] = $arrr_prev[0]['target_seq_no'];
            //end

               //code for fetching data script value
             $row = $this->Change_module_number_module->fetch();
                   $this->data['notes'] = $row;
                 // print_r( $this->data['notes']);
                  // die();
       
            
             $cond_module = "AND module_name = 'module2'";
            $fetch_module_details = $this->module_setting_model->fetch($cond_module);
             $this->data['fetch_module_details'] =  $fetch_module_details;        
                

            $venue_data=$this->venue_model->fetch();
            $this->data['venue_data']=$venue_data;
            
            $cond = " AND form_model IN('module1','module2') AND form_id=$admin_id AND to_id=$code";
            $fetch_sms_details = $this->send_sms_model->fetch($cond);
            $this->data['sms_content'] = $fetch_sms_details;
               
            $this->load->view($this->view_dir . 'operation_master/client/edit', $this->data);
            }
        }
    }
    
    function next_call_date(){
        
        $next_call_date_notes = $this->input->post("next_call_date_notes");
        $next_call_time = $this->input->post("next_call_time");
        $next_call_date = $this->input->post("next_call_date");
        $target_seq_no = $this->input->post("target_seq_no");
        $user_company_id = $this->input->post("user_company_id");
                         
        $admin_id = $this->data['admin_id'];
        
        $cond = " AND admin_id='$admin_id' AND target_seq_no='$target_seq_no' AND company_id='$user_company_id' AND status='1'";
        $fetch_user_module2_details = $this->module2->fetch($cond);
        $user_id = $fetch_user_module2_details[0]['id'];
        
        if(!empty($fetch_user_module2_details)){            
            $data = array(
                'next_call_date' => $next_call_date,
                'next_call_time' => $next_call_time
            );
            $edit_details = $this->module2->edit($data,$user_id);
            
            if(count($edit_details) > 0){
                $data_field = array(
                    'user_seq_no'=>$admin_id,
                    'admin_id'=> $admin_id,
                    'target_seq_no'=> $target_seq_no,
                    'content'=> $next_call_date_notes,
                    'status'=> 'Active',
                    'added_date'=>time()
                );
                $add_next_call_date_timne_notes = $this->db->insert('plma_all_notes',$data_field);
                if(count($add_next_call_date_timne_notes) > 0){
                    echo 1;
                    exit;
                }
            }
        }                      
    }
    
    function do_not_call_again(){
        $admin_id = $this->data['admin_id'];
        
        $user_company_id = $this->input->post('user_company_id');
        $target_seq_no = $this->input->post('target_seq_no');
        $do_not_call_note = $this->input->post('note');
        
        if(!empty($target_seq_no)){
            $cond = " AND admin_id=$admin_id AND target_seq_no=$target_seq_no and company_id=$user_company_id";
            $fetch_module_two_user = $this->module2->fetch($cond);            
            $id = $fetch_module_two_user[0]['id'];
            
            $data_field = array(
                'status' => 3
            );
            $edit = $this->module2->edit($data_field,$id);
            $edit_target_table = $this->targets_model->edit($data_field,$target_seq_no);
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
                }
            }
        }
    }
    
    function appointment_call_date_time(){
        $admin_id = $this->data['admin_id'];
        
        $appointment_date = $this->input->post('appointment_date');
        $appointment_time = $this->input->post('appointment_time');
        $appointment_time1 = $this->input->post('appointment_time1');
        $appointment_user = $this->input->post('appointment_user');
        $appointment_venue = $this->input->post('appointment_venue');
        $appointment_notes = $this->input->post('appointment_notes');
        $target_seq_no = $this->input->post('target_seq_no');
        $user_company_id = $this->input->post('user_company_id');
        
        $cond = " AND target_seq_no=$target_seq_no AND company_id=$user_company_id AND status='1'";
        $fetch_details = $this->module2->fetch($cond);
        
        if(!empty($target_seq_no)){
            $this->load->model('Callappointment_Model');
            $this->load->model('appointment_details_module');

            $cond = " AND email='$appointment_user'";
            $fetch_appt_details = $this->Callappointment_Model->fetch($cond);

            $data = array(
                'target_seq_no' => $target_seq_no,
                'admin_id' => $admin_id,
                'appt_seq_no' => $fetch_appt_details[0]['appt_seq_no'],
                'firm_seq_no' => $fetch_appt_details[0]['firm_seq_no'],
                'user_seq_no' => $fetch_appt_details[0]['user_seq_no'],
//                'user_name' => $fetch_details[0]['first_name'] . ' ' . $fetch_details[0]['last_name'],
//                'email' => $fetch_details[0]['email'],
                'first_name' => $fetch_details[0]['first_name'] ,
                'last_name' => $fetch_details[0]['last_name'],
                'phione' => $fetch_details[0]['phione'],
                'email' => $fetch_details[0]['email'],
                'mobile' => $fetch_details[0]['mobile'],
                'address' => $fetch_details[0]['address'],
                'company_name' => $fetch_details[0]['company_name'],
                'categories' => $fetch_details[0]['categories'],
                'appointment_date' => $appointment_date,
                'appointment_time' => $appointment_time .' - '. $appointment_time1,
                'appointment_venu' => $appointment_venue,
                'status' => 'Active',
                'added_date' => time(),
                'modified_date' => time()
            );
            $add = $this->appointment_details_module->add($data);
            if(count($add) > 0){
                if(!empty($appointment_notes)){
                    $data_field = array(
                        'user_seq_no'=>$admin_id,
                        'admin_id'=> $admin_id,
                        'target_seq_no'=> $target_seq_no,
                        'content'=> $appointment_notes,
                        'status'=> 'Inactive',
                        'added_date'=>time()
                    );
                    $add_appiontment_notes = $this->db->insert('plma_all_notes',$data_field);                    
                }
                
                $cond = " AND admin_id=$admin_id AND target_seq_no=$target_seq_no and company_id=$user_company_id";
                $fetch_module_two_user = $this->module2->fetch($cond); 
                //echo $this->db->last_query();die;           
                $id = $fetch_module_two_user[0]['id'];

                $data_field = array(
                    'status' => 2
                );
                $edit = $this->module2->edit($data_field,$id);
                if($edit){
                    echo 1;
                    exit;
                }
            }                       
        }
    }
    
    function module2_add_contact(){
        $admin_id = $this->data['admin_id'];
        
        $fisrt_name = $this->input->post('fisrt_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        
        $country_code1 = $this->input->post('country_code1');
        $phone = $this->input->post('phone');
        $total_phone_no = $country_code1 . $phone;
        
        $designation = $this->input->post('designation');
        
        $primary_contact = $this->input->post('primary_contact');
        
        $target_seq_no = $this->input->post('target_seq_no');
        $user_company_id = $this->input->post('user_company_id');


         //$primarykey_edit=array('is_primary_contact'=>0);
         //$cond12=" AND target_seq_no='".$target_seq_no."' AND firm_seq_no='".$user_company_id."'  ";
        // $edit_prmry=$this->add_contact_model->edit_cond($primarykey_edit,$cond12);
         
         if($primary_contact=="1")
         {
            $primarykey_edit=array('is_primary_contact'=>0);
            $this->db->where('target_seq_no',$target_seq_no,'firm_seq_no',$user_company_id);
            $edit_prmry=$this->db->update('plma_target_contact',$primarykey_edit);
         
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
              $add_contact_mod2=$this->add_contact_model->add($data_field);
              if($edit_prmry && $add_contact_mod2)
              {
                echo "1";
              }
         }
         else
         {
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
          $add_contact_mod2=$this->add_contact_model->add($data_field);
          if($add_contact_mod2)
          {
            echo "1";
          }


         } 
    /*--------------------------------------------------------------------------------------*/    
        /*if(!empty($target_seq_no)){
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
        }*/

/*-----------------------------------------------------------------*/



    }
            
    function add() {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        

        $add_new_cli_btn = $this->input->post('add_new_cli_btn');

        //when firm admin add clients
        if ($role_code == 'FIRMADM') {
            ////////////////fetch firm seq no///////////////////
            $sql = "select pfirm.firm_seq_no from plma_firm pfirm where pfirm.firm_admin_seq_no=$admin_id";
            $res = $this->db->query($sql);
//                 echo $this->db->last_query(); exit;
            $row = $res->result_array();
            $firm_seq_no = $row[0]['firm_seq_no'];

            $attorney_seq_no = $this->input->post('attorney_seq_no');
        }
        // when attorney add clients
        if ($role_code == 'ATTR') {
            //////////////////fetch firm seq no///////////////////
            $sql1 = "select pattr.firm_seq_no from plma_firm pfirm, plma_attorney pattr where pattr.user_seq_no=$admin_id AND pfirm.firm_seq_no = pattr.firm_seq_no";
            $res1 = $this->db->query($sql1);
//                 echo $this->db->last_query(); exit;
            $row1 = $res1->result_array();
            $firm_seq_no = $row1[0]['firm_seq_no'];

            /////////////////attorney seq no////////////////////
            $sql = "select pattr.attorney_seq_no from plma_attorney pattr where pattr.user_seq_no=$admin_id";
            $res = $this->db->query($sql);
//                 echo $this->db->last_query(); exit;
            $row = $res->result_array();
            $attorney_seq_no = $row[0]['attorney_seq_no'];
        }
        if (isset($add_new_cli_btn)) {

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
                'county' => '-',
                'email' => $email,
                'phone' => $phone,
                'fax' => $fax,
                'mobile_cell' => $mobile,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
                'twitter' => $twit,
                'linkedin' => $link,
                'youtube' => $yout,
                'google_plus' => $g,
                'im' => $im,
                'created_by' => $admin_id,
                'created_date' => time()
            );
            $insertid = $this->address_model->add($data1);

            $inor = $this->input->post('inor');
            $client_id = $this->input->post('client_id');
            $client_code = $this->input->post('client_code');
            $client_first_name = $this->input->post('client_first_name');
            $client_last_name = $this->input->post('client_last_name');
            $org_name = $this->input->post('org_name');
            $org_id = $this->input->post('org_id');
            $org_code = $this->input->post('org_code');
            $client_gender = $this->input->post('client_gender');
            $industry_type = $this->input->post('industry_type');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day = $this->input->post('day');
            $whole_date = array($day, $month, $year);
            $client_dob = implode("-", $whole_date);
            $client_company_name = $this->input->post('client_company_name');
            $social_security_no = $this->input->post('social_security_no');
            $social_security_no = $this->removeSSNMask($social_security_no);
            $remarks = $this->input->post('remarks');

            if($inor== 'I'){   
                $data2 = array(
                'firm_seq_no' => $firm_seq_no,
                'attorney_seq_no' => $attorney_seq_no,
                'client_id' => $client_id,
                'client_code' => $client_code,
                'client_first_name' => $client_first_name,
                'client_last_name' => $client_last_name,
                'client_gender' => $client_gender,
                'industry_type' => $industry_type,
                'client_dob' => $client_dob,
                'client_company_name' => $client_company_name,
                'social_security_no' => $social_security_no,
                'remarks_notes' => $remarks,
                'address_seq_no' => $insertid,
                'type' => $inor,
                'created_by' => $admin_id,
                'created_date' => time()
            );
                
            }else{
                $data2 = array(
                'firm_seq_no' => $firm_seq_no,
                'attorney_seq_no' => $attorney_seq_no,
                'client_id' => $org_id,
                'client_code' => $org_code,
                'client_first_name' => $org_name,
                //'client_last_name' => $client_last_name,
                'client_gender' => $client_gender,
                'industry_type' => $industry_type,
                'client_dob' => $client_dob,
                'client_company_name' => $org_name,
                'social_security_no' => $social_security_no,
                'remarks_notes' => $remarks,
                'address_seq_no' => $insertid,
                'type' => $inor,
                'created_by' => $admin_id,
                'created_date' => time()
            );
            }

           
//                        echo "<pre>"; print_r($data2); exit;

            $insertid2 = $this->client_model->add($data2);

            if ($insertid2) {
                $msg = 'Client added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'client-master');
            } else {
                $msg = 'Error in adding attorney';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'client-master/add');
            }

            //redirect($base_url . 'attorney/add');
        } else {

            $this->data['all_firms'] = $this->firm_model->fetch();

//            $cond1 = " and category_type = 'Gender' ";
//            $this->data['all_genders'] = $this->codes_model->fetch($cond1);
//
//            $cond2 = " and category_type = 'Industry Type' ";
//            $this->data['all_industrytypes'] = $this->codes_model->fetch($cond2);

            $sql2 = "SELECT `attorney_first_name`,`attorney_last_name`, `attorney_seq_no` FROM `plma_attorney` WHERE `firm_seq_no` = '" . $firm_seq_no . "'";
            $query2 = $this->db->query($sql2);
            $attorney = $query2->result_array();
            $this->data['attorney'] = $attorney;
//            t($this->data['attorney']);
//            exit;
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/client/add', $this->data);
        }
    }

    function addPreviousRevenue($id) {
 
        if ($id) {
            $id = base64_decode($id);
            $this->data['id'] = $id;
        } else {
            redirect($base_url . 'client-master');
        }

        $this->load->model('client_revenue_model');

        if ($this->input->post('year')) {

            $admin_id = $this->data['admin_id'];
            $role_code = $this->data['role_code'];
            $firm_seq_no = $this->data['firm_seq_no'];



            $year = $this->input->post('year');
            $goal_percentage = $this->input->post('goal_percentage');
            $goal_figure = $this->input->post('goal_figure');
            $remarks = $this->input->post('remarks');


            foreach ($year as $key => $value) {
                $data = array(
                    'client_seq_no' => $id,
                    'financial_year_fy' => $value,
                    'fy_goal_percentage_of_last_fy' => $goal_percentage[$key],
                    'fy_goal_figure' => $goal_figure[$key],
                    'remarks_notes' => $remarks[$key],
                    'created_by' => $admin_id,
                    'created_date' => time(),
                    'updated_by' => $admin_id,
                    'updated_date' => time()
                );

                $add = $this->client_revenue_model->add($data);
            }
            if ($add) {
                $msg = 'Client revenue added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'client-master');
            } else {
                $msg = 'Error in adding revenue';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'client-master/add');
            }
        } else {

            $cond = "and client_seq_no=$id";
            $revenue_details = $this->client_revenue_model->fetch($cond);
            $this->data['revenue_details'] = $revenue_details;
//            t($revenue_details);
//            exit;

            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/client/add_revenue', $this->data);
        }
    }

    function viewPreviousRevenue($id) {

        if ($id) {
            $id = base64_decode($id);
            $this->data['id'] = $id;
        } else {
            redirect($base_url . 'client-master');
        }

        $this->load->model('client_revenue_model');
        $cond = "and client_seq_no=$id";
        $revenue_details = $this->client_revenue_model->fetch($cond);
        $this->data['revenue_details'] = $revenue_details;
        $this->data['readonly'] = 'readonly';
//            t($revenue_details);
//            exit;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/client/add_revenue', $this->data);
    }

    function fetch_country($selected = '') {

        $cond = "order by country_id='US' desc";
        $return = $this->country_model->fetch($cond);
        $array1 = array();
        $opt = '<option value="">Country</option>'; //<option value="">Country</option>
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
//        echo 123; exit;
//        t($opt); exit;
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
//            echo 123; exit;
//            t($a); exit;
        return $a;
    }

    function fetch_city($country_id = '', $state_id = '', $selected = '') {
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }
        if ($state_id == '') {
            $state_id = $this->input->post('state_id');
        }
        //if($county_seq_no == '') { $county_seq_no = $this->input->post('county_seq_no'); }
        // if($city_seq_no == '') { $city_seq_no = $this->input->post('city_seq_no'); }
        $cond = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "'";
        $return = $this->city_model->fetch($cond);
        $opt = ''; //<option value="">City/Town</option>
        foreach ($return as $key => $value) {
            if ($value['city_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['city_seq_no'] . '" selected="selected">' . $value['city_name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['city_seq_no'] . '" >' . $value['city_name'] . '</option>';
            }
        }
//        t($opt); exit;
        return $opt;
    }

    function add_client_cases() {
        $client_seq_no_enc = $this->input->post('client_seq_no');
        $client_seq_no = base64_decode($this->input->post('client_seq_no'));
        $case_id = $this->input->post('case_id');
        $case_type = $this->input->post('case_type');
        $case_date = $this->input->post('case_date');
        $case_description = $this->input->post('case_description');
        $contact_name_ref = $this->input->post('contact_name_ref');
        $origination_percentage = $this->input->post('origination_percentage');
        $remarks_notes = $this->input->post('remarks_notes');

        $data2 = array(
            'client_seq_no' => $client_seq_no,
            'case_id' => $case_id,
            'case_type' => $case_type,
            'case_date' => $case_date,
            'case_description' => $case_description,
            'contact_name_ref' => $contact_name_ref,
            'origination_percentage' => $origination_percentage,
            'remarks_notes' => $remarks_notes,
            'created_by' => $this->data['admin_id'],
            'created_date' => time()
        );

        $insertid2 = $this->client_cases_model->add($data2);

        if ($insertid2) {
            $msg = 'Client case added successfully';
            $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'client-master/details/' . $client_seq_no_enc . '#tab_1_3');
        } else {
            $msg = 'Error in adding attorney';
            $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'client-master/details/' . $client_seq_no_enc . '#tab_1_3');
        }
    }

    function edit_client_cases($code = '') {
//        echo 123; exit;
        $code = base64_decode($code);
        //$client_seq_no_enc = $this->input->post('client_seq_no');
        $client_seq_no = base64_decode($this->input->post('client_seq_no'));
        $client_seq_no_enc = base64_encode($client_seq_no);
        $case_id = $this->input->post('case_id');
        $case_type = $this->input->post('case_type');
        $case_date = $this->input->post('case_date');
        $case_description = $this->input->post('case_description');
        $contact_name_ref = $this->input->post('contact_name_ref');
        $origination_percentage = $this->input->post('origination_percentage');
        $remarks_notes = $this->input->post('remarks_notes');

        $data2 = array(
            //'client_seq_no' => $client_seq_no,
            'case_id' => $case_id,
            'case_type' => $case_type,
            'case_date' => $case_date,
            'case_description' => $case_description,
            'contact_name_ref' => $contact_name_ref,
            'origination_percentage' => $origination_percentage,
            'remarks_notes' => $remarks_notes,
            'updated_by' => $this->data['admin_id'],
            'updated_date' => time()
        );

        $insertid2 = $this->client_cases_model->edit($data2, $code);

        if ($insertid2) {
            $msg = 'Client case edited successfully';
            $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'client-master/details/' . $client_seq_no_enc . '#tab_1_3');
        } else {
            $msg = 'Error in edditing attorney';
            $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'client-master/details/' . $client_seq_no_enc . '#tab_1_3');
        }
    }

    function import_file() {
//        echo "ok"; exit;
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
//exit; 

        if ($role_code == 'SITEADM') {
            // $firm_seq_no = $this->data['firm_seq_no'];
//        exit;
            $company_seq_no = $this->input->post('company_seq_no');
            // echo $company_seq_no; exit;
        }

        $submit = $this->input->post('import_client_submit');

        if (isset($submit)) {

            $this->load->library('PHPExcel');
            $this->load->library('PHPExcel/IOFactory');

            $fileSize = $_FILES['xls_file']['size'];
            $fileName = $_FILES['xls_file']['name'];
            $file_name = isset($fileName) ? $fileName : '';
        
        if ($file_name != '') {
            
            $config['upload_path'] = $this->config->item('upload_path') . 'xls_file/';
            $RemoveFileSpace = preg_replace('/\s+/', '', $file_name);
            $expStr = explode('.', $RemoveFileSpace);
           $FileExt = strtolower(end($expStr));

            /////checking for file format and also if file is empty or not

            if ($FileExt == 'xls' || $FileExt == 'xlx' || $FileExt == 'xlsx' && $fileSize > 0) {
                
                $temp_file = $expstr[0] . time() . '.' . $FileExt;
                // echo $_FILES['xls_file']['name']; exit;
                if (move_uploaded_file($_FILES['xls_file']['tmp_name'], $config['upload_path'] . $temp_file)) {

                    ///read the text file
                    $excel_file = $config['upload_path'] . $temp_file;

                    $objReader = new PHPExcel_Reader_Excel2007($this->phpexcel);

                    ob_end_clean();

                    $objPHPExcel = $objReader->load($excel_file);
                    //Iterating through all the sheets in the excel workbook and storing the array data
                    foreach ($objPHPExcel->getWorksheetIterator() as $key => $worksheet) {
                        $main_array = $worksheet->toArray(NULL, TRUE, TRUE);
                    }

                   // t($main_array); 
                   // exit;
                    $mapping_fields = array();
                    foreach ($main_array[0] as $key => $value) {
                        $mapping_fields[] = $value; 
                    }
                    unlink($config['upload_path'] . $temp_file);

                    $main_array_final = array();
                    foreach ($main_array as $key => $value) {
                        $main_array_filtered = array();
                        if ($key > 0) {
                            foreach ($value as $key1 => $val) {
                                $main_array_filtered[$mapping_fields[$key1]] = $value[$key1];
                            }
                            $main_array_final[] = $main_array_filtered;
                        }
                    }
// t($main_array_final);
       // exit;
                    foreach ($main_array_final as $key => $value) {

                        /////////////Insert Address////////////
                        // $contact_seq_no = ($value['Sr. No.']) ? $value['Sr. No.'] : 'no data';
                         $company_name = ($value['Company Name']) ? $value['Company Name'] : 'no data';
                        // $phone = $this->removePhoneMask1($phone);

                        $address = ($value['Address']) ? $value['Address'] : 'no data';
                        // $mobile = $this->removePhoneMask1($mobile);

                        $city = ($value['Towns and cities']) ? $value['Towns and cities'] : 'no data';
                        // $fax = $this->removePhoneMask1($fax);

                        $phone = ($value['Phone No.']) ? $value['Phone No.'] : 'no data';

                        $c_level_executive = ($value['C Level Executive']) ? $value['C Level Executive'] : 'no data';
                        $email = ($value['Email id']) ? $value['Email id'] : 'no data';
                        $website = ($value['Website']) ? $value['Website'] : 'no data';

                        $company_size= ($value['Company Size']) ? $value['Company Size'] : 'no data';
//            
                        $industry = ($value['Industry']) ? $value['Industry'] : 'Industry';

                        $categories = ($value['Category of Business']) ? $value['Category of Business'] : 'no data';

                        $designation = ($value['Designation']) ? $value['Designation'] : 'no data';

  
                        $data2 = array(
                            // 'contact_seq_no' => $contact_seq_no,
                            'admin_seq_no' => 'NULL',
                            'company_seq_no' => $company_seq_no,
                            'company_name' => $company_name,
                            'phone_no' => $phone,
                            'c_level_executive' => $c_level_executive,
                            'email' => $email,
                            'address' => $address,
                            'city' => $city,
                            'website' => $website,
                            'industry' => $industry,
                            'company_size' => $company_size,
                            'categories' => $categories,
                            'designation' => $designation,
                            'remarks_notes' => 'NULL',
                            'created_by' => $admin_id,
                            'created_date' => time(),
                            'updated_by' => $admin_id,
                            'updated_date' => time()
                        );
//                        echo "<pre>"; print_r($data2); exit;

                        $insertid2 = $this->contacts_model->add($data2);
                        
                    }
                    if ($insertid2) {
                        $msg = 'Data imported successfully';
                        $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                        <strong>Success!</strong> ' . $msg . ' </div>');
                        redirect($base_url . 'client-master');
                    } else {
                        $msg = 'Error in adding data. Please try again';
                        $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                        <strong>Failure!</strong> ' . $msg . ' </div>');
                        redirect($base_url . 'client-master');
                    }
                }
            } else {
                $msg = 'Please check the file format';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                <strong>Failure!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'client-master');
            }
        } else {
            $msg = 'Please select a file';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
            <strong>Failure!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'client-master');
        }
    }
   }
   
    function add_contact($a = '', $b = ''){
         
        $this->data['client'] = $a;
         $this->data['firm'] = $b;
         
         $b= base64_decode($a);
         $cond1 = "AND client_seq_no='$b'";
         $c = $this->client_model->fetch($cond1);
         //echo $this->db->last_query();  exit();
         $this->data['cli_name'] =$c;
        
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/client/contact', $this->data);
    }
    
    function add_cont(){
         
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        
        if ($role_code == 'FIRMADM' || $role_code == 'ATTR') {
            ////////////////fetch firm seq no///////////////////
            $sql = "select pfirm.firm_seq_no from plma_firm pfirm where pfirm.firm_admin_seq_no=$admin_id";
            $res = $this->db->query($sql);
            echo $this->db->last_query(); 
            $row = $res->result_array();
            $firm_seq_no = $row[0]['firm_seq_no'];

        }
        
         $this->data['firm'] = $firm_seq_no;
         
        $cond1 = "AND firm_seq_no='$firm_seq_no' AND type='O'";
            $client = $this->client_model->fetch($cond1);
           // echo $this->db->last_query(); exit;
            $this->data['all_client'] =$client;
            
            
        //t($this->data['all_client'],1);
            
        
        
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/client/morec_con', $this->data);
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
                'client_seq_no' => $client,
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
             
            $insertid = $this->client_contact_model->add($data1);

           if ($insertid) {
                $msg = 'Client contact added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'client-master');
            } else {
                $msg = 'Error in adding contact';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'client-master');
            }

           
        }
    
       
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
                'client_seq_no' => $client,
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
             
            $insertid = $this->client_contact_model->add($data1);

           if ($insertid) {
                $msg = 'Client contact added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'client-master');
            } else {
                $msg = 'Error in adding contact';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'client-master');
            }

           
        }
    
       
    }
    
    function _contact($a = '', $b = '')
    {
        $client = base64_decode($a);
        $firm = base64_decode($b);
        
         $cond1 = "AND client_seq_no=$client AND firm_seq_no=$firm";
            $client_con = $this->client_contact_model->fetch($cond1);
            $this->data['all_contact'] =$client_con;
            
            $cond= "AND client_seq_no=$client";
            $c= $this->client_model->fetch($cond);
            $this->data['name'] =$c;
            
             $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/client/client_contact_list', $this->data);
        
    }
    
      function con_view($a= ''){
        
            $client = base64_decode($a);
            $cond1 = "AND contact_seq_no=$client";
            $client_con = $this->client_contact_model->fetch($cond1);
            $this->data['all_contact'] =$client_con;
            //t($this->data['all_contact'],1);
            
            $n=  $this->data['all_contact'][0]['client_seq_no'];
            $cond1 = "AND client_seq_no=$n";
            $b = $this->client_model->fetch($cond1);
            $this->data['c'] =$b;
            //t($this->data['c'],1);
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/client/single_contact', $this->data);
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
                'client_seq_no' => $client,
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
            

            $insertid = $this->client_contact_model->edit($data1, $code);

            if ($insertid) {
                $msg = 'Contact updated successfully.';
                $this->session->set_flashdata('suc_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'client-master/con_edit/'.base64_encode($code));
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('err_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliure!</strong> ' . $msg . ' </div>');
               redirect($base_url . 'client-master/con_edit/'.base64_encode($code));
            }
        } else {
           
            $cond1 = "AND contact_seq_no=$code";
            //echo $cond1; die();
            $client_con = $this->client_contact_model->fetch($cond1);
            $this->data['all_contact'] =$client_con;
            //t($this->data['all_contact'],1);
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/client/edit_contact', $this->data);   

        }
    }
    /***************** Client_Master Update ***************/
    public function update($id = '')
    {
        //echo base64_decode($id);
       $id =  base64_decode($id);
        $submit = $this->input->post('submit');
        if (isset($submit)) {
            
            
            
            $first_name= $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $country_code1 = $this->input->post('country_code1');
            $phione = $this->input->post('phione');
            $mobile = $this->input->post('mobile');
            $address1 = $this->input->post('address1');
            $next_call_date = $this->input->post('next_call_date');
            $next_call_time = $this->input->post('next_call_time');
            $appt_call_date = $this->input->post('appt_call_date');
            $appt_call_time = $this->input->post('appt_call_time');
            $appt_call_time1 = $this->input->post('appt_call_time1');
            $appt_call_date1 = $this->input->post('appt_call_date1');
            $apptmnt_users = $this->input->post('apptmnt_users');
            $venu = $this->input->post('venu');
            $target_company_name = $this->input->post('target_company_name');
            $industry_type = $this->input->post('industry_type');
            $date_contacted = $this->input->post('date_contacted');
            $notes = $this->input->post('notes');
            $target_seq_no= $this->input->post('target_seq_no');
            $admin_id= $this->input->post('admin_id');
            $firm_seq_no= $this->input->post('firm_seq_no');
            
            
            
            /******* Appt User ***/
            /*if(!empty($apptmnt_users)){
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
                    );
             $add = $this->appointment_details_module->add($data);
             if($add){
                    $data = array(
                   'status' => "2"
               );               
               $edit = $this->module2->edit($data,$id);
               
               redirect($base_url . 'client_master');
             }
            }*/
            
            /******** End *****/
            
            
            
            
            $arr = array();
				
             $arr = array(
                 
                 "user_name" => $first_name.$last_name,
		"first_name" => $first_name,
                 "last_name" => $last_name,
                 "email" => $email,
                 "phione" => $country_code1.$phione,
                 "mobile" => $mobile,
                 "address" => $address1,
                 "next_call_date" => $next_call_date,
                 "next_call_time" => $next_call_time,
                 "appointment_date" => $appt_call_date,
                 "appointment_time" => $appt_call_time."-".$appt_call_time1,
                // "appointment_time1" => $appt_call_time1,
                 "appointment_date1" => $appt_call_date1,
                 "appointment_user" => $apptmnt_users,
                 "appointment_venu" => $venu,
                 "company_name" => $target_company_name,
                 "categories" => $industry_type,
                 "date_contacted" => $date_contacted,
                 "notes"  =>  $notes,
                 //"target_seq_no" => $target_seq_no,
                // "admin_id" => $admin_id,
                // "firm_seq_no" =>  $firm_seq_no,
                'added_date' => time(),
                'modified_date' => time(),
                 "status" => "Active"
                 
               );
             
            
            $keep_in_touch_first_name = $this->input->post('keep_in_touch_1');
           // t($keep_in_touch_first_name);
            $arr["first_name_1"] = $keep_in_touch_first_name[0];
            $arr["first_name_2"] = $keep_in_touch_first_name[1];
            $arr["first_name_3"] = $keep_in_touch_first_name[2];
            $arr["first_name_4"] = $keep_in_touch_first_name[3];
            
            
            $keep_in_touch_last_name = $this->input->post('keep_in_touch_date_1');
          //  t( $keep_in_touch_last_name); 
            $arr["last_name_1"] = $keep_in_touch_last_name[0];
            $arr["last_name_2"] = $keep_in_touch_last_name[1];
            $arr["last_name_3"] = $keep_in_touch_last_name[2];
            $arr["last_name_4"] = $keep_in_touch_last_name[3];
            
            /*$keep_in_touch_last_name = $this->input->post('keep_in_touch_last_name');
            $arr["last_name_1"] = $keep_in_touch_last_name[0];
            $arr["last_name_2"] = $keep_in_touch_last_name[1];
            $arr["last_name_3"] = $keep_in_touch_last_name[2];
            $arr["last_name_4"] = $keep_in_touch_last_name[3];*/
            
            
            $email_1 = $this->input->post('email_1');
            $arr["email_1"] =  $email_1[0];
            $arr["email_2"] =  $email_1[1];
            $arr["email_3"] =  $email_1[2];
            $arr["email_4"] =  $email_1[3];
           // t($email_1);
            
            $phone_1 = $this->input->post('phone_1');
            $arr["phone_1"] =  $phone_1[0];
            $arr["phone_2"] =  $phone_1[1];
            $arr["phone_3"] =  $phone_1[2];
            $arr["phone_4"] =  $phone_1[3];
          //  t($phone_1);
            
            $designation_1 = $this->input->post('designation_1');
            $arr["designation_1"] =  $designation_1[0];
            $arr["designation_2"] =  $designation_1[1];
            $arr["designation_3"] =  $designation_1[2];
            $arr["designation_4"] =  $designation_1[3];
           // t($designation_1); die();
            
            //t($arr); die();
             //$target_con = $this->module2->fetch($cond1);
            // $insertid = $this->module2->edit($arr, $id);
            
           // echo $apptmnt_users; die();
            if(!empty($apptmnt_users)){
                    $this->load->model('Callappointment_Model');
                    $this->load->model('appointment_details_module');
                    $cond = " AND email='$apptmnt_users'";
                    $fetch_appt_details = $this->Callappointment_Model->fetch($cond);
                   // $arr['target_seq_no'] = $id;
                    $arr['target_seq_no'] = $target_seq_no;
                    $arr['admin_id'] = $admin_id;
                    $arr['appt_seq_no'] = $fetch_appt_details[0]['appt_seq_no'];
                    $arr['firm_seq_no'] = $fetch_appt_details[0]['firm_seq_no'];
                    $arr['user_seq_no'] = $fetch_appt_details[0]['user_seq_no'];
                   /* $data = array(
                   'target_seq_no' => $id,
                   'admin_id' => $admin_id,
                   'appt_seq_no' => $fetch_appt_details[0]['appt_seq_no'],
                   'firm_seq_no' => $fetch_appt_details[0]['firm_seq_no'],
                   'user_seq_no' => $fetch_appt_details[0]['user_seq_no'],
                    );*/
                   
             //$add = $this->appointment_details_module->add($data);
             $add_module3 = $this->appointment_details_module->add($arr);
             if($add_module3){
                    $data1 = array(
                   'status' => "2"
               );               
               $edit = $this->module2->edit($data1,$id);
               
               redirect($base_url . 'client_master');
             }
            }
        else {
            
                $this->module2->edit($arr,$id);
                redirect($base_url . 'client_master');
           }
       }
        
        
        
    }        
    
 
   /************************ End ***********************/


   //-----------------------edit details for module 2-----------------------//
   function edit_details()
    {
       $first_name=$this->input->post("first_name");
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

       // update table module2 data
       $data=array('first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'phione'=>$country_code1.$phione , 'mobile' => $mobile,'address'=>$address1,'company_name'=>$target_company_name, 'categories'=>$industry_type);
       $res=$this->module2->edit($data,$seq_no);
       //echo $this->db->last_query();die;

       // update table target(module1) data
       $target_data=array('target_first_name'=>$first_name,'target_last_name'=>$last_name,'email'=>$email,'phone'=>$country_code1.$phione , 'mobile' => $mobile,'address'=>$address1,'company'=>$target_company_name, 'categories'=>$industry_type);
       $target_res=$this->targets_model->edit($target_data,$target_seq_no);
       if($res && $target_res)
       {
         echo "1";
       }
    }
  function temp_email($id= '', $company_id= ' ')
  {
    $target_seq_no=base64_decode($id);
    $firm_seq_no=base64_decode($company_id);
    $admin_id = $this->data['admin_id'];

       $cond = "AND created_by=$firm_seq_no";
       $user_login_template = $this->emailtemplate_model->fetch($cond);
       $this->data['user_login_template'] = $user_login_template;
       $this->data['aid'] = $admin_id;
       //print_r($user_login_template);die();

       $contact_id = base64_decode($id);
       $company_id = base64_decode($company_id);
       //echo $contact_id.'#'.$company_id;die();
       $cond = " and firm_seq_no='{$company_id}' AND target_seq_no=$contact_id";
       $this->data['fetch_details']=$this->targets_model->fetch($cond);

       $this->data['contact_id'] = $contact_id;
       $this->data['firm_seq_no'] = $this->data['fetch_details'][0]['firm_seq_no'];
       $this->data['target_seq_no']=$target_seq_no;

       $this->db->select('*')->from('plma_document');
       $row=$this->db->get()->result_array();
       $this->data['document']=$row;

       $this->get_include();
       $this->load->view($this->view_dir . 'operation_master/client/send_message3', $this->data);


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
    //----------------end-------------------//
}