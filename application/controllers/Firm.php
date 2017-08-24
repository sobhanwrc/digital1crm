<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Firm extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->isLogin();
        $role_code = $this->data['role_code'];
        // echo 123; exit;

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
        $this->load->model('Change_module_number_module');
        $this->load->model('industry_Type_model');
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

            $this->data['industry_type_list'] = $this->industry_Type_model->list_industry_type();

            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/firm/listing', $this->data);
        } else {
            redirect($base_url . 'firm/my_firm');
        }
    }

    function details($code = '', $read = '') {

        $code = base64_decode($code);
        $this->db->select('plma_firm.firm_seq_no,plma_firm.firm_admin_seq_no,plma_firm.firm_name,plma_firm.firm_id,plma_firm.firm_registration,plma_firm.firm_code,plma_firm.sp_contact_name,plma_firm.sp_contact_role,plma_firm.firm_image,plma_user.user_id,plma_address.email,plma_address.phone,plma_address.fax,plma_address.mobile_cell,plma_address.website_url,plma_address.social_media_url,plma_address.address_line1,plma_address.address_line2,plma_address.address_line3,plma_address.country,plma_address.city,plma_address.state,plma_address.postal_code,plma_address.remarks_notes')->from('plma_firm')
                ->join('plma_user', 'plma_firm.firm_seq_no = plma_user.firm_seq_no', 'INNER')
                ->join('plma_address', 'plma_firm.address_seq_no = plma_address.address_seq_no', 'LEFT')
                ->where('plma_firm.firm_seq_no="' . $code . '"');
        $firm_details = $this->db->get()->result_array();
        $this->data['firm_details'] = $firm_details;
//        t($this->data['firm_details']);die;
        //phone number with country code
        $home_phone = $firm_details[0]['phone'];
        $original_home_phone = $home_phone;
        $length = strlen($original_home_phone);
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

        $user_phone_number = substr($original_home_phone, -11);
        $this->data['phone_no'] = $user_phone_number;
        $this->data['country_code1'] = $country_code1;
        
        $mobile_no = $firm_details[0]['mobile_cell'];
        $length = strlen($mobile_no);
        if($length == 17){
            $country_code2 = substr($mobile_no, 0, 3);
        }
        $user_mobile_no = substr($mobile_no, -11);
        $this->data['user_mobile_no'] = $user_mobile_no;
        $this->data['country_code2'] = $country_code2;
//        die();
        //end

        $this->db->select('country_seq_no,name')->from('plma_country');

        $this->data['country_details'] = $this->db->get()->result_array();

        if ($this->data['firm_details'][0]['country']) {
            $this->db->select('state_seq_no,state_name')->from('plma_states')->where('country_seq_no="' . $this->data['firm_details'][0]['country'] . '"');

            $this->data['state_details_details'] = $this->db->get()->result_array();
        } else {
            $this->data['state_details_details'] = array();
        }

        if ($this->data['firm_details'][0]['state']) {
            $this->db->select('city_seq_no,city_name')->from('plma_city')->where('state_seq_no="' . $this->data['firm_details'][0]['state'] . '"');

            $this->data['city_details_details'] = $this->db->get()->result_array();
        } else {
            $this->data['city_details_details'] = array();
        }



        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            
        }

        $this->get_include();
        if ($read == 'read') {
            // echo $read; exit;
            $this->load->view($this->view_dir . 'operation_master/firm/only_view', $this->data); //view page
        } else {
            // echo 789; exit;
            $this->load->view($this->view_dir . 'operation_master/firm/firm_view', $this->data); //edit page
        }
    }

    //---------------EDIT DETAILS FIRM (NEW CODE)--------------//

    function edit_details($code = '', $read = '') {
//        $fetch = $this->app_users_model->fetch();
//        t($fetch);die();
        $code = base64_decode($code);
        $admin_id = $this->data['admin_id'];
        // $firm_seq_no = $this->data['firm_seq_no'];
        $role_code = $this->data['role_code'];

        //General Informations
        $firm_name = $this->input->post('firm_name');

        $cond = " and firm_seq_no = '" . $code . "'";
        $row = $this->firm_model->fetch($cond);
        //t($row);die;
        foreach ($row as $key => $value) {
            $firm_seq_no = $value['firm_seq_no'];
            $cond = "AND firm_seq_no = '" . $firm_seq_no . "'AND status=1";
            $pa_row = $this->firm_pa_model->fetch($cond);
            $row[$key]['practice_area'] = $pa_row;
        }

        if (isset($firm_name)) {

            // echo "aaaaa"; die();
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

            $this->load->helper('string');
            $random = random_string('alnum', 16);
            $random1 = base64_encode($random);

            $email = $this->input->post('email');
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $group_code = $this->input->post('group_code');


            $config['upload_path'] = './assets/upload/image';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            //$this->upload->do_upload('santanu');
            if ($this->upload->do_upload('company_logo')) {
                $upload_data = $this->upload->data();
                $image_config["image_library"] = "gd2";
                $image_config["source_image"] = $upload_data["full_path"];
                $image_config['create_thumb'] = FALSE;
                $image_config['maintain_ratio'] = FALSE;
                //$image_config['maintain_ratio'] = TRUE;
                $image_config['new_image'] = $upload_data["file_path"] . $data['file_name'];
                $image_config['quality'] = "100%";
                $image_config['width'] = 120;
                $image_config['height'] = 120;
                $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
                $image_config['master_dim'] = ($dim > 0) ? "height" : "width";
                $this->load->library('image_lib');
                $this->image_lib->initialize($image_config);
                $this->image_lib->resize();
                $image = $upload_data['file_name'];

                //$this->load->view('upload_form', $error);
            }

            // $cond = "firm_seq_no = $firm_id";
            if (isset($image) && $image != "") {

                $firm_image = $image;
            } else {

                $firm_image = $row[0]['firm_image'];
            }
            //echo  $image;  die();
            // $designation_code = $this->input->post('designation_code');
//            $is_attorney = $this->input->post('is_attorney');

            $this->db->trans_start();

            $add_user_for_firm_admin_seq_no = array(
                'user_first_name' => $fname,
                'user_last_name' => $lname,
                'user_id' => $email,
                'password' => $final_password,
//                'gender' => $attorney_gender,
                'role_code' => 'FIRMADM',
                'salt' => $random,
                'created_by' => $admin_id,
                'created_date' => time(),
                'status' => 1,
                'authorized_by' => $admin_id,
                'authorized_date' => time()
                    // 'designation' => $designation_code,
//                'group_code' => $group_code
            );
//            t($add_user_for_firm_admin_seq_no);
            $user_insertid = $this->app_users_model->edit($add_user_for_firm_admin_seq_no, $code);
            $remarks = $this->input->post('remarks'); //echo $this->db->last_query(); exit;
            $firm_admin_seq_no = $user_insertid; //$this->input->post('firm_admin_seq_no');
            //Enter Address
            $email_1 = $this->input->post('email');

            $country_code = $this->input->post('country_code1');
            $phone = $this->input->post('phone');
//            $phone = $this->removePhoneMask($phone);
            
            $country_code2 = $this->input->post('country_code2');
            $mobile = $this->input->post('mobile');
//            $mobile = $this->removePhoneMask($mobile);
            
            $fax = $this->input->post('fax');
            //$fax = $this->removePhoneMask($fax);
            $web_url = $this->input->post('web_url');
            $social_url = $this->input->post('social_url');
            $addr_line_1 = $this->input->post('addr_line_1');
            $addr_line_2 = $this->input->post('addr_line_2');
            $addr_line_3 = $this->input->post('addr_line_3');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
            $county = $this->input->post('county');
            $city = $this->input->post('city');
            $postal_code = $this->input->post('postal_code1');

            $data1 = array(
                'address_line1' => $addr_line_1,
                'address_line2' => $addr_line_2,
                'address_line3' => $addr_line_3,
                'city' => $city,
                'state' => $state,
                'postal_code' => $postal_code,
                'country' => $country,
//                'county' => '',
                'email' => $email_1,
                'phone' => $country_code . $phone,
                'mobile_cell' => $country_code2.$mobile,
                'fax' => $fax,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
                'created_by' => $admin_id,
                'remarks_notes' => $remarks,
                'created_date' => time()
            );
            //t($data1);die;
            $insertid = $this->address_model->edit($data1, $row[0]['address_seq_no']);
            //echo $this->db->last_query();die;
            //Remarks

            $approval_level = $this->input->post('approval_process');
            //insert to firm
            $data2 = array(
                'firm_admin_seq_no' => $firm_admin_seq_no,
                'firm_id' => $firm_id,
                'firm_code' => $firm_code,
                'firm_name' => $firm_name,
                'firm_registration' => $firm_reg,
                'firm_jurisdiction' => $firm_jurisdiction,
                'remarks_notes' => $remarks,
                'sp_contact_name' => $sp_name,
                'sp_contact_role' => $sp_role,
//                'approval_level' => $approval_level,
                'created_by' => $admin_id,
                'firm_image' => $firm_image,
                'created_date' => time()
            );
//t($data2); exit;
            $insertid2 = $this->firm_model->edit($data2, $code);
            //echo $this->db->last_query();die;
            //NEW IMPLEMENT BY SOBHAN 22-03-17
            if (!empty($insertid2)) {
                $data = array(
                    'firm_seq_no' => $insertid2
                );
                $edit_firm_table = $this->app_users_model->edit($data, $user_insertid);
            }
            //END

            $firm_seq_no = $this->db->insert_id();

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }

            //echo $this->db->last_query(); exit;
            /// .end copy app code to firm level code

            if ($insertid2) {
                $msg = 'Company edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'firm');
            } else {
                $msg = 'Error in updating company';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'firm/details');
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

    //-------------------END----------------//


    function my_firm() {
        $admin_all_session = $this->session->userdata('admin_session_data');
        $role_code = $admin_all_session['role_code'];
        if ($role_code == 'ATTRMGR' || $role_code == 'ATTR') {
            redirect($base_url . 'firm');
        }
        $admin_id = $admin_all_session['admin_id'];
        //$firm_seq_no = $this->data['firm_seq_no'];
        
        $firm_seq_no = $admin_all_session['firm_seq_no'];
        

        $code = $firm_seq_no;
        $submit = $this->input->post('general_tab');

        $cond = " and firm_seq_no = '" . $firm_seq_no . "'";
        $row = $this->firm_model->fetch($cond);

        foreach ($row as $key => $value) {
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


            $firm_id = $this->input->post('firm_id');
            $cond = "AND firm_seq_no=$firm_id";
            $fetch_firm = $this->firm_model->fetch($cond);
            // echo $fetch_firm[0]['firm_image']; die();
            //t($fetch_firm); die();
            //echo $firm_id; die();

            $config['upload_path'] = './assets/upload/image';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '50000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            //$this->upload->do_upload('santanu');
            if ($this->upload->do_upload('company_logo')) {
                @unlink('./assets/upload/image/' . $fetch_firm[0]['firm_image']);
                $upload_data = $this->upload->data();
                $image_config["image_library"] = "gd2";
                $image_config["source_image"] = $upload_data["full_path"];
                $image_config['create_thumb'] = TRUE;
                $image_config['maintain_ratio'] = FALSE;
                $image_config['new_image'] = $upload_data["file_path"] . $data['file_name'];
                $image_config['quality'] = "100%";
                $image_config['width'] = 250;
                $image_config['height'] = 80;
                $image_config['thumb_marker'] = '';
                $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
                $image_config['master_dim'] = ($dim > 0) ? "height" : "width";
                $this->load->library('image_lib');
                $this->image_lib->initialize($image_config);
                $this->image_lib->resize();
                $image = $upload_data['file_name'];
                // echo $image;die;
                //$this->load->view('upload_form', $error);
            }
            // die():



            $data = array('firm_image' => $image);
            // t($data);
            // die();
            //echo $firm_id;die;
            // $cond = "firm_seq_no = $firm_id";
            if (isset($image) && $image !== "") {
                $this->firm_model->edit($data, $firm_seq_no);
                // echo $this->db->last_query(); die();
            }





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
                $designation = $this->input->post('designation_code');
                $email = $this->input->post('email');
                $country_code = $this->input->post('country_code1');
                $country_code_mobile = $this->input->post('country_code2');
                $phone = $this->input->post('phone');
//                $phone = $this->removePhoneMask($phone);
                $mobile = $this->input->post('mobile');
                //$mobile = $this->removePhoneMask($mobile);
                $fax = $this->input->post('fax');
                //$fax = $this->removePhoneMask($fax);
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
                    'phone' => $country_code . $phone,
                    'mobile_cell' => $country_code_mobile . $mobile,
                    'fax' => $fax,
                    'website_url' => $web_url,
                    'social_media_url' => $social_url,
                    'updated_by' => $admin_id,
                    'updated_date' => time(),
                    'position' => $designation
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
                //echo $this->db->last_query();die;
//               echo  $firm_seq_no; exit;
                ///////////////////// Edit Practice Area /////////////////////////
                $data_status = array('status' => 5);
                $insertstatus = $this->firm_pa_model->edit_cond($data_status, "firm_seq_no =  '" . $firm_seq_no . "'");

                foreach ($practice_area as $key => $value) {
                    $data_pa = array(
                        'firm_seq_no' => $firm_seq_no,
                        'practice_area_seq_no' => $value,
                        'remarks_notes' => 'Practice Area',
                        'created_by' => $admin_id,
                        'created_date' => time(),
                        'updated_by' => $admin_id,
                        'updated_date' => time(),
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
            $country_code = $this->input->post('country_code3');
//            $phone = $this->removePhoneMask($phone);
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
                'phone' => $country_code . $phone,
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

                $home_phone = $row2[0]['phone'];
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
                } else if ($length == 17) {
                    $country_code1 = substr($original_home_phone, 0, 3);
                }
                $home_phone_number = substr($original_home_phone, -11);
                $this->data['country_code'] = $country_code1;
                $this->data['home_phone_number'] = $home_phone_number;

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

            $admin_session_data = $this->session->userdata('admin_session_data');
            $sql1 = "SELECT * FROM plma_user pu where pu.role_code = 'FIRMADM' and pu.user_seq_no = " . $admin_session_data['admin_id'];
            $query1 = $this->db->query($sql1);
            //echo $query1 -> [0]['firm_seq_no']; die();
            //print_r($query1); die();
            $this->data['firm_admin'] = $query1->result_array();

            // $firm_seq_no  = $query1->result_array();
            // $firm_no =  $firm_seq_no [0]['firm_seq_no'];
            //echo $firm_no; die();
            $cond1 = " AND firm_seq_no = $firm_seq_no";
            $firm_details = $this->firm_model->fetch($cond1);

            $this->data['firm_details'] = $firm_details;


            // t($query1->result_array()); die();
            //fetch locations
            $sql2 = "select
              pfa.firm_address_seq_no ,pfa.firm_seq_no, pfa.firm_address_type,pa.*
            from
            plma_firm_address pfa left join plma_address pa on pa.address_seq_no = pfa.address_seq_no
            where pfa.created_by= $admin_id";

            $query2 = $this->db->query($sql2);
            $this->data['all_locations'] = $query2->result_array();


            $select = "country_seq_no,name";
            $cond = "order by country_id='US' desc";
            $this->data['country_info'] = $this->country_model->fetch($cond, $select);

            $this->data['all_practice_area'] = $this->practice_area_model->fetch();
            $this->data['all_designations'] = $this->designation_model->fetch();
            $this->data['all_groups'] = $this->group_model->fetch();
//            t($this->data;exit;
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/firm/my_firm_view', $this->data);
        }
    }

    function location_edit($code = '', $firm_id = '') {

        $code = base64_decode($code);
        $firm_id = base64_decode($firm_id);
        //echo $code;
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $firm_addr_type2 = $this->input->post('firm_addr_type2');
        ;
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

        $data2 = array(
            'firm_address_type' => $firm_addr_type2,
            'updated_by' => $admin_id,
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

        redirect($base_url . 'firm/my_firm/' . '#tab_1_2');
    }

    function add() {
//        $fetch = $this->app_users_model->fetch();
//        t($fetch);die();
        $admin_id = $this->data['admin_id'];
        // $firm_seq_no = $this->data['firm_seq_no'];
        $role_code = $this->data['role_code'];

        //General Informations
        $firm_name = $this->input->post('firm_name');

        if (isset($firm_name)) {

            // echo "aaaaa"; die();
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


            $config['upload_path'] = './assets/upload/image';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            //$this->upload->do_upload('santanu');
            if ($this->upload->do_upload('company_logo')) {
                /* $error = array('error' => $this->upload->display_errors());
                  print_r($error);

                  //$this->load->view('upload_form', $error);
                  }
                  else
                  { */
                $upload_data = $this->upload->data();
                $image_config["image_library"] = "gd2";
                $image_config["source_image"] = $upload_data["full_path"];
                $image_config['create_thumb'] = FALSE;
                $image_config['maintain_ratio'] = FALSE;
                //$image_config['maintain_ratio'] = TRUE;
                $image_config['new_image'] = $upload_data["file_path"] . $data['file_name'];
                $image_config['quality'] = "100%";
                $image_config['width'] = 250;
                $image_config['height'] = 80;
                $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
                $image_config['master_dim'] = ($dim > 0) ? "height" : "width";
                $this->load->library('image_lib');
                $this->image_lib->initialize($image_config);
                $this->image_lib->resize();
                $image = $upload_data['file_name'];
                //echo $image;die;
            }
            //echo  $image;  die();
            // $designation_code = $this->input->post('designation_code');
//            $is_attorney = $this->input->post('is_attorney');

            $this->db->trans_start();

            $add_user_for_firm_admin_seq_no = array(
                'user_first_name' => $fname,
                'user_last_name' => $lname,
                'user_id' => $email,
                'password' => $final_password,
//                'gender' => $attorney_gender,
                'role_code' => 'FIRMADM',
                'salt' => $random,
                'created_by' => $admin_id,
                'created_date' => time(),
                'status' => 1,
                'authorized_by' => $admin_id,
                'authorized_date' => time()
                    // 'designation' => $designation_code,
//                'group_code' => $group_code
            );
//            t($add_user_for_firm_admin_seq_no);
            $user_insertid = $this->app_users_model->add($add_user_for_firm_admin_seq_no);

            $firm_admin_seq_no = $user_insertid; //$this->input->post('firm_admin_seq_no');
            //Enter Address
            $email_1 = $this->input->post('email_1');
            $phone = $this->input->post('country_code1') . $this->input->post('phone');
//            $phone = $this->removePhoneMask($phone);
            $mobile = $this->input->post('country_code2') . $this->input->post('mobile');
//            $mobile = $this->removePhoneMask($mobile);
            $fax = $this->input->post('fax');
            //$fax = $this->removePhoneMask($fax);
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
            
            $remarks = $this->input->post('remarks'); 

            $data1 = array(
                'address_line1' => $addr_line_1,
                'address_line2' => $addr_line_2,
                'address_line3' => $addr_line_3,
                'city' => $city,
                'state' => $state,
                'postal_code' => $postal_code,
                'country' => $country,
//                'county' => '',
                'email' => $email_1,
                'phone' => $phone,
                'mobile_cell' => $mobile,
                'fax' => $fax,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//            t($data1);
            $insertid = $this->address_model->add($data1);
            //echo $this->db->last_query();die;
            //Remarks
            //echo $this->db->last_query(); exit;
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
//                'approval_level' => $approval_level,
                'created_by' => $admin_id,
                'firm_image' => $image,
                'created_date' => time()
            );
//t($data2); exit;
            $insertid2 = $this->firm_model->add($data2);
            //echo $this->db->last_query();die;
            //NEW IMPLEMENT BY SOBHAN 22-03-17
            if (!empty($insertid2)) {
                $data = array(
                    'firm_seq_no' => $insertid2
                );
                $edit_firm_table = $this->app_users_model->edit($data, $user_insertid);
            }
            //END

            $firm_seq_no = $this->db->insert_id();

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

    function delete($id, $add_id) {
        //$org_id = $this->data['org_id'];
        //$org_id=1;
        if (!empty($id)) {
            //$arr = array();
            $id = base64_decode($id);
            $add_id = base64_decode($add_id);

            // $cond = " and firm_address_seq_no='{$id}'";
            //$cond1 = " and address_seq_no='{$add_id}'";

            $this->address_model->delete($add_id);

            $this->firm_address_model->delete($id);

            $msg = 'Deleted Sucessfully';
            $this->session->set_flashdata('suc_message11', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
        } else {
            $msg = 'Error Please try again';
            $this->session->set_flashdata('err_message11', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
        }

        redirect($base_url . 'firm/my_firm/' . '#tab_1_2');
    }

    function show_module() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_session_data['firm_seq_no'];
        $this->data['firm_seq_no'] = $firm_seq_no;
        if ($firm_seq_no != '') {
            $cond = " and firm_seq_no = '" . $firm_seq_no . "'";
            $row = $this->Change_module_number_module->fetch($cond);
            $this->data['notes'] = $row;
            // print_r( $this->data['notes']);
            // die();
        }
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/firm/script_view', $this->data);
    }

    function edit_module() {
        $firm_seq_no = $this->input->post('firm_seq_no');
        $module = $this->input->post('module_value');
        $script = $this->input->post('ckeditorBox');
        $all_note = 'note' . $module;
        $module_name = 'module' . $module;
        // echo "$all_note";
        // echo  $module;
        // echo "</br>";
        // echo $script;
        // echo "satyam";
        $note_insert = array($module_name => $module_name, $all_note => $script, 'firm_seq_no' => $firm_seq_no);
        $note_edit = array($module_name => $module_name, $all_note => $script);
        if ($firm_seq_no != '') {
            $cond = " and firm_seq_no = '" . $firm_seq_no . "'";
            $row = $this->Change_module_number_module->fetch($cond);
            if ($row) {
                $edit_cond = " firm_seq_no = '" . $firm_seq_no . "'";
                $result_module = $this->Change_module_number_module->edit_cond($note_edit, $edit_cond);
            } else {
                $result_module = $this->Change_module_number_module->add($note_insert);
            }
        }

        //echo $this->db->last_query();
    }

    function import_file() {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];
        $firm_admin_seq_no = $this->data['firm_admin_seq_no'];


        if ($this->input->is_ajax_request()) {
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
                if ($FileExt == 'xls' || $FileExt == 'xlx' || $FileExt == 'xlsx') {
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
                            for ($row = 1; $row <= $highestRow; ++$row) {
                                $values = array();
                                for ($col = 0; $col < $highestColumnIndex; ++$col) {
                                    $cell = $worksheet->getCellByColumnAndRow($col, $row);
                                    $val = $cell->getValue();
                                    if (isset($val) && $val)
                                        $exceldata[$row][$col] = $val;
                                }
                            }
                        }

                        $main_array = $exceldata;


                        $test_arr = array();
                        $arr_user = array();
                        $arr_firm = array();
                        try {
                            foreach ($main_array as $k => $v) {

                                if ($k > 2) {

                                    $phone_no1 = trim(preg_replace('/[^A-Za-z0-9]/', '', $v[5]));
                                    $phone_no = substr($phone_no1, -10);
                                    $total_phone_number_with_format = $this->madePhoneformate_for_upload($phone_no);

                                    //$arr_user['firm_seq_no'] = $this->input->post('firm_seq_no');
                                    $company_name = $v[0];

                                    $password = md5($v[6]);
                                    $this->load->helper('string');
                                    $random = random_string('alnum', 16);
                                    $random1 = base64_encode($random);

                                    $final_password = $password . $random1;

                                    //$arr['first_name']=$exp_name[0];
                                    $new_name = str_replace(' ', '_', $company_name);

                                    $lower_new_name = strtolower($new_name);



                                    $arr_firm['firm_name'] = $company_name;
                                    $arr_firm['created_by'] = $admin_id;
                                    $arr_firm['created_date'] = time();


                                    $insertidfirmtable = $this->firm_model->add($arr_firm);


                                    if ($insertidfirmtable) {

                                        $q = $this->db->query("select max(firm_seq_no) as max_id  from plma_firm");
                                        $max_data = $q->row_array();
                                        $new_firm_seq_no = $max_data['max_id'];


                                        $arr_user['user_id'] = $lower_new_name . '@gmail.com';
                                        $arr_user['firm_seq_no'] = $new_firm_seq_no;
                                        $arr_user['password'] = $final_password;

                                        $contact_person_name = explode(" ", $v[0], 2);
                                        $arr_user['user_first_name'] = $contact_person_name[0];
                                        $arr_user['user_last_name'] = $contact_person_name[1];

                                        $arr_user['mobile'] = $v[2];
                                        $arr_user['role_code'] = 'FIRMADM';
                                        $arr_user['salt'] = $random;
                                        //$arr_user['website'] = $v[4];

                                        $arr_user['created_by'] = $admin_id;
                                        $arr_user['created_date'] = time();
                                        $arr_user['status'] = '1';
                                        $insertidusertable = $this->user_model->add($arr_user);
                                    }
                                }
                            }
                        } catch (Exception $e) {
                            echo json_encode(array('status' => '0', 'msg' => 'Not uploaded. Try Again.'));
                        }
                        echo json_encode(array('status' => '1', 'msg' => 'Uploaded successfully'));
                    }
                }
            }
        }
    }

    function madePhoneformate_for_upload($mobile_no) {
        $mobile_no = preg_replace('/[^A-Za-z0-9]/', '', $mobile_no);

        $mobile_no1 = substr($mobile_no, 0, 4);
        if ($mobile_no1) {
            $mobile_no1 = $mobile_no1;
        }
        $mobile_no2 = substr($mobile_no, 4, 10);
        if ($mobile_no2) {
            $mobile_no2 = $mobile_no2;
        }

        $new_mobile_no = '+44' . '(0)' . $mobile_no1 . ' ' . $mobile_no2;

        return $new_mobile_no;
    }

}