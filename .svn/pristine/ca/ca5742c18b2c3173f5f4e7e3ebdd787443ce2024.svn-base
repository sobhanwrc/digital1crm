<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Firm_sg extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('strategy_group_model');
        $this->load->model('attorney_sg_model');
        $this->load->model('codes_model');
        $this->load->model('firm_model');
        $this->load->model('attorney_model');
        $this->load->model('code_category_model');

        $this->data['page'] = 'Dashboard';
    }

    function index() {

        $admin_id = $this->data['admin_id']; //exit;
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no']; //exit;
//        $select = "firm_seq_no,firm_name";
//        $this->data['firms'] = $this->firm_model->fetch('', $select);
//
////        $select = "code_seq_no,category_type,code,short_description";
////        $cond = "AND category_type='SG Type'";
////        $this->data['codes'] = $this->codes_model->fetch($cond, $select);
//
//        $sql = " select pfc.firm_seq_no from plma_firm pfirm, plma_firm_sg pfc where pfirm.firm_admin_seq_no=$admin_id and pfc.firm_seq_no = pfirm.firm_seq_no group by pfc.firm_seq_no";
//        $res = $this->db->query($sql);
//        $row = $res->result_array();
//        //t($row[0]['firm_seq_no']); exit;
//        $firm_code = $row[0]['firm_seq_no'];
//
//        $sql1 = "select pfc.firm_seq_no from plma_attorney pattr, plma_firm_sg pfc where pattr.user_seq_no=$admin_id and pattr.firm_seq_no = pfc.firm_seq_no group by pfc.firm_seq_no"; //exit;
//        $res1 = $this->db->query($sql1);
//        $row1 = $res1->result_array();
////        t($row1[0]['firm_seq_no']); exit;
//        $firm_seq_no = $row1[0]['firm_seq_no'];
//        if ($role_code == 'SITEADM') {
//            $sql = "Select sg.*,f.firm_name, f.firm_seq_no from plma_firm_sg as sg inner join plma_firm as f "
//                    . " on sg.firm_seq_no=f.firm_seq_no ";
//        } elseif ($role_code == 'FIRMADM') {
//            $sql = "Select sg.*,f.firm_name, f.firm_seq_no from plma_firm_sg as sg inner join plma_firm as f "
//                    . " on sg.firm_seq_no = f.firm_seq_no where f.firm_seq_no='$firm_code'";
//        } elseif ($role_code == 'ATTR') {
//            $sql = "Select sg.*, attr.firm_seq_no from plma_firm_sg as sg inner join plma_attorney as attr "
//                    . " on sg.firm_seq_no = attr.firm_seq_no where attr.firm_seq_no='$firm_seq_no' and attr.user_seq_no=$admin_id";
//        }
//        $query = $this->db->query($sql);
////        echo $this->db->last_query(); exit;
//
//        $strategy_groups = $query->result_array();
//        $this->data['strategy_groups_1'] = $strategy_groups;
////        t($strategy_groups);
//        foreach ($strategy_groups as $key => $value) {
//            $sg_sec_typ = $value['sg_type'];
//            $cond1 = "AND code = '" . $sg_sec_typ . "' AND category_type = 'SG Type'";
//            $sg_sec_type = $this->codes_model->fetch($cond1);
//
//            $strategy_groups[$key]['sg_type'] = $sg_sec_type[0]['short_description'];
//        }


//////        t($strategy_groups); exit;
        $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pa.attorney_seq_no, pa.firm_seq_no, pf.firm_name, pf.firm_seq_no, pf.firm_admin_seq_no "
                . "FROM plma_attorney pa "
                . "INNER JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no "
                . "WHERE pf.firm_admin_seq_no = '" . $admin_id . "'";
        $res = $this->db->query($sql);
//        echo $sql;
        $row = $res->result_array();
        $this->data['attorney_fetch'] = $row;
//        t($this->data['attorney_fetch']); exit;
        
        $cond = "AND firm_seq_no='$firm_seq_no'";
        $strategy_groups = $this->strategy_group_model->fetch($cond);
//         t($strategy_groups);
//        exit;       
        
        foreach ($strategy_groups as $key => $value) {
            
            $firm_sg_seq_no=$value['firm_sg_seq_no'];
            $select="attorney_seq_no";
            $cond  = "AND firm_sgsec_seq_no=$firm_sg_seq_no AND status=1";
            $strategy_groups_attorney = $this->attorney_sg_model->fetch($cond,$select);
            $strategy_groups[$key]['attorney']=$strategy_groups_attorney;
            
            $all_attorneys=array();
        foreach($strategy_groups_attorney as $key1 => $value1){
                $attorneys = $value1['attorney_seq_no'];
                $select = "attorney_seq_no, attorney_first_name, attorney_last_name";
                $cond  = "AND attorney_seq_no=$attorneys";
                $all_attr = $this->attorney_model->fetch($cond,$select);
                $all_attorneys[]=$all_attr[0]['attorney_first_name'].' '.$all_attr[0]['attorney_last_name'];
//              t($all_attr); exit; 
            }
            
            $all_attorneys=  implode(',', $all_attorneys);
            $strategy_groups[$key]['members'] =$all_attorneys;
        }        
//        echo $this->db->last_query();
//        
        $this->data['strategy_groups'] = $strategy_groups;

//        t($strategy_groups); exit;
        
        
        $sql_1 = "SELECT attr.attorney_first_name, attr.attorney_last_name, attr.attorney_seq_no, asg.attorney_seq_no, asg.firm_sgsec_seq_no, asg.status, fsg.firm_sg_seq_no, fsg.firm_seq_no, frm.firm_seq_no, frm.firm_admin_seq_no "
                . "FROM plma_attorney_sg asg "
                . "INNER JOIN plma_attorney attr on asg.attorney_seq_no = attr.attorney_seq_no "
                . "INNER JOIN plma_firm_sg fsg on asg.firm_sgsec_seq_no = fsg.firm_sg_seq_no "
                . "INNER JOIN plma_firm frm on fsg.firm_seq_no = frm.firm_seq_no "
                . "WHERE frm.firm_admin_seq_no = '" . $admin_id . "' AND asg.status = 1 AND asg.firm_sgsec_seq_no = '" . $firm_sg_seq_no . "'";
//    echo $sql_1; exit;
        $res_1 = $this->db->query($sql_1);
        $row_grp = $res_1->result_array();

        
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/firm_sg/listing', $this->data);
    }

    function fetchFirmCodes($param) {

        $firm_id = $this->input->post('firms');

        if ($firm_id == 'all') {
            $sql = "SELECT firm_sg_seq_no, sg_type, sg_id, sg_name, plma_firm_sg.long_description, plma_firm_sg.remark_notes, firm_name, plma_firm.firm_seq_no FROM `plma_firm_sg` JOIN `plma_firm` ON plma_firm_sg.firm_seq_no = plma_firm.firm_seq_no ";
        } else {
            $sql = "SELECT firm_sg_seq_no, sg_type, sg_id, sg_name, plma_firm_sg.long_description, plma_firm_sg.remark_notes, firm_name, plma_firm.firm_seq_no FROM `plma_firm_sg` JOIN `plma_firm` ON plma_firm_sg.firm_seq_no = plma_firm.firm_seq_no where plma_firm_sg.firm_seq_no='$firm_id'";
        }

        $query = $this->db->query($sql);
//        echo $this->db->last_query(); exit;
        $strategy_groups = $query->result_array();

//        t($strategy_groups);exit;
        $this->data['strategy_groups'] = $strategy_groups;

        $select = "firm_seq_no,firm_name";
        $this->data['firms'] = $this->firm_model->fetch('', $select);
//                echo $this->db->last_query(); exit;

        $this->data['code_category'] = $this->code_category_model->fetch();

        $this->data['firm_id'] = $firm_id;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/firm_sg/listing', $this->data);
    }

    function add() {

        //$admin_all_session = $this->session->userdata('admin_session');

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no']; //exit;

//        if ($role_code == 'SITEADM') {
//            $firm_seq_no = $this->input->post('firm_seq_no'); //if site admin adding sg section 
//        } else {
//            $firm_seq_no = $admin_id; // if firm admin adding sg section
//        }

        $code = 'STRGROUPS';
        $attorney = $this->input->post('attorney');
//        t($attorney);
//        exit;
        
        $sg_id = $this->input->post('sg_id');
        $sg_name = $this->input->post('sg_name');
        $long_description = $this->input->post('long_description');
        $remarks = $this->input->post('remarks');

        $data = array(
            'firm_seq_no' => $firm_seq_no,
            'sg_type' => $code,
            'sg_id' => $sg_id,
            'sg_name' => $sg_name,
            'long_description' => $long_description,
            'remark_notes' => $remarks,
            'created_by' => $admin_id,
            'updated_by' => $admin_id,
            'created_date' => time(),
            'updated_date' => time()
        );

        $insertid = $this->strategy_group_model->add($data);
        $firm_sg_seq_no = $this->db->insert_id();
        //add attorney details to attorney_sg group
        foreach($attorney as $key => $value){
//            $cond = "AND attorney_seq_no = '" . $value ."'";
//            $all_attr = $this->attorney_model->fetch();
            $data_arr = array(
                'attorney_seq_no' => $value,
                'firm_sgsec_seq_no' => $firm_sg_seq_no,
                'remarks_notes' => 'STRATEGY GROUP',
                'created_by' => $admin_id,
                'created_date'=> time(),
                'updated_by' => $admin_id,
                'updated_date'=> time(),
                'status' => 1
            );
//            t($data_arr); exit;
          $this->attorney_sg_model->add($data_arr);
//          echo $this->db->last_query();
//           exit;
        }
        
         $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }
            

        if ($insertid) {
            $msg = 'Strategy gorup added successfully.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'firm-sg');
        } else {
            $msg = 'Something went wrong.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliure!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'firm-sg');
        }
    }

    function details($code = '') {
        
        $admin_id = $this->data['admin_id'];

        $code = base64_decode($code);
        $submit = $this->input->post('firm_sg_submit_btn');

        $sql = "SELECT fs.*, asg.asg_relation_seq_no, asg.attorney_seq_no, asg.firm_sgsec_seq_no, asg.status "
                . "FROM plma_firm_sg as fs "
                . "LEFT JOIN plma_attorney_sg as asg ON fs.firm_sg_seq_no = asg.firm_sgsec_seq_no "
                . "WHERE fs.firm_sg_seq_no = '" . $code . "'";
        $res = $this->db->query($sql);
        $row = $res->result_array(); 
//        $firm_sgsec_seq_no = $row[0]['firm_sgsec_seq_no'];

//        echo $this->db->last_query();
//        t($row);
//        exit;

        if (isset($submit)) {

//        $firm_seq_no = $this->input->post('firm_seq_no');
//        $code_seq_no = $this->input->post('code_seq_no');
            $attorney = $this->input->post('attorney');
//            t($attorney); exit;
            
            $sg_id = $this->input->post('sg_id');
            $sg_name = $this->input->post('sg_name');
            $long_description = $this->input->post('long_description');
            $remarks = $this->input->post('remarks');
            

            $data = array(
                'sg_id' => $sg_id,
                'sg_name' => $sg_name,
                'long_description' => $long_description,
                'remark_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date'=> time(),
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
//            t($data);
//            exit;

            $insertid = $this->strategy_group_model->edit($data, $code);
            
           $data_status = array('status' => 5); 
           $insertstatus = $this->attorney_sg_model->edit_cond($data_status, "firm_sgsec_seq_no =  '" .$code . "'"); 
           ////////// Edit attorney details to attorney_sg group ///////////
            
            foreach($attorney as $key => $value){
//                t($attorney); exit;
            $data_arr = array(
                'attorney_seq_no' => $value,
                'firm_sgsec_seq_no' => $code,
                'remarks_notes' => 'STRATEGY GROUP',
                'created_by' => $admin_id,
                'created_date'=> time(),
                'updated_by' => $admin_id,
                'updated_date'=> time(),
                'status' => 1
                
            );
//            t($data);
          $this->attorney_sg_model->add($data_arr); 
//           echo $this->db->last_query();
//           exit;
        }

            if ($insertid) {
                $msg = 'Strategy group updated successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'firm-sg');
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliure!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'firm-sg');
            }
        } 
        
        else {
//       if(count(row) > 0){
//           
            $this->data['strategy_groups'] = $row[0];
//            t($this->data['strategy_groups']); exit;
//           
//            $select = "firm_seq_no,firm_name";
//            $this->data['firms'] = $this->firm_model->fetch('', $select);
//
//            $select = "code_seq_no,category_type,code,short_description";
//            $cond = "AND category_type='SG-Section Type'";
//            $this->data['codes'] = $this->codes_model->fetch($cond, $select);
//       }
            redirect($base_url . 'firm-sg');

//        $this->get_include();
//        $this->load->view($this->view_dir . 'app_master/firm_sg_sections/firm_sg_sections_view', $this->data);
        }
    }

    function delete($code = '') {

//        $code = base64_decode($code);
//        $cond = $code;
//        $row = $this->strategy_group_model->delete( $cond );
////        echo $this->db->last_query(); exit;
//        
//        $this->get_include();
//        $this->load->view($this->view_dir . 'app_master/firm_sg_sections/listing', $this->data); 
    }

}
