<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App_profiles extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('app_profiles_model');
        $this->load->model('app_users_model');
        $this->load->model('Codes_model');

        $this->data['page'] = 'Dashboard';
    }

    function index() {

        $sql = "SELECT `user_id`, `user_seq_no`, `user_first_name`, `user_last_name` FROM `plma_user`";
        $query = $this->db->query($sql);
        $users = $query->result();
        $this->data['users'] = $users;
//        t($users);
//        exit;
        $sql1 = "SELECT `pu`.`user_id`, `pu`.`user_seq_no`, `pu`.`user_first_name`, `pu`.`user_last_name`, `pp`.* FROM `plma_user` `pu` LEFT JOIN `plma_profile` `pp` ON `pu`.`user_seq_no` = `pp`.`user_seq_no`";
        $query1 = $this->db->query($sql1);
        $profiles1 = $query1->result();
        $this->data['profiles'] = $profiles1;
//        t($this->data['profiles']);
//        exit;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/app_profiles/listing', $this->data);
    }

    ////////////////////// AJAX CALL for Username /////////////////////
    function fetch_user_name($user_id = '') {
        //echo "ok"; die();
        ///if(isset($user_id))
        //{
        $user_id = $this->input->post('user_id');
        //}
        $cond = " and user_seq_no = '" . $user_id . "'";
        $row = $this->app_users_model->fetch($cond);
        $array1 = array();
        $option = '<option value="">Username</option>';
        foreach ($row as $key => $value) {
            $option .= '<option value="' . $value['user_seq_no'] . '">' . $value['user_first_name'] . ' ' . $value['user_last_name'] . '</option>';
        }
        echo $option;
    }
    ////////////////////// End AJAX CALL /////////////////////
    function add() {
        //echo "ok"; die();
//        $admin_all_session = $this->session->userdata('admin_session');
       $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $user_id = $this->input->post('user_id');

        if (isset($user_id)) {
            $base_location = $this->input->post('base_location');
            $base_sess_ref = $this->input->post('base_session_ref');
            $current_location = $this->input->post('current_location');
            $current_sess_ref = $this->input->post('current_session_ref');
            $last_device_type = $this->input->post('last_device_type');
            $last_IP_address = $this->input->post('last_IP_address');
            $last_device_ref = $this->input->post('last_device_ref');
            $last_accessed_time = time();
            $remarks = $this->input->post('remarks');

            //Insert into profile table
            $data = array(
                'user_id' => $user_id,
                'base_location' => $base_location,
                'base_session_ref' => $base_sess_ref,
                'current_location' => $current_location,
                'current_session_ref' => $current_sess_ref,
                'last_device_type' => $last_device_type,
                'last_ip_address' => $last_IP_address,
                'last_device_ref' => $last_device_ref,
                'last_accessed_time' => $last_accessed_time,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//            echo "<pre>"; print_r($data); exit;

            $insert = $this->app_profiles_model->add($data);
//           echo $this->db->last_query(); die();
            if ($insert) {
                $msg = 'Profile added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'app-profiles');
            } else {
                $msg = 'error in adding Profile';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'app-profiles/add');
            }
            redirect($base_url . 'app-profiles/add');
        }
    }

    function details($code = '') {
        $code = base64_decode($code);
        $submit = $this->input->post('app_profiles_submit_btn');

        $cond = " and profile_seq_no = '".$code ."'";
        $row = $this->app_profiles_model->fetch($cond);
//        echo $this->db->last_query(); die();

        if (isset($submit)) {
//            echo "ok"; die();
//            $admin_all_session = $this->session->userdata('admin_session');
           $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

            //Profile Informations 
//            $user_id = $this->input->post('user_id');

//            if (isset($user_id)) 
//               echo "ok"; die();    
//                $base_location = $this->input->post('base_location');
//                $base_sess_ref = $this->input->post('base_sess_ref');
//                $current_location = $this->input->post('current_location');
//                $current_sess_ref = $this->input->post('current_sess_ref');
//                $last_device_type = $this->input->post('last_device_type');
//                $last_ip_address = $this->input->post('last_ip_address');
//                $last_device_ref = $this->input->post('last_device_ref');
//                $last_accessed_time = time();
                $remarks = $this->input->post('remarks');

                //insert into user table
                $data_arr = array(
//                    'user_id' => $user_id,
//                    'base_location' => $base_location,
//                    'base_session_ref' => $base_sess_ref,
//                    'current_location' => $current_location,
//                    'current_session_ref' => $current_sess_ref,
//                    'last_device_type' => $last_device_type,
//                    'last_ip_address' => $last_ip_address,
//                    'last_device_ref' => $last_device_ref,
                    'remarks_notes' => $remarks,
//                    'last_accessed_time' => $last_accessed_time,
                    'updated_by' => $this->data['admin_id'],
                    'updated_date' => time()
                );
//                echo "<pre>"; print_r($data_arr); die();

                $edit = $this->app_profiles_model->edit($data_arr, $code);
//               echo $this->db->last_query(); die();
                if ($edit) {
                    //echo"ok"; die();
                    $msg = 'App Profile updated successfully';
                    $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'app-profiles');
                } else {
                    $msg = 'error in updating App Profile';
                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                    redirect($base_url . 'app-profiles/details');
                }

                redirect($base_url . 'app-profiles/details');
          
        } else {
//
////            if (count($row) > 0) {
////                //echo "ok"; die();     
////                $this->data['profile_info'] = $row[0];
////                //t($this->data['profile_info']); exit;
////            }
//
////            $sql1 = "SELECT `user_id`, `user_seq_no`, `user_name` FROM `plma_user`";
////            $query1 = $this->db->query($sql1);
////            //echo $this->db->last_query();    
////            $this->data['user'] = $query1->result(); //t($query1->result()); die();
//
            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/app_profiles/listing', $this->data);
           }
    }
    function delete($code = '')
    {
        $code = base64_decode($code);
        $cond = $code;
        $row = $this->app_profiles_model->delete( $cond );
//        echo $this->db->last_query(); exit;
        
     redirect($base_url . 'app_profiles');
    }

}
