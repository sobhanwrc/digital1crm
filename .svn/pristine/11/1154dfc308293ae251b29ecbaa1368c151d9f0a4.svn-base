<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register_user extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();
        $this->load->model('reg_users_model');
    }

    function index() {

        $sql = "select plma_reg_users.*, paddr.*, plma_city.city_name, plma_country.name, plma_states.state_name, plma_county.county_name 
from plma_reg_users left join plma_address paddr on paddr.address_seq_no = plma_reg_users.address_seq_no 
left join plma_city on plma_city.city_seq_no = paddr.city 
left join plma_country on plma_country.country_seq_no = paddr.country 
left join plma_states on plma_states.state_seq_no = paddr.state 
left join plma_county on plma_county.county_seq_no = paddr.county 
where plma_reg_users.status<5 ";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        // echo $this->db->last_query();
        // t($row); exit;
        ///$cond = "AND status<5 ";

        $this->data['reg_user_list'] = $row ; //$this->reg_users_model->fetch($cond); //t($this->reg_users_model->fetch($cond), 1);
        
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/reg_users/listing', $this->data);
    }

    
    function edit($id) {
       
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        /*$short_description = $this->input->post('short_description');
        $long_description = $this->input->post('long_description');*/
        $remarks = $this->input->post('remarks');

        $data = array(/*
            'short_description' => $short_description,
            'long_description' => $long_description,*/
            'remarks_notes' => $remarks,
            'updated_by' => $admin_id,
            'updated_at' => time()
        );

        $insertid = $this->reg_users_model->edit($data, $id);
        //echo $this->db->last_query();exit;
        if ($insertid != '') {
            $msg = 'Registered user modified successfully.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'register-user');
        } else {
            $msg = 'Something went wrong.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'register-user');
        }
    }

}
