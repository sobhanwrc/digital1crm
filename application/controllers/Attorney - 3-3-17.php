<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attorney extends MY_Controller {

    function __construct() {

        parent::__construct();

        $this->isLogin();

        $this->load->model('firm_model');
        $this->load->model('user_model');
        $this->load->model('app_users_model');
        $this->load->model('address_model');
        $this->load->model('country_model');
        $this->load->model('county_model');
        $this->load->model('states_model');
        $this->load->model('city_model');
        $this->load->model('firm_codes_model');
        $this->load->model('codes_model');
        $this->load->model('firm_attorney_model');
        $this->load->model('attorney_model');
        $this->load->model('attorney_rpt_model');
        $this->load->model('attorney_sg_model');
        $this->load->model('attorney_sec_model');
        $this->load->model('section_model');
        $this->load->model('designation_model');
        $this->load->model('group_model');
        
    }

    function index() {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];

        if ($role_code == 'ATTR') {
            redirect($base_url . 'login/logout');
        }

//        $sql = "select pattr.firm_seq_no from plma_firm pfirm, plma_attorney pattr where pattr.firm_seq_no = pfirm.firm_seq_no group by pattr.firm_seq_no";
//        $res = $this->db->query($sql);
//        $row = $res->result_array();
//        
//        //t($row[0]['firm_seq_no']); 
//        //exit;
//        $firm_code = $row[0]['firm_seq_no'];

        $sql = '';
        if ($role_code == 'SITEADM') {
            $sql = "Select attr.*,f.firm_name,f.firm_seq_no from plma_attorney as attr inner join plma_firm as f "
                    . " on attr.firm_seq_no=f.firm_seq_no ";
        } elseif ($role_code == 'FIRMADM') {
            $sql = "Select attr.*,f.firm_name, f.firm_seq_no from plma_attorney as attr inner join plma_firm as f "
                    . " on attr.firm_seq_no=f.firm_seq_no  where  attr.firm_seq_no=$firm_seq_no";
        } elseif ($role_code == 'ATTR') {
            $sql = "Select attr.*,f.firm_name, f.firm_seq_no from plma_attorney as attr inner join plma_firm as f "
                    . " on attr.firm_seq_no=f.firm_seq_no where  attr.firm_seq_no=$firm_seq_no";
        }

        $res = $this->db->query($sql);
        $row = $res->result_array();


//        $firm_code = $row[0]['firm_seq_no'];

        if ($role_code == 'SITEADM') {
            $select = "firm_seq_no,firm_name";
            $this->data['firms'] = $this->firm_model->fetch('', $select);
        }

//        $this->data['attorneys_1'] = $row;

//        foreach ($row as $key => $value) {
//
//            $att_type = $value['attorney_type'];
//            
////            $sql="SELECT IF(plma_codes.firm_customization=1,plma_firm_codes.short_description,plma_codes.short_description) as short_description"
////                    . " FROM plma_codes inner join plma_firm_codes on plma_codes.code_seq_no=plma_firm_codes.code_seq_no WHERE plma_codes.code = '$att_type' AND plma_codes.category_type = 'Attorney Type' "
////                    . " AND plma_firm_codes.firm_seq_no=$firm_seq_no";
////          $query =  $this->db->query($sql);
////          
//          $details=get_short_desc_by_code($att_type='US-AL',$firm_seq_no);
//          t($details);
//          exit;
//          
//            
//            $cond1 = "AND code = '$att_type' and category_type='Attorney Type'";
//            $attorney_type = $this->codes_model->fetch($cond1);
//            // t($roles, 1);
//
//            $ind_type = $value['industry_type'];
//            $cond2 = "AND code = '$ind_type' and category_type='Industry Type'";
//            $industry_type = $this->codes_model->fetch($cond2);
//
//            $jury = $value['attorney_jurisdiction'];
//            $cond_3 = "AND code = '$jury' and category_type='Jurisdictions'";
//            $jurisdictions = $this->codes_model->fetch($cond_3);
//
//            $row[$key]['attorney_type'] = $attorney_type[0]['short_description'];
//            $row[$key]['industry_type'] = $industry_type[0]['short_description'];
//            $row[$key]['attorney_jurisdiction'] = $jurisdictions[0]['short_description'];
//        }

        $this->data['attorneys'] = $row;
//         t($this->data['attorneys'], 1);
//         t($row); exit;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/attorney/listing', $this->data);
    }

    function fetchFirmCodes($param) {

        $firm_id = $this->input->post('fimrs');

        if ($firm_id == 'all' || $firm_id == '') {
            $sql = "Select attr.*,f.firm_name, f.firm_seq_no from plma_attorney as attr inner join plma_firm as f "
                    . " on attr.firm_seq_no=f.firm_seq_no";
        } else {
            $sql = "Select attr.*,f.firm_name, f.firm_seq_no from plma_attorney as attr inner join plma_firm as f "
                    . " on attr.firm_seq_no=f.firm_seq_no where f.firm_seq_no=$firm_id";
        }

        $query = $this->db->query($sql);
        // echo $this->db->last_query(); exit;
        $all_attorneys = $query->result_array();
        $this->data['attorneys_1'] = $all_attorneys;

//        foreach ($all_attorneys as $key => $value) {
//            $att_type = $value['attorney_type'];
//            $cond1 = "AND code = '$att_type' and category_type='Attorney Type'";
//            $attorney_type = $this->codes_model->fetch($cond1);
//            // t($roles, 1);
//
//            $ind_type = $value['industry_type'];
//            $cond2 = "AND code = '$ind_type' and category_type='Industry Type'";
//            $industry_type = $this->codes_model->fetch($cond2);
//
//            $jury = $value['attorney_jurisdiction'];
//            $cond_3 = "AND code = '$jury' and category_type='Jurisdictions'";
//            $jurisdictions = $this->codes_model->fetch($cond_3);
//
//            $all_attorneys[$key]['attorney_type'] = $attorney_type[0]['short_description'];
//            $all_attorneys[$key]['industry_type'] = $industry_type[0]['short_description'];
//            $all_attorneys[$key]['attorney_jurisdiction'] = $jurisdictions[0]['short_description'];
//        }
        $this->data['attorneys'] = $all_attorneys;

//         t($this->data['attorneys']);exit;

        $select = "firm_seq_no,firm_name";
        $this->data['firms'] = $this->firm_model->fetch('', $select);
        // t($this->data['firms']); exit;
        // $this->data['code_category'] = $this->code_category_model->fetch();

        $this->data['firm_id'] = $firm_id;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/attorney/listing', $this->data);
    }

    function add() {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];

        if ($role_code != 'FIRMADM' && $role_code != 'SITEADM') {
            redirect($base_url . 'attorney');
        }

        $add_new_attorney_btn = $this->input->post('add_new_attorney_btn');
        if (isset($add_new_attorney_btn)) {

            ///////////// Insert address into address table ///////////////////
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $phone = $this->removePhoneMask($phone);
            $mobile = $this->input->post('mobile');
            $mobile = $this->removePhoneMask($mobile);
            $fax = $this->input->post('fax');
            $fax = $this->removePhoneMask($fax);
            $web_url = $this->input->post('web_url');
            $social_url = $this->input->post('social_url');
            $addr_line_1 = $this->input->post('addr_line1');
            $addr_line_2 = $this->input->post('addr_line2');
            $addr_line_3 = $this->input->post('addr_line3');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
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
//                'county' => $county,
                'email' => $email,
                'phone' => $phone,
                'fax' => $fax,
                'mobile_cell' => $mobile,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
//                'remarks_notes' => $addr_remarks,
                'created_by' => $admin_id,
                'created_date' => time(),
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
//             echo "<pre>"; print_r($data1); exit;
            $insertid = $this->address_model->add($data1);
            //when site admin add attorney
            if ($role_code == 'SITEADM') {
                $firm_seq_no = $this->input->post('firm_seq_no');
            }
            //when firm admin add attorney
            if ($role_code == 'FIRMADM') {
                $sql = "select pfirm.firm_seq_no from plma_firm pfirm where pfirm.firm_admin_seq_no=$admin_id";
                $res = $this->db->query($sql);
                $row = $res->result_array();
                $firm_seq_no = $row[0]['firm_seq_no'];
            }
            /////////// Insert user details into User table ////////////

            $user_id = $this->input->post('user_id');
            $password = $this->input->post('password');
            $password = md5($password);
            $attorney_first_name = $this->input->post('attorney_first_name');
            $attorney_last_name = $this->input->post('attorney_last_name');
            $section = $this->input->post('section');
            $designation = $this->input->post('designation');
            $group = $this->input->post('group_code');

            $approver = ($this->input->post('approver[]')) ? '1' : '';
//            $approver_type = $this->input->post('user_approver_type');

            $this->load->helper('string');
            $random = random_string('alnum', 16);
            $random1 = base64_encode($random);

            $final_password = $password . $random1;

//          $user_seq_no = $this->db->insert_id();

            $attorney_id = $this->input->post('attorney_id');
            $attorney_code = $this->input->post('attorney_code');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day = $this->input->post('day');
            $whole_date = array($day, $month, $year);
            $attorney_dob = implode("-", $whole_date);
            $attorney_gender = $this->input->post('attorney_gender');
            $attorney_education = $this->input->post('attorney_education');
            $attorney_type = $this->input->post('attorney_type');
            $bar_registration_no = $this->input->post('bar_registration_no');
            $practice_date = $this->input->post('practice_date');
            $firm_join_date = $this->input->post('join_date');
            $full_part_time = $this->input->post('full_part_time');
            $attorney_jurisdiction = $this->input->post('attorney_jurisdiction');
            $hourly_comp_cost = $this->input->post('hourly_comp_cost');
            $hourly_comp_cost = $this->removecompMask($hourly_comp_cost);
            $industry_type = $this->input->post('industry_type');
            $benefit_factor = $this->input->post('benefit_factor');
            $overhead_amount = $this->input->post('overhead_amount');
            $overhead_amount = $this->removeovrMask($overhead_amount);
            $billing_rate_opp_cost = $this->input->post('billing_rate_opp_cost');
            $billing_rate_opp_cost = $this->removebilMask($billing_rate_opp_cost);
            $remarks = $this->input->post('remarks');

//            $file = $_FILES['profile_photo']['name'];
//            $file_name = '';
//            if (isset($file) && $file != '') {
//                $ext_ = explode('.', $file);
//                $name_f = $bar_registration_no . '_' . time() . '.' . end($ext_);
//                $uploaded_path_server = $_SERVER['DOCUMENT_ROOT'] . '/wrcapps/ams/assets/upload/users/';
//                if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $uploaded_path_server . $name_f)) {
//                    $file_name = $name_f;
//                }
//            }
//            $profile_photo = $file_name;  //echo base_url() . 'assets/upload/users/' . $name_f; exit;


            $profile_photo = $this->input->post('profile_photo');

            $image_field_name = 'profile_photo';

            if ($_FILES[$image_field_name]['name'] != "") {

                $this->load->library('mycommon');
                list($width, $height, $type, $attr) = getimagesize($_FILES[$image_field_name]['tmp_name']);
                $config['upload_path'] = $this->config->item('upload_path') . 'users/';
                $config['allowed_types'] = '*';
                $config['max_size'] = $this->config->item('max_size');

                $img_name = strtolower($_FILES[$image_field_name]["name"]);
                $img_name = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name);

                $config['file_name'] = date("YmdHis") . rand(0, 9999999) . "_" . $img_name;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload($image_field_name)) {

//                    if ($id) {
//                        unlink($config['upload_path'] . $image);
//                        unlink($config['upload_path'] . '50X50_' . $image);
//                        unlink($config['upload_path'] . '72X72_' . $image);
//                        unlink($config['upload_path'] . '100X100_' . $image);
//                    }

                    $data = array();
                    $data = $this->upload->data();
                    $data_field = array();
                    $profile_photo = $data['file_name'];

                    $this->load->library('resize');
                    // Resize Image
                    if ($data['is_image'] == 1) {
                        $source_image = $data['full_path'];
                        $file_path = $data['file_path'];

                        $resizeObj = new resize($source_image);
                        // Resize image for carddeck listing
                        $resizeObj->resizeImage(50, 50, 'exact');
                        $thumb_img_path = $file_path . 50 . "X" . 50 . "_" . $data['orig_name'];
                        $resizeObj->saveImage($thumb_img_path, 100);
//                            
                        $resizeObj->resizeImage(72, 72, 'crop');
                        $thumb_img_path = $file_path . 72 . "X" . 72 . "_" . $data['orig_name'];
                        $resizeObj->saveImage($thumb_img_path, 100);

                        // Crop image for home page slider
                        $resizeObj->resizeImage(140, 120, 'crop');
                        $thumb_img_path = $file_path . 140 . "X" . 120 . "_" . $data['orig_name'];
                        $resizeObj->saveImage($thumb_img_path, 100);
                    }
                } else {
                    echo $this->upload->display_errors();
                    exit;
                }
            }

            
            $user_data = array(
                'user_id' => $user_id,
                'password' => $final_password,
                'user_first_name' => $attorney_first_name,
                'user_last_name' => $attorney_last_name,
                'role_code' => 'ATTR',
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

            $insertid2 = $this->attorney_model->add($data2);

            if ($insertid2) {

                $data = array(
                    'attorney_seq_no' => $insertid2,
                    'firm_sgsec_seq_no' => $section,
//                    'approver' => $approver,
//                    'user_approver_type' => $approver_type,
                    'created_by' => $admin_id,
                    'updated_by' => $admin_id,
                    'created_date' => time(),
                    'updated_date' => time()
                );
                $this->load->model('attorney_sec_model');
                $this->attorney_sec_model->add($data);


                $msg = 'Attorney added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney');
            } else {
                $msg = 'Error in adding attorney';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/add');
            }

            //redirect($base_url . 'attorney/add');
        } else {

            $this->data['all_firms'] = $this->firm_model->fetch();

            //  $cond1 = " and category_type = 'Gender' ";
            //  $this->data['all_genders'] = $this->codes_model->fetch($cond1);
            //  $cond10 = " and category_type = 'Groups' ";
            //  $this->data['all_groups'] = $this->codes_model->fetch($cond10);
            //  $cond11 = " and category_type = 'Approvers' ";
            //  $this->data['all_approvers'] = $this->codes_model->fetch($cond11);
            //  $cond9 = " and category_type = 'Attorney Type' ";
            //  $this->data['all_attorney_type'] = $this->codes_model->fetch($cond9);
            //  $cond2 = " and category_type = 'Job Type' ";
            //  $this->data['all_jobtypes'] = $this->codes_model->fetch($cond2);

            $cond3 = " and category_type = 'Jurisdictions' ";
            $this->data['all_jurisdictions'] = $this->codes_model->fetch($cond3);

            //  $cond4 = " and category_type = 'Industry Type' ";
            //  $this->data['all_industry'] = $this->codes_model->fetch($cond4);
            //  $cond4 = " and category_type = 'Industry Type' ";
            //  $this->data['all_industry'] = $this->codes_model->fetch($cond4);

            $cond8 = " and role_code = 'ATTR' and status = '1' and user_seq_no not in (select user_seq_no from plma_attorney)";
            $this->data['all_user_to_be_attorney'] = $this->user_model->fetch($cond8);
            $this->data['all_designations'] = $this->designation_model->fetch();
            $this->data['all_groups'] = $this->group_model->fetch();
            // echo $this->db->last_query(); exit;
//             t($this->data['all_designations']);
//             exit;

            $role_code = $this->data['role_code'];
            if ($role_code == 'FIRMADM') {
                $sql = "select pfirm.firm_seq_no from plma_firm pfirm where pfirm.firm_admin_seq_no=$admin_id";
                $res = $this->db->query($sql);
                $row = $res->result_array();
                $firm_seq_no = $row[0]['firm_seq_no'];

                $this->load->model('section_model');
                $cond = "AND firm_seq_no=$firm_seq_no";
                $firm_sections = $this->section_model->fetch($cond);
//                echo $this->db->last_query();
                $this->data['firm_sections'] = $firm_sections;
//                t($this->data['firm_sections']); exit;
            }



            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/attorney/add', $this->data);
        }
    }

    function edit($code = '', $view = '') {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

//        if ($role_code == 'SITEADM' && $view == '') {
//            redirect($base_url . 'attorney');
////        }
        $code = base64_decode($code);
//        echo $code; 
        $cond = "AND attorney_seq_no='$code'";
        $attorney = $this->attorney_model->fetch($cond);
 // t($attorney);
        //////////fetch all firms//////////
        $row = $this->firm_model->fetch();
        $this->data['all_firms'] = $row;
//        t($this->data['all_firms'], 1);

 
        $sql = '';
        $sql = "SELECT attr.firm_seq_no,attr.user_seq_no,attr.attorney_id,attr.attorney_code,attr.attorney_first_name,attr.attorney_last_name,attr.attorney_dob,attr.attorney_gender,attr.address_seq_no,attr.attorney_education,attr.attorney_type,attr.bar_registration_no,attr.practice_date,attr.firm_join_date,attr.full_part_time,attr.profile_photo,attr.web_bio_page_url,attr.attorney_jurisdiction,attr.industry_type,attr.hourly_comp_cost,attr.benefit_factor,attr.overhead_amount,attr.billing_rate_opp_cost,attr.remarks_notes as att_remarks, "
                . "addr.*, "
                . "attsec.*,"
                . "fsec.*,"
                . "puser.user_id,puser.add_flage, puser.user_seq_no,puser.group_code,puser.designation, puser.approver, puser.user_approver_type," 
                . "f.firm_name,f.firm_seq_no,attr.attorney_seq_no "
                . "FROM plma_attorney as attr "
                . "left JOIN plma_firm as f ON attr.firm_seq_no = f.firm_seq_no "
                . "left JOIN plma_user as puser ON attr.user_seq_no = puser.user_seq_no "
                . "left JOIN plma_address as addr ON attr.address_seq_no = addr.address_seq_no "
                . "left JOIN plma_attorney_sec as attsec ON attr.attorney_seq_no = attsec.attorney_seq_no "
                . "left JOIN plma_firm_section fsec ON attsec.firm_sgsec_seq_no = fsec.firm_section_seq_no "
                . "WHERE attr.attorney_seq_no=$code";
//        echo $sql;
        $res1 = $this->db->query($sql);
        $attorney = $res1->result_array();
     
//        echo $this->db->last_query();
//        t($attorney, 1);
//        exit;
        
        if (count($attorney) > 0) {

                $this->data['country_info'] = $this->fetch_country($attorney[0]['country']);
                $this->data['state_info'] = $this->fetch_state($attorney[0]['country'], $attorney[0]['state']);
                $this->data['county_info'] = $this->fetch_county($attorney[0]['country'], $attorney[0]['state'], $attorney[0]['county']);
                $this->data['city_info'] = $this->fetch_city($attorney[0]['country'], $attorney[0]['state'], $attorney[0]['county'], $attorney[0]['city']);
            }

//echo $this->db->last_query();
//echo $role_code;
//t($attorney);
//exit;

        $year = explode('-', $attorney[0]['attorney_dob']);
        $this->data['year'] = $year;
//        t($this->data['year']); exit;

        $this->data['attorney'] = $attorney[0];
        $this->data['att_code'] = $code;

        ////////Fetch attorney for attorney manager ///////////////
        
//        $sql_1 = "SELECT patt.*, pfirm.firm_seq_no, pfirm.firm_name, pfirm.firm_admin_seq_no "
//                . "FROM plma_attorney patt "
//                . "INNER JOIN plma_firm pfirm ON patt.firm_seq_no = pfirm.firm_seq_no "
//                . "WHERE patt.attorney_seq_no <> '". $code . "' AND pfirm.firm_admin_seq_no = '" . $admin_id . "'";
////        echo $sql_1;
//        $query_1 = $this->db->query($sql_1);
//        $row_1 = $query_1->result_array();
//        $this->data['all_attorney_manager'] = $row_1;
//        t($this->data['all_attorney_manager'], 1);
        
        //////////////Fetch Strategy Group/////////////
        
        $this->data['all_designations'] = $this->designation_model->fetch();
        $this->data['all_groups'] = $this->group_model->fetch();
        $this->get_include();
        if ($view != '') {
            $this->load->view($this->view_dir . 'operation_master/attorney/attorney_view', $this->data);
        } else {
            $this->load->view($this->view_dir . 'operation_master/attorney/edit', $this->data);
        }
        
    }

    function update_general_info($code = '') {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];
        
        
        
        $code = base64_decode($code);
        $cond = " and attorney_seq_no = '" . $code . "'";
        $res_attorney = $this->attorney_model->fetch($cond);
