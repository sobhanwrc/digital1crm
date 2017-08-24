<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Change_module_number extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->isLogin();
        $this->load->model('change_module_number_module');
        $this->load->model('change_module_name');
        $this->load->model('Change_module_name_by_firm');
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    function index() {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        
        $details = $this->change_module_name->fetch();
        $this->data['module'] = $details;
        
        $cond = " AND firm_seq_no=$admin_id";
        $fetch_details_from_change_module_name_byFirm = $this->Change_module_name_by_firm->fetch($cond);
        $this->data['fetch_details_from_change_module_name_byFirm'] = $fetch_details_from_change_module_name_byFirm;
        
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/module/listing', $this->data);
    }
    
    
    
    function update() {

        $add_new_attorney_btn = $this->input->post('add_new_module_btn');
        if (isset($add_new_attorney_btn)) {
            // echo "ok";exit;
             
            ///////////// Insert address into address table ///////////////////
            $module1 = $this->input->post('module1');
            $module2 = $this->input->post('module2');
            $module3 = $this->input->post('module3');
            $module4 = $this->input->post('module4');
            $module5 = $this->input->post('module5');
            $module6 = $this->input->post('module6');
            $module7 = $this->input->post('module7');
            $module8 = $this->input->post('module8');
            $module9 = $this->input->post('module9');
            $module10= $this->input->post('module10');

            $data1 = array(
                'module1' => $module1,
                'module2' => $module2,
                'module3' => $module3,
                'module4' => $module4,
                'module5' => $module5,
                'module6' => $module6,
                'module7' => $module7,
                'module8' => $module8,
                'module9' => $module9,
                'module10' => $module10
            );
//             t($data1);die();

            $fetch_all_module_name = $this->change_module_name->fetch();
            
            $id = $fetch_all_module_name[0]['id'];
            
            if(empty($fetch_all_module_name)){
                $insertid = $this->change_module_name->add($data1); 
            }else{
                $insertid = $this->change_module_name->edit($data1,$id);
            }

            redirect($base_url . 'change_module_number');
            if($insertid)
            {
              //  redirect($base_url . 'module/add');
              redirect($base_url . 'change_module_number');
            }
            
            //when site admin add attorney
            

            //redirect($base_url . 'attorney/add');
       }
    }
    
    function edit_by_firm() {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $add_new_attorney_btn = $this->input->post('add_new_module_btn_by_firm');
        if (isset($add_new_attorney_btn)) {
            // echo "ok";exit;
             
            ///////////// Insert address into address table ///////////////////
            $module1 = $this->input->post('module1');
            $module2 = $this->input->post('module2');
            $module3 = $this->input->post('module3');
            $module4 = $this->input->post('module4');
            $module5 = $this->input->post('module5');
            $module6 = $this->input->post('module6');
            $module7 = $this->input->post('module7');
            $module8 = $this->input->post('module8');
            $module9 = $this->input->post('module9');
            $module10= $this->input->post('module10');

            $data1 = array(
                'firm_seq_no' => $admin_id,
                'module1' => $module1,
                'module2' => $module2,
                'module3' => $module3,
                'module4' => $module4,
                'module5' => $module5,
                'module6' => $module6,
                'module7' => $module7,
                'module8' => $module8,
                'module9' => $module9,
                'module10' => $module10,
                'added_date' => time()
            );
//             t($data1);
            $cond = " AND firm_seq_no=$admin_id";
            $fetch_all_module_name = $this->Change_module_name_by_firm->fetch($cond);
            $fetch_id = $fetch_all_module_name[0]['id'];
            
            if(empty($fetch_all_module_name)){
                $insertid = $this->Change_module_name_by_firm->add($data1); 
            }else{
                $insertid = $this->Change_module_name_by_firm->edit($data1,$fetch_id);
            }

            redirect($base_url . 'change_module_number');
            if($insertid)
            {
              //  redirect($base_url . 'module/add');
              redirect($base_url . 'change_module_number');
            }
       }
    }

}


