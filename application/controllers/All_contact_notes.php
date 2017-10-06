<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class All_contact_notes extends MY_Controller{
    function __construct() {
        parent::__construct();

        $this->isLogin();
        $role_code = $this->data['role_code'];
        // echo 123; exit;

        if ($role_code == 'ATTRMGR' || $role_code == 'ATTR') {
            redirect($base_url . 'login/logout');
        }

        $this->load->model('user_model');
        $this->load->model('codes_model');
        $this->load->model('app_users_model');
        $this->load->model('address_model');
        $this->load->model('city_model');
        $this->load->model('country_model');
        $this->load->model('county_model');
        $this->load->model('states_model');
        $this->load->model('firm_model');
        $this->load->model('firm_address_model');
        $this->load->model('site_admin_sections_model');
        $this->load->model('attorney_model');
        $this->load->model('practice_area_model');
        $this->load->model('firm_pa_model');
        $this->load->model('designation_model');
        $this->load->model('approval_level_model');
        $this->load->model('group_model');
        $this->load->model('Change_module_number_module');
        $this->load->model('industry_Type_model');
        $this->load->model('targets_model');
        $this->load->model('category_model');
        $this->load->model('Allnote_Model');
    }
    
    function index(){
        //show all contacts list first//
        $admin_session_data = $this->session->userdata('admin_session_data');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $admin_session_data['firm_seq_no'];


        $cond1 = "AND firm_seq_no = '$firm_seq_no' limit 0,1000";
        $firm_details = $this->targets_model->fetch($cond1);
        //t($firm_details); die();
        //$select = "firm_seq_no,firm_name";
        $this->data['firms'] = $firm_details;
        $this->db->select('*')->from('plma_industry_type');
        //t($cat_details); die();
        $this->data['categories'] = $this->db->get()->result_array();


        $cat_fetch = $this->category_model->max_id_fetch();
        $cat_id = $cat_fetch[0]['id'];
        $cond1 = "AND id = ' $cat_id'";
        $cat_details = $this->category_model->fetch($cond1);
        $this->data['cat_details'] = $cat_details;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/all_contacts_notes/index', $this->data);
        //end//
    }
    
    function show_all_notes($id=''){
        $target_seq_no = base64_decode($id);
        
        $condnote = " AND  target_seq_no ='".$target_seq_no."' order by id DESC";
        $note=$this->Allnote_Model->fetch($condnote);
        $this->data['viewallnotes']=$note;
        
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/all_contacts_notes/show_all_notes', $this->data);
    }
}

