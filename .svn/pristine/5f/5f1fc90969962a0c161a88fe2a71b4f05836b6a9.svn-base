<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App_users extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('app_users_model');
        $this->load->model('codes_model');
        $this->load->model('address_model');
        $this->load->model('country_model');
        $this->load->model('states_model');
        $this->load->model('county_model');
        $this->load->model('city_model');
        $this->load->model('firm_model');
        $this->load->model('app_profiles_model');

        $this->data['page'] = 'Dashboard';
    }

    function index() {

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

        $cond="order by country_id='US' desc";
        $this->data['country'] = $this->country_model->fetch($cond);

//        echo $role_code;

        if ($role_code == 'SITEADM') {

            $sql = "select `pu`.*,`paddr`.`address_line1`, `paddr`.`address_line2`, `paddr`.`address_line3`,`paddr`.`postal_code`, `paddr`.`email`, `paddr`.`phone`, `paddr`.`mobile_cell`, `paddr`.`fax`, `paddr`.`website_url`, `paddr`.`social_media_url`, `paddr`.`country`, `paddr`.`state`, `paddr`.`county`, `paddr`.`city`, `paddr`.`remarks_notes` as remarks1 from `plma_user` `pu` left join `plma_address` `paddr`on pu.address_seq_no=paddr.address_seq_no";
            $res = $this->db->query($sql);
//            echo $this->db->last_query(); exit;
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
                $cond3 = "AND user_seq_no = '" . $firm_ad ."' ";
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
        } 
        
        else if ($role_code == 'FIRMADM') {
            
            $sql = "select `pu`.*, `paddr`.`address_line1`, `paddr`.`address_line2`, `paddr`.`address_line3`,`paddr`.`postal_code`, `paddr`.`email`, `paddr`.`phone`, `paddr`.`mobile_cell`, `paddr`.`website_url`, `paddr`.`social_media_url`, `paddr`.`country`, `paddr`.`state`, `paddr`.`county`, `paddr`.`city`, `paddr`.`remarks_notes` remarks1 from `plma_user` `pu`, `plma_address` `paddr` where pu.address_seq_no=paddr.address_seq_no and (pu.created_by = $admin_id)";
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
                $cond3 = "AND user_seq_no = '" . $firm_ad ."' ";
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

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/app_users/listing', $this->data);
    }

    function details($code = '') {
        $code = base64_decode($code);
        $submit = $this->input->post('app_users_submit_btn');

        $cond = " and user_seq_no = '" . $code . "'";
        $row = $this->user_model->fetch($cond);
//        echo $this->db->last_query(); exit;
//        $this->data['users_info'] = $row[0]; 
//        t($this->data['users_info']); exit;


        if (isset($submit)) {
//            echo "ok"; die();
//            $admin_all_session = $this->session->userdata('admin_session');
           $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            //User Informations 
//            $firstname = $this->input->post('first_name');
//            if (isset($firstname)) {
//                echo "ok"; die();
//                $lastname = $this->input->post('last_name');
//                $role = $this->input->post('role_code');
//                $group = $this->input->post('group_code');
//                $authorized_by = $this->input->post('authorized_by');
//                $authorized_date_tmp = $this->input->post('authorized_date');
//                $authorized_date_tmp = explode('/', $authorized_date_tmp);
//                $maketimestamp = $authorized_date_tmp[2] . '-' . $authorized_date_tmp[0] . '-' . $authorized_date_tmp[1] . ' 00:00:00';
//                $authorized_date = strtotime($maketimestamp);
            $remarks = $this->input->post('remarks_notes');
//                echo $remarks; exit;
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
            $address_line_1 = $this->input->post('address_line_1');
            $address_line_2 = $this->input->post('address_line_2');
            $address_line_3 = $this->input->post('address_line_3');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
            $county = $this->input->post('county');
            $city = $this->input->post('city');
            $postal_code = $this->input->post('postal_code');
            $remarks_1 = $this->input->post('remarks');

            $data_1 = array(
                'address_line1' => $address_line_1,
                'address_line2' => $address_line_2,
                'address_line3' => $address_line_3,
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
                'social_media_url' => $social_url,
                'updated_by' => $admin_id,
                'remarks_notes' => $remarks_1,
                'updated_date' => time()
            );
//                 echo "<pre>";  print_r($data_1); exit;

            $insertid_1 = $this->address_model->edit($data_1, $row[0]['address_seq_no']);
//              echo $this->db->last_query(); exit;
            //edit into user table
            $approver_type = ($this->input->post('approver[]'))? '1' : '';
            $data_arr_2 = array(
//                'user_first_name' => $firstname,
//                'user_last_name' => $lastname,
//                'role_code' => $role,
//                'group_code' => $group,
//                'authorized_by' => $authorized_by,
                'user_approver_type' => $approver_type,
                'remarks_notes' => $remarks,
                'address_seq_no' => $insertid_1,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
//                echo "<pre>"; print_r($data_arr_2); die();

            $insertid_2 = $this->app_users_model->edit($data_arr_2, $code);
//                echo $this->db->last_query(); exit;

            if ($insertid_2) {
                //echo"ok"; die();
                $msg = 'App User updated successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'app-users');
            } else {
                $msg = 'error in updating App User';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'app-users');
            }

            redirect($base_url . 'app-users');

            //}
        } else {

            if (count($row) > 0) {
                //echo "ok"; die();

                $this->data['users_info'] = $row[0];
//                t($this->data['users_info']); exit;

                $cond2 = " and address_seq_no = '" . $row[0]['address_seq_no'] . "'";
                $row2 = $this->address_model->fetch($cond2);
                $this->data['address_info'] = $row2[0]; //t($row2[0]); die();

                $this->data['country_info'] = $this->fetch_country($row2[0]['country']);
                $this->data['state_info'] = $this->fetch_state($row2[0]['country'], $row2[0]['state']);
                $this->data['county_info'] = $this->fetch_county($row2[0]['country'], $row2[0]['state'], $row2[0]['county']);
                $this->data['city_info'] = $this->fetch_city($row2[0]['country'], $row2[0]['state'], $row2[0]['county'], $row2[0]['city']);
            }

            $this->data['countries'] = $this->country_model->fetch();
            $sql1 = "SELECT `short_description`, `code` FROM `plma_codes` where `category_type` = 'Roles'";
            $query1 = $this->db->query($sql1);
            //echo $this->db->last_query();    
            $this->data['role'] = $query1->result_array(); //t($query1->result()); die();
            //$this->data['codes'] = $this->codes_model->fetch();
            $sql2 = "SELECT `short_description`, `code` FROM `plma_codes` where `category_type` = 'Groups'";
            $query2 = $this->db->query($sql2);
            //echo $this->db->last_query();    
            $this->data['group'] = $query2->result_array(); //t($query1->result()); die();

            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/app_users/app_users_view', $this->data);
        }
    }

    ///Set user address to a session variable
    function add_address() {
        //insert into address table
        $user_address = $_POST;
//        t($user_address); exit;
        $this->session->set_userdata('user_address', $user_address);
    }

    function add() {

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $user_id = $this->input->post('user_id');
//       $this->session->unset_uerdata('user_address');

        if (isset($user_id)) {

            $password = $this->input->post('password');
            $password = md5($password);

            $this->load->helper('string');
            $random = random_string('alnum', 16);
            $random1 = base64_encode($random);

            $final_password = $password . $random1;

            $firstname = $this->input->post('first_name');
            $lastname = $this->input->post('last_name');
            $role = $this->input->post('role_code');
            $group = $this->input->post('group_code');
            $authorized_by = $this->input->post('authorized_by');
            $approver_type = ($this->input->post('approver[]'))? '1' : '';
            $authorized_date_tmp = $this->input->post('authorized_date');
            $authorized_date_tmp = explode('/', $authorized_date_tmp);
            $maketimestamp = $authorized_date_tmp[2] . '-' . $authorized_date_tmp[0] . '-' . $authorized_date_tmp[1] . ' 00:00:00';
            $authorized_date = strtotime($maketimestamp);
            $remarks = $this->input->post('remarks_notes');

            //Enter Address
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $phone = $this->removePhoneMask($phone);
            $mobile = $this->input->post('mobile');
            $mobile = $this->removePhoneMask($mobile);
            $fax = $this->input->post('fax');
            $fax = $this->removePhoneMask($fax);
            $web_url = $this->input->post('website_url');
            $social_url = $this->input->post('social_media_url');
            $addr_line_1 = $this->input->post('address_line1');
            $addr_line_2 = $this->input->post('address_line2');
            $addr_line_3 = $this->input->post('address_line3');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
            $county = $this->input->post('county');
            $city = $this->input->post('city');
            $postal_code = $this->input->post('postal_code');
            $remarks1 = $this->input->post('remarks_notes');

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
                'fax' => $fax,
                'mobile_cell' => $mobile,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
                'created_by' => $admin_id,
                'created_date' => time(),
                'remarks_notes' => $remarks1
            );

//            echo "<pre>"; print_r($data1); exit;

            $insertid = $this->address_model->add($data1);

            //insert into user table
            $data_2 = array(
                'user_id' => $user_id,
                'password' => $final_password,
                'user_first_name' => $firstname,
                'user_last_name' => $lastname,
                'role_code' => $role,
                'group_code' => $group,
                'user_approver_type' => $approver_type,
                'authorized_by' => $authorized_by,
                'authorized_date' => $authorized_date,
                'remarks_notes' => $remarks,
                'salt' => $random,
                'created_by' => $admin_id,
                'created_date' => time(),
                'address_seq_no' => $insertid,
                'status' => 1
            );
//            echo "<pre>"; print_r($data_2); exit;

            $add = $this->app_users_model->add($data_2);
//            echo $this->db->last_query(); exit;
//            t($add); exit;

            $device = $this->detectDevice();
            $ip = $this->get_ip_address();

            $base_location_all = $this->get_location();
            $base_location = 'Country : ' . $base_location_all['country'] . ', latitude : ' . $base_location_all['lat'] . ', Longitude : ' . $base_location_all['lon'] . ', City : ' . $base_location_all['city'] . ', ISP : ' . $base_location_all['isp'] . ', Timezone : ' . $base_location_all['timezone'];

            $last_device_type = 'Device : ' . $device['device'] . ', ' . $device['browser'] . ', ' . $device['user_egent'];
            $base_session_ref = $base_location . ', ' . $last_device_type;

            $data_3 = array(
                'user_seq_no' => $add,
                'base_location' => $base_location,
                'base_session_ref' => $base_session_ref,
                'last_device_type' => $last_device_type,
                'last_ip_address' => $ip,
                'last_device_ref' => $base_session_ref,
                'last_accessed_time' => time(),
                'remarks_notes' => 'USER REG. BY ADMIN',
                'created_by' => $admin_id,
                'created_date' => time()
            );

            $profile = $this->app_profiles_model->add($data_3);

            if ($add != '') {
                //echo "ok"; die();
                $msg = 'App Users added successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'app-users' . base64_encode($code));
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'app-users' . base64_encode($code));
            }

            //redirect($base_url . 'app-users');
        } else {
            redirect($base_url . 'app-users' . base64_encode($code));
        }

        $this->session->unset_uerdata('user_address');
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

    function email_check() {
        $email = $this->input->post('email');
        $orig_email = $this->input->post('original_email');
        if ($email != '') {
            if ((!isset($orig_email) && $orig_email != '') || $email == $orig_email) {
                echo 'true';
            } else {
                $cond2 = " and email = '" . $email . "'";
                $res = $this->address_model->fetch($cond2);
                $this->data['email'] = $res;
                $res_1 = count($this->data['email']);
                if ($res_1 > 0) {
                    echo 'false';
                } else {
                    echo 'true';
                }
            }
        }
    }

    function delete($code = '') {
        $code = base64_decode($code);
        $cond = $code;
        $row = $this->user_model->delete($cond);
//        echo $this->db->last_query(); exit;

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

    function detectDevice() {
        $userAgent = $_SERVER["HTTP_USER_AGENT"];
        $devicesTypes = array(
            "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
            "tablet" => array("tablet", "android", "ipad", "tablet.*firefox"),
            "mobile" => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
            "bot" => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
        );
        foreach ($devicesTypes as $deviceType => $devices) {
            foreach ($devices as $device) {
                if (preg_match("/" . $device . "/i", $userAgent)) {
                    $deviceName = array(
                        'device' => $deviceType,
                        'user_egent' => $userAgent,
                        'browser' => $device
                    );
                }
            }
        }
        return /* ucfirst( */$deviceName/* ) */;
    }

    function get_ip_address() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    function get_location() {
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $this->get_ip_address()));
        if ($query && $query['status'] == 'success') {
            return $query;
        }
    }

    function test() {
        //t($this->get_location());
    }

}
