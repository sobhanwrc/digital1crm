<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emailtemplate extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->data['page'] = 'Dashboard';
        $this->load->model('emailtemplate_model');
        $this->load->model('emailtemplatelist_model');
        $this->load->model('firm_model');
    }

    function index() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $admin_id = $admin_session_data['firm_seq_no'];
        $role_code = $this->data['role_code'];
        $cond123 = " AND created_by='$admin_id'";
        $row = $this->emailtemplatelist_model->fetch($cond123);
        $this->data['email_list'] = $row;
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/email/emailtemplate_listing', $this->data);
    }

    function contract() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $role_code = $this->data['role_code'];
        $this->db->select('*')->from('plma_contract_template')->where('created_by="' . $admin_session_data['firm_seq_no'] . '"');
        $row = $this->db->get()->result_array();
        $this->data['email_list'] = $row;
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/contract_email/emailtemplate_listing', $this->data);
    }

    function add() {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/email/emailtemplate', $this->data);
    }

    function add_contract() {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/contract_email/emailtemplate', $this->data);
    }

    function add_emailtemplate() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $template_name = $this->input->post('template_name');
        $content = $this->input->post('msg');
        if ($template_name) {
            $admin_id = $this->data['admin_id'];
            $data = array('name' => $template_name, 'content' => $content, 'created_by' => $admin_session_data['firm_seq_no']);
            $res = $this->emailtemplate_model->add($data);
            if ($res) {
                $this->session->set_flashdata('sess_message', 'Template added successfully');
            }
        }
    }

    function add_contract_emailtemplate() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $template_name = $this->input->post('template_name');
        $content = $this->input->post('msg');
        if ($template_name) {
            $admin_id = $this->data['admin_id'];
            $data = array('name' => $template_name, 'content' => $content, 'created_by' => $admin_session_data['firm_seq_no']);
            $res = $this->db->insert('plma_contract_template', $data);
            if ($res) {
                $this->session->set_flashdata('sess_message', 'Template added successfully');
            }
        }
    }

    function edit($code = '') {
        $code = base64_decode($code);
        $cond = " and id='" . $code . "'";
        $row = $this->emailtemplate_model->fetch($cond);
        $this->data['getvalue'] = $row;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/email/emailtemplateedit', $this->data);
    }

    function edit_contract($code = '') {
        $code = base64_decode($code);
        $cond = " and id='" . $code . "'";
        $this->db->select('*')->from('plma_contract_template')->where('id="' . $code . '"');
        $row = $this->db->get()->result_array();
        $this->data['getvalue'] = $row;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/contract_email/emailtemplateedit', $this->data);
    }

    function edit_emailtemplate() {
        $id = $this->input->post('id');
        $template_name = $this->input->post('template_name');
        $msg = $this->input->post('msg');

        $data_upt = array('name' => $template_name, 'content' => $msg);
        $this->db->where('id', $id);
        $this->db->update('plma_template', $data_upt);
        //redirect($base_url.'emailtemplate/emailtemplate_listing');
    }

    function edit_contract_emailtemplate() {
        $id = $this->input->post('id');
        $template_name = $this->input->post('template_name');
        $msg = $this->input->post('msg');

        $data_upt = array('name' => $template_name, 'content' => $msg);
        $this->db->where('id', $id);
        $this->db->update('plma_contract_template', $data_upt);
        //redirect($base_url.'emailtemplate/emailtemplate_listing');
    }

    function delete($code = '') {
        $code = base64_decode($code);
        $res = $this->emailtemplate_model->delete($code);
        if ($res) {
            redirect($base_url . 'emailtemplate/index');
        }
    }

    function delete_contract($code = '') {
        $code = base64_decode($code);
        $this->db->where('id', $code);
        $res = $this->db->delete('plma_contract_template');
        if ($res) {
            redirect($base_url . 'emailtemplate/contract');
        }
    }

}

?>
