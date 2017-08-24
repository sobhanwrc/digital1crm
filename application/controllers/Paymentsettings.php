<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Paymentsettings extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->isLogin();
		$this->load->model('payment_settings_model');
		$this->load->helper('url');
		$admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        if($role_code !='FIRMADM')
        	exit('No direct access allowed');
        
	}

	function index() {
		$admin_session_data = $this->session->userdata('admin_session_data');
		$firm_seq_no = $admin_session_data['firm_seq_no'];
		

        $res = $this->payment_settings_model->payment_settings_list($firm_seq_no);
		$this->data['payment_settings_list'] = $res;
		
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/paymentsettings/listing', $this->data);
	}

	function add() {
		$this->get_include();
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$admin_session_data = $this->session->userdata('admin_session_data');
			$paymentsettings_arr = array(
                'bank_info' => $this->input->post('bank_info'),
                'paypal_info' => $this->input->post('paypal_info'),
                'created_by' => $admin_session_data['admin_id'],
                'firm_seq_no' => $admin_session_data['firm_seq_no'],
                'created_date' => time()
            );
//            t($activity_arr); exit; 
            $insert_id = $this->payment_settings_model->add($paymentsettings_arr);
            if($insert_id) {
            	$this->session->set_flashdata('suc_message', 'Settings added successfully');
            	redirect('/paymentsettings');
            }
		}
        $this->load->view($this->view_dir . 'operation_master/paymentsettings/add', $this->data);
	}

	function edit() {
		$this->get_include();
		$payment_settings_seq_no = base64_decode($this->uri->segment(3));
		if($payment_settings_seq_no) {
			$res = $this->payment_settings_model->payment_settings_details($payment_settings_seq_no);
			$this->data['payment_settings'] = $res;
		}
		$this->load->view($this->view_dir . 'operation_master/paymentsettings/edit', $this->data);
	}

	function update() {
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$paymentsettings_arr = array(
                'bank_info' => $this->input->post('bank_info'),
                'paypal_info' => $this->input->post('paypal_info'),
                'updated_by' => $this->data['admin_id'],
                'firm_seq_no' => $this->data['firm_seq_no'],
                'updated_date' => time()
            );

            $insert_id = $this->payment_settings_model->edit($paymentsettings_arr, base64_decode($this->input->post('payment_settings_seq_no')));
            if($insert_id) {
            	$this->session->set_flashdata('suc_message', 'Payment Settings updated successfully');
            	redirect('/paymentsettings');
            }
		}
	}

	function delete() {
		$payment_settings_seq_no = base64_decode($this->uri->segment(3));
		if($payment_settings_seq_no) {
			if($this->payment_settings_model->delete($payment_settings_seq_no)) {
				$this->session->set_flashdata('suc_message', 'Payment Settings deleted successfully');
            	redirect('/paymentsettings');
			}
		}
		else {
			redirect('/paymentsettings');
		}
	}
}