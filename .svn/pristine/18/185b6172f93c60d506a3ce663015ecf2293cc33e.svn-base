<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends MY_Controller {
    function __construct() {
       parent::__construct();

        $this->isLogin();

        $this->load->model('firm_model');
        $this->load->model('user_model');
        $this->load->model('app_users_model');
        $this->load->model('address_model');
        $this->load->model('country_model');
        $this->load->model('county_model');
        $this->load->model('states_model');
        $this->load->model('city_model');
        $this->load->model('firm_codes_model');
        $this->load->model('codes_model');
        $this->load->model('firm_attorney_model');
        $this->load->model('attorney_model');
        $this->load->model('attorney_rpt_model');
        $this->load->model('attorney_sg_model');
        $this->load->model('attorney_sec_model');
        $this->load->model('section_model');
        $this->load->model('designation_model');
        $this->load->model('group_model');
         $this->load->model('targets_model');
         $this->load->model('category_model');
         
        
    }
     function index() {
             $admin_session_data = $this->session->userdata('admin_session_data'); 
             $admin_id = $this->data['admin_id'];
             $role_code = $this->data['role_code'];
             $firm_seq_no = $admin_session_data['firm_seq_no'];
             $this->db->select('plma_category.id,plma_category.submit_date,plma_category.status,plma_firm.firm_name,plma_industry_type.type_name')->from('plma_category')
                      ->join('plma_firm','plma_firm.firm_seq_no = plma_category.firm_seq_no','INNER') 
                      ->join('plma_industry_type','plma_industry_type.industry_type_seq_no = plma_category.industry_type_seq_no','INNER');
             $category_details = $this->db->get()->result_array();
             
             $this->data['categories'] = $category_details;
             
             
            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/super_admin/super_admin_category_list', $this->data);
    
     }
     
     function approved_category()
     {
          $id =  $this->input->post('data_id');
          $category_status =  $this->input->post('category_status');
        
            $data = array(
                'status' =>   $category_status
            );
        $edit = $this->category_model->edit($data,$id);
          if ( $edit) {
                echo 1;
                exit;
            }
     }
     
     
     
}    