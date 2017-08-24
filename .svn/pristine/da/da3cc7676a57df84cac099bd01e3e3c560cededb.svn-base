<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App_codes extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('codes_model');
        $this->load->model('code_category_model');
        
        $this->data['page'] = 'Dashboard';
        
        if($this->data['role_code']!='SITEADM'){
            redirect($base_url . 'login/logout');
        }
    }

    function index() {

//        $admin_all_session = $this->session->userdata('admin_session');
        //$admin_all_session['role_code'];
        $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $cond = "order by code desc";
        $codes = $this->codes_model->fetch($cond);
        $this->data['codes'] = $codes;
       // t($this->data['codes']); exit;
//        $codes = $this->codes_model->fetch();
//        $this->data['codes'] = $codes;
//         t($this->data['codes']); exit;
        
        $this->data['code_category']=  $this->code_category_model->fetch();
//        t($this->data['code_category']); exit;
           $codes_1 = $this->codes_model->fetch($cond);
           $this->data['codes_1'] = $codes_1;
           
        

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/app_codes/listing', $this->data);
    }
    function details($code = '')
    {
        $code = base64_decode($code);
        $submit = $this->input->post('app_codes_edit_submit_btn');
        
        $cond = " AND code = '".$code."'";
//        echo $cond; exit;
        $row = $this->codes_model->fetch( $cond );
//        echo $this->db->last_query(); die();
        
        if (isset($submit)) {
//            echo "ok"; die();
//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];
            
            $short_description = $this->input->post('short_description');
            $long_description = $this->input->post('long_description');
            $firm_customization = $this->input->post('firm_customization');
            $full_visibility = $this->input->post('full_visibility');
            $paid_subscription = $this->input->post('paid_subscription');
            $remarks = $this->input->post('remarks');
//            echo $remarks; exit;
            
           $data_edit = array(
                'short_description' => $short_description,
                'long_description' => $long_description,
                'firm_customization' => $firm_customization,
                'full_visibility' => $full_visibility,
                'paid_subscription' => $paid_subscription,
                'remarks_notes' => $remarks,
                'updated_date' => time(),
                'updated_by' => $admin_id,
               );
//         echo "<pre>"; print_r($data); exit;
           $edit = $this->codes_model->edit($data_edit, $code);
//           echo $this->db->last_query(); die();
           
        if ($edit) {
//                    echo"ok"; die();
                    $msg = 'App Codes updated successfully';
                    $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                    redirect($base_url . 'app-codes');
                } else {
                    $msg = 'error in updating App Codes ';
                    $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                    redirect($base_url . 'app-codes');
                }

                redirect($base_url . 'app-codes');
            
        } else {
//
//            if (count($row) > 0) {
//                //echo "ok"; die();     
//                $this->data['codes2'] = $row[0];
////                t($this->data['codes2']); exit;
//            }
////
//            $sql1 = "SELECT * FROM `plma_code_category`";
//            $query1 = $this->db->query($sql1);
//            //echo $this->db->last_query();    
//            $this->data['code_category1'] = $query1->result(); 
////            t($query1->result()); die();
            
            $this->get_include();
            $this->load->view($this->view_dir . 'app_master/app_codes/listing', $this->data); 
    
        }
    }

    function add() {
//        $admin_all_session = $this->session->userdata('admin_session');
       $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        if ($this->input->post('app_codes_submit')) {

            $category = $this->input->post('category');
            $code = $this->input->post('code');
            $short_description = $this->input->post('short_description');
            $long_description = $this->input->post('long_description');
            $firm_customization = $this->input->post('firm_customization');
            $full_visibility = $this->input->post('full_visibility');
            $paid_subscription = $this->input->post('paid_subscription');
            $remarks = $this->input->post('remarks');

            $this->db->trans_start();

            $data = array(
                'category_type' => $category,
                'code' => $code,
                'short_description' => $short_description,
                'long_description' => $long_description,
                'firm_customization' => $firm_customization,
                'full_visibility' => $full_visibility,
                'paid_subscription' => $paid_subscription,
                'remarks_notes' => $remarks,
                'created_by' => 1,
                'updated_by' => 1,
            );
            $add = $this->codes_model->add($data);

            if ($firm_customization == 1) {
                // add to existing firm where firm customization
                $no_of_firm_sql = " SELECT distinct(`firm_seq_no`) FROM `plma_firm_codes` ";
                $no_of_firm_qry = $this->db->query($no_of_firm_sql);
                $no_of_firm_res = $no_of_firm_qry->result_array(); 
                $a = 0;
                foreach ($no_of_firm_res as $key => $value) {
                    ///echo $value['firm_seq_no'];
                    $a = $value['firm_seq_no'];
                    $sql = " INSERT INTO plma_firm_codes ( code_seq_no, firm_seq_no, short_description, long_description, created_by,created_date ) VALUES ( $add, $a , '".$short_description."', '".$long_description."',  $admin_id , " . time() . " ) ";

                    $insertid3 = $this->db->query($sql);
                } 
            }
            

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }

            if ($add) {
                $msg = 'App codes added successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'app_codes');
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'app_codes');
            }
        } else {
            $msg = 'Something went wrong.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'app_codes');
        }
    }

    function code_check(){
        $code = $this->input->post('code');
        if ($code != '') {
            $cond = " and code = '" . $code . "'";
            $row = $this->codes_model->fetch($cond);
            //echo  $this->db->last_query(); exit;
            $row_1 = count($row);
            if ($row_1 > 0) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

}
