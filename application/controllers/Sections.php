<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sections extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('site_admin_sections_model');
    }

    function index() {

        $this->data['sections'] = $this->site_admin_sections_model->fetch();

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/sections/listing', $this->data);
    }

    function add() {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $section_id = $this->input->post('section_id');
        $code_description = $this->input->post('code_description');
        $long_description = $this->input->post('long_description');
        $remarks = $this->input->post('remarks');

        $data = array(
            'section_id' => $section_id,
            'section_name' => $code_description,
            'long_description' => $long_description,
            'remark_notes' => $remarks,
            'created_by' => 1,
            'updated_by' => 1,
            'created_date' => time(),
            'updated_date' => time()
        );

        $insertid = $this->site_admin_sections_model->add($data);

        if ($insertid) {
            $msg = 'Section added successfully.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'sections');
        } else {
            $msg = 'Something went wrong.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliur!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'sections');
        }
    }

    function delete($section_id) {

        $section_id = base64_decode($section_id);
        $row = $this->site_admin_sections_model->delete($section_id);
        if ($row) {
            $msg = 'Section deleted successfully.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'sections');
        } else {
            $msg = 'Something went wrong.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliur!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'sections');
        }
    }

}
