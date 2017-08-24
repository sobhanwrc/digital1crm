<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('reg_users_model');
        $this->load->model('country_model');
        $this->load->model('address_model');
        $this->load->model('app_profiles_model');
    }

    function index() {
        
        $cond="order by country_id='US' desc";
        $this->data['countries'] = $this->country_model->fetch($cond);
        $this->load->view($this->view_dir . 'login/registration', $this->data);
    }

    // new submit //
    function submit() {

        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password = md5($password);

        //address
        $address = $this->input->post('address');
        $country = $this->input->post('country');
        $state = $this->input->post('state');
        $county = $this->input->post('county');
        $city = $this->input->post('city');
        $postal_code = $this->input->post('postal_code');

        //insert address
        $data = array(
            'address_line1' => $address,
            'country' => $country,
            'state' => $state,
            'county' => $county,
            'city' => $city,
            'postal_code' => $postal_code,
            'created_date' => time(),
            'updated_date' => time()
        );

        $insertid = $this->address_model->add($data);

        $this->load->helper('string');
        $random = random_string('alnum', 16);
        $random1 = base64_encode($random);

        $final_password = $password . $random1;

        $data = array(
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'password' => $final_password,
            'salt' => $random,
            'role_code' => 'F',
            'address_seq_no' => $insertid,
            'created_at' => time(),
            'updated_at' => time(),
            'status' => 0
        );

        $add = $this->reg_users_model->add($data);

        //profile
        // app profile update 
        $user_seq_no = $add;
        $profile_exist = $this->app_profiles_model->fetch(" AND user_seq_no = '" . $user_seq_no . "'"); //t($profile_exist , 1);
        if (count($profile_exist) > 0) {
            //update
            $device = $this->detectDevice();
            $ip = $this->get_ip_address();

            $base_location_all = $this->get_location();
            $base_location = 'Country : ' . $base_location_all['country'] . ', latitude : ' . $base_location_all['lat'] . ', Longitude : ' . $base_location_all['lon'] . ', City : ' . $base_location_all['city'] . ', ISP : ' . $base_location_all['isp'] . ', Timezone : ' . $base_location_all['timezone'];

            $last_device_type = 'Device : ' . $device['device'] . ', ' . $device['browser'] . ', ' . $device['user_egent'];
            $base_session_ref = $base_location . ', ' . $last_device_type;

            $data_3 = array(
                'user_seq_no' => $user_seq_no,
                'current_location' => $base_location,
                'current_session_ref' => $base_session_ref,
                'last_device_type' => $last_device_type,
                'last_ip_address' => $ip,
                'last_device_ref' => $base_session_ref,
                'last_accessed_time' => time(),
                'remarks_notes' => 'USER SELF REGISTRATION',
                'updated_by' => $user_seq_no,
                'updated_date' => time()
            );

            $profile = $this->app_profiles_model->edit($data_3, $profile_exist[0]['profile_seq_no']);
        } else {
            // insert
            $device = $this->detectDevice();
            $ip = $this->get_ip_address();

            $base_location_all = $this->get_location();
            $base_location = 'Country : ' . $base_location_all['country'] . ', latitude : ' . $base_location_all['lat'] . ', Longitude : ' . $base_location_all['lon'] . ', City : ' . $base_location_all['city'] . ', ISP : ' . $base_location_all['isp'] . ', Timezone : ' . $base_location_all['timezone'];

            $last_device_type = $device['device'] . ', ' . $device['browser'] . ', ' . $device['user_egent'];
            $base_session_ref = $base_location . ', ' . $last_device_type;

            $data_3 = array(
                'user_seq_no' => $user_seq_no,
                'base_location' => $base_location,
                'base_session_ref' => $base_session_ref,
                'last_device_type' => $last_device_type,
                'last_ip_address' => $ip,
                'last_device_ref' => $base_session_ref,
                'last_accessed_time' => time(),
                'remarks_notes' => 'USER SELF REGISTRATION',
                'created_by' => $user_seq_no,
                'created_date' => time()
            );

            $profile = $this->app_profiles_model->add($data_3);

            if ($add) {

                $message_tpl = file_get_contents($this->config->item('assets_path') . 'email/registration_verify.html');
                $patterns = array();
                $patterns[0] = '/!!!#hiname#!!!/';
                $patterns[1] = '/!!!#link_to_activate#!!!/';
                $replacements = array();
                $replacements[0] = $fname . ' ' . $lname;
                $replacements[1] = base_url() . 'login/activat_link/' . $random1;
                $message_content = preg_replace($patterns, $replacements, $message_tpl);

                $subject = "Registration Verification";
                $this->email_config();
                $this->email->from('noreply@ams.com', 'Attorney Management System');
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($message_content);
                $send = $this->email->send();

                $msg = 'You are registered successfully. Please check your email.';
                $this->session->set_flashdata('err_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'login');
            } else {
                $msg = 'Something wrong while registration.';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'login');
            }
        }

        // end // 

        function companyRegistration() {

            $company_name = $this->input->post('company_name');
            $contact_person = $this->input->post('contact_person');
            $company_url = $this->input->post('company_url');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $display_name = $this->input->post('display_name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $password = md5($password);

            $this->load->helper('string');
            $random = random_string('alnum', 16);
            $random1 = base64_encode($random);

            $final_password = $password . $random1;

            $data = array(
                'type' => 'C',
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'password' => $final_password,
                'salt' => $random,
                'added_date' => time(),
                'modified_date' => time(),
                'status' => 1
            );

            $this->load->model('admin_login_model');
            $add = $this->admin_login_model->add($data);
            if ($add) {

                $this->load->library('email');
                $this->email->initialize($config);

//            $message_tpl = file_get_contents(base_url() . 'assets/email/forgot.html');
//            $patterns = array();
//            $patterns[0] = '/!!!#name#!!!/';
//            $patterns[1] = '/!!!#base_url#!!!/';
//            $replacements = array();
//            $replacements[0] = $username;
//            $replacements[1] = base_url() . 'login/recoverPassword/' . base64_encode($random . '/' . $email);
//            $message_content = preg_replace($patterns, $replacements, $message_tpl);

                $message_content = "Welcome to Da Vincii Tracking";

                $subject = "Reply from Da Vincii Tracking";
                $this->email_config();
                $this->email->from('noreply@davinciitracking.com', 'Da Vincii Tracking');
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($message_content);
                $send = $this->email->send();

                $msg = 'You are registered successfully. Login Now.';
                $this->session->set_flashdata('err_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'login');
            } else {
                $msg = 'Something wrong while registration.';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'registration');
            }
        }

        function emailCheck($param) {

            $email = $this->input->post('email');
            $todo = $this->input->post('todo1');

            $ret = true;

            if ($email == $todo) {
                echo json_encode($ret);
            }

            $this->load->model('admin_login_model');
            $cond = "AND status < 5 AND email='$email'";
            $fetch = $this->admin_login_model->fetch($cond);

            if (count($fetch) > 0) {
                $ret = false;
                echo json_encode($ret);
            } else {
                echo json_encode($ret);
            }
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

    }

}