//        $old_password = $res_attorney[0]['password'];
//        $old_salt = $res_attorney[0]['salt'];


        $edit_attorney_btn = $this->input->post('edit_attorney_btn_main');

        ///////////// Edit Address ///////////////////
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $phone = $this->removePhoneMask($phone);
        $mobile = $this->input->post('mobile');
        $mobile = $this->removePhoneMask($mobile);
        $fax = $this->input->post('fax');
        $fax = $this->removePhoneMask($fax);
        $web_url = $this->input->post('web_url');
        $social_url = $this->input->post('social_url');
        $addr_line_1 = $this->input->post('addr_line1');
        $addr_line_2 = $this->input->post('addr_line2');
        $addr_line_3 = $this->input->post('addr_line3');
        $country = $this->input->post('country');
        $state = $this->input->post('state');
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
            'email' => $email,
            'phone' => $phone,
            'fax' => $fax,
            'mobile_cell' => $mobile,
            'website_url' => $web_url,
            'social_media_url' => $social_url,
//                'remarks_notes' => $addr_remarks,
            'updated_by' => $admin_id,
            'updated_date' => time()
        );
//             echo "<pre>"; print_r($data1); exit;
        $editid2 = $this->address_model->edit_cond($data1, " address_seq_no = '" . $res_attorney[0]['address_seq_no'] . "' ");
