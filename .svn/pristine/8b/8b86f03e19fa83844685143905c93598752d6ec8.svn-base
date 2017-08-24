<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Firm extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->isLogin();
        $role_code = $this->data['role_code'];
//        echo $role_code; exit;
        if ($role_code == 'ATTRMGR' || $role_code == 'ATTR') {
            redirect($base_url . 'login/logout');
        }

        $this->load->model('user_model');
        $this->load->model('codes_model');
        $this->load->model('app_users_model');
        $this->load->model('address_model');
        $this->load->model('city_model');
        $this->load->model('country_model');
        $this->load->model('county_model');
        $this->load->model('states_model');
        $this->load->model('firm_model');
        $this->load->model('firm_address_model');
        $this->load->model('site_admin_sections_model');
        $this->load->model('attorney_model');
        $this->load->model('practice_area_model');
        $this->load->model('firm_pa_model');
       $this->load->model('designation_model');
       $this->load->model('approval_level_model');
       $this->load->model('group_model');
    }

    function index() {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        if ($role_code == 'SITEADM') {
            $sql = "SELECT 
`pfirm`.*, `paddr`.`address_line1`, `paddr`.`address_line2`, `paddr`.`address_line3`, `pcountry`.`country_seq_no`, `pcountry`.`name`,`pstate`.`state_seq_no`, `pstate`.`state_name`, `pcounty`.`county_seq_no`, `pcounty`.`county_name`, `pcity`.`city_seq_no`, `pcity`.`city_name`, `paddr`.`postal_code`, `paddr`.`email`, `paddr`.`phone`, `paddr`.`mobile_cell`, `paddr`.`website_url`, `paddr`.`social_media_url`, `pcodes`.`short_description` 
FROM 
`plma_firm` `pfirm` left join `plma_address` `paddr` on `paddr`.`address_seq_no` = `pfirm`.address_seq_no
left join `plma_city` `pcity` on `pcity`.`city_seq_no` = `paddr`.`city`
left join `plma_country` `pcountry` on `pcountry`.`country_seq_no` = `paddr`.`country`
left join `plma_county` `pcounty` on `pcounty`.`county_seq_no` = `paddr`.`county`
left join `plma_states` `pstate` on `pstate`.`state_seq_no` = `paddr`.`state`
left join `plma_codes` `pcodes` on `pcodes`.`code` = `pfirm`.firm_jurisdiction ";

            $query = $this->db->query($sql);
            $this->data['all_firms'] = $query->result(); //t($query->result(), 1);
            //echo $this->db->last_query(); exit;
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/firm/listing', $this->data);
        } else {
            redirect($base_url . 'firm/my_firm');
        }
    }

    function details($code = '', $read = '') {

        $code = base64_decode($code);
        $submit = $this->input->post('general_tab');

        $cond = " and firm_seq_no = '" . $code . "'";
        $row = $this->firm_model->fetch($cond);
        
        foreach($row as $key => $value){
          $firm_seq_no = $value['firm_seq_no'];
          $cond = "AND firm_seq_no = '" . $firm_seq_no . "'AND status=1";
          $pa_row = $this->firm_pa_model->fetch($cond);
          $row[$key]['practice_area'] = $pa_row;
      }
//            echo $this->db->last_query();
//            t($row);
//            exit;
        // add location
        $add_firm_location = $this->input->post('add_firm_location');

        if (isset($submit) && $submit == 'yes') {
//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id = $this->data['admin_id'];
            $role_code = $this->data['role_code'];

            //firm admin password change
            $password = $this->input->post('password1');
            $email = $this->input->post('email');
            if ($password != '') {
                $password = md5($password);

                $this->load->helper('string');
                $random = random_string('alnum', 16);
                $random1 = base64_encode($random);

                $final_password = $password . $random1;

                $add_user_for_firm_admin_seq_no = array(
                    //'user_id' => $email,
                    'password' => $final_password,
                    'role_code' => 'FIRMADM',
                    'salt' => $random,
                    'updated_by' => $admin_id,
                    'updated_date' => time()
                );
                $user_insertid = $this->app_users_model->edit_cond($add_user_for_firm_admin_seq_no, " user_id = '" . $email . "'");
                //echo $this->db->last_query(); exit;
            }

            $firm_admin_seq_no = $user_insertid;
            //$firm_admin_seq_no = $this->input->post('firm_admin_seq_no');
            //General Informations 
            $firm_name = $this->input->post('firm_name');

            if (isset($firm_name)) {
                $firm_id = $this->input->post('firm_id');
                $firm_code = $this->input->post('firm_code');
                //$firm_reg = $this->input->post('firm_reg');
                $firm_jurisdiction = $this->input->post('firm_jurisdiction');
                $practice_area = $this->input->post('practice_area');
                //Single Point Information 
                $sp_name = $this->input->post('sp_name');
                $sp_role = $this->input->post('sp_role');

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

                $data1 = array(
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
                    'mobile_cell' => $mobile,
                    'fax' => $fax,
                    'website_url' => $web_url,
                    'social_media_url' => $social_url,
                    'updated_by' => $admin_id,
                    'updated_date' => time()
                );

                $insertid = $this->address_model->edit($data1, $row[0]['address_seq_no']);

                //Remarks
                $remarks = $this->input->post('remarks');

                //insert to firm
                $data2 = array(
                    //'firm_admin_seq_no' => $firm_admin_seq_no,
                    'firm_id' => $firm_id,
                    'firm_code' => $firm_code,
                    'firm_name' => $firm_name,
                    //'firm_registration' => $firm_reg,
                    'firm_jurisdiction' => $firm_jurisdiction,
                    'address_seq_no' => $row[0]['address_seq_no'],
                    'remarks_notes' => $remarks,
                    'sp_contact_name' => $sp_name,
                    'sp_contact_role' => $sp_role,
                    'updated_by' => $admin_id,
                    'updated_date' => time()
                );

                $insertid2 = $this->firm_model->edit($data2, $code);

                $data_status = array('status' => 5); 
                $insertstatus = $this->firm_pa_model->edit_cond($data_status, "firm_seq_no =  '" .$firm_seq_no . "'"); 
           
                    foreach($practice_area as $key => $value){
                        $data_pa = array(
                            'firm_seq_no' => $firm_seq_no,
                            'practice_area_seq_no' => $value,
                            'remarks_notes' => 'Practice Area',
                            'created_by' => $admin_id,
                            'created_date'=> time(),
                            'updated_by' => $admin_id,
                            'updated_date'=> time(),
                            'status' => 1
                        );
                     $edit_pa = $this->firm_pa_model->add($data_pa);
                   }
                if ($insertid2) {
                    $msg = 'Firm updated successfully';
                    $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'firm/details/' . base64_encode($code));
                } else {
                    $msg = 'error in updating firm';
                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'firm/details/' . base64_encode($code));
                }

                redirect($base_url . 'firm/details/' . base64_encode($code));
            }
        } else if (isset($add_firm_location) && $add_firm_location == 'yes') {
//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id = $this->data['admin_id'];
            $role_code = $this->data['role_code'];

            $email = $this->input->post('email1');
            $phone = $this->input->post('phone1');
            $phone = $this->removePhoneMask($phone);
            $mobile = $this->input->post('mobile1');
            $mobile = $this->removePhoneMask($mobile);
            $fax = $this->input->post('fax1');
            $fax = $this->removePhoneMask($fax);
            $web_url = $this->input->post('web_url1');
            $social_url = $this->input->post('social_url1');
            $addr_line_1 = $this->input->post('addr_line_11');
            $addr_line_2 = $this->input->post('addr_line_21');
            $addr_line_3 = $this->input->post('addr_line_31');
            $country = $this->input->post('country11');
            $state = $this->input->post('state11');
            $county = $this->input->post('county11');
            $city = $this->input->post('city11');
            $postal_code = $this->input->post('postal_code1');


            $data1 = array(
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
                'mobile_cell' => $mobile,
                'fax' => $fax,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
                'created_by' => $admin_id,
                'created_date' => time()
            );
            $insertid = $this->address_model->add($data1);

            //Remarks
            $remarks = $this->input->post('remarks');
            $firm_addr_type = $this->input->post('firm_addr_type');

            //insert to firm
            $data2 = array(
                'firm_seq_no' => $code,
                'address_seq_no' => $insertid,
                'firm_address_type' => $firm_addr_type,
                'remarks_notes' => 'Firm Location',
                'created_by' => $admin_id,
                'created_date' => time()
            );

            $insertid2 = $this->firm_address_model->add($data2);

            if ($insertid2) {
                echo json_encode(array('result' => 'ok'));
            }
        } else {

            if (count($row) > 0) {

                $this->data['firm_info'] = $row[0];  //t($row[0], 1) ;
//                t($this->data['firm_info'], 1) ;exit;
                $cond2 = " and address_seq_no = '" . $row[0]['address_seq_no'] . "'";
                $row2 = $this->address_model->fetch($cond2);
                $this->data['address_info'] = $row2[0]; //t($row2[0]); die();

                $this->data['country_info'] = $this->fetch_country($row2[0]['country']);
                $this->data['state_info'] = $this->fetch_state($row2[0]['country'], $row2[0]['state']);
                $this->data['county_info'] = $this->fetch_county($row2[0]['country'], $row2[0]['state'], $row2[0]['county']);
                $this->data['city_info'] = $this->fetch_city($row2[0]['country'], $row2[0]['state'], $row2[0]['county'], $row2[0]['city']);
            }

            $cond = "order by country_id='US' desc";
            $this->data['countries'] = $this->country_model->fetch($cond);

            $sql1 = "SELECT * FROM plma_user pu where pu.role_code = 'FIRMADM' and pu.user_seq_no = " . $row[0]['firm_admin_seq_no'];

            $query1 = $this->db->query($sql1);
            //echo $this->db->last_query();    
            $this->data['firm_admin'] = $query1->result_array(); //t($query1->result()); die();
//           t( $this->data['firm_admin']);exit;
//fetch locations 
            $sql2 = "select 
            pa.*, pfa.firm_seq_no, pfa.firm_address_type, pfa.firm_address_seq_no, pc.short_description, pcity.city_name, ps.state_name 
            from 
            plma_firm_address pfa left join plma_address pa on pa.address_seq_no = pfa.address_seq_no
            left join plma_codes pc on pfa.firm_address_type = pc.code
            left join plma_city pcity on pcity.city_seq_no = pa.city
            left join plma_states ps on ps.state_seq_no = pa.state";

            $query2 = $this->db->query($sql2);
            $this->data['all_locations'] = $query2->result_array();  //t($query2->result()); exit;
            //fetch city state country
            // $this->data['countries'] = $this->country_model->fetch();
            $this->data['states'] = $this->states_model->fetch();
            $this->data['counties'] = $this->county_model->fetch();
            $this->data['cities'] = $this->city_model->fetch();

            // fetch address type
//            $sql3 = " SELECT * FROM `plma_codes` WHERE `category_type` = 'Firm Address Type' ORDER BY `code` DESC ";
//            $query3 = $this->db->query($sql3);
//            $this->data['all_firm_addr_type'] = $query3->result();
            //fetch attorney under a firm
            $sql4 = " select * from plma_attorney  where firm_seq_no = '" . $code . "' ";
            $res4 = $this->db->query($sql4);
            $row4 = $res4->result_array();
            $this->data['all_firm_attorney'] = $row4;

//            $this->data['all_firm_attorney_1'] = $row4;
//            echo $this->db->last_query();
//            t($this->data['all_firm_attorney_1']); 
//            exit;
//            foreach ($row4 as $key => $value) {
//
//                $job = $value['full_part_time'];
//                $cond_2 = "AND code = '$job' and category_type='Job Type'";
//                $job_type = $this->codes_model->fetch($cond_2);
//
//                $jury = $value['attorney_jurisdiction'];
//                $cond_3 = "AND code = '$jury' and category_type='Jurisdictions'";
//                $jurisdictions = $this->codes_model->fetch($cond_3);
//
//                $ind_1 = $value['industry_type'];
//                $cond_4 = "AND code = '$ind_1' and category_type='Industry Type'";
//                $ind_type1 = $this->codes_model->fetch($cond_4);
//
//                $row4[$key]['full_part_time'] = $job_type[0]['short_description'];
//                $row4[$key]['attorney_jurisdiction'] = $jurisdictions[0]['short_description'];
//                $row4[$key]['industry_type'] = $ind_type1[0]['short_description'];
//            }
//            $sql21 = "SELECT * FROM `plma_codes` WHERE `category_type` =  'Jurisdictions' ";
//            $query21 = $this->db->query($sql21);
//            $this->data['all_jurisdictions'] = $query21->result_array(); //t($query2->result_array()); die();
            // $sql1 = "SELECT * FROM plma_user pu where pu.role_code = 'FIRMADM' and pu.user_seq_no not in ( select pf.firm_admin_seq_no from plma_firm pf )"; 
            // $query1 = $this->db->query($sql1);            
            // $this->data['firm_admin'] = $query1->result(); //t($query1->result()); die();
           $this->data['all_practice_area'] = $this->practice_area_model->fetch();
           $this->data['all_designations'] = $this->designation_model->fetch();
           $this->data['all_groups'] = $this->group_model->fetch();

            $this->get_include();
            if ($read == 'read') {
                $this->load->view($this->view_dir . 'operation_master/firm/only_view', $this->data); //view page
            } else {
                $this->load->view($this->view_dir . 'operation_master/firm/firm_view', $this->data); //edit page
            }
        }
    }

    function my_firm() { 
//echo 456; exit;
        $role_code = $this->data['role_code'];
        if ($role_code == 'ATTRMGR' || $role_code == 'ATTR') {
            redirect($base_url . 'firm');
        }
        $admin_id = $this->data['admin_id'];
        $firm_seq_no = $this->data['firm_seq_no'];

        //t($res22, 1);

        $code = $res22[0]['firm_seq_no'];
        $submit = $this->input->post('general_tab');

        $cond = " and firm_admin_seq_no = '" . $admin_id . "'";
        $row = $this->firm_model->fetch($cond);
      
      foreach($row as $key => $value){
          $firm_seq_no = $value['firm_seq_no'];
          $cond = "AND firm_seq_no = '" . $firm_seq_no . "'AND status=1";
          $pa_row = $this->firm_pa_model->fetch($cond);
          $row[$key]['practice_area'] = $pa_row;
      }
//        echo $this->db->last_query();
//            t($pa_row);
//            exit;
        // add location
        $add_firm_location = $this->input->post('add_firm_location');

        if (isset($submit) && $submit == 'yes') {

            //firm admin password change
            $password = $this->input->post('password1');
            $email = $this->input->post('email');
            if ($password != '') {
                $password = md5($password);

                $this->load->helper('string');
                $random = random_string('alnum', 16);
                $random1 = base64_encode($random);

                $final_password = $password . $random1;

                $add_user_for_firm_admin_seq_no = array(
                    //'user_id' => $email,
                    'password' => $final_password,
                    'role_code' => 'FIRMADM',
                    'salt' => $random,
                    'updated_by' => $admin_id,
                    'updated_date' => time()
                );
                $user_insertid = $this->app_users_model->edit_cond($add_user_for_firm_admin_seq_no, " user_id = '" . $email . "'");
                //echo $this->db->last_query(); exit;
            }

            ////////// Firm Admin Profile Edit////////////

            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $group_code = $this->input->post('group_code');
            // $designation_code = $this->input->post('designation_code');

            $edit_user = array(
                //'user_id' => $email,
                'user_first_name' => $fname,
                'user_last_name' => $lname,
                // 'designation' => $designation_code,
                'group_code' => $group_code,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
 //               t($edit_user,1);
            $user_insertid = $this->app_users_model->edit_cond($edit_user, " user_id = '" . $email . "'");
//            echo $this->db->last_query(); exit;

            $firm_admin_seq_no = $user_insertid;
            //$firm_admin_seq_no = $this->input->post('firm_admin_seq_no');
            //General Informations 
            $firm_name = $this->input->post('firm_name');

            if (isset($firm_name)) {
                $firm_id = $this->input->post('firm_id');
                $firm_code = $this->input->post('firm_code');
                //$firm_reg = $this->input->post('firm_reg');
                $firm_jurisdiction = $this->input->post('firm_jurisdiction');
                $practice_area = $this->input->post('practice_area');

                //Single Point Information 
                $sp_name = $this->input->post('sp_name');
                $sp_role = $this->input->post('sp_role');

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

                $data1 = array(
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
                    'mobile_cell' => $mobile,
                    'fax' => $fax,
                    'website_url' => $web_url,
                    'social_media_url' => $social_url,
                    'updated_by' => $admin_id,
                    'updated_date' => time()
                );

                $insertid = $this->address_model->edit($data1, $row[0]['address_seq_no']);
//                echo $this->db->last_query(); exit;
                //Remarks
                $remarks = $this->input->post('remarks');

                //insert to firm
                $data2 = array(
                    //'firm_admin_seq_no' => $firm_admin_seq_no,
                    'firm_id' => $firm_id,
                    'firm_code' => $firm_code,
                    'firm_name' => $firm_name,
                    //'firm_registration' => $firm_reg,
                    'firm_jurisdiction' => $firm_jurisdiction,
                    'address_seq_no' => $row[0]['address_seq_no'],
                    'remarks_notes' => $remarks,
                    'sp_contact_name' => $sp_name,
                    'sp_contact_role' => $sp_role,
                    'updated_by' => $admin_id,
                    'updated_date' => time()
                );

                $insertid2 = $this->firm_model->edit($data2, $firm_seq_no);
//               echo  $firm_seq_no; exit;
    ///////////////////// Edit Practice Area /////////////////////////
           $data_status = array('status' => 5); 
           $insertstatus = $this->firm_pa_model->edit_cond($data_status, "firm_seq_no =  '" .$firm_seq_no . "'"); 
           
           foreach($practice_area as $key => $value){
               $data_pa = array(
                   'firm_seq_no' => $firm_seq_no,
                   'practice_area_seq_no' => $value,
                   'remarks_notes' => 'Practice Area',
                   'created_by' => $admin_id,
                   'created_date'=> time(),
                   'updated_by' => $admin_id,
                   'updated_date'=> time(),
                   'status' => 1
               );
               $edit_pa = $this->firm_pa_model->add($data_pa);
           }
                if ($insertid2) {
                    $msg = 'Firm updated successfully';
                    $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'firm/my-firm/');
                } else {
                    $msg = 'error in updating firm';
                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'firm/my-firm/');
                }

                redirect($base_url . 'firm/my-firm/');
            }
        } else if (isset($add_firm_location) && $add_firm_location == 'yes') {
//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id = $this->data['admin_id'];
            $role_code = $this->data['role_code'];

            $email = $this->input->post('email1');
            $phone = $this->input->post('phone1');
            $phone = $this->removePhoneMask($phone);
            $mobile = $this->input->post('mobile1');
            $mobile = $this->removePhoneMask($mobile);
            $fax = $this->input->post('fax1');
            $fax = $this->removePhoneMask($fax);
            $web_url = $this->input->post('web_url1');
            $social_url = $this->input->post('social_url1');
            $addr_line_1 = $this->input->post('addr_line_11');
            $addr_line_2 = $this->input->post('addr_line_21');
            $addr_line_3 = $this->input->post('addr_line_31');
            $country = $this->input->post('country11');
            $state = $this->input->post('state11');
            $county = $this->input->post('county11');
            $city = $this->input->post('city11');
            $postal_code = $this->input->post('postal_code1');


            $data1 = array(
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
                'mobile_cell' => $mobile,
                'fax' => $fax,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
                'created_by' => $admin_id,
                'created_date' => time()
            );
            $insertid = $this->address_model->add($data1);

            //Remarks
            $remarks = $this->input->post('remarks');
            $firm_addr_type = $this->input->post('firm_addr_type');

            //insert to firm
            $data2 = array(
                'firm_seq_no' => $code,
                'address_seq_no' => $insertid,
                'firm_address_type' => $firm_addr_type,
                'remarks_notes' => 'Firm Location',
                'created_by' => $admin_id,
                'created_date' => time()
            );

            $insertid2 = $this->firm_address_model->add($data2);

            if ($insertid2) {
                echo json_encode(array('result' => 'ok'));
            }
        } else {

            if (count($row) > 0) {
                $this->data['firm_info'] = $row[0];  
//                t($this->data['firm_info'], 1) ;

                $cond2 = " and address_seq_no = '" . $row[0]['address_seq_no'] . "'";
                $row2 = $this->address_model->fetch($cond2);
                $this->data['address_info'] = $row2[0];

//                $this->data['firm_info'] = $row[0];  //t($row[0], 1) ;

                $cond2 = " and address_seq_no = '" . $row[0]['address_seq_no'] . "'";
                $row2 = $this->address_model->fetch($cond2);
                $this->data['address_info'] = $row2[0]; //t($row2[0]); die();

                $this->data['country_info'] = $this->fetch_country($row2[0]['country']);
                $this->data['state_info'] = $this->fetch_state($row2[0]['country'], $row2[0]['state']);
                $this->data['county_info'] = $this->fetch_county($row2[0]['country'], $row2[0]['state'], $row2[0]['county']);
                $this->data['city_info'] = $this->fetch_city($row2[0]['country'], $row2[0]['state'], $row2[0]['city']);
            }

            $this->data['countries'] = $this->country_model->fetch();
            $this->data['states'] = $this->states_model->fetch();
            $this->data['countries'] = $this->country_model->fetch();
            $this->data['countries'] = $this->country_model->fetch();

            $sql1 = "SELECT * FROM plma_user pu where pu.role_code = 'FIRMADM' and pu.user_seq_no = " . $row[0]['firm_admin_seq_no'];
            $query1 = $this->db->query($sql1);
            $this->data['firm_admin'] = $query1->result_array();
//            t($query1->result_array()); die();
            //fetch locations 
            $sql2 = "select 
              pfa.firm_address_seq_no ,pfa.firm_seq_no, pfa.firm_address_type,pa.*
            from 
            plma_firm_address pfa left join plma_address pa on pa.address_seq_no = pfa.address_seq_no
            where pfa.created_by= $admin_id";

            $query2 = $this->db->query($sql2);
            $this->data['all_locations'] = $query2->result_array();
//t($this->data['all_locations']);exit;

            $select = "country_seq_no,name";
            $cond = "order by country_id='US' desc";
            $this->data['country_info'] = $this->country_model->fetch($cond, $select);

//            $select = "state_seq_no,state_name";
//            $this->data['state_info'] = $this->states_model->fetch('', $select);
//            $select = "city_seq_no,city_name";
//            $this->data['city_info'] = $this->city_model->fetch('', $select);
//t($this->data['city_info']);exit;
            // fetch address type
//            $sql3 = " SELECT * FROM `plma_codes` WHERE `category_type` = 'Firm Address Type' ORDER BY `code` DESC ";
//            $query3 = $this->db->query($sql3);
//            $this->data['all_firm_addr_type'] = $query3->result();
            //fetch attorney under a firm
//            $sql4 = "SELECT * from `plma_attorney` WHERE `firm_seq_no` = '" . $firm_seq_no . "'";
//            $res4 = $this->db->query($sql4);
//            $row4 = $res4->result_array();
//            $this->data['all_firm_attorney_1'] = $row4;
//            $this->data['all_firm_attorney'] = $row4;
            $this->data['all_practice_area'] = $this->practice_area_model->fetch();
            $this->data['all_designations'] = $this->designation_model->fetch();
           $this->data['all_groups'] = $this->group_model->fetch();
//            t($this->data['all_practice_area']);exit;
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/firm/my_firm_view', $this->data);
        }
    }

    function location_edit($code = '',$firm_id ='') {

        $code = base64_decode($code);
        $firm_id = base64_decode($firm_id);
        //echo $code; 
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        
        $firm_addr_type2 =$this->input->post('firm_addr_type2');;
        $email = $this->input->post('email2');
        $phone = $this->input->post('phone2');
        $phone = $this->removePhoneMask($phone);
        $mobile = $this->input->post('mobile2');
        $mobile = $this->removePhoneMask($mobile);
        $fax = $this->input->post('fax2');
        $fax = $this->removePhoneMask($fax);
        $web_url = $this->input->post('web_url2');
        $social_url = $this->input->post('social_url2');
        $addr_line_1 = $this->input->post('addr_line_12');
        $addr_line_2 = $this->input->post('addr_line_22');
        $addr_line_3 = $this->input->post('addr_line_32');
        $country = $this->input->post('country2');
        $state = $this->input->post('state2');
        //$county = $this->input->post('county2');
        $city = $this->input->post('city2');
        $postal_code = $this->input->post('postal_code2');

        $data1 = array(
            'address_line1' => $addr_line_1,
            'address_line2' => $addr_line_2,
            'address_line3' => $addr_line_3,
            'city' => $city,
            'state' => $state,
            'postal_code' => $postal_code,
            'country' => $country,
            //'county' => $county,
            'email' => $email,
            'phone' => $phone,
            'mobile_cell' => $mobile,
            'fax' => $fax,
            'website_url' => $web_url,
            'social_media_url' => $social_url,
            'updated_by' => $admin_id,
            'updated_date' => time()
        );
        
        $data2= array(
            'firm_address_type'=> $firm_addr_type2,
            'updated_by'=>$admin_id,
            'updated_date' => time()
        );

       // t($data2); exit(); 

        $insertid = $this->address_model->edit($data1, $code);
        $firmid = $this->firm_address_model->edit($data2, $firm_id);
        //echo $insertid.$this->db->last_query(); die();

        $firm_id = $this->input->post('firm_id');

        if ($insertid && $firm_id) {
            $msg = 'Firm location updated successfully';
            $this->session->set_flashdata('suc_message11', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
        } else {
            $msg = 'Error in updating  Firm location';
            $this->session->set_flashdata('err_message11', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
        }

        redirect($base_url . 'firm/my_firm/' .'#tab_1_2');
    }

    function add() {

        $admin_id = $this->data['admin_id'];
        // $firm_seq_no = $this->data['firm_seq_no'];
        $role_code = $this->data['role_code'];

        //General Informations 
        $firm_name = $this->input->post('firm_name');

        if (isset($firm_name)) {

            $firm_id = $this->input->post('firm_id');
            $firm_code = $this->input->post('firm_code');
            $firm_reg = $this->input->post('firm_reg');
            $firm_jurisdiction = $this->input->post('firm_jurisdiction');

            //Single Point Information 
            $sp_name = $this->input->post('sp_name');
            $sp_role = $this->input->post('sp_role');

            $sections = $this->input->post('sections');
            $practice_area = $this->input->post('practice_area');
            $attorney_gender = $this->input->post('attorney_gender');

            //firm admin
            $password = $this->input->post('password');
            $password = md5($password);

            $this->load->helper('string');
            $random = random_string('alnum', 16);
            $random1 = base64_encode($random);

            $final_password = $password . $random1;
            $email = $this->input->post('email');
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $group_code = $this->input->post('group_code');
            // $designation_code = $this->input->post('designation_code');

            $is_attorney = $this->input->post('is_attorney');

            $this->db->trans_start();

            $add_user_for_firm_admin_seq_no = array(
                'user_first_name' => $fname,
                'user_last_name' => $lname,
                'user_id' => $email,
                'password' => $final_password,
                'gender' => $attorney_gender,
                'role_code' => 'FIRMADM',
                'salt' => $random,
                'created_by' => $admin_id,
                'created_date' => time(),
                'status' => 1,
                'authorized_by' => $admin_id,
                'authorized_date' => time(),
                // 'designation' => $designation_code,
                'group_code' => $group_code
            );
//            t($add_user_for_firm_admin_seq_no); exit;
            $user_insertid = $this->app_users_model->add($add_user_for_firm_admin_seq_no);

            $firm_admin_seq_no = $user_insertid; //$this->input->post('firm_admin_seq_no');
            //Enter Address
            $email_1 = $this->input->post('email_1');
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

            $data1 = array(
                'address_line1' => $addr_line_1,
                'address_line2' => $addr_line_2,
                'address_line3' => $addr_line_3,
                'city' => $city,
                'state' => $state,
                'postal_code' => $postal_code,
                'country' => $country,
                'county' => '',
                'email' => $email_1,
                'phone' => $phone,
                'mobile_cell' => $mobile,
                'fax' => $fax,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//            t($data1); exit;
            $insertid = $this->address_model->add($data1);

            //Remarks
            $remarks = $this->input->post('remarks'); //echo $this->db->last_query(); exit;
            $approval_level = $this->input->post('approval_process');
            //insert to firm
            $data2 = array(
                'firm_admin_seq_no' => $firm_admin_seq_no,
                'firm_id' => $firm_id,
                'firm_code' => $firm_code,
                'firm_name' => $firm_name,
                'firm_registration' => $firm_reg,
                'firm_jurisdiction' => $firm_jurisdiction,
                'address_seq_no' => $insertid,
                'remarks_notes' => $remarks,
                'sp_contact_name' => $sp_name,
                'sp_contact_role' => $sp_role,
                'approval_level' => $approval_level,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//t($data2); exit;
            $insertid2 = $this->firm_model->add($data2);
            $firm_seq_no = $this->db->insert_id();
            //if is attorney selected 
            if ($is_attorney) {
            
             $full_part_time='FULLTIME';

                $data2 = array(
                    'firm_seq_no' => $insertid2,
                    'user_seq_no' => $user_insertid,
                    'attorney_id' => $firm_id,
                    'attorney_code' => $firm_code,
                    'attorney_dob' => $attorney_dob,
                    'attorney_first_name' => $fname,
                    'attorney_last_name' => $lname,
                    'attorney_gender' => $attorney_gender,
                    'attorney_education' => $attorney_education,
                    'attorney_type' => $attorney_type,
                    'bar_registration_no' => $bar_registration_no,
                    'practice_date' => $practice_date,
                    'firm_join_date' => $firm_join_date,
                    'full_part_time' => $full_part_time,
                    'attorney_jurisdiction' => $attorney_jurisdiction,
                    'hourly_comp_cost' => $hourly_comp_cost,
                    'industry_type' => $industry_type,
                    'benefit_factor' => $benefit_factor,
                    'overhead_amount' => $overhead_amount,
                    'billing_rate_opp_cost' => $billing_rate_opp_cost,
                    'remarks_notes' => $remarks,
                    'profile_photo' => $profile_photo,
                    'address_seq_no' => $insertid,
                    'created_by' => $admin_id,
                    'created_date' => time()
                );
//            echo "<pre>";
//            print_r($data2);
//            exit;

                $insertid_attorney = $this->attorney_model->add($data2);
                $attorney_seq_no = $this->db->insert_id();
            }
            /******************* FIRM ADMIN APPROVAL LEVEL ADD - begin **********************/
            
            $approval_process = $this->input->post('approval_process');

            $designation_code_radio_type = $this->input->post('designation_code_radio_type');
          // t($designation_code_radio_type); 
          //   exit;          
            $remarks_notes = 'Firm level approval';

             if($approval_process == 1) {
                $data_approval_level = array(
                                'firm_seq_no' => $firm_seq_no,
                                'attorney_seq_no' => $attorney_seq_no,
                                'approval_level_one' => 1,
                                'approval_level_two' => 0,
                                'approval_level_three' => 0,
                                'approval_level_four' => 0,
                                'level_one_designation' => $designation_code_radio_type[0],
                                'level_two_designation' => $designation_code_radio_type[1],
                                'level_three_designation' => $designation_code_radio_type[2],
                                'level_four_designation' => $designation_code_radio_type[3],
                                'remarks_notes' => $remarks_notes,
                                'created_by' => $admin_id,
                                'created_date' => time(),
                                'updated_by' => $admin_id,
                                'updated_date' => time()
                                );
  
            }
            else if($approval_process == 2){
                $data_approval_level = array(
                                'firm_seq_no' => $firm_seq_no,
                                'attorney_seq_no' => $attorney_seq_no,
                                'approval_level_one' => 0,
                                'approval_level_two' => 1,
                                'approval_level_three' => 0,
                                'approval_level_four' => 0,
                                'level_one_designation' => $designation_code_radio_type[0],
                                'level_two_designation' => $designation_code_radio_type[1],
                                'level_three_designation' => $designation_code_radio_type[2],
                                'level_four_designation' => $designation_code_radio_type[3],
                                'remarks_notes' => $remarks_notes,
                                'created_by' => $admin_id,
                                'created_date' => time(),
                                'updated_by' => $admin_id,
                                'updated_date' => time()
                                );

            }
            else if($approval_process == 3){
                $data_approval_level = array(
                                'firm_seq_no' => $firm_seq_no,
                                'attorney_seq_no' => $attorney_seq_no,
                                'approval_level_one' => 0,
                                'approval_level_two' => 0,
                                'approval_level_three' => 1,
                                'approval_level_four' => 0,
                                'level_one_designation' => $designation_code_radio_type[0],
                                'level_two_designation' => $designation_code_radio_type[1],
                                'level_three_designation' => $designation_code_radio_type[2],
                                'level_four_designation' => $designation_code_radio_type[3],
                                'remarks_notes' => $remarks_notes,
                                'created_by' => $admin_id,
                                'created_date' => time(),
                                'updated_by' => $admin_id,
                                'updated_date' => time()
                                );

            }
            else if($approval_process == 4){
                $data_approval_level = array(
                                'firm_seq_no' => $firm_seq_no,
                                'attorney_seq_no' => $attorney_seq_no,
                                'approval_level_one' => 0,
                                'approval_level_two' => 0,
                                'approval_level_three' => 0,
                                'approval_level_four' => 1,
                                'level_one_designation' => $designation_code_radio_type[0],
                                'level_two_designation' => $designation_code_radio_type[1],
                                'level_three_designation' => $designation_code_radio_type[2],
                                'level_four_designation' => $designation_code_radio_type[3],
                                'remarks_notes' => $remarks_notes,
                                'created_by' => $admin_id,
                                'created_date' => time(),
                                'updated_by' => $admin_id,
                                'updated_date' => time()
                                );

            }
            //t($data_approval_level); exit;
                
          $add_approval_level = $this->approval_level_model->add($data_approval_level);
          

            /////******************* FIRM ADMIN APPROVAL LEVEL ADD - end **********************////

            // echo $this->db->last_query(); 
            /// copy app code to firm level code
            $sql = " INSERT INTO plma_firm_codes
            ( code_seq_no, firm_seq_no, short_description, long_description, created_by,created_date)
            SELECT 
             code_seq_no, $insertid2 , short_description, long_description,  $admin_id , " . time() . "  
            FROM plma_codes where firm_customization = 1";

            $insertid3 = $this->db->query($sql);

            //add sections to firm
            $this->load->model('site_admin_sections_model');
            $this->load->model('section_model');
            //t($sections); exit;
            foreach ($sections as $key => $value) {

                $cond = "AND section_seq_no=$value";
                $admin_sections = $this->site_admin_sections_model->fetch($cond);
                ////echo $this->db->last_query(); exit;
                //t($admin_sections);exit;
                $data = array(
                    'firm_seq_no' => $insertid2,
                    // 'section_type' => $admin_sections[0]['section_type'],
                    'section_id' => $admin_sections[0]['section_id'],
                    'section_name' => $admin_sections[0]['section_name'],
                    'long_description' => $admin_sections[0]['long_description'],
                    'remark_notes' => $admin_sections[0]['remark_notes'],
                    'created_by' => $admin_sections[0]['created_by'],
                    'created_date' => $admin_sections[0]['created_date'],
                    'updated_by' => $admin_sections[0]['updated_by'],
                    'updated_date' => $admin_sections[0]['updated_date'],
                );

                $this->section_model->add($data);
            }
      /////////////////////// Practice Area insert into firm pa table /////////////////////////////       
//            t($practice_area); exit;
            foreach($practice_area as $key => $value){
                $cond = "AND practice_area_seq_no = '" . $value . "'";
                $prac_area = $this->practice_area_model->fetch($cond);
                ////echo $this->db->last_query(); 
                //t($prac_area);exit;
                $data_arr = array(
                    'firm_seq_no' => $insertid2,
                    'practice_area_seq_no' => $value,
                    'remarks_notes' => $prac_area[0]['remarks_notes'],
                    'created_by' => $admin_id,
                    'created_date' => time(),
                    'updated_by' => $admin_id,
                    'updated_date' => time()
                    
                );
                $this->firm_pa_model->add($data_arr);   
            }

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }

            //echo $this->db->last_query(); exit;
            /// .end copy app code to firm level code

            if ($insertid2) {
                $msg = 'Firm added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'firm');
            } else {
                $msg = 'Error in adding firm';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'firm/add');
            }
        } else {
            $sql1 = "SELECT * FROM plma_user pu where pu.role_code = 'FIRMADM' and pu.user_seq_no not in ( select pf.firm_admin_seq_no from plma_firm pf )";
            $query1 = $this->db->query($sql1);
            $this->data['firm_admin'] = $query1->result(); //t($query1->result()); die();

            $sql2 = "SELECT * FROM `plma_codes` WHERE `category_type` =  'Jurisdictions' ";
            $query2 = $this->db->query($sql2);
            $this->data['all_jurisdictions'] = $query2->result_array(); //t($query2->result_array()); die();

            $this->data['all_sections'] = $this->site_admin_sections_model->fetch();
            $this->data['all_practice_area'] = $this->practice_area_model->fetch();
            $this->data['all_designations'] = $this->designation_model->fetch();
            $this->data['all_groups'] = $this->group_model->fetch();

            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/firm/add', $this->data);
        }
    }

    function add_location_user_exist() {
        
        $email = $this->input->post('email');
        $email2 = $this->input->post('original_email');

        if ($email != '') {
            if ((!isset($email2) && $email2 != '') || $email == $email2) {
                echo 'true';
            } else {
                $sql = "select * FROM plma_address pa, plma_firm_address pfa where pa.email = '" . $email . "' and pfa.`address_seq_no` = pa.address_seq_no";
                $res = $this->db->query($sql);
                $row = count($res->result());
                if ($row > 0) {
                    echo 'false';
                } else {
                    echo 'true';
                }
            }
        }
    }

 

    function fetch_country($selected = '') {
        $cond = "order by country_id='US' DESC ";
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
        $opt = '<option value="">State</option>'; //<option value="">State</option>
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

    function user_id_check() {
        $user_id = $this->input->post('user_id');
        if ($user_id != '') {
            $cond = " and user_id = '" . $user_id . "'";
            $row = $this->app_users_model->fetch($cond);
            $this->data['user_id'] = $row;
            $row_1 = count($this->data['user_id']);
            if ($row_1 > 0) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }
    
    //   function delete($id,$add_id) {
    //    //$org_id = $this->data['org_id'];
    //     //$org_id=1;
    //     if (!empty($id)) {
    //         //$arr = array();
    //         $id = base64_decode($id);
    //         $add_id=  base64_decode($add_id);
            
    //        // $cond = " and firm_address_seq_no='{$id}'";
    //         //$cond1 = " and address_seq_no='{$add_id}'";
            
    //         $this->address_model->delete($add_id);
            
    //         $this->firm_address_model->delete($id);
            
    //           $msg= 'Deleted Sucessfully';
    //           $this->session->set_flashdata('suc_message11', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
    //     } else {
    //         $msg= 'Error Please try again';
    //        $this->session->set_flashdata('err_message11', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
    //     }

    //     redirect($base_url . 'firm/my_firm/' .'#tab_1_2');
    // }

    //////////////// FOUR LEVEL DESIGNATION DROPDOWN CHANGE - begin/////////////////////

   function remove_designation(){

   $admin_id = $this->data['admin_id'];
   $role_code = $this->data['role_code'];

   // $firm_seq_no = $this->input->post('firm_seq_no');

   $approval_process = $this->input->post('approval_process');

   $designation_code_radio_type = $this->input->post('designation_code_radio_type');
       $designation_code_1 = $designation_code_radio_type[0];
       $designation_code_2 = $designation_code_radio_type[1];
       $designation_code_3 = $designation_code_radio_type[2];
//        $designation_code_4 = $designation_code_radio_type[3];

   if($approval_process == '2'){

       if($designation_code_1){

       $sql_approval_level_1 = "SELECT * FROM plma_designation WHERE designation <> '" . $designation_code_1 . "'";
       $res_apoproval_level_1 = $this->db->query($sql_approval_level_1);

       $row_approval_level_1 = $res_apoproval_level_1->result_array();

       $array_approval_level_1 = array();

       $opt = '<option value="">Select Designation</option>';

       foreach($row_approval_level_1 as $key_approval_level_1 => $value_approval_level_1){
           $opt .= '<option value="' . $value_approval_level_1['designation_code'] . '" >' . $value_approval_level_1['designation'] . '</option>';

       }
       echo $opt;


       }

       
       else if($approval_process == '3'){
           if($designation_code_1){
               $sql_approval_level_1 = "SELECT * FROM plma_designation WHERE designation_code <> '" . $designation_code_1 . "'";
               $res_apoproval_level_1 = $this->db->query($sql_approval_level_1);

               $row_approval_level_1 = $res_apoproval_level_1->result_array();

               $array_approval_level_1 = array();

               $opt = '<option value="">Select Designation</option>';

           foreach($row_approval_level_1 as $key_approval_level_1 => $value_approval_level_1){
               $opt .= '<option value="' . $value_approval_level_1['designation_code'] . '" >' . $value_approval_level_1['designation'] . '</option>';

       }
           echo $opt;


           } else if($designation_code_2){

               $sql_approval_level_2 = " SELECT * FROM plma_designation WHERE designation_code <> '" . $designation_code_1 . "' "
                       . "AND designation_code <> '" . $designation_code_2 . "'";
               $res_approval_level_2 = $this->db->query($sql_approval_level_2);
               $row_approval_level_2 = $res_approval_level_2->result_array(); 

               $array_approval_level_2 = array();

               $opt = '<option value="">Select Designation</option>';

               foreach($row_approval_level_2 as $key_approval_level_2 => $value_approval_level_2){
                   $opt .= '<option value="' . $value_approval_level_2['designation_code'] . '" >' . $value_approval_level_2['designation'] . '</option>';

               }
               echo $opt;
           }
           else if($approval_process == '4'){
               if($designation_code_1){
               $sql_approval_level_1 = "SELECT * FROM plma_designation WHERE designation_code <> '" . $designation_code_1 . "'";
               $res_apoproval_level_1 = $this->db->query($sql_approval_level_1);

               $row_approval_level_1 = $res_apoproval_level_1->result_array();

               $array_approval_level_1 = array();

               $opt = '<option value="">Select Designation</option>';

           foreach($row_approval_level_1 as $key_approval_level_1 => $value_approval_level_1){
               $opt .= '<option value="' . $value_approval_level_1['designation_code'] . '" >' . $value_approval_level_1['designation'] . '</option>';

       }
           echo $opt;

               } else if($designation_code_2){
                   $sql_approval_level_2 = " SELECT * FROM plma_designation WHERE designation_code <> '" . $designation_code_1 . "' "
                           . "AND designation_code <> '" . $designation_code_2 . "'";
                   $res_approval_level_2 = $this->db->query($sql_approval_level_2);
                   $row_approval_level_2 = $res_approval_level_2->result_array(); 

                   $array_approval_level_2 = array();

                   $opt = '<option value="">Select Designation</option>';

               foreach($row_approval_level_3 as $key_approval_level_3 => $value_approval_level_3){
                   $opt .= '<option value="' . $value_approval_level_3['designation_code'] . '" >' . $value_approval_level_3['designation'] . '</option>';

               }
                   echo $opt;

               } else if($designation_code_3){
                   $sql_approval_level_4 = " SELECT * FROM plma_designation WHERE designation_code <> '" . $designation_code_1 . "' "
                           . "AND designation_code <> '" . $designation_code_2 . "' "
                           . "AND designation_code <> . '" . $designation_code_3 . "'";
                   $res_approval_level_4 = $this->db->query($sql_approval_level_4);
                   $row_approval_level_4 = $res_approval_level_4->result_array(); 

                   $array_approval_level_4 = array();

                   $opt = '<option value="">Select Designation</option>';

               foreach($row_approval_level_4 as $key_approval_level_4 => $value_approval_level_4){
                   $opt .= '<option value="' . $value_approval_level_4['designation_code'] . '" >' . $value_approval_level_4['designation'] . '</option>';

               }
                   echo $opt;

               }

           }


       }
    




   }

   
   }

    //////////////// FOUR LEVEL DESIGNATION DROPDOWN CHANGE - end/////////////////////

}
