<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Import_csv extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('attorney_model');
        $this->load->model('firm_model');
        $this->load->model('app_users_model');
        $this->load->model('address_model');
        $this->load->model('country_model');
        $this->load->model('states_model');
        $this->load->model('county_model');
        $this->load->model('city_model');

        $role_code = $this->data['role_code'];
        if ($role_code != 'SITEADM') {
            redirect($base_url . 'login/logout');
        }
    }

    function index() {

        $admin_id = $this->data['admin_id']; //exit;
        $role_code = $this->data['role_code'];

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/import/file', $this->data);
    }

    function add() {  // for excel import
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');

        $admin_id = $this->data['admin_id']; //exit;
        $role_code = $this->data['role_code'];
//t($_FILES);exit;
        $fileName = isset($_FILES['csv_file']['name']) ? $_FILES['csv_file']['name'] : '';
        if ($fileName != '') {
            // $uploaddir = './files/';
            $config['upload_path'] = $this->config->item('upload_path') . 'csv_file/';
            $RemoveFileSpace = preg_replace('/\s+/', '', $fileName);
            $expStr = explode('.', $RemoveFileSpace);
            $FileExt = strtolower(end($expStr));
//exit;
            if ($FileExt == 'xlsx' || $FileExt == 'xlx' || $FileExt == 'xls') {
                $NewFileName = $expStr[0] . time() . '.' . $FileExt;
                if (move_uploaded_file($_FILES['csv_file']['tmp_name'], $config['upload_path'] . $NewFileName)) {
                    // read the text file
                    $excelFile = $config['upload_path'] . $NewFileName;

                    $objReader = new PHPExcel_Reader_Excel2007($this->phpexcel);

                    ob_end_clean();

                    $objPHPExcel = $objReader->load($excelFile);
                    //Itrating through all the sheets in the excel workbook and storing the array data
                    foreach ($objPHPExcel->getWorksheetIterator() as $key => $worksheet) {
                        $main_array = $worksheet->toArray(NULL, TRUE, TRUE);
//                        $main_array = $this->removeEmptyCell($main_array);
//                        $arrayData[$worksheet->getTitle()] = $main_array;
                    }
                }
            } else {
                $msg = 'This is not a .xlsx file format!';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'import_csv');
            }
        }

//        t($main_array);
//        exit;

        $email_array = array();
        foreach ($main_array as $key => $val) {
            if ($key > 0) {
                $email = $val[0];
                $job_title = $val[47];
                $email = str_replace('"', '', $email);
                $job_title = str_replace('"', '', $job_title);
                $email_array[] = $email . '-' . $job_title;
            }
        }

//        t($email_array);
//        exit;

        $this->data['email'] = $email_array;
        $this->data['NewFileName'] = $NewFileName;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/import/file', $this->data);