//            echo $this->db->last_query(); exit;
        //when site admin add attorney
        if ($role_code == 'SITEADM') {
            $firm_seq_no = $this->input->post('firm_seq_no');
        }

        //when firm admin add attorney
        if ($role_code == 'FIRMADM') {
            $sql = "select pfirm.firm_seq_no from plma_firm pfirm where pfirm.firm_admin_seq_no=$admin_id";
            $res = $this->db->query($sql);
//                 echo $this->db->last_query(); exit;
            $row = $res->result_array();
            $firm_seq_no = $row[0]['firm_seq_no'];
        }
        ////////////////// Edit Users Details ////////////////////////
//        if ($role_code == 'FIRMADM') {
            $designation = $this->input->post('designation');
            $group = $this->input->post('group_code');
            $approver = ($this->input->post('approver[]')) ? '1' : '';
//            $approver_type = $this->input->post('user_approver_type');
//        }

        $attorney_id = $this->input->post('attorney_id');

        $password = $this->input->post('password1');
        if ($password) {
            $password = md5($password);
            $this->load->helper('string');
            $random = random_string('alnum', 16);
            $random1 = base64_encode($random);
            $final_password = $password . $random1;
        } else {
            $final_password = $old_password;
            $random         = $old_salt;
        }

        $attorney_code = $this->input->post('attorney_code');
        $attorney_first_name = $this->input->post('attorney_first_name');
        $attorney_last_name = $this->input->post('attorney_last_name');
        $attorney_gender = $this->input->post('attorney_gender');
        $attorney_type = $this->input->post('attorney_type');
        $attorney_education = $this->input->post('attorney_education');
        $bar_registration_no = $this->input->post('bar_registration_no');
        $practice_date = $this->input->post('practice_date');
        $firm_join_date = $this->input->post('firm_join_date');
        $full_part_time = $this->input->post('full_part_time');
        $attorney_jurisdiction = $this->input->post('attorney_jurisdiction');
        $hourly_comp_cost = $this->input->post('hourly_comp_cost');
        $hourly_comp_cost = $this->removecompMask($hourly_comp_cost);
        $industry_type = $this->input->post('industry_type');
        $benefit_factor = $this->input->post('benefit_factor');
        $overhead_amount = $this->input->post('overhead_amount');
        $overhead_amount = $this->removeovrMask($overhead_amount);
        $billing_rate_opp_cost = $this->input->post('billing_rate_opp_cost');
        $billing_rate_opp_cost = $this->removebilMask($billing_rate_opp_cost);
        $remarks = $this->input->post('remarks');
