<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Firm_codes extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('firm_codes_model');
        $this->load->model('codes_model');
        $this->load->model('firm_model');
        $this->load->model('code_category_model');
    }

    function index() {  
        
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        
        $sql = " select pfc.firm_seq_no from plma_firm pfirm, plma_firm_codes pfc where pfirm.firm_admin_seq_no=$admin_id and pfc.firm_seq_no = pfirm.firm_seq_no group by pfc.firm_seq_no";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        //t($row[0]['firm_seq_no']); exit;
        $firm_code = $row[0]['firm_seq_no'];
        
        if($role_code == 'SITEADM' ){
            $sql = "Select fc.firm_code_seq_no,fc.short_description,fc.long_description,fc.remarks_notes, "
                . "c.code as firm_code, c.category_type as category, f.firm_name as firm from plma_firm_codes as fc inner join plma_codes as c "
                . "on fc.code_seq_no=c.code_seq_no  inner join plma_firm as f on fc.firm_seq_no=f.firm_seq_no ";
        }elseif($role_code == 'FIRMADM' ){
             $sql = "Select fc.firm_code_seq_no,fc.short_description,fc.long_description,fc.remarks_notes, "
                . "c.code as firm_code, c.category_type as category, f.firm_name as firm from plma_firm_codes as fc inner join plma_codes as c "
                . "on fc.code_seq_no=c.code_seq_no  inner join plma_firm as f on fc.firm_seq_no=f.firm_seq_no where fc.firm_seq_no=$firm_code";
        }
//        echo $sql; exit;
        $query = $this->db->query($sql);
        $firm_codes = $query->result_array();
 
        $this->data['firm_codes'] = $firm_codes;
//        t($this->data['firm_codes']); exit;
        $select = "firm_seq_no,firm_name";
        $this->data['firms'] = $this->firm_model->fetch('', $select);

        $this->data['code_category'] = $this->code_category_model->fetch();

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/firm_codes/listing', $this->data);
    }

    function fetchFirmCodes($param) {

     $firm_id = $this->input->post('fimrs');
  

        if ($firm_id == 'all') {
            $sql = "Select fc.firm_code_seq_no,fc.short_description,fc.long_description,fc.remarks_notes, "
                    . "c.code as firm_code, c.category_type as category, f.firm_name as firm from plma_firm_codes as fc inner join plma_codes as c "
                    . "on fc.code_seq_no=c.code_seq_no  inner join plma_firm as f on fc.firm_seq_no=f.firm_seq_no";
        } else {
            $sql = "Select fc.firm_code_seq_no,fc.short_description,fc.long_description,fc.remarks_notes, "
                    . "c.code as firm_code, c.category_type as category, f.firm_name as firm from plma_firm_codes as fc inner join plma_codes as c "
                    . "on fc.code_seq_no=c.code_seq_no  inner join plma_firm as f on fc.firm_seq_no=f.firm_seq_no where f.firm_seq_no=$firm_id";
        }
//        echo $sql; exit;
        $query = $this->db->query($sql);
        $firm_codes = $query->result_array();

//        t($firm_codes);exit;
        $this->data['firm_codes'] = $firm_codes;

        $select = "firm_seq_no,firm_name";
        $this->data['firms'] = $this->firm_model->fetch('', $select);

        $this->data['code_category'] = $this->code_category_model->fetch();

        $this->data['firm_id'] = $firm_id;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/firm_codes/listing', $this->data);
    }
    
//    function edit($id) {
//        $admin_all_session = $this->session->userdata('admin_session');
//        $short_description = $this->input->post('short_description');
//        $long_description = $this->input->post('long_description');
//        $remarks = $this->input->post('remarks');
//
//        $data = array(
//            'short_description' => $short_description,
//            'long_description' => $long_description,
//            'remarks_notes' => $remarks,
//            'updated_by' => $admin_all_session['admin_id'],
//            'updated_date' => time()
//        );
//
//        $insertid = $this->firm_codes_model->edit($data, $id);
//
//        if ($insertid != '') {
//            $msg = 'Firm level code modified successfully.';
//            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
//                                                    <strong>Success!</strong> ' . $msg . ' </div>');
//            redirect($base_url . 'firm-codes');
//        } else {
//            $msg = 'Something went wrong.';
//            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
//                                                    <strong>Success!</strong> ' . $msg . ' </div>');
//            redirect($base_url . 'firm-codes');
//        }
//    }
    function details($code = '')
    {
        $code = base64_decode($code);
        $submit = $this->input->post('firm_code_edit_submit');

        $cond = " and firm_code_seq_no = '".$code."'";
        $row = $this->firm_codes_model->fetch( $cond ); //t($row , 1);
        
       
//        
//        
//        if(count($row) > 0){
//            
//          $this->data['firm_info'] = $row[0];
////          t($this->data['firm_info']); exit;
//        }
//          $sql1 = "SELECT * from `plma_firm`";
//          $query1 = $this->db->query($sql1);        
//          //echo $this->db->last_query();    
//         $this->data['firm'] = $query1->result(); 
////        t($query1->result()); die();
//         
//         $sql2 = "SELECT `code_seq_no`, `code` FROM `plma_codes` WHERE `category_type`!='Roles' AND `category_type`!='Groups'";
//         $query2 = $this->db->query($sql2);
//         //echo $this->db->last_query(); 
//         $this->data['codes'] = $query2->result();
////         t($query2->result()); die();
//         
//         
//         
//         $this->get_include();
//        $this->load->view($this->view_dir . 'app_master/firm_codes/firm_codes_view', $this->data);
    }


    function edit($code = '')
    {
        $code = base64_decode($code);
        $submit = $this->input->post('firm_code_edit_submit');

            //echo "ok"; die();
//            $admin_all_session = $this->session->userdata('admin_session');
             $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];
            
            $short_description = $this->input->post('short_description');
            $long_description = $this->input->post('long_description');
//            echo $long_description; exit;
            $remarks = $this->input->post('remarks');
            
            $data_edit = array(
                'short_description' => $short_description,
                'long_description' => $long_description,
                'remarks_notes' => $remarks,
                'updated_date' => time(),
                'updated_by' => $admin_id,
               );
            
            $insertid = $this->firm_codes_model->edit($data_edit, $code);
//            echo $this->db->last_query(); exit;
            
            if ($insertid != '') {
            $msg = 'Firm level code modified successfully.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'firm-codes');
            } else {
            $msg = 'Something went wrong.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Failure!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'firm-codes');
        }
            
      
    }
    function delete(){
        
    }

}