//
//        t($csvData);
//        exit;
    }

    function insertData($param) {  // for excel import
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');

        $admin_id = $this->data['admin_id']; //exit;
        $role_code = $this->data['role_code'];

        $email = $this->input->post('firm_email');
        $csv_file_name = $this->input->post('csv_file_name');
//exit;
        $config['upload_path'] = $this->config->item('upload_path') . 'csv_file/';
        $excelFile = $config['upload_path'] . $csv_file_name;
        $objReader = new PHPExcel_Reader_Excel2007($this->phpexcel);

        ob_end_clean();

        $objPHPExcel = $objReader->load($excelFile);
        //Itrating through all the sheets in the excel workbook and storing the array data
        foreach ($objPHPExcel->getWorksheetIterator() as $key => $worksheet) {
            $main_array = $worksheet->toArray(NULL, TRUE, TRUE);
        }

        $mapping_fields = array();
        foreach ($main_array[0] as $key => $value) {
            $mapping_fields[] = $value;
        }

        unlink($config['upload_path'] . $csv_file_name);

//        t($main_array);

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
//        exit;

        foreach ($main_array_final as $key => $value) {
//echo $value['Email'];
//echo '<br>';
            if ($value['Email'] == $email) {

                $cond = "AND user_id = '$email'";
                $firm_user_details = $this->app_users_model->fetch($cond);
                if (count($firm_user_details) > 0) {
                    $msg = 'This email already exist as firm admin';
                    $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliur!</strong> ' . $msg . ' </div>');
                    redirect($base_url . 'import_csv');
                }

                //firm admin
                $password = '12345678';
                $password = md5($password);

                $this->load->helper('string');
                $random = random_string('alnum', 16);
                $random1 = base64_encode($random);

                $final_password = $password . $random1;

                $email = $value['Email'];
                $fname = ($value['First Name']) ? $value['First Name'] : 'no data';
                $lname = ($value['Last Name']) ? $value['Last Name'] : 'no data';
                $remarks_notes = ($value['Persona']) ? $value['Persona'] : 'no data';

                //$group_code = 'no data';
                 $group_code = 'MGMT';
                $designation_code = ($value['Job Title']) ? $value['Job Title'] : 'no data';

//                    $this->db->trans_start();
                //Enter Address
                $email_1 = $value['Email'];

                $phone = ($value['Phone Number']) ? $value['Phone Number'] : 'no data';
                $phone = $this->removePhoneMask1($phone);

                $mobile = ($value['Mobile Phone Number']) ? $value['Mobile Phone Number'] : 'no data';
                $mobile = $this->removePhoneMask1($mobile);

                $fax = ($value['Fax Number']) ? $value['Fax Number'] : 'no data';
                $fax = $this->removePhoneMask1($fax);

                $addr_line_1 = ($value['Street Address']) ? $value['Street Address'] : 'no data';
                $addr_line_2 = ($value['Street Address 2']) ? $value['Street Address 2'] : 'no data';
                $addr_line_3 = 'no data';

                $country = ($value['Country']) ? $value['Country'] : 'no data';
//                if ($country == 'USA' || $country == 'US' || $country == 'united state') {
                    $country = 233;
//                } else {
//                    $country = '';
//                }
                $state = ($value['State/Region']) ? $value['State/Region'] : 'no data';
                $select = "state_seq_no,state_name";
                $cond = " and state_name = '" . $state . "'";
                $return = $this->states_model->fetch($cond, $select);
                if (count($return) > 0) {
                    $state = $return[0]['state_seq_no'];
                } else {
                    $state = '';
                }


                $city = ($value['City']) ? $value['City'] : 'no data';

                $select = "city_seq_no,state_seq_no,city_name";
                $cond = " and city_name = '" . $city . "'";
                $return = $this->city_model->fetch($cond, $select);
                if (count($return) > 0) {
                    $city = $return[0]['city_seq_no'];
                    $state = $return[0]['state_seq_no'];
                } else {
                    $city = '';
                }

                $postal_code = ($value['Postal Code']) ? $value['Postal Code'] : 'no data';

                $remarks_notes = ($value['LinkedIn Company Page']) ? $value['LinkedIn Company Page'] : 'no data';
                $social_media_url = ($value['Facebook Company Page']) ? $value['Facebook Company Page'] : 'no data';
                $web_url = ($value['Website URL']) ? $value['Website URL'] : 'no data';

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
                    'social_media_url' => $social_media_url,
                    'remarks_notes' => $remarks_notes,
                    'created_by' => $admin_id,
                    'created_date' => time()
                );
//            t($data1); exit;
                $insertid = $this->address_model->add($data1);

                $add_user_for_firm_admin_seq_no = array(
                    'user_first_name' => $fname,
                    'user_last_name' => $lname,
                    'user_id' => $email,
                    'password' => $final_password,
                    'address_seq_no' => $insertid,
                    'role_code' => 'FIRMADM',
                    'salt' => $random,
                    'created_by' => $admin_id,
                    'created_date' => time(),
                    'status' => 1,
                    'add_flage' => 1,
                    'authorized_by' => $admin_id,
                    'authorized_date' => time(),
                    'designation' => $designation_code,
                    'group_code' => $group_code,
                    'remarks_notes' => $remarks_notes
                );
//            t($add_user_for_firm_admin_seq_no); exit;
                $user_insertid = $this->app_users_model->add($add_user_for_firm_admin_seq_no);

                $firm_admin_seq_no = $user_insertid; //$this->input->post('firm_admin_seq_no');

                $firm_id = 'no data';
                $firm_code = 'no data';
                $firm_reg = 'no data';

                $firm_jurisdiction = 'no data';

                //Single Point Information 
                $sp_name = 'no data';
                $sp_role = 'no data';
                $sections = 'no data';

                //Remarks
                $firm_name = ($value['Firm Name']) ? $value['Firm Name'] : 'no data';
                $approval_level = 'no data';
                $remarks_notes = ($value['Persona']) ? $value['Persona'] : 'no data';

                //insert to firm
                $data2 = array(
                    'firm_admin_seq_no' => $firm_admin_seq_no,
                    'firm_id' => $firm_id,
                    'firm_code' => $firm_code,
                    'firm_name' => $firm_name,
                    'firm_registration' => $firm_reg,
                    'firm_jurisdiction' => $firm_jurisdiction,
                    'address_seq_no' => $insertid,
                    'remarks_notes' => $remarks_notes,
                    'sp_contact_name' => $sp_name,
                    'sp_contact_role' => $sp_role,
                    'approval_level' => $approval_level,
                    'created_by' => $admin_id,
                    'created_date' => time()
                );
//t($data2); exit;
                $firm_seq_no = $this->firm_model->add($data2);
//                    echo $firm_seq_no;
//                    t($firm_seq_no);
//                    exit;
                /// copy app code to firm level code
                $sql = " INSERT INTO plma_firm_codes
            ( code_seq_no, firm_seq_no, short_description, long_description, created_by,created_date)
            SELECT 
             code_seq_no, $firm_seq_no , short_description, long_description,  $admin_id , " . time() . "  
            FROM plma_codes where firm_customization = 1";

                $insertid3 = $this->db->query($sql);
                
                $full_part_time='FULLTIME';
                
                $data2 = array(
                        'firm_seq_no' => $firm_seq_no,
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
                        'job_title' => $job_title,
                        'web_bio_page_url' => $web_bio_page_url,
                        'attorney_jurisdiction' => $attorney_jurisdiction,
                        'hourly_comp_cost' => $hourly_comp_cost,
                        'industry_type' => $industry_type,
                        'benefit_factor' => $benefit_factor,
                        'overhead_amount' => $overhead_amount,
                        'billing_rate_opp_cost' => $billing_rate_opp_cost,
                    
                        'remarks_notes' => $remarks_notes,
                        'profile_photo' => $profile_photo,
                        'address_seq_no' => $insertid,
                        'created_by' => $admin_id,
                        'created_date' => time()
                    );
//            echo "<pre>";
//            print_r($data2);
//            exit;

                    $insertid2 = $this->attorney_model->add($data2);

                //add sections to firm
                $this->load->model('site_admin_sections_model');
                $this->load->model('section_model');
                //t($sections); exit;
//                foreach ($sections as $key => $value) {
//
//                    $cond = "AND section_seq_no=$value";
//                    $admin_sections = $this->site_admin_sections_model->fetch($cond);
//                    ////echo $this->db->last_query(); exit;
//                    //t($admin_sections);exit;
//                    $data = array(
//                        'firm_seq_no' => $insertid2,
//                        // 'section_type' => $admin_sections[0]['section_type'],
//                        'section_id' => $admin_sections[0]['section_id'],
//                        'section_name' => $admin_sections[0]['section_name'],
//                        'long_description' => $admin_sections[0]['long_description'],
//                        'remark_notes' => $admin_sections[0]['remark_notes'],
//                        'created_by' => $admin_sections[0]['created_by'],
//                        'created_date' => $admin_sections[0]['created_date'],
//                        'updated_by' => $admin_sections[0]['updated_by'],
//                        'updated_date' => $admin_sections[0]['updated_date'],
//                    );
//
//                    $this->section_model->add($data);
//                }
//                    $this->db->trans_complete();
//                if ($this->db->trans_status() === FALSE) {
//                    $this->db->trans_rollback();
//                } else {
//                    $this->db->trans_commit();
//                }
            }
        }

        foreach ($main_array_final as $key => $value) {

            if ($value['Email'] != $email) {

                $email1 = $value['Email'];
                $cond = "AND user_id = '$email1'";
                $attorney_user_details = $this->app_users_model->fetch($cond);
                if (count($attorney_user_details) > 0) {
                    
                } else {
                    ///////////// Insert address into address table ///////////////////
                    $email = $value['Email'];

                    $phone = ($value['Phone Number']) ? $value['Phone Number'] : 'no data';
                    $phone = $this->removePhoneMask1($phone);

                    $mobile = ($value['Mobile Phone Number']) ? $value['Mobile Phone Number'] : 'no data';
                    $mobile = $this->removePhoneMask1($mobile);

                    $fax = ($value['Fax Number']) ? $value['Fax Number'] : 'no data';
                    $fax = $this->removePhoneMask1($fax);

                    $addr_line_1 = ($value['Street Address']) ? $value['Street Address'] : 'no data';
                    $addr_line_2 = ($value['Street Address 2']) ? $value['Street Address 2'] : 'no data';
                    $addr_line_3 = ($value['Street Address 3']) ? $value['Street Address 3'] : 'no data';

                    $country = ($value['Country']) ? $value['Country'] : 'no data';
//                    if ($country == 'USA' || $country == 'US' || $country == 'united state') {
                        $country = 233;
//                    } else {
//                        $country = '';
//                    }
                    $state = ($value['State/Region']) ? $value['State/Region'] : 'no data';

                    $select = "state_seq_no,state_name";
                    $cond = " and state_name = '" . $state . "'";
                    $return = $this->states_model->fetch($cond, $select);
                    if (count($return) > 0) {
                        $state = $return[0]['state_seq_no'];
                    } else {
                        $state = '';
                    }


                    $city = ($value['City']) ? $value['City'] : 'no data';

                    $select = "city_seq_no,state_seq_no,city_name";
                    $cond = " and city_name = '" . $city . "'";
                    $return = $this->city_model->fetch($cond, $select);
                    if (count($return) > 0) {
                        $city = $return[0]['city_seq_no'];
                        $state = $return[0]['state_seq_no'];
                    } else {
                        $city = '';
                    }


                    $postal_code = ($value['Postal Code']) ? $value['Postal Code'] : 'no data';


                    $remarks_notes = ($value['LinkedIn Company Page']) ? $value['LinkedIn Company Page'] : 'no data';
                    $social_url = ($value['Facebook Company Page']) ? $value['Facebook Company Page'] : 'no data';
                    $web_url = ($value['Website URL']) ? $value['Website URL'] : 'no data';


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
                        'remarks_notes' => $remarks_notes,
                        'created_by' => $admin_id,
                        'created_date' => time(),
                        'updated_by' => $admin_id,
                        'updated_date' => time()
                    );
//             echo "<pre>"; print_r($data1); exit;
                    $insertid = $this->address_model->add($data1);
                    /////////// Insert user details into User table ////////////

                    $password = '12345678';
                    $password = md5($password);

                    $this->load->helper('string');
                    $random = random_string('alnum', 16);
                    $random1 = base64_encode($random);

                    $final_password = $password . $random1;

                    $user_id = ($value['Email']) ? $value['Email'] : 'no data';
                    $attorney_first_name = ($value['First Name']) ? $value['First Name'] : 'no data';
                    $attorney_last_name = ($value['Last Name']) ? $value['Last Name'] : 'no data';
                    $remarks_notes = ($value['Persona']) ? $value['Persona'] : 'no data';

                    $group_code = 'LEGAL';
                    $designation_code = ($value['Job Title']) ? $value['Job Title'] : 'no data';

                    $approver = ($this->input->post('approver[]')) ? '1' : '';
                    $approver_type = 'no data';

//            $user_seq_no = $this->db->insert_id();

                    $attorney_id = 'no data';
                    $attorney_code = 'no data';
                    $attorney_dob = 'no data';

                    $attorney_gender = ($value['Gender']) ? $value['Gender'] : 'no data';
                    
                    if ($attorney_gender == 'Male' || $attorney_gender == 'MALE') {
                        $attorney_gender = 'MALE';
                    }
                    if ($attorney_gender == 'Female' || $attorney_gender == 'FEMALE') {
                        $attorney_gender = 'FEMALE';
                    }
                    if ($attorney_gender == 'Other' || $attorney_gender == 'OTHER') {
                        $attorney_gender = 'OTHERS';
                    }
                   
                    
                    
                    $attorney_education = ($value['Law School Graduation Date']) ? $value['Law School Graduation Date'] : 'no data';

                    $full_part_time = 'no data';

                    $attorney_type = 'no data';
                    $bar_registration_no = 'no data';

                    $practice_date = ($value['Bar Date Year']) ? $value['Bar Date Year'] : 'no data';

                    $firm_join_date = 'no data';

                    $job_title = ($value['Job Title']) ? $value['Job Title'] : 'no data';
                    $web_bio_page_url = ($value['Website URL']) ? $value['Website URL'] : 'no data';

                    $attorney_jurisdiction = 'no data';
                    $hourly_comp_cost = 'no data';
                    $hourly_comp_cost = $this->removecompMask($hourly_comp_cost);

                    $industry_type = ($value['Industry']) ? $value['Industry'] : 'no data';

                    $benefit_factor = 'no data';
                    $overhead_amount = 'no data';
                    $overhead_amount = $this->removeovrMask($overhead_amount);
                    $billing_rate_opp_cost = 'no data';
                    $billing_rate_opp_cost = $this->removebilMask($billing_rate_opp_cost);
//                $remarks = $this->input->post('remarks');
                    $designation = ($value['Job Title']) ? $value['Job Title'] : 'no data';
                    $group = 'LEGAL';
                    $user_data = array(
                        'user_id' => $user_id,
                        'password' => $final_password,
                        'user_first_name' => $attorney_first_name,
                        'user_last_name' => $attorney_last_name,
                        'role_code' => 'ATTR',
                        'add_flage' => 1,
                        'designation' => $designation,
                        'group_code' => $group,
                        'address_seq_no' => $insertid,
                        'authorized_by' => $firm_admin_seq_no,
                        'authorized_date' => time(),
                        'approver' => $approver,
                        'user_approver_type' => $approver_type,
                        'profile_photo' => $profile_photo,
                        'salt' => $random,
                        'created_by' => $admin_id,
                        'remarks_notes' => $remarks_notes,
                        'created_date' => time(),
                        'status' => 1
                    );
                    $user_add = $this->user_model->add($user_data); //echo $this->db->last_query(); exit;

                    $data2 = array(
                        'firm_seq_no' => $firm_seq_no,
                        'user_seq_no' => $user_add,
                        'attorney_id' => $attorney_id,
                        'attorney_code' => $attorney_code,
                        'attorney_dob' => $attorney_dob,
                        'attorney_first_name' => $attorney_first_name,
                        'attorney_last_name' => $attorney_last_name,
                        'attorney_gender' => $attorney_gender,
                        'attorney_education' => $attorney_education,
                        'attorney_type' => $attorney_type,
                        'bar_registration_no' => $bar_registration_no,
                        'practice_date' => $practice_date,
                        'firm_join_date' => $firm_join_date,
                        'full_part_time' => $full_part_time,
                        'job_title' => $job_title,
                        'web_bio_page_url' => $web_bio_page_url,
                        'attorney_jurisdiction' => $attorney_jurisdiction,
                        'hourly_comp_cost' => $hourly_comp_cost,
                        'industry_type' => $industry_type,
                        'benefit_factor' => $benefit_factor,
                        'overhead_amount' => $overhead_amount,
                        'billing_rate_opp_cost' => $billing_rate_opp_cost,
                        'remarks_notes' => $remarks_notes,
                        'profile_photo' => $profile_photo,
                        'address_seq_no' => $insertid,
                        'created_by' => $admin_id,
                        'created_date' => time()
                    );
//            echo "<pre>";
//            print_r($data2);
//            exit;

                    $insertid2 = $this->attorney_model->add($data2);

//                    if ($insertid2) {
//                    $data = array(
//                        'attorney_seq_no' => $insertid2,
//                        'firm_sgsec_seq_no' => $section,
//                        'created_by' => $admin_id,
//                        'updated_by' => $admin_id,
//                        'created_date' => time(),
//                        'updated_date' => time()
//                    );
//                    $this->load->model('attorney_sec_model');
//                    $this->attorney_sec_model->add($data);
//                    }
//                    $this->db->trans_complete();
//                if ($this->db->trans_status() === FALSE) {
//                    $this->db->trans_rollback();
//                } else {
//                    $this->db->trans_commit();
//                }
                }
            }
        }

        if ($insertid2) {
            $msg = 'Data imported successfully';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'import_csv');
        } else {
            $msg = 'Data not imported successfully';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliur!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'import_csv');
        }
    }

    function add1() {   // for csv upload 
        $admin_id = $this->data['admin_id']; //exit;
        $role_code = $this->data['role_code'];
//t($_FILES);exit;
        $fileName = isset($_FILES['csv_file']['name']) ? $_FILES['csv_file']['name'] : '';
        if ($fileName != '') {
            // $uploaddir = './files/';
            $config['upload_path'] = $this->config->item('upload_path') . 'csv_file/';
            $RemoveFileSpace = preg_replace('/\s+/', '', $fileName);
            $expStr = explode('.', $RemoveFileSpace);
            $FileExt = strtolower(end($expStr));
//exit;
            if ($FileExt == 'csv') {
                $NewFileName = $expStr[0] . time() . '.' . $FileExt;
                if (move_uploaded_file($_FILES['csv_file']['tmp_name'], $config['upload_path'] . $NewFileName)) {
                    // read the text file
                    $vcardfile = file_get_contents($config['upload_path'] . $NewFileName, FILE_USE_INCLUDE_PATH);
                    $vcardfile_path = $this->data['base_url'] . $config['upload_path'] . $NewFileName;
                }
            } else {
                $msg = 'This is not a .csv file format!';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'import_csv');
            }
        }

        $this->load->library('csvreader');
        $csvData = $this->csvreader->parse_file($vcardfile_path);

        t($csvData);
        exit;
        $email_array = array();
        foreach ($csvData as $key => $val) {
            $email = $val["Email"];
            $job_title = $val["Job Title"];
            $email = str_replace('"', '', $email);
            $job_title = str_replace('"', '', $job_title);
            $email_array[] = $email . '-' . $job_title;
        }

