<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Venue extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();
        $this->load->model('venue_model');
        $this->load->model('emailtemplate_model');
        $this->load->helper('url');

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        if ($role_code != 'FIRMADM')
            exit('No direct access allowed');
    }

    function index() {

//        $res = $this->venue_model->venue_list();
//        echo $this->db->last_query();
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_session_data['firm_seq_no'];
        
        $cond = "AND status=1 and firm_seq_no=$firm_seq_no";
        $fetch_all_venue = $this->venue_model->fetch($cond);
        $this->data['venue_list'] = $fetch_all_venue;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/venue/listing', $this->data);
    }

    function add() {
        $res = $this->venue_model->country_info();
        $this->get_include();
        $this->data['country_info'] = $res;
        
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_session_data['firm_seq_no'];

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $country_code = $this->input->post('country_code1');
            $venue_arr = array(
                'firm_seq_no' => $firm_seq_no,
                'venue_name' => $this->input->post('venue_name'),
                'venue_address' => $this->input->post('venue_address'),
                'country_seq_no' => $this->input->post('country_seq_no'),
                'state_seq_no' => $this->input->post('state_seq_no'),
                'city_seq_no' => $this->input->post('city_seq_no'),
                'zips_seq_no' => $this->input->post('zips_seq_no'),
                'contact_person' => $this->input->post('contact_person'),
                'contact_no' => $country_code.$this->input->post('contact_no'),
                'created_by' => $this->data['admin_id'],
                'created_date' => time(),
                'status' => $this->input->post('status')
            );
//            t($venue_arr); exit;
            $insert_id = $this->venue_model->add($venue_arr);
            if ($insert_id) {
                $this->session->set_flashdata('suc_message', 'Venue added successfully');
                redirect('/venue');
            }
        }
        $this->load->view($this->view_dir . 'operation_master/venue/add', $this->data);
    }

    function edit() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_session_data['firm_seq_no'];
        
        $this->get_include();
        $veneu_seq_no = base64_decode($this->uri->segment(3));
        if ($veneu_seq_no) {       
            
            $cond = " AND venue_seq_no=$veneu_seq_no AND status=1 AND firm_seq_no=$firm_seq_no";
            $fetch_venue_details = $this->venue_model->fetch($cond);
//            t($fetch_venue_details);die();
            $this->data['venue_list'] = $fetch_venue_details;
            
            $mobile_no = $fetch_venue_details[0]['contact_no'];
            $length = strlen($mobile_no);
            if ($length == 17) {
                $country_code1 = substr($mobile_no, 0, 3);
            }
            $add_contact_phone_number = substr($mobile_no, -11);
            $this->data['country_code'] = $country_code1;
            $this->data['contact_no'] = $add_contact_phone_number;
        }
        $this->load->view($this->view_dir . 'operation_master/venue/edit', $this->data);
    }

    function update() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $country_code = $this->input->post('country_code1');
            $venue_arr = array(
                'venue_name' => $this->input->post('venue_name'),
                'venue_address' => $this->input->post('venue_address'),
                'country_seq_no' => $this->input->post('country_seq_no'),
                'state_seq_no' => $this->input->post('state_seq_no'),
                'city_seq_no' => $this->input->post('city_seq_no'),
                'zips_seq_no' => $this->input->post('zips_seq_no'),
                'contact_person' => $this->input->post('contact_person'),
                'contact_no' => $country_code.$this->input->post('contact_no'),
                'updated_by' => $this->data['admin_id'],
                'updated_date' => time(),
                'status' => $this->input->post('status')
            );
//            t($activity_arr); exit;
            $insert_id = $this->venue_model->edit($venue_arr, base64_decode($this->input->post('venue_seq_no')));
            if ($insert_id) {
                $this->session->set_flashdata('suc_message', 'Venue updated successfully');
                redirect('/venue');
            }
        }
    }

    function delete() {
        $venue_seq_no = base64_decode($this->uri->segment(3));
        if ($venue_seq_no) {
            if ($this->venue_model->delete($venue_seq_no)) {
                $this->session->set_flashdata('suc_message', 'Venue deleted successfully');
                redirect('/venue');
            }
        } else {
            redirect('/venue');
        }
    }

    function fetch_state() {
        $country_seq_no = $this->input->post('country_seq_no');
        $reponse = array();
        if ($country_seq_no) {
            $res = $this->venue_model->state_info($country_seq_no);
            $reponse['data'] = $res;
            $reponse['status'] = 200;
        } else {
            $reponse['data'] = [];
            $reponse['status'] = 403;
        }
        echo json_encode($reponse);
    }

    function fetch_city() {
        $state_seq_no = $this->input->post('state_seq_no');
        $reponse = array();
        if ($state_seq_no) {
            $res = $this->venue_model->city_info($state_seq_no);
            $reponse['data'] = $res;
            $reponse['status'] = 200;
        } else {
            $reponse['data'] = [];
            $reponse['status'] = 403;
        }
        echo json_encode($reponse);
    }

    function fetch_zipcode() {
        $city = $this->input->post('city');
        $reponse = array();
        if ($city) {
            $res = $this->venue_model->zip_info($city);
            $reponse['data'] = $res;
            $reponse['status'] = 200;
        } else {
            $reponse['data'] = [];
            $reponse['status'] = 403;
        }
        echo json_encode($reponse);
    }

    function add_emailtemplate() {
        $template_name = $this->input->post('template_name');
        $content = $this->input->post('msg');
        if ($template_name) {
            $data = array('name' => $template_name, 'content' => $content);
            $res = $this->emailtemplate_model->add($data);
            if ($res) {
                $this->session->set_flashdata('sess_message', 'Template added successfully');
            }
        }
    }

}
