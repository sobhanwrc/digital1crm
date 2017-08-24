<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Practice_area_survey extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('codes_model');
        $this->load->model('firm_model');
        $this->load->model('attorney_model');
        $this->load->model('practice_area_survey_model');
        $this->data['page'] = 'Dashboard';
    }

    function index() {
        
        $admin_id = $this->data['admin_id']; //exit;
        $role_code = $this->data['role_code'];

//        $select = "code_seq_no,category_type,code,short_description";
//        $cond = "AND category_type='Practice Areas'";
//        $this->data['practice_area'] = $this->codes_model->fetch($cond, $select);

//        $cond = "AND category_type='Sub Practice Areas'";
//        $this->data['sub_practice_area'] = $this->codes_model->fetch($cond, $select);

//        $cond = "AND category_type='PA Grade'";
//        $this->data['pa_grade'] = $this->codes_model->fetch($cond, $select);

//        $cond = "AND category_type='PA Surveyor'";
//        $this->data['pa_surveyor'] = $this->codes_model->fetch($cond, $select);

        $select = "firm_seq_no,firm_name";
        $this->data['firms'] = $this->firm_model->fetch('', $select);

//        $select = "attorney_seq_no,attorney_first_name,attorney_last_name";
//        $cond = "AND attorney_type='PA Surveyor'";
//        $this->data['attorney'] = $this->attorney_model->fetch($cond, $select);

        $sql = "Select pas.*,f.firm_name as firm,f.firm_seq_no from plma_pa_survey as pas inner join plma_firm as f "
                . " on pas.pa_survey_seq_no = f.firm_seq_no ";
        $query = $this->db->query($sql);
        $strategy_groups = $query->result_array();
        
        if($role_code == 'SITEADM'){
         $sql = "SELECT pas.*, pfirm.* FROM plma_pa_survey pas, plma_firm pfirm WHERE pas.firm_seq_no = pfirm.firm_seq_no";
        }elseif($role_code == 'FIRMADM'){
          $sql = "SELECT pas.*, pfirm.firm_seq_no, pfirm.firm_name, pfirm.firm_admin_seq_no FROM plma_pa_survey pas, plma_firm pfirm WHERE pas.firm_seq_no = pfirm.firm_seq_no AND pfirm.firm_admin_seq_no = '" . $admin_id . "'";
        }elseif($role_code == 'ATTR'){
            $sql = "SELECT pas.*, pattr.attorney_seq_no, pattr.firm_seq_no, pattr.user_seq_no FROM plma_pa_survey pas, plma_attorney pattr WHERE pas.firm_seq_no = pattr.firm_seq_no AND pattr.user_seq_no = '" . $admin_id . "'";
        }
        $query1 = $this->db->query($sql);

        $practice_area_survey = $query1->result_array();
        
//        echo $this->db->last_query();
//        t($practice_area_survey);exit;
        
        $this->data['practice_area_survey_1'] = $practice_area_survey;
       
//        foreach($practice_area_survey as $key => $value)
//        {
//            $pa_c = $value['pa_code'];
//            $cond1 = "AND code = '" . $pa_c . "' AND category_type = 'Practice Areas'";
//            $pa_code = $this->codes_model->fetch($cond1);
//            
//            $sub_pa_c = $value['sub_pa_code'];
//            $cond2 = "AND code = '" . $sub_pa_c . "' AND category_type = 'Sub Practice Areas'";
//            $sub_pa_code = $this->codes_model->fetch($cond2);
//            
//            $pa_grade_c = $value['pa_grade_code'];
//            $cond3 = "AND code = '" . $pa_grade_c . "' AND category_type = 'PA Grade'";
//            $pa_grade_code = $this->codes_model->fetch($cond3);
//            
//            $survey_done = $value['survey_done_by'];
//            $cond4 = "AND code = '" . $survey_done . "' AND category_type = 'PA Surveyor'";
//            $survey_done_by = $this->codes_model->fetch($cond4);
//            
//            $practice_area_survey[$key]['pa_code'] = $pa_code[0]['short_description'];
//            $practice_area_survey[$key]['sub_pa_code'] = $sub_pa_code[0]['short_description'];
//            $practice_area_survey[$key]['pa_grade_code'] = $pa_grade_code[0]['short_description'];
//            $practice_area_survey[$key]['survey_done_by'] = $survey_done_by[0]['short_description'];
//        }        
        $this->data['practice_area_survey'] = $practice_area_survey;
//       
//        echo $this->db->last_query();
//        t($practice_area_survey);
//        exit;
        
        $practice_area_survey1 = $this->practice_area_survey_model->fetch();
        $this->data['practice_area_survey_1'] = $practice_area_survey1;
        
        foreach($practice_area_survey1 as $key => $value)
        {
            $pa_c = $value['pa_code'];
            $cond1 = "AND code = '" . $pa_c . "' AND category_type = 'Practice Areas'";
            $pa_code = $this->codes_model->fetch($cond1);
            
            $sub_pa_c = $value['sub_pa_code'];
            $cond2 = "AND code = '" . $sub_pa_c . "' AND category_type = 'Sub Practice Areas'";
            $sub_pa_code = $this->codes_model->fetch($cond2);
            
            $pa_grade_c = $value['pa_grade_code'];
            $cond3 = "AND code = '" . $pa_grade_c . "' AND category_type = 'PA Grade'";
            $pa_grade_code = $this->codes_model->fetch($cond3);
            
            $survey_done = $value['survey_done_by'];
            $cond4 = "AND code = '" . $survey_done . "' AND category_type = 'PA Surveyor'";
            $survey_done_by = $this->codes_model->fetch($cond4);
            
            $practice_area_survey1[$key]['pa_code'] = $pa_code[0]['short_description'];
            $practice_area_survey1[$key]['sub_pa_code'] = $sub_pa_code[0]['short_description'];
            $practice_area_survey1[$key]['pa_grade_code'] = $pa_grade_code[0]['short_description'];
            $practice_area_survey1[$key]['survey_done_by'] = $survey_done_by[0]['short_description'];
        }        
        
        
        $this->data['practice_area_survey1'] = $practice_area_survey1;
        //t($practice_area_survey1,1);

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/practice_area_survey/listing', $this->data);
    }
    
    function fetchFirm($param) {

     $firm_id = $this->input->post('firms');
//     echo $firm_id; exit;
  

        if ($firm_id == 'all') {
//            echo "ok"; die();
            $sql = "Select pas.*,c.short_description as pa_code,d.short_description as sub_pa_code,e.short_description as pa_grade_code,f.short_description as survey_done_by,g.firm_name as firm_name from plma_pa_survey as pas inner join plma_codes as c "
                ." on pas.pa_code=c.code inner join plma_codes as d on pas.sub_pa_code=d.code inner join plma_codes as e on pas.pa_grade_code=e.code inner join plma_codes as f on pas.survey_done_by=f.code inner join plma_firm as g on pas.firm_seq_no=g.firm_seq_no";
        } else {
//            echo "ok"; die();
          $sql = "Select pas.*,c.short_description as pa_code,d.short_description as sub_pa_code,e.short_description as pa_grade_code,f.short_description as survey_done_by,g.firm_name as firm_name from plma_pa_survey as pas inner join plma_codes as c "
                ." on pas.pa_code=c.code inner join plma_codes as d on pas.sub_pa_code=d.code inner join plma_codes as e on pas.pa_grade_code=e.code inner join plma_codes as f on pas.survey_done_by=f.code inner join plma_firm as g on pas.firm_seq_no=g.firm_seq_no where g.firm_seq_no=$firm_id";
        }
//        echo $sql; exit;

        $query = $this->db->query($sql);
//        echo $this->db->last_query(); exit;
        $practice_area_survey = $query->result_array();
//        t($practice_area_survey); exit;
        $this->data['practice_area_survey'] = $practice_area_survey;

        $select = "firm_seq_no,firm_name";
        $this->data['firms'] = $this->firm_model->fetch('', $select);
//        echo $this->db->last_query(); exit;
//        
//
        $this->data['firm_id'] = $firm_id;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/practice_area_survey/listing', $this->data);
    }


    function add() {

        $admin_id = $this->data['admin_id'];
//        echo $admin_id; exit;
        
        $sql = "select pfirm.firm_seq_no from plma_firm pfirm where pfirm.firm_admin_seq_no=$admin_id";
//        echo $sql; exit;
        $res = $this->db->query($sql);
        $row = $res->result_array();
//        t($row[0]['firm_seq_no']); exit;
        $firm_code = $row[0]['firm_seq_no'];

        $practice_area = $this->input->post('practice_area');
        $sub_practice_area = $this->input->post('sub_practice_area');
        $pa_grade = $this->input->post('pa_grade');
        $pa_survey = $this->input->post('pa_survey');
//        $firm_name = $this->input->post('firm_name');

        $remarks = $this->input->post('remarks');

        $data = array(
            'firm_seq_no' => $firm_code,
            'pa_code' => $practice_area,
            'sub_pa_code' => $sub_practice_area,
            'pa_grade_code' => $pa_grade,
            'survey_done_by' => $pa_survey,
            'remarks_notes' => $remarks,
            'survey_ref_seq_no' => $admin_id,
            'created_by' => $admin_id,
            'updated_by' => $admin_id,
            'created_date' => time(),
            'updated_date' => time()
        );
        $add = $this->practice_area_survey_model->add($data);

        if ($add) {
            $msg = 'Practice area survey added successfully.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'practice-area-survey');
        } else {
            $msg = 'Something went wrong.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliur!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'practice-area-survey');
        }
    }
    function details($code = '') {
        
        $code = base64_decode($code);
        $submit = $this->input->post('practice_tab');

        $cond = " and pa_survey_seq_no = '".$code."'";
//        echo $cond; exit;
        $row = $this->practice_area_survey_model->fetch( $cond );
//        t($row, 1);
        if(isset($submit)){
        $admin_id = $this->data['admin_id'];
        
        $sql = "select pfirm.firm_seq_no from plma_firm pfirm where pfirm.firm_admin_seq_no=$admin_id";
//        echo $sql; exit;
        $res = $this->db->query($sql);
        $row = $res->result_array();
//        t($row[0]['firm_seq_no']); exit;
        $firm_code = $row[0]['firm_seq_no'];

//        $firm_name = $this->input->post('firm_name');
//        $practice_area = $this->input->post('practice_area');
//        $sub_practice_area = $this->input->post('sub_practice_area');
        $pa_grade = $this->input->post('pa_grade');
//        $pa_survey = $this->input->post('pa_survey');

        $remarks = $this->input->post('remarks');

        $data = array(
            'pa_grade_code' => $pa_grade,
            'remarks_notes' => $remarks,
            'updated_by' => $admin_id,
            'updated_date' => time()
        );
        
        //t($data,1);
        $add = $this->practice_area_survey_model->edit($data, $code);

        if ($add) {
            $msg = 'Practice area survey modified successfully.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'practice-area-survey');
        } else {
            $msg = 'Something went wrong.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliur!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'practice-area-survey');
        }
      }else {
          
          if(count($row) > 0){
              
//              $this->data['practice_area_survey_1'] = $row[0];
//            foreach($row as $key => $value)
//            {
//            $pa_c = $value['pa_code'];
//            $cond1 = "AND code = '" . $pa_c . "' AND category_type = 'Practice Areas'";
//            $pa_code = $this->codes_model->fetch($cond1);
//            
//            $sub_pa_c = $value['sub_pa_code'];
//            $cond2 = "AND code = '" . $sub_pa_c . "' AND category_type = 'Sub Practice Areas'";
//            $sub_pa_code = $this->codes_model->fetch($cond2);
//
//            $survey_done = $value['survey_done_by'];
//            $cond4 = "AND code = '" . $survey_done . "' AND category_type = 'PA Surveyor'";
//            $survey_done_by = $this->codes_model->fetch($cond4);
//            
//            $row[$key]['pa_code'] = $pa_code[0]['short_description'];
//            $row[$key]['sub_pa_code'] = $sub_pa_code[0]['short_description'];
//            $row[$key]['survey_done_by'] = $survey_done_by[0]['short_description'];
//            }  
              
              $this->data['practice_area_survey'] = $row[0];
//              t($this->data['practice_area_survey'], 1);
              
              
                $select = "code_seq_no,category_type,code,short_description";
//                $cond = "AND category_type='Practice Areas'";
//                $this->data['practice_area'] = $this->codes_model->fetch($cond, $select);
//
//                $cond = "AND category_type='Sub Practice Areas'";
//                $this->data['sub_practice_area'] = $this->codes_model->fetch($cond, $select);

                $cond = "AND category_type='PA Grade'";
                $this->data['pa_grade'] = $this->codes_model->fetch($cond, $select);
//
//                $cond = "AND category_type='PA Surveyor'";
//                $this->data['pa_surveyor'] = $this->codes_model->fetch($cond, $select);

                $select = "firm_seq_no,firm_name";
                $this->data['firms'] = $this->firm_model->fetch('', $select);

                $this->data['firm_id'] = $firm_id;
          }
          
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/practice_area_survey/practice_area_survey_view', $this->data);
          
      }
        
    }
    

}