//        t($email_array);
//        exit;

        $this->data['email'] = $email_array;
        $this->data['NewFileName'] = $NewFileName;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/import/file', $this->data);
//
//        t($csvData);
//        exit;
    }

    function insertData1($param) { // for csv upload 
        $admin_id = $this->data['admin_id']; //exit;
        $role_code = $this->data['role_code'];

        $email = $this->input->post('firm_email');
//     echo '<br>';
        $csv_file_name = $this->input->post('csv_file_name');
//exit;
        $config['upload_path'] = $this->config->item('upload_path') . 'csv_file/';

        $vcardfile_path = $this->data['base_url'] . $config['upload_path'] . $csv_file_name;
        $this->load->library('csvreader');
        $csvData = $this->csvreader->parse_file($vcardfile_path);

        unlink($config['upload_path'] . $csv_file_name);
//        t($csvData);
//        exit;
        foreach ($csvData as $key => $value) {
//echo $value['Email'];
//echo '<br>';
            if ($value['Email'] == $email) {

                $cond = "AND user_id = '$email'";
                $firm_user_details = $this->app_users_model->fetch($cond);
                if (count($firm_user_details) > 0) {
                    $msg = 'This email already exist as firm admin';
                    $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliur!</strong> ' . $msg . ' </div>');
                    redirect($base_url . 'import_csv');
                }

                //firm admin
                $password = '12345678';
                $password = md5($password);

                $this->load->helper('string');
                $random = random_string('alnum', 16);
                $random1 = base64_encode($random);

                $final_password = $password . $random1;

                $email = $value['Email'];
                $fname = ($value['First Name']) ? $value['First Name'] : 'no data';
                $lname = ($value['Last Name']) ? $value['Last Name'] : 'no data';
                $remarks_notes = ($value['Persona']) ? $value['Persona'] : 'no data';

                $group_code = 'MGMT';


                $designation_code = ($value['Job Title']) ? $value['Job Title'] : 'no data';

//                    $this->db->trans_start();
                //Enter Address
                $email_1 = $value['Email'];

                $phone = ($value['Phone Number']) ? $value['Phone Number'] : 'no data';
                $phone = $this->removePhoneMask1($phone);

                $mobile = ($value['Mobile Phone Number']) ? $value['Mobile Phone Number'] : 'no data';
                $mobile = $this->removePhoneMask1($mobile);

                $fax = ($value['Fax Number']) ? $value['Fax Number'] : 'no data';
                $fax = $this->removePhoneMask1($fax);

                $addr_line_1 = ($value['Street Address']) ? $value['Street Address'] : 'no data';
                $addr_line_2 = ($value['Street Address 2']) ? $value['Street Address 2'] : 'no data';
                $addr_line_3 = 'no data';

                $country = ($value['Country']) ? $value['Country'] : 'no data';
                $state = ($value['State/Region']) ? $value['State/Region'] : 'no data';
                $city = ($value['City']) ? $value['City'] : 'no data';
                $postal_code = ($value['Postal Code']) ? $value['Postal Code'] : 'no data';

                $remarks_notes = ($value['LinkedIn Company Page']) ? $value['LinkedIn Company Page'] : 'no data';
                $social_media_url = ($value['Facebook Company Page']) ? $value['Facebook Company Page'] : 'no data';
                $web_url = ($value['Website URL']) ? $value['Website URL'] : 'no data';

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
                    'social_media_url' => $social_media_url,
                    'remarks_notes' => $remarks_notes,
                    'created_by' => $admin_id,
                    'created_date' => time()
                );
//            t($data1); exit;
                $insertid = $this->address_model->add($data1);

                $add_user_for_firm_admin_seq_no = array(
                    'user_first_name' => $fname,
                    'user_last_name' => $lname,
                    'user_id' => $email,
                    'password' => $final_password,
                    'address_seq_no' => $insertid,
                    'role_code' => 'FIRMADM',
                    'salt' => $random,
                    'created_by' => $admin_id,
                    'created_date' => time(),
                    'status' => 1,
                    'add_flage' => 1,
                    'authorized_by' => $admin_id,
                    'authorized_date' => time(),
                    'designation' => $designation_code,
                    'group_code' => $group_code,
                    'remarks_notes' => $remarks_notes
                );
//            t($add_user_for_firm_admin_seq_no); exit;
                $user_insertid = $this->app_users_model->add($add_user_for_firm_admin_seq_no);

                $firm_admin_seq_no = $user_insertid; //$this->input->post('firm_admin_seq_no');

                $firm_id = 'no data';
                $firm_code = 'no data';
                $firm_reg = 'no data';

                $firm_jurisdiction = 'no data';

                //Single Point Information 
                $sp_name = 'no data';
                $sp_role = 'no data';
                $sections = 'no data';

                //Remarks
                $firm_name = ($value['Firm Name']) ? $value['Firm Name'] : 'no data';
                $approval_level = 'no data';
                $remarks_notes = ($value['Persona']) ? $value['Persona'] : 'no data';

                //insert to firm
                $data2 = array(
                    'firm_admin_seq_no' => $firm_admin_seq_no,
                    'firm_id' => $firm_id,
                    'firm_code' => $firm_code,
                    'firm_name' => $firm_name,
                    'firm_registration' => $firm_reg,
                    'firm_jurisdiction' => $firm_jurisdiction,
                    'address_seq_no' => $insertid,
                    'remarks_notes' => $remarks_notes,
                    'sp_contact_name' => $sp_name,
                    'sp_contact_role' => $sp_role,
                    'approval_level' => $approval_level,
                    'created_by' => $admin_id,
                    'created_date' => time()
                );
//t($data2); exit;
                $firm_seq_no = $this->firm_model->add($data2);
//                    echo $firm_seq_no;
//                    t($firm_seq_no);
//                    exit;
                /// copy app code to firm level code
                $sql = " INSERT INTO plma_firm_codes
            ( code_seq_no, firm_seq_no, short_description, long_description, created_by,created_date)
            SELECT 
             code_seq_no, $firm_seq_no , short_description, long_description,  $admin_id , " . time() . "  
            FROM plma_codes where firm_customization = 1";

                $insertid3 = $this->db->query($sql);

                //add sections to firm
                $this->load->model('site_admin_sections_model');
                $this->load->model('section_model');
                //t($sections); exit;
//                foreach ($sections as $key => $value) {
//
//                    $cond = "AND section_seq_no=$value";
//                    $admin_sections = $this->site_admin_sections_model->fetch($cond);
//                    ////echo $this->db->last_query(); exit;
//                    //t($admin_sections);exit;
//                    $data = array(
//                        'firm_seq_no' => $insertid2,
//                        // 'section_type' => $admin_sections[0]['section_type'],
//                        'section_id' => $admin_sections[0]['section_id'],
//                        'section_name' => $admin_sections[0]['section_name'],
//                        'long_description' => $admin_sections[0]['long_description'],
//                        'remark_notes' => $admin_sections[0]['remark_notes'],
//                        'created_by' => $admin_sections[0]['created_by'],
//                        'created_date' => $admin_sections[0]['created_date'],
//                        'updated_by' => $admin_sections[0]['updated_by'],
//                        'updated_date' => $admin_sections[0]['updated_date'],
//                    );
//
//                    $this->section_model->add($data);
//                }
//                    $this->db->trans_complete();
//                if ($this->db->trans_status() === FALSE) {
//                    $this->db->trans_rollback();
//                } else {
//                    $this->db->trans_commit();
//                }
            }
        }
