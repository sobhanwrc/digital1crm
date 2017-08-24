<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Industry_Type extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->isLogin();
    $this->load->model('Industry_Type_model');
		$this->load->helper('url');

		$admin_id = $this->data['admin_id'];
    $role_code = $this->data['role_code'];
    if($role_code !='SITEADM')
    	exit('No direct access allowed');

	}
	function index() {

        $this->data['industry_type_list'] = $this->Industry_Type_model->list_industry_type();
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/industry_type/listing', $this->data);
	}

  public function add() {

    if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$type_arr = array(
                'type_name' => $this->input->post('type_name'),
                'created_by' => $this->data['admin_id'],
                'created_date' => time(),
                'status' => $this->input->post('status')
            );
            $insert_id = $this->Industry_Type_model->add($type_arr);
            if($insert_id) {
            	$this->session->set_flashdata('suc_message', 'Industry type added successfully');
            	redirect('/Industry_Type');
            }
		}
    $this->get_include();
    $this->load->view($this->view_dir . 'operation_master/industry_type/add');
  }

  function edit() {

		$industry_type_seq_no = base64_decode($this->uri->segment(3));
		if($industry_type_seq_no) {
			$res = $this->Industry_Type_model->industry_type_details($industry_type_seq_no);
			$this->data['industry_type_details'] = $res;
		}
    $this->get_include();
		$this->load->view($this->view_dir . 'operation_master/industry_type/edit', $this->data);
	}

  function update() {
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$type_arr = array(
                'type_name' => $this->input->post('type_name'),
                'updated_by' => $this->data['admin_id'],
                'updated_date' => time(),
                'status' => $this->input->post('status')
            );

            $insert_id = $this->Industry_Type_model->edit($type_arr, base64_decode($this->input->post('industry_type_seq_no')));
            if($insert_id) {
            	$this->session->set_flashdata('suc_message', 'Industry Type updated successfully');
            	redirect('/Industry_Type');
            }
		}
	}

	function delete() {
		$industry_type_seq_no = base64_decode($this->uri->segment(3));
		if($industry_type_seq_no) {
			if($this->Industry_Type_model->delete($industry_type_seq_no)) {
				$this->session->set_flashdata('suc_message', 'Industry Type deleted successfully');
        redirect('/Industry_Type');
			}
		}
		else {
			redirect('/Industry_Type');
		}
	}

}
