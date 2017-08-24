<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Firm_sections extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('section_model');
        $this->load->model('codes_model');
        $this->load->model('firm_model');
        $this->load->model('code_category_model');

    }

    function index() {

        $admin_id = $this->data['admin_id']; //exit;
        $firm_seq_no = $this->data['firm_seq_no']; //exit;
        $role_code = $this->data['role_code'];

//        $select = "firm_seq_no,firm_name";
//        $this->data['firms'] = $this->firm_model->fetch('', $select);
//
////        $select = "code_seq_no,category_type,code,short_description";
////        $cond = "AND category_type='Section Type'";
////        $this->data['codes'] = $this->codes_model->fetch($cond, $select);
//
//        $sql = " select pfc.firm_seq_no from plma_firm pfirm, plma_firm_section pfc where pfirm.firm_admin_seq_no=$admin_id and pfc.firm_seq_no = pfirm.firm_seq_no group by pfc.firm_seq_no";
//        $res = $this->db->query($sql);
//        $row = $res->result_array();
//
//        $firm_code = $row[0]['firm_seq_no'];
//
//        $sql1 = "select pfc.firm_seq_no from plma_attorney pattr, plma_firm_section pfc where pattr.user_seq_no=$admin_id and pattr.firm_seq_no = pfc.firm_seq_no group by pfc.firm_seq_no"; //exit;
//        $res1 = $this->db->query($sql1);
//        $row1 = $res1->result_array();
////        t($row1[0]['firm_seq_no']); exit;
//        $firm_seq_no = $row1[0]['firm_seq_no'];
//        if ($role_code == 'SITEADM') {
//            $sql = "Select sg.*,f.firm_name, f.firm_seq_no from plma_firm_section as sg inner join plma_firm as f "
//                    . " on sg.firm_seq_no=f.firm_seq_no ";
//        } elseif ($role_code == 'FIRMADM') {
//            $sql = "Select sg.*,f.firm_name, f.firm_seq_no from plma_firm_section as sg inner join plma_firm as f "
//                    . " on sg.firm_seq_no = f.firm_seq_no where f.firm_seq_no='$firm_code'";
//        } elseif ($role_code == 'ATTR') {
//            $sql = "Select sg.*, attr.firm_seq_no from plma_firm_section as sg inner join plma_attorney as attr "
//                    . " on sg.firm_seq_no = attr.firm_seq_no where attr.firm_seq_no='$firm_seq_no' and attr.user_seq_no=$admin_id";
//        }
//        $query = $this->db->query($sql);
////      echo $this->db->last_query(); exit;
//
//        $strategy_groups = $query->result_array();
//        $this->data['strategy_groups_1'] = $strategy_groups;
////        t($strategy_groups);
//        
//        foreach ($strategy_groups as $key => $value) {
//            $sg_sec_typ = $value['section_type'];
//            $cond1 = "AND code_seq_no = '" . $sg_sec_typ . "' AND category_type = 'Section Type'";
//            $sg_sec_type = $this->codes_model->fetch($cond1);
//
//            $strategy_groups[$key]['section_type'] = $sg_sec_type[0]['short_description'];
//        }

        
        $cond="AND firm_seq_no='$firm_seq_no'";
        $strategy_groups = $this->section_model->fetch($cond);
        
        $this->data['strategy_groups'] = $strategy_groups;
//        echo $this->db->last_query();
//        t($strategy_groups); exit;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/firm_sections/listing', $this->data);
    }

    function fetchFirmCodes($param) {

        $firm_id = $this->input->post('firms');

        if ($firm_id == 'all') {
            $sql = "SELECT firm_section_seq_no, section_type, section_id, section_name, plma_firm_section.long_description, plma_firm_section.remark_notes, firm_name, plma_firm.firm_seq_no FROM `plma_firm_section` JOIN `plma_firm` ON plma_firm_section.firm_seq_no = plma_firm.firm_seq_no ";
        } else {
            $sql = "SELECT firm_section_seq_no, section_type, section_id, section_name, plma_firm_section.long_description, plma_firm_section.remark_notes, firm_name, plma_firm.firm_seq_no FROM `plma_firm_section` JOIN `plma_firm` ON plma_firm_section.firm_seq_no = plma_firm.firm_seq_no where plma_firm_section.firm_seq_no='$firm_id'";
        }

        $query = $this->db->query($sql);
        $strategy_groups = $query->result_array();

//        t($strategy_groups);exit;
        $this->data['strategy_groups'] = $strategy_groups;

        $select = "firm_seq_no,firm_name";
        $this->data['firms'] = $this->firm_model->fetch('', $select);
//                echo $this->db->last_query(); exit;

        $this->data['code_category'] = $this->code_category_model->fetch();

        $this->data['firm_id'] = $firm_id;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/firm_sections/listing', $this->data);
    }

    function add() {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no']; //exit;

        $code = 'SECTIONS'; //section type 

       $section_id = $this->input->post('section_id');
        $code_description = $this->input->post('code_description');
        $long_description = $this->input->post('long_description');
        $remarks = $this->input->post('remarks');

        $data = array(
            'firm_seq_no' => $firm_seq_no,
            'section_type' => $code,
            'section_id' => $section_id,
            'section_name' => $code_description,
            'long_description' => $long_description,
            'remark_notes' => $remarks,
            'created_by' => 1,
            'updated_by' => 1,
            'created_date' => time(),
            'updated_date' => time()
        );

        $insertid = $this->section_model->add($data);

        if ($insertid) {
            $msg = 'Section added successfully.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'firm-sections');
        } else {
            $msg = 'Something went wrong.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliur!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'firm-sections');
        }
    }

    function details($code = '') {

        $code = base64_decode($code);
        $submit = $this->input->post('firm_sg_section_submit_btn');
        
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no']; //exit;

        $cond = " and firm_section_seq_no = '" . $code . "'";
        $row = $this->section_model->fetch($cond);
        
        if (isset($submit)) {
            
//        $firm_seq_no = $this->input->post('firm_seq_no');
//        echo $firm_seq_no; exit;
//        $code_seq_no = $this->input->post('code_seq_no');
//        $section_id = $this->input->post('section_id');

            $code_description = $this->input->post('code_description');
            $long_description = $this->input->post('long_description');
            $remarks = $this->input->post('remarks');

            $data = array(
                'section_name' => $code_description,
                'long_description' => $long_description,
                'remark_notes' => $remarks,
                'updated_by' => 1,
                'updated_date' => time()
            );

            $insertid = $this->section_model->edit($data, $code);

            if ($insertid) {
                $msg = 'Section updated successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'firm-sections');
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliure!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'firm-sections');
            }
        } else {
//       if(count(row) > 0){
//           
           $this->data['strategy_group'] = $row[0];
//           
//            $select = "firm_seq_no,firm_name";
//            $this->data['firms'] = $this->firm_model->fetch('', $select);
//
//            $select = "code_seq_no,category_type,code,short_description";
//            $cond = "AND category_type='SG-Section Type'";
//            $this->data['codes'] = $this->codes_model->fetch($cond, $select);
//       }
            redirect($base_url . 'firm-sections');

//        $this->get_include();
//        $this->load->view($this->view_dir . 'app_master/firm_sg_sections/firm_sg_sections_view', $this->data);
        }
    }

    function delete($code = '') {

//        $code = base64_decode($code);
//        $cond = $code;
//        $row = $this->section_model->delete( $cond );
////        echo $this->db->last_query(); exit;
//        
//        $this->get_include();
//        $this->load->view($this->view_dir . 'app_master/firm_sg_sections/listing', $this->data); 
    }

}
