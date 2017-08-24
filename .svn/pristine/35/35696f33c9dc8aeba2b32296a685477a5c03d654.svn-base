<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ui_lists_security extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('ui_lists_security_model');
        $this->load->model('role_ui_acl_model');
        $this->load->model('group_ui_acl_model');
        $this->load->model('user_ui_acl_model');
        $this->load->model('codes_model');

        $this->data['page'] = 'Dashboard';
    }

    function index() {
        //
        $lists = $this->ui_lists_security_model->fetch();
        $this->data['lists'] = $lists;

//        t($this->data['lists']); 
//        exit;

        foreach ($lists as $key => $value) {
            
            $ui_type_1 = $value['user_interface_type'];
            $cond1 = "AND code = '$ui_type_1' and category_type='Ui Type'";
            $ui_type = $this->codes_model->fetch($cond1);

            $lists[$key]['user_interface_type'] = $ui_type[0]['short_description'];
        }
        $this->data['det'] = $lists;
//        t($this->data['det'], 1);

        $sql1 = "SELECT `user_id`, `user_seq_no`, `user_name` FROM `plma_user`";
        $query1 = $this->db->query($sql1);
        //echo $this->db->last_query();    
        $this->data['users'] = $query1->result_array(); //t($query1->result()); die();

//        $sql = "SELECT `short_description`,`code_seq_no` FROM `plma_codes` WHERE `category_type`='Ui Type' ";
//        $query = $this->db->query($sql);
//        $Ui_type = $query->result();
//        $this->data['Ui_type'] = $Ui_type;
//        t($Ui_typs); die();

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/UI_lists_security/listing', $this->data);
    }

    function add() {
//        echo "ok"; exit;
//        $sql = "SELECT `short_description`, `code_seq_no` FROM `plma_codes` WHERE `category_type`='Ui Type' ";
//        $query = $this->db->query($sql);
//        $Ui_type = $query->result();
//        $this->data['Ui_type'] = $Ui_type;
////        t($Ui_typs); die();
//        $admin_all_session = $this->session->userdata('admin_session');
         $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $submit = $this->input->post('ui_list_submit');

        if (isset($submit)) {
//           echo "ok"; die();
            $ui_id = $this->input->post('user_interface_id');
            $ui_type = $this->input->post('ui_type');
            $ui_name = $this->input->post('user_interface_name');
            $ui_descriptions = $this->input->post('ui_descriptions');
            $remarks = $this->input->post('remarks');

            $data_arr = array(
                'user_interface_id' => $ui_id,
                'user_interface_name' => $ui_name,
                'user_interface_type' => $ui_type,
                'ui_description' => $ui_descriptions,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//            echo"<pre>"; print_r($data_arr); exit;

            $add_data = $this->ui_lists_security_model->add($data_arr);
//           echo '<br>';
//           echo $this->db->last_query(); exit;
            if ($add_data != '') {
                //echo "ok"; die();
                $msg = 'List added successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security');
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security');
            }
        } else {

            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/UI_lists_security/add', $this->data);
        }
    }

    function ui_id_check() {
        
        $ui_id = $this->input->post('user_interface_id');
        
        if ($ui_id != '') {
            $cond = " and user_interface_id = '" . $ui_id . "'";
            $row = $this->ui_lists_security_model->fetch($cond);
            $this->data['user_interface_id'] = $row;
            $row_1 = count($this->data['user_interface_id']);
            if ($row_1 > 0) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    function edit($code = '') {

//        $admin_all_session = $this->session->userdata('admin_session');
         $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        
        $submit = $this->input->post('list_tab');
        $code = base64_decode($code);

        $cond = " and ui_seq_no = '" . $code . "'";
        $row = $this->ui_lists_security_model->fetch($cond);
//         echo $this->db->last_query(); exit;

        if (isset($submit)) {
            $remarks = $this->input->post('remarks');

            $data = array(
                'remarks_notes' => $remarks,
                'updated_by' => 1,
                'updated_date' => time()
            );

            $insertid = $this->ui_lists_security_model->edit($data, $code);
//        echo $this->db->last_query(); exit;

            if ($insertid) {
                $msg = 'UI List updated successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security');
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliure!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security');
            }
        } else {

            if (count($row) > 0) {
                $this->data['list_info'] = $row[0];
            }

            $sql1 = "SELECT `user_id`, `user_seq_no`,`user_first_name`, `user_last_name` FROM `plma_user`";
            $query1 = $this->db->query($sql1);
            $this->data['users'] = $query1->result_array(); //t($query1->result()); die();

//            $sql2 = "SELECT `short_description`, `code_seq_no` FROM `plma_codes` WHERE `category_type`='Roles' AND `code_seq_no`!=1";
//            $query2 = $this->db->query($sql2);
//            $roles_1 = $query2->result();
//            $this->data['roles_1'] = $roles_1;

//            $sql3 = "SELECT `short_description`, `code_seq_no` FROM `plma_codes` WHERE `category_type`='Groups'";
//            $query3 = $this->db->query($sql3);
//            $groups = $query3->result();
//            $this->data['groups'] = $groups;

            $sql4 = "SELECT user_first_name, user_last_name, user_ui_acl_seq_no, acl_read, acl_write, acl_execute, plma_user_ui_acl.remarks_notes,plma_user.user_seq_no FROM plma_user, plma_user_ui_acl WHERE plma_user.user_seq_no = plma_user_ui_acl.user_seq_no";
            $query4 = $this->db->query($sql4);
            $user_1 = $query4->result();
            $this->data['user'] = $user_1;

            $sql5 = "SELECT a.`role_ui_acl_seq_no`, a.`acl_read`, a.`acl_write`, a.`acl_execute`, a.`remarks_notes`, b.`short_description`, a.`user_role_code` FROM `plma_role_ui_acl` a JOIN `plma_codes` b ON a.`user_role_code` = b.`code` WHERE b.`category_type` ='Roles'";
            $query5 = $this->db->query($sql5);
            $role = $query5->result();
            $this->data['role'] = $role;

            $sql6 = "SELECT `group_ui_acl_seq_no`,`acl_read`,`acl_write`,`acl_execute`, plma_group_ui_acl.`remarks_notes`, `short_description`, `user_group_code` FROM `plma_group_ui_acl` JOIN `plma_codes` ON plma_group_ui_acl.user_group_code = plma_codes.code WHERE plma_codes.category_type ='Groups'";
            $query6 = $this->db->query($sql6);
            $group = $query6->result();
            $this->data['group'] = $group;
//        t($group); die();

            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/UI_lists_security/edit', $this->data);
        }
    }

    function user_add($code = '') {
//        $sql1 ="SELECT `user_id`, `user_seq_no` FROM `plma_user`";
//        $query1 = $this->db->query($sql1);
//        $user = $query1->result();
//        $this->data['user'] = $user;
//        t($this->data['user']); exit;
        $code = base64_decode($code);
//        $admin_all_session = $this->session->userdata('admin_session');
         $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $submit = $this->input->post('acl_user_submit');

        $ui_seq_no = $this->input->post('ui_seq_no');

        if (isset($submit)) {

            $user = $this->input->post('user');
            $read = ($this->input->post('read[]')) ? '1' : '';
            $write = ($this->input->post('write[]')) ? '1' : '';
            $execute = ($this->input->post('execute[]')) ? '1' : '';
            $remarks = $this->input->post('remarks');

            $insert_data = array(
                'user_seq_no' => $user,
                'ui_seq_no' => $ui_seq_no,
                'acl_read' => $read,
                'acl_write' => $write,
                'acl_execute' => $execute,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date' => time()
            );
            //    echo"<pre>"; print_r($insert_data); exit;
            $add_user = $this->user_ui_acl_model->add($insert_data);
//        echo $this->db->last_query(); exit;
            if ($add_user != '') {
                //echo "ok"; die();
                $msg = 'User added successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            }
        } else {

            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/UI_lists_security/edit/', $this->data);
        }
    }

    function role_add($code = '') {

//        $sql2 = "SELECT `short_description`, `code_seq_no` FROM `plma_codes` WHERE `category_type`='Roles' AND `code_seq_no`!=1";
//        $query2 = $this->db->query($sql2);
//        $roles_1 = $query2->result();
//        $this->data['roles_1'] = $roles_1;
//        t($this->data['roles']); exit;
        $code = base64_decode($code);
//        $admin_all_session = $this->session->userdata('admin_session');
         $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $submit_2 = $this->input->post('acl_role_submit');

        $ui_seq_no = $this->input->post('ui_seq_no');

        if (isset($submit_2)) {

//            echo "ok"; die();
            $role = $this->input->post('role_code');
            $read = ($this->input->post('read[]')) ? '1' : '';
            $write = ($this->input->post('write[]')) ? '1' : '';
            $execute = ($this->input->post('execute[]')) ? '1' : '';
            $remarks = $this->input->post('remarks');

            $insert_data2 = array(
                'user_role_code' => $role,
                'ui_seq_no' => $ui_seq_no,
                'acl_read' => $read,
                'acl_write' => $write,
                'acl_execute' => $execute,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//    echo"<pre>"; print_r($insert_data2); exit;
            $add_user2 = $this->role_ui_acl_model->add($insert_data2);
//        echo $this->db->last_query(); exit;
            if ($add_user2 != '') {
                //echo "ok"; die();
                $msg = 'Role added successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            }
        } else {

            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/UI_lists_security/edit/', $this->data);
        }
    }

    function group_add($code = '') {
//        
//        $sql3 = "SELECT `short_description`, `code_seq_no` FROM `plma_codes` WHERE `category_type`='Groups' ";
//        $query3 = $this->db->query($sql3);
//        $groups = $query3->result();
//        $this->data['groups'] = $groups;
//        t($groups); exit;

        $code = base64_decode($code);
//        $admin_all_session = $this->session->userdata('admin_session');
         $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $submit_3 = $this->input->post('acl_group_submit');

        $ui_seq_no = $this->input->post('ui_seq_no');

        if (isset($submit_3)) {

//            echo "ok"; die();
            $group = $this->input->post('group_code');
            $read = ($this->input->post('read[]')) ? '1' : '';
            $write = ($this->input->post('write[]')) ? '1' : '';
            $execute = ($this->input->post('execute[]')) ? '1' : '';
            $remarks = $this->input->post('remarks');

            $insert_data3 = array(
                'user_group_code' => $group,
                'ui_seq_no' => $ui_seq_no,
                'acl_read' => $read,
                'acl_write' => $write,
                'acl_execute' => $execute,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//    echo"<pre>"; print_r($insert_data3); exit;
            $add_user3 = $this->group_ui_acl_model->add($insert_data3);
//        echo $this->db->last_query(); exit;
            if ($add_user3 != '') {
                //echo "ok"; die();
                $msg = 'Group added successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            }
        } else {

            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/UI_lists_security/edit/', $this->data);
        }
    }

    function edit_user($code = '') {
//              echo "ok"; die();  
        $code = base64_decode($code);

        $cond = " and user_ui_acl_seq_no = '" . $code . "'";
        $row = $this->user_ui_acl_model->fetch($cond);

        $submit = $this->input->post('user_security_privilege_submit');
        if (isset($submit)) {
            $read = ($this->input->post('read[]')) ? '1' : '';
            $write = ($this->input->post('write[]')) ? '1' : '';
            $execute = ($this->input->post('execute[]')) ? '1' : '';
            $remarks = $this->input->post('remarks');

            $data_User = array(
                'acl_read' => $read,
                'acl_write' => $write,
                'acl_execute' => $execute,
                'remarks_notes' => $remarks
            );
//                echo "<pre>"; print_r($data_User); exit;
            $user_edit = $this->user_ui_acl_model->edit($data_User, $code);
//                echo $this->db->last_query; exit;
            if ($user_edit != '') {
                //echo "ok"; die();
                $msg = 'User edited successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            }
        } else {
            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/UI_lists_security/edit/', $this->data);
        }
    }

    function edit_group($code = '') {
//        echo "ok"; die();
        $code = base64_decode($code);

        $cond = " and group_ui_acl_seq_no = '" . $code . "'";
        $row = $this->group_ui_acl_model->fetch($cond);

        $submit = $this->input->post('group_security_privilege_submit');
        if (isset($submit)) {
            $read = ($this->input->post('read[]')) ? '1' : '';
            $write = ($this->input->post('write[]')) ? '1' : '';
            $execute = ($this->input->post('execute[]')) ? '1' : '';
            $remarks = $this->input->post('remarks');

            $data_group = array(
                'acl_read' => $read,
                'acl_write' => $write,
                'acl_execute' => $execute,
                'remarks_notes' => $remarks
            );
            $group_edit = $this->group_ui_acl_model->edit($data_group, $code);
            if ($group_edit != '') {
                //echo "ok"; die();
                $msg = 'Group edited successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            }
        } else {
            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/UI_lists_security/edit/', $this->data);
        }
    }

    function edit_role($code = '') {
//        echo "ok"; die();

        $code = base64_decode($code);

        $cond = " and role_ui_acl_seq_no = '" . $code . "'";
        $row = $this->role_ui_acl_model->fetch($cond);

        $submit = $this->input->post('role_security_privilege_submit');
        if (isset($submit)) {
            $read = ($this->input->post('read[]')) ? '1' : '';
            $write = ($this->input->post('write[]')) ? '1' : '';
            $execute = ($this->input->post('execute[]')) ? '1' : '';
            $remarks = $this->input->post('remarks');

            $data_role = array(
                'acl_read' => $read,
                'acl_write' => $write,
                'acl_execute' => $execute,
                'remarks_notes' => $remarks
            );
            $role_edit = $this->role_ui_acl_model->edit($data_role, $code);
            if ($role_edit != '') {
                //echo "ok"; die();
                $msg = 'Role edited successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'ui_lists_security/edit/' . base64_encode($code));
            }
        } else {
            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/UI_lists_security/edit/', $this->data);
        }
    }

    function delete($code = '') {
//        $code = base64_decode($code);
//        $cond = $code;
//        $row = $this->ui_lists_security_model->delete($cond);
//        echo $this->db->last_query(); exit;

        redirect($base_url . 'ui_lists_security');
    }

}