//  echo 123;
        foreach ($csvData as $key => $value) {

            if ($value['Email'] != $email) {

                $email1 = $value['Email'];
                $cond = "AND user_id = '$email1'";
                $attorney_user_details = $this->app_users_model->fetch($cond);
                if (count($attorney_user_details) > 0) {
                    
                } else {
                    ///////////// Insert address into address table ///////////////////
                    $email = $value['Email'];

                    $phone = ($value['Phone Number']) ? $value['Phone Number'] : 'no data';
                    $phone = $this->removePhoneMask1($phone);

                    $mobile = ($value['Mobile Phone Number']) ? $value['Mobile Phone Number'] : 'no data';
                    $mobile = $this->removePhoneMask1($mobile);

                    $fax = ($value['Fax Number']) ? $value['Fax Number'] : 'no data';
                    $fax = $this->removePhoneMask1($fax);

                    $addr_line_1 = ($value['Street Address']) ? $value['Street Address'] : 'no data';
                    $addr_line_2 = ($value['Street Address 2']) ? $value['Street Address 2'] : 'no data';
                    $addr_line_3 = ($value['Street Address 3']) ? $value['Street Address 3'] : 'no data';

                    $country = ($value['Country']) ? $value['Country'] : 'no data';
                    $state = ($value['State/Region']) ? $value['State/Region'] : 'no data';
                    $city = ($value['City']) ? $value['City'] : 'no data';
                    $postal_code = ($value['Postal Code']) ? $value['Postal Code'] : 'no data';
                    $remarks_notes = ($value['LinkedIn Company Page']) ? $value['LinkedIn Company Page'] : 'no data';
                    $social_url = ($value['Facebook Company Page']) ? $value['Facebook Company Page'] : 'no data';
                    $web_url = ($value['Website URL']) ? $value['Website URL'] : 'no data';


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
                        'remarks_notes' => $remarks_notes,
                        'created_by' => $admin_id,
                        'created_date' => time(),
                        'updated_by' => $admin_id,
                        'updated_date' => time()
                    );
//             echo "<pre>"; print_r($data1); exit;
                    $insertid = $this->address_model->add($data1);
                    /////////// Insert user details into User table ////////////

                    $password = '12345678';
                    $password = md5($password);

                    $this->load->helper('string');
                    $random = random_string('alnum', 16);
                    $random1 = base64_encode($random);

                    $final_password = $password . $random1;

                    $user_id = ($value['Email']) ? $value['Email'] : 'no data';
                    $attorney_first_name = ($value['First Name']) ? $value['First Name'] : 'no data';
                    $attorney_last_name = ($value['Last Name']) ? $value['Last Name'] : 'no data';
                    $remarks_notes = ($value['Persona']) ? $value['Persona'] : 'no data';

                    $group_code = 'no data';
                    $designation_code = ($value['Job Title']) ? $value['Job Title'] : 'no data';

                    $approver = ($this->input->post('approver[]')) ? '1' : '';
                    $approver_type = 'no data';

//            $user_seq_no = $this->db->insert_id();

                    $attorney_id = 'no data';
                    $attorney_code = 'no data';
                    $attorney_dob = 'no data';

                    $attorney_gender = ($value['Gender']) ? $value['Gender'] : 'no data';
                    if ($attorney_gender == 'Male' || $attorney_gender == 'MALE') {
                        $attorney_gender = 'MALE';
                    }
                    if ($attorney_gender == 'Female' || $attorney_gender == 'FEMALE') {
                        $attorney_gender = 'FEMALE';
                    }
                    if ($attorney_gender == 'Other' || $attorney_gender == 'OTHER') {
                        $attorney_gender = 'OTHERS';
                    }

                    $attorney_education = ($value['Law School Graduation Date']) ? $value['Law School Graduation Date'] : 'no data';

                    $full_part_time = 'no data';

                    $attorney_type = 'no data';
                    $bar_registration_no = 'no data';

                    $practice_date = ($value['Bar Date Year']) ? $value['Bar Date Year'] : 'no data';

                    $firm_join_date = 'no data';

                    $job_title = ($value['Job Title']) ? $value['Job Title'] : 'no data';

                    $web_bio_page_url = ($value['Website URL']) ? $value['Website URL'] : 'no data';

                    $attorney_jurisdiction = 'no data';
                    $hourly_comp_cost = 'no data';
                    $hourly_comp_cost = $this->removecompMask($hourly_comp_cost);

                    $industry_type = ($value['Industry']) ? $value['Industry'] : 'no data';

                    $benefit_factor = 'no data';
                    $overhead_amount = 'no data';
                    $overhead_amount = $this->removeovrMask($overhead_amount);
                    $billing_rate_opp_cost = 'no data';
                    $billing_rate_opp_cost = $this->removebilMask($billing_rate_opp_cost);
//                $remarks = $this->input->post('remarks');
                    $designation = ($value['Job Title']) ? $value['Job Title'] : 'no data';
                    $group = 'LEGAL';

                    $user_data = array(
                        'user_id' => $user_id,
                        'password' => $final_password,
                        'user_first_name' => $attorney_first_name,
                        'user_last_name' => $attorney_last_name,
                        'role_code' => 'ATTR',
                        'add_flage' => 1,
                        'designation' => $designation,
                        'group_code' => $group,
                        'gender' => $attorney_gender,
                        'address_seq_no' => $insertid,
                        'authorized_by' => $admin_id,
                        'authorized_date' => time(),
                        'approver' => $approver,
                        'user_approver_type' => $approver_type,
                        'profile_photo' => $profile_photo,
                        'salt' => $random,
                        'created_by' => $admin_id,
                        'remarks_notes' => $remarks_notes,
                        'created_date' => time(),
                        'status' => 1
                    );
                    $user_add = $this->user_model->add($user_data); //echo $this->db->last_query(); exit;

                    $data2 = array(
                        'firm_seq_no' => $firm_seq_no,
                        'user_seq_no' => $user_add,
                        'attorney_id' => $attorney_id,
                        'attorney_code' => $attorney_code,
                        'attorney_dob' => $attorney_dob,
                        'attorney_first_name' => $attorney_first_name,
                        'attorney_last_name' => $attorney_last_name,
                        'attorney_gender' => $attorney_gender,
                        'attorney_education' => $attorney_education,
                        'attorney_type' => $attorney_type,
                        'bar_registration_no' => $bar_registration_no,
                        'practice_date' => $practice_date,
                        'firm_join_date' => $firm_join_date,
                        'full_part_time' => $full_part_time,
                        'job_title' => $job_title,
                        'web_bio_page_url' => $web_bio_page_url,
                        'attorney_jurisdiction' => $attorney_jurisdiction,
                        'hourly_comp_cost' => $hourly_comp_cost,
                        'industry_type' => $industry_type,
                        'benefit_factor' => $benefit_factor,
                        'overhead_amount' => $overhead_amount,
                        'billing_rate_opp_cost' => $billing_rate_opp_cost,
                        'remarks_notes' => $remarks_notes,
                        'profile_photo' => $profile_photo,
                        'address_seq_no' => $insertid,
                        'created_by' => $admin_id,
                        'created_date' => time()
                    );
//            echo "<pre>";
//            print_r($data2);
//            exit;

                    $insertid2 = $this->attorney_model->add($data2);

//                    if ($insertid2) {
//                    $data = array(
//                        'attorney_seq_no' => $insertid2,
//                        'firm_sgsec_seq_no' => $section,
//                        'created_by' => $admin_id,
//                        'updated_by' => $admin_id,
//                        'created_date' => time(),
//                        'updated_date' => time()
//                    );
//                    $this->load->model('attorney_sec_model');
//                    $this->attorney_sec_model->add($data);
//                    }
//                    $this->db->trans_complete();
//                if ($this->db->trans_status() === FALSE) {
//                    $this->db->trans_rollback();
//                } else {
//                    $this->db->trans_commit();
//                }
                }
            }
        }

        if ($insertid2) {
            $msg = 'Data imported successfully';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'import_csv');
        } else {
            $msg = 'Data not imported successfully';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliur!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'import_csv');
        }
    }

    function importUserList() {

        $admin_id = $this->data['admin_id'];

        $role_code = $this->data['role_code'];

        $sql = " select pfc.firm_seq_no from plma_firm pfirm, plma_firm_section pfc where pfirm.firm_admin_seq_no=$admin_id and pfc.firm_seq_no = pfirm.firm_seq_no group by pfc.firm_seq_no";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        $firm_code = $row[0]['firm_seq_no'];

        $sql = "SELECT `short_description`, `code` FROM `plma_codes` WHERE `category_type`='Roles' ";
        $query = $this->db->query($sql);
        $codes = $query->result();
        $this->data['codes'] = $codes;
        //t($codes); exit;
        //group dropdown
        $sql1 = "SELECT `short_description`, `code` FROM `plma_codes` WHERE `category_type`='Groups' ";
        $query1 = $this->db->query($sql1);
        $codes_1 = $query1->result();
        $this->data['codes_1'] = $codes_1;
        //t($codes_1); exit;

        $cond = "order by country_id='US' desc";
        $this->data['country'] = $this->country_model->fetch($cond);

//        echo $role_code;

        if ($role_code == 'SITEADM') {

            $sql = "select `pu`.*,`paddr`.`address_line1`, `paddr`.`address_line2`, `paddr`.`address_line3`,"
                    . " `paddr`.`postal_code`, `paddr`.`email`, `paddr`.`phone`, `paddr`.`mobile_cell`, "
                    . " `paddr`.`fax`, `paddr`.`website_url`, `paddr`.`social_media_url`, `paddr`.`country`,"
                    . " `paddr`.`state`, `paddr`.`county`, `paddr`.`city`, `paddr`.`remarks_notes` as remarks1"
                    . "  from `plma_user` `pu` left join `plma_address` `paddr`on pu.address_seq_no=paddr.address_seq_no where `pu`.add_flage=1 ";
            $res = $this->db->query($sql);
//            echo $this->db->last_query(); 
//            exit;
            $users = $res->result_array();
//            t($users); exit;

            $this->data['users'] = $users;

            foreach ($users as $key => $value) {

                $roles_1 = $value['role_code'];
                $cond1 = "AND code = '$roles_1' and category_type='Roles'";
                $roles = $this->codes_model->fetch($cond1);
//                 t($roles, 1);

                $groups_1 = $value['group_code'];
                $cond2 = "AND code = '$groups_1' and category_type='Groups'";
                $groups = $this->codes_model->fetch($cond2);
                //            t($groups, 1);

                $desig_1 = $value['designation'];
                $cond4 = "AND code = '$desig_1' and category_type='Designation'";
                $desigs = $this->codes_model->fetch($cond4);

                $firm_ad = $value['authorized_by'];
                $cond3 = "AND user_seq_no = '" . $firm_ad . "' ";
//                echo $cond3; exit;
                $site_admin = $this->app_users_model->fetch($cond3);
//                t($site_admin, 1);
//                        $country_1 = $value['country'];
//                        $cond3 = "AND country_seq_no = '$country_1'";
//                        $country = $this->country_model->fetch($cond3);
//                        
//                        $state_1 = $value['state'];
//                        $cond4 = "AND state_seq_no = '$state_1'";
//                        $state = $this->states_model->fetch($cond4);
//                        
//                        $city_1 = $value['city'];
//                        $cond5 = "AND city_seq_no = '$city_1'";
//                        $city = $this->city_model->fetch($cond5);
//                        
//                        $county_1 = $value['county'];
//                        $cond6 = "AND county_seq_no = '$county_1'";
//                        $county = $this->county_model->fetch($cond6);

                $users[$key]['role_code'] = $roles[0]['short_description'];
                $users[$key]['group_code'] = $groups[0]['short_description'];
                $users[$key]['designation'] = $desigs[0]['short_description'];
                $users[$key]['authorized_by'] = $site_admin[0]['user_first_name'] . ' ' . $site_admin[0]['user_last_name'];
//                        $users[$key]['country'] = $country[0]['name'];
//                        $users[$key]['state'] = $state[0]['state_name'];
//                        $users[$key]['city'] = $city[0]['city_name'];
//                        $users[$key]['county'] = $county[0]['county_name'];
            }

            $this->data['det'] = $users;
//             t($this->data['det'], 1);  
            $cond2 = " and address_seq_no = '" . $users[0]['address_seq_no'] . "'";
            $row2 = $this->address_model->fetch($cond2);
            $this->data['address_info'] = $users[0];
            $this->data['country_info'] = $this->fetch_country($users[0]['country']);
            $this->data['state_info'] = $this->fetch_state($users[0]['country'], $users[0]['state']);
            $this->data['county_info'] = $this->fetch_county($users[0]['country'], $users[0]['state'], $row2[0]['county']);
            $this->data['city_info'] = $this->fetch_city($users[0]['country'], $users[0]['state'], $users[0]['county'], $row2[0]['city']);
        } else if ($role_code == 'FIRMADM') {

            $sql = "select `pu`.*, `paddr`.`address_line1`, `paddr`.`address_line2`, `paddr`.`address_line3`,"
                    . " `paddr`.`postal_code`, `paddr`.`email`, `paddr`.`phone`, `paddr`.`mobile_cell`,"
                    . " `paddr`.`website_url`, `paddr`.`social_media_url`, `paddr`.`country`, `paddr`.`state`,"
                    . " `paddr`.`county`, `paddr`.`city`, `paddr`.`remarks_notes` remarks1 from `plma_user` `pu`,"
                    . " `plma_address` `paddr` where pu.address_seq_no=paddr.address_seq_no and (pu.created_by = $admin_id) and `pu`.add_flage=1 ";
            $res = $this->db->query($sql);
            $users = $res->result_array();

            $this->data['users'] = $users;

//            t($this->data['users'], 1);exit;

            foreach ($users as $key => $value) {

                $roles_1 = $value['role_code'];
                $cond1 = "AND code = '$roles_1' and category_type='Roles'";
                $roles = $this->codes_model->fetch($cond1);
                //            t($roles, 1);

                $groups_1 = $value['group_code'];
                $cond2 = "AND code = '$groups_1' and category_type='Groups'";
                $groups = $this->codes_model->fetch($cond2);
                //            t($groups, 1);
                $desig_1 = $value['designation'];
                $cond4 = "AND code = '$desig_1' and category_type='Designation'";
                $desigs = $this->codes_model->fetch($cond4);

                $firm_ad = $value['authorized_by'];
                $cond3 = "AND user_seq_no = '" . $firm_ad . "' ";
                $firm_admin = $this->app_users_model->fetch($cond3);
//                echo $this->db->last_query(); exit;
//                t($firm_admin, 1);

                $users[$key]['role_code'] = $roles[0]['short_description'];
                $users[$key]['group_code'] = $groups[0]['short_description'];
                $users[$key]['designation'] = $desigs[0]['short_description'];
                $users[$key]['authorized_by'] = $firm_admin[0]['user_first_name'] . ' ' . $firm_admin[0]['user_last_name'];
            }

            $this->data['det'] = $users;
            $cond2 = " and address_seq_no = '" . $users[0]['address_seq_no'] . "'";
            $row2 = $this->address_model->fetch($cond2);
            $this->data['address_info'] = $users[0];
            $this->data['country_info'] = $this->fetch_country($users[0]['country']);
            $this->data['state_info'] = $this->fetch_state($users[0]['country'], $users[0]['state']);
            $this->data['county_info'] = $this->fetch_county($users[0]['country'], $users[0]['state'], $row2[0]['county']);
            $this->data['city_info'] = $this->fetch_city($users[0]['country'], $users[0]['state'], $users[0]['county'], $row2[0]['city']);
        }

//         t($this->data['users'], 1);exit;
        
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/app_users/listing', $this->data);
    }

    function fetch_country($selected = '') {
        $return = $this->country_model->fetch();
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
        return $opt;
    }

    function fetch_city($country_id = '', $state_id = '', $county_seq_no = '', $selected = '') {
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }
        if ($state_id == '') {
            $state_id = $this->input->post('state_id');
        }
        if ($county_seq_no == '') {
            $county_seq_no = $this->input->post('county_seq_no');
        }

        $cond = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "' and county_seq_no = '" . $county_seq_no . "'";
        $return = $this->city_model->fetch($cond);
        $opt = ''; //<option value="">City/Town</option>
        foreach ($return as $key => $value) {
            if ($value['city_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['city_seq_no'] . '" selected="selected">' . $value['city_name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['city_seq_no'] . '" >' . $value['city_name'] . '</option>';
            }
        }
        return $opt;
    }

}
