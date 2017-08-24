<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Super_admin extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->isLogin();
        $this->load->model('super_user_model');
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    function index() {

        $cond3 = "AND super_user_seq_no=1";
        $details = $this->super_user_model->fetch($cond3);
        $this->data['det'] = $details;
        //t($this->data['det'],1);
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/super_admin/add', $this->data);
    }

    function edit() {

        if (isset($_POST['username'])) {

            $admin_id = $this->data['admin_id'];
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password = md5($password);

            $this->load->helper('string');
            $random = random_string('alnum', 16);
            $random1 = base64_encode($random);

            $final_password = $password . $random1;

            $user_data = array(
                'username' => $username,
                'password' => $final_password,
                'salt' => $random,
                'created_by' => $admin_id,
                'created_date' => time(),
                'status' => 1
            );

            $data = $this->super_user_model->fetch();
            if (count($data) == 0) {
                $us_add = $this->super_user_model->add($user_data);
                $msg = 'Super user details added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'super_admin');
            } else {

                $cond = " super_user_seq_no=1";
                $user_add = $this->super_user_model->edit_cond($user_data, $cond);

                if ($user_add) {
                    $msg = 'Super user details updated successfully';
                    $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'super_admin');
                } else {
                    $msg = 'Error in adding attorney';
                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'super_admin');
                }
            }
        } else {

            $cond3 = "AND super_user_seq_no=1";
            $details = $this->super_user_model->fetch('', $cond3);
            $this->data['det'] = $details;
            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/super_admin/add', $this->data);
        }
    }

    function login() {
        
        $admin_id = $this->data['admin_id'];
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $firm_admin_seq_no = $this->input->post('firm');
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        //        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        //echo $username.$password.$firm_admin_seq_no.$admin_id; exit();

        if ($this->form_validation->run() == FALSE) {
            //echo 123; exit();
            $msg = 'Please enter username and password';
            $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</span></font>');
            redirect($base_url . 'dashboard');
        } else {

            $cond = " and username = '" . $this->db->escape_str($username) . "'";
            $row_data = $this->super_user_model->fetch($cond);

            //t($row_data,1);
            if (!empty($row_data)) {

                $username = $row_data[0]['username'];
                $user_seq_no = $row_data[0]['created_by'];

                $password_temp = $row_data[0]['password'];
                $salt = $row_data[0]['salt'];
                $temp = substr($password_temp, -24, 24);
                $temp2 = substr($password_temp, 0, 32);
                $decoded_salt = base64_decode($temp);

                // echo $password_temp. "  -- ". $salt. "  -- ".$temp. "  -- ".$temp2. "  -- ". $decoded_salt; exit();
                if (($decoded_salt != $salt) || ($password != $temp2)) {
                    //echo 456; exit();
                    $msg = 'Wrong Username/Password, please try again';
                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</span></font>');
                    redirect($base_url . 'dashboard');
                } else {
                    //(count($row_data) > 0) {
                    //echo 123; die();
                    $cond1 = " and user_seq_no = '$firm_admin_seq_no'";
                    $row_data1 = $this->user_model->fetch($cond1);

                    // t($row_data1,1);

                    $newdata = array(
                        'admin_id' => $row_data1[0]['user_seq_no'],
                        'original_id' => $admin_id,
                        'user_id' => $row_data1[0]['user_id'],
                        'user_first_name' => $row_data1[0]['user_first_name'],
                        'user_last_name' => $row_data1[0]['user_last_name'],
                        'role_code' => $row_data1[0]['role_code'],
                    );
                    //t($newdata,1);
                    $this->session->set_userdata('admin_session_data', $newdata);
                    $msg = "You have logged in successfully as a firm admin.";
                    $this->session->set_flashdata('err_message', '<font color="green"><span class="err_msg">' . $msg . '</span></font>');
                    redirect($base_url . 'dashboard');
                }
            }else{
                    $msg = 'Wrong Username/Password, please try again';
                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</span></font>');
                    redirect($base_url . 'dashboard');
            }
        }
    }

}


