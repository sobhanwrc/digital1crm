<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Designation extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('designation_model');
        $this->data['page'] = 'Dashboard';
    }
    function index(){
        
        $admin_id = $this->data['admin_id']; //exit;
        $role_code = $this->data['role_code'];

        $row = $this->designation_model->fetch();
        $this->data['designation'] = $row;
       // t($this->data['designation']); exit;
        
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/designation/listing', $this->data);
    }
    function add(){
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $submit = $this->input->post('designation_submit');

        if(isset($submit)){
            $designation = $this->input->post('designation_name');
            $designation_code = $this->input->post('designation_code');
            $remarks = $this->input->post('remarks');
            
            $data_arr = array(
                'designation' => $designation,
                'designation_code' => $designation_code,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'updated_by' => $admin_id,
                'created_date' => time(),
                'updated_date' => time()    
            );
           // t($data_arr);
           // exit; 
            $insert = $this->designation_model->add($data_arr);
           // echo $this->db->last_query(); 
          
            if ($insert) {
                $msg = 'Designation added successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                        <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'designation');
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                        <strong>Faliur!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'designation');
            }

        }

    }
}
