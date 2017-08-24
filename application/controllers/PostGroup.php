<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class PostGroup extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->isLogin();
    $this->load->model('PostGroup_model');
		$this->load->helper('url');

		$admin_id = $this->data['admin_id'];
    $role_code = $this->data['role_code'];
    if($role_code !='SITEADM')
    	exit('No direct access allowed');

	}
	function index() {

        $this->data['post_group_list'] = $this->PostGroup_model->post_group_list();
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/post_group/listing', $this->data);
	}

  public function get_postcode() {
    if($this->input->is_ajax_request()) {
      if($this->input->get('q'))
      {
        $q = $this->input->get('q');
        $data = json_decode(file_get_contents("http://api.postcodes.io/postcodes/".$q."/autocomplete"));
        //t($data);die;
        $json = [];
        $store_data=[];
       
        foreach ($data->result as $key => $value) {
           $expld_data=explode(" ",$value);
           $val=$expld_data[0]; 
           $json[0]=['id'=>$val, 'text'=>$val];
           
        }
         
        
        echo json_encode($json);
      }
    }
  }
  public function add() {

    if($this->input->server('REQUEST_METHOD') == 'POST') {

			$type_arr = array(
                'group_name' => $this->input->post('group_name'),
								'group_contains' => implode($this->input->post('group_contains'),","),
                'created_by' => $this->data['admin_id'],
                'created_date' => time(),
                'status' => $this->input->post('status')
            );
            $insert_id = $this->PostGroup_model->add($type_arr);
            if($insert_id) {
            	$this->session->set_flashdata('suc_message', 'PostGroup added successfully');
            	redirect('/PostGroup');
            }
		}
    $this->get_include();
    $this->load->view($this->view_dir . 'operation_master/post_group/add');
  }

  function edit() {

		$post_group_seq_no = base64_decode($this->uri->segment(3));
		if($post_group_seq_no) {
			/*$res = $this->PostGroup_model->post_group_details($post_group_seq_no);
			$this->data['post_group_details'] = $res;*/


      $cond = " AND post_group_seq_no=$post_group_seq_no";
      $fetch_post_details = $this->PostGroup_model->fetch($cond);
      $this->data['post_group_details'] = $fetch_post_details;
		}
    $this->get_include();
		$this->load->view($this->view_dir . 'operation_master/post_group/edit', $this->data);
	}

  function update() {
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$type_arr = array(
								'group_name' => $this->input->post('group_name'),
								'group_contains' => implode($this->input->post('group_contains'),","),
								'updated_by' => $this->data['admin_id'],
								'updated_date' => time(),
								'status' => $this->input->post('status')
            );

            $insert_id = $this->PostGroup_model->edit($type_arr, $this->input->post('post_group_seq_no'));
            if($insert_id) {
            	$this->session->set_flashdata('suc_message', 'PostGroup updated successfully');
            	redirect('/PostGroup');
            }
		}
	}

	function delete() {
		$post_group_seq_no = base64_decode($this->uri->segment(3));
		if($post_group_seq_no) {
			if($this->PostGroup_model->delete($post_group_seq_no)) {
				$this->session->set_flashdata('suc_message', 'PostGroup deleted successfully');
        redirect('/PostGroup');
			}
		}
		else {
			redirect('/PostGroup');
		}
	}

}