//            $user_seq_no = $this->input->post('user_seq_no');
//            $section = $this->input->post('section');

        $year = $this->input->post('year');
        $month = $this->input->post('month');
        $day = $this->input->post('day');
        $whole_date = array($day, $month, $year);
        $attorney_dob = implode("-", $whole_date);

        $profile_photo = $this->input->post('pre_photo');

        $image_field_name = 'profile_photo';

        if ($_FILES[$image_field_name]['name'] != "") {
            $this->load->library('mycommon');
            list($width, $height, $type, $attr) = getimagesize($_FILES[$image_field_name]['tmp_name']);
            $config['upload_path'] = $this->config->item('upload_path') . 'users/';
            $config['allowed_types'] = '*';
            $config['max_size'] = $this->config->item('max_size');

            $img_name = strtolower($_FILES[$image_field_name]["name"]);
            $img_name = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name);

            $config['file_name'] = date("YmdHis") . rand(0, 9999999) . "_" . $img_name;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload($image_field_name)) {

                if ($code) {
                    unlink($config['upload_path'] . $profile_photo);
                    unlink($config['upload_path'] . '50X50_' . $profile_photo);
                    unlink($config['upload_path'] . '72X72_' . $profile_photo);
                    unlink($config['upload_path'] . '140X120_' . $profile_photo);
                }

                $data = array();
                $data = $this->upload->data();
                $data_field = array();
                $profile_photo = $data['file_name'];

                $this->load->library('resize');
                // Resize Image
                if ($data['is_image'] == 1) {
                    $source_image = $data['full_path'];
                    $file_path = $data['file_path'];

                    $resizeObj = new resize($source_image);
                    // Resize image for carddeck listing
                    $resizeObj->resizeImage(50, 50, 'exact');
                    $thumb_img_path = $file_path . 50 . "X" . 50 . "_" . $data['orig_name'];
                    $resizeObj->saveImage($thumb_img_path, 100);
//                            
                    $resizeObj->resizeImage(72, 72, 'crop');
                    $thumb_img_path = $file_path . 72 . "X" . 72 . "_" . $data['orig_name'];
                    $resizeObj->saveImage($thumb_img_path, 100);

                    // Crop image for home page slider
                    $resizeObj->resizeImage(140, 120, 'crop');
                    $thumb_img_path = $file_path . 140 . "X" . 120 . "_" . $data['orig_name'];
                    $resizeObj->saveImage($thumb_img_path, 100);
                }
            } else {
                echo $this->upload->display_errors();
                exit;
            }
        }
        if ($password) {
            $data_pass = array(
                'password' => $final_password,
                'salt' => $random
                    );
//            t($data_pass);
            $editid = $this->user_model->edit_cond($data_pass, "user_seq_no = '" . $res_attorney[0]['user_seq_no'] . "'");
//           echo $this->db->last_query(); exit; 
        }

        //if ($role_code == 'FIRMADM') {
            $data_user = array(
                'designation' => $designation,
                'group_code' => $group,
                'approver' => $approver,
                'gender' => $attorney_gender,
//                'user_approver_type' => $approver_type,
                'profile_photo' => $profile_photo,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
//        } else {
//            $data_user = array(
//                'gender' => $attorney_gender,
//                'profile_photo' => $profile_photo,
//                'updated_by' => $admin_id,
//                'updated_date' => time()
//            );
//        }
//            t($data_user); exit;
        $editid = $this->user_model->edit_cond($data_user, "user_seq_no = '" . $res_attorney[0]['user_seq_no'] . "' ");
//            echo $this->db->last_query();
//            exit;

        $data2 = array(
//                'firm_seq_no' => $firm_seq_no,
            'address_seq_no' => $res_attorney[0]['address_seq_no'],
            'attorney_id' => $attorney_id,
            'attorney_code' => $attorney_code,
            'attorney_first_name' => $attorney_first_name,
            'attorney_last_name' => $attorney_last_name,
            'attorney_dob' => $attorney_dob,
            'attorney_gender' => $attorney_gender,
            'attorney_type' => $attorney_type,
            'attorney_education' => $attorney_education,
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
            'updated_by' => $admin_id,
            'updated_date' => time()
        );
//        t($data2); exit;
        //echo $code; exit;
        $insertid2 = $this->attorney_model->edit_cond($data2, " attorney_seq_no = '" . $code . "'");
//        echo $this->db->last_query(); exit;
        if ($insertid2) {

            $data = array(
//               'firm_sgsec_seq_no' => $section,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
            $this->load->model('attorney_sec_model');
            $this->attorney_sec_model->edit_cond($data, " attorney_seq_no = '" . $code . "'");

            $msg = 'Attorney updated successfully';
            $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'attorney/edit/' . base64_encode($code));
        } else {
            $msg = 'Error in updating attorney';
            $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'attorney/edit/' . base64_encode($code));
        }
    }

    function user_id_check() {

        $user_id = $this->input->post('user_id');

        if ($user_id != '') {
            $cond = " and user_id = '" . $user_id . "'";
            $row = $this->app_users_model->fetch($cond);
//            echo $this->db->last_query();
            $this->data['user_id'] = $row;
//            t($row, 1);
            $row_1 = count($this->data['user_id']);
            if ($row_1 > 0) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    function edit_id_check() {
        $user_id = $this->input->post('user_id');
        $orig_user_id = $this->input->post('original_user_id');
        if ($user_id != '') {
            if ((!isset($orig_user_id) && $orig_user_id != '') || $user_id == $orig_user_id) {
                echo 'true';
            } else {
                $cond = " and user_id = '" . $user_id . "'";
                $row = $this->app_users_model->fetch($cond);
//            echo $this->db->last_query();
                $this->data['user_id'] = $row;
                $row_1 = count($this->data['user_id']);
                if ($row_1 > 0) {
                    echo 'false';
                } else {
                    echo 'true';
                }
            }
        }
    }

    function add_attorney_manager() {

        $save_mgr_att = $this->input->post('save_mgr_att');
        if (isset($save_mgr_att)) {

//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            $user_seq_no_amg1 = $this->input->post('attorney_seq_no');
            $attorney_manager = $this->input->post('attorney_manager');
            $remarks_amg = $this->input->post('remarks_amg');
            $data2 = array(
                'attorney_seq_no' => base64_decode($user_seq_no_amg1),
                'mgr_attorney_seq_no' => $attorney_manager,
                'remarks_notes' => $remarks_amg,
                'created_by' => $admin_id,
                'created_date' => time()
            );

            $insertid2 = $this->attorney_rpt_model->add($data2);
            //echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney manager edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in editing attorney manager';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    }

    function edit_attorney_manager($code = '') {

        $code = base64_decode($code);
        $cond = " and art_relation_seq_no = '" . $code . "'";
        $row = $this->attorney_rpt_model->fetch($cond);
//        echo $this->db->last_query(); exit;

        $save_mgr_att = $this->input->post('edit_mgr_att');
        if (isset($save_mgr_att)) {
//            echo "ok"; die();

//            $admin_all_session = $this->session->userdata('admin_session');
          $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            $user_seq_no_amg1 = $this->input->post('attorney_seq_no');
            $attorney_manager = $this->input->post('mgr_attorney_manager');
            $remarks_amg = $this->input->post('remarks_amg');
            $data2 = array(
                'attorney_seq_no' => base64_decode($user_seq_no_amg1),
                'mgr_attorney_seq_no' => $attorney_manager,
                'remarks_notes' => $remarks_amg,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );

            $insertid2 = $this->attorney_rpt_model->edit($data2, $code);
//            echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney manager edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in editing attorney manager';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    }

    function add_attorney_strategy_group() {
        $save_sg_att = $this->input->post('save_sg_att');
        if (isset($save_sg_att)) {

//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            $attorney_seq_no = $this->input->post('attorney_seq_no');
            $firm_sgsec_seq_no = $this->input->post('firm_sgsec_seq_no');
            $remarks_sg = $this->input->post('remarks_sg');
            $data2 = array(
                'attorney_seq_no' => base64_decode($attorney_seq_no),
                'firm_sgsec_seq_no' => $firm_sgsec_seq_no,
                'remarks_notes' => $remarks_sg,
                'created_by' => $admin_id,
                'created_date' => time()
            );

            $insertid2 = $this->attorney_sg_model->add($data2);
            //echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney strategy sgroup added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in adding attorney strategy sgroup';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    }

    function edit_attorney_strategy_group($code = '') {
        $code = base64_decode($code);

        $cond = " and asg_relation_seq_no = '" . $code . "'";
        $row = $this->attorney_sg_model->fetch($cond);

//         echo $this->db->last_query(); exit;
        $save_sg_att = $this->input->post('save_sg_att_edit');
        if (isset($save_sg_att)) {

//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            $attorney_seq_no = $this->input->post('attorney_seq_no');
            $firm_sgsec_seq_no = $this->input->post('firm_sgsec_seq_no');
            $remarks_sg = $this->input->post('remarks_sg');
            $data2 = array(
                'attorney_seq_no' => base64_decode($attorney_seq_no),
                'firm_sgsec_seq_no' => $firm_sgsec_seq_no,
                'remarks_notes' => $remarks_sg,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//                echo "<pre>"; print_r($data2); exit;
            $insertid2 = $this->attorney_sg_model->edit($data2, $code);
//            echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney strategy sgroup edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in editing attorney strategy sgroup';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    }

    function add_attorney_section() {
        $save_sec_att = $this->input->post('save_sec_att');
        if (isset($save_sec_att)) {

//            $admin_all_session = $this->session->userdata('admin_session');
           $admin_id  =  $this->data['admin_id'];
           $role_code = $this->data['role_code'];

            $attorney_seq_no = $this->input->post('attorney_seq_no');
            $firm_sgsec_seq_no = $this->input->post('firm_sgsec_seq_no');
            $remarks_sec = $this->input->post('remarks_sec');
            $data2 = array(
                'attorney_seq_no' => base64_decode($attorney_seq_no),
                'firm_sgsec_seq_no' => $firm_sgsec_seq_no,
                'remarks_notes' => $remarks_sec,
                'created_by' => $admin_id,
                'created_date' => time()
            );

            $insertid2 = $this->attorney_sec_model->add($data2);
            //echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney section added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in adding attorney section';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    }

    function edit_attorney_section($code = '') {

        $code = base64_decode($code);

        $cond = " and asec_relation_seq_no = '" . $code . "'";
        $row = $this->attorney_sec_model->fetch($cond);

//         echo $this->db->last_query(); exit;
        $save_sec_att = $this->input->post('save_sec_att');
        if (isset($save_sec_att)) {

//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            $attorney_seq_no = $this->input->post('attorney_seq_no');
            $firm_sgsec_seq_no = $this->input->post('firm_sgsec_seq_no');
            $remarks_sec = $this->input->post('remarks_sec');
            $data2 = array(
                'attorney_seq_no' => base64_decode($attorney_seq_no),
                'firm_sgsec_seq_no' => $firm_sgsec_seq_no,
                'remarks_notes' => $remarks_sec,
                'created_by' => $admin_id,
                'created_date' => time()
            );
            //echo "<pre>"; print_r($data2); exit;
            $insertid2 = $this->attorney_sec_model->edit($data2, $code);
            //echo $this->db->last_query(); exit;
            if ($insertid2) {
                $msg = 'Attorney section edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            } else {
                $msg = 'Error in editing attorney section';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'attorney/edit/' . $this->input->post('attorney_seq_no'));
            }
        }
    } 

    function is_attorney_exist() {

        $email = $this->input->post('email');
        $email2 = $this->input->post('original_email');

        if ($email != '') {
            if ((!isset($email2) && $email2 != '') || $email == $email2) {
                echo 'true';
            } else {
                $sql = "select * FROM plma_address pa where pa.email = '" . $email . "'";
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

    function delete($code = '') {
//        $code = base64_decode($code);
//        $cond = $code;
//        $row = $this->attorney_model->delete($cond);
////        echo $this->db->last_query(); exit;
//
//        $this->get_include();
//        $this->load->view($this->view_dir . 'operation_master/firm/listing', $this->data);
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
//        echo 123; exit;
//        t($opt); exit;
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
//        echo 123; exit;
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

    function getFirmSections($firm_seq_no) {

        $firm_seq_no = $this->input->post('firm_seq_no');
        $cond = " AND firm_seq_no=$firm_seq_no";
        $return = $this->section_model->fetch($cond);

        $array1 = array();
        $opt = '<option value="">Select Section</option>';
        foreach ($return as $key => $value) {
            $opt .= '<option value="' . $value['firm_section_seq_no'] . '" >' . $value['section_name'] . '</option>';
        }

        echo $opt;
    }
    
    function remove_secHead()
        {  
            $admin_id = $this->data['admin_id'];
            $role_code = $this->data['role_code'];
            $firm_seq_no = $this->data['firm_seq_no'];
            
            $section = $this->input->post('section');
            
            
            if ($role_code == 'SITEADM') {
                
                $firm_seq_no = $this->input->post('firm_seq_no');
                
                $sql = "SELECT att.*, usr.approver, usr.user_approver_type, usr.user_seq_no, frm.firm_seq_no, frm.firm_admin_seq_no, frm.firm_name "
                        . "FROM plma_attorney att "
                        . "INNER JOIN plma_user usr ON att.user_seq_no=usr.user_seq_no "
                        . "INNER JOIN plma_firm frm ON att.firm_seq_no=frm.firm_seq_no "
                        . "INNER JOIN plma_attorney_sec asec ON att.attorney_seq_no=asec.attorney_seq_no "
                        . "WHERE frm.firm_seq_no = '" . $firm_seq_no . "' and asec.firm_sgsec_seq_no= '" . $section . "'";
            }elseif ($role_code == 'FIRMADM') {
                $sql = "SELECT att.*, usr.approver, usr.user_approver_type, usr.user_seq_no, frm.firm_seq_no, frm.firm_admin_seq_no, frm.firm_name "
                        . "FROM plma_attorney att "
                        . "INNER JOIN plma_user usr ON att.user_seq_no=usr.user_seq_no "
                        . "INNER JOIN plma_firm frm ON att.firm_seq_no=frm.firm_seq_no "
                        . "INNER JOIN plma_attorney_sec asec ON att.attorney_seq_no=asec.attorney_seq_no "
                        . "WHERE AND att.firm_seq_no = '" . $firm_seq_no ."'  and asec.firm_sgsec_seq_no= '" . $section . "'";
        }
            $res = $this->db->query($sql);
            $row = $res->result_array();
//            t($row);
//            exit;
            
            $approver_type = $row[0]['user_approver_type'];
        
            if($approver_type == 'SECHEAD'){
                $sql_1 = "SELECT fc.*, cod.code_seq_no, cod.category_type, cod.short_description, cod.long_description "
                        . "FROM plma_firm_codes fc "
                        . "INNER JOIN plma_codes cod ON fc.code_seq_no = cod.code_seq_no "
                        . "WHERE cod.category_type = 'Approvers' AND cod.code <> 'SECHEAD' AND fc.firm_seq_no = '" . $firm_seq_no . "'" ;
            } else{
                $sql_1 = "SELECT fc.*, cod.code_seq_no, cod.category_type, cod.short_description, cod.long_description  "
                        . "FROM plma_firm_codes fc "
                        . "INNER JOIN plma_codes cod ON fc.code_seq_no = cod.code_seq_no "
                        . "WHERE cod.category_type = 'Approvers' AND fc.firm_seq_no = '" . $firm_seq_no . "'";
            }
        
            $res_1 = $this->db->query($sql_1);
            $row_1 = $res_1->result_array();
//            t($row_1);
//            exit;
            $array_1 = array();
            $opt = '<option value="">Select Approver</option>';
            
            foreach($row_1 as $key => $value){
                $opt .= '<option value="' . $value['code'] . '" >' . $value['short_description'] . '</option>';
            }
            echo $opt;
        }
        function remove_managingPartner(){
            $admin_id = $this->data['admin_id'];
            $role_code = $this->data['role_code'];
            
            
            if($role_code == 'SITEADM'){
                
                $firm_seq_no = $this->input->post('firm_seq_no');
                
                 $sql_mp_check = "SELECT frm.*, usr.designation, usr.user_seq_no FROM plma_firm as frm "
                         . "INNER JOIN plma_user as usr on frm.firm_admin_seq_no = usr.user_seq_no "
                         . "WHERE frm.firm_seq_no = $firm_seq_no ";
                 
            } else if($role_code == 'FIRMADM'){
                
              $firm_seq_no = $this->data['firm_seq_no']; 
              
               $sql_mp_check = "SELECT frm.*, usr.designation, usr.user_seq_no FROM plma_firm as frm "
                         . "INNER JOIN plma_user as usr on frm.firm_admin_seq_no = usr.user_seq_no "
                         . "WHERE frm.firm_seq_no = $firm_seq_no ";
                 
            }
            
                $res_mp_check = $this->db->query($sql_mp_check);
                $row_mp_check = $res_mp_check->result_array();
              
                $designation = $row_mp_check[0]['designation'];
                
                if($designation == 'MP'){
                    
                    $sql_designation = "SELECT * FROM plma_designation WHERE designation_code <> 'MP' ";
                    
                } else {
                    $sql_designation = "SELECT * FROM plma_designation WHERE 1 ";
                }
                $res_designation = $this->db->query($sql_designation);
                $row_designation = $res_designation->result_array();
//                t($row_designation); exit;
                $array_designation = array();
                
                $opt = '<option value="">Select Designation</option>';
                
                foreach($row_designation as $key_designation => $value_designation){
                    
                    $opt .= '<option value="' . $value_designation['designation_code'] . '" >' . $value_designation['designation'] . '</option>';
            }
            echo $opt;
            
        }
}
