<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attorney_goals extends MY_Controller {

    function __construct() {

        parent::__construct();
        //  $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('att_goal_model');
        $this->load->model('firm_model');
        $this->load->model('user_model');
        $this->load->model('codes_model');
        $this->load->model('attorney_model');
        $this->load->model('attorney_goals_details_model');
        $this->load->model('client_model');
    }

    function index() {
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];

        // Populate Form
        if($role_code == 'FIRMADM'){
            $sql = "SELECT pag.*, pf.firm_name, pf.firm_seq_no, pa.attorney_first_name, pa.attorney_last_name, pa.firm_seq_no, pa.attorney_seq_no 
                FROM plma_attorney pa
                LEFT JOIN plma_firm pf ON pf.firm_seq_no = pa.firm_seq_no
                LEFT JOIN plma_attorney_goal pag ON pag.attorney_seq_no = pa.attorney_seq_no     
                WHERE 1 and pag.firm_seq_no = '" . $firm_seq_no . "'";
            }
            elseif ($role_code == 'ATTR') {
                $sql = "SELECT pag.*, pa.attorney_first_name, pa.attorney_last_name, pa.user_seq_no, pf.firm_name
                FROM plma_attorney_goal pag
                LEFT JOIN plma_attorney pa ON pa.attorney_seq_no = pag.attorney_seq_no
                LEFT JOIN plma_firm pf ON pf.firm_seq_no = pag.firm_seq_no
                WHERE 1 and pag.firm_seq_no = '" . $firm_seq_no . "' AND pa.user_seq_no = '" . $admin_id . "'";
            
        }
        $query = $this->db->query($sql);
        $row = $query->result_array();
        $this->data['all_att_goal'] = $row;

//             echo $this->db->last_query();
//             t( $this->data['all_att_goal']);
//             exit;
        if($role_code == 'FIRMADM'){
          $attorney_seq_no_array = array();
        foreach ($this->data['all_att_goal'] as $key => $value) {
            $attorney_seq_no_array[] = $value['attorney_seq_no'];
        }
        $attorney_seq_no_array = implode(',', $attorney_seq_no_array);
//        t($attorney_seq_no_array); exit;

        if ($attorney_seq_no_array) {
            $cond = "and attorney_seq_no not in ($attorney_seq_no_array)";
            $this->data['all_attorney'] = $this->attorney_model->fetch($cond);
        } else {
            $this->data['all_attorney'] = $this->attorney_model->fetch();
        }  
        } elseif($role_code == 'ATTR'){
//            $this->data['attr_seq_no'] = $row[0]['attorney_seq_no'];
             $this->data['at_goal_seq_no'] = $row[0]['at_goal_seq_no'];
//            exit;
////             t($this->data['attr_seq_no']); exit;
//            $sql_a = "SELECT attorney_seq_no FROM plma_attorney";
//            $query_a = $this->db->query($sql_a);
//            $row_a = $query_a->result_array();
//            $this->data['attorney_seq_no'] = $row_a;
//            $attorney_seq_no = array();
//            foreach($row_a as $key1 => $value1){
//                $attorney_seq_no[] = $value1['attorney_seq_no'];
////                t($attorney_seq_no); exit;
//            }
//            $this->data['attorney_seq_no'] = $attorney_seq_no;
//            t($this->data['attorney_seq_no']); exit;
//            $this->data['created_by'] = $created_by;
//            echo $created_by; exit;
        }
        
        // Populate Form
        // $this->data['all_firm'] = $this->firm_model->fetch();
        $sql = "SELECT attr.*, pfirm.* FROM plma_attorney as attr JOIN plma_firm as pfirm ON attr.firm_seq_no = pfirm.firm_seq_no WHERE pfirm.firm_admin_seq_no = $admin_id and attr.attorney_seq_no not in (SELECT att_goal.attorney_seq_no FROM `plma_attorney_goal` att_goal)";
        $res = $this->db->query($sql);
        $row_1 = $res->result_array();
        $this->data['attorneys'] = $row_1;

        //t($this->data['attorneys']); exit();
        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/attorney_goals/listing', $this->data);
    }

    function add() {

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        if ($role_code == 'FIRMADM') {
            $firm_seq_no = $this->data['firm_seq_no']; //$this->input->post('firm_seq_no');
            $attorney_seq_no = $this->input->post('attorney_seq_no');
        }else{
            $firm_seq_no = $this->data['firm_seq_no']; //$this->input->post('firm_seq_no');
            $attorney_seq_no =  $this->data['attorney_seq_no'];
        }


        $current_year = $this->input->post('current_year');
        $current_year_goal = $this->input->post('current_year_goal');
        $current_year_goal = $this->removebenMask($current_year_goal);
        $current_year_goal_percentage = $this->input->post('current_year_goal_percentage');
        $remarks_notes = $this->input->post('remarks_notes');
        $summary_info = $this->input->post('summary_info');

        $insertarr = array(
            'firm_seq_no' => $firm_seq_no,
            'attorney_seq_no' => $attorney_seq_no,
            'current_year' => $current_year,
            'current_year_goal' => $current_year_goal,
            'current_year_goal_percentage' => $current_year_goal_percentage,
            'remarks_notes' => $remarks_notes,
            'summary_info' => $summary_info,
            'created_by' => $admin_id,
            'created_date' => time()
        );
        //t($insertarr, 1);
        $insert_id = $this->att_goal_model->add($insertarr);

        if ($insert_id) {
            $msg = 'Attorney goal added successfully';
            $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'attorney-goals');
        } else {
            $msg = 'Error in adding attorney goal';
            $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'attorney-goals');
        }
    }

    function edit($code = '') {

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $code = base64_decode($code);

        //get firm seq no.
        if($role_code == 'FIRMADM'){
         $attorney_seq_no = $this->input->post('attorney_seq_no');   
        }
        if($role_code == 'ATTR'){
            $cond = " and at_goal_seq_no = '" . $code . "'";
            $res_attorney = $this->att_goal_model->fetch($cond);
            $attorney_seq_no = $res_attorney[0]['attorney_seq_no']; 
//        exit;
        }

//        $current_year = $this->input->post('current_year');
        $current_year_goal = $this->input->post('current_year_goal');
       $current_year_goal = $this->removebenMask($current_year_goal);
  
        $current_year_goal_percentage = $this->input->post('current_year_goal_percentage');
        $remarks_notes = $this->input->post('remarks_notes');
        $summary_info = $this->input->post('summary_info');

        $insertarr = array(
            'attorney_seq_no' => $attorney_seq_no,
//            'current_year' => $current_year,
//            'attorney_seq_no' => $attorney_seq_no,
            'current_year_goal' => $current_year_goal,
            'current_year_goal_percentage' => $current_year_goal_percentage,
            'remarks_notes' => $remarks_notes,
            'summary_info' => $summary_info,
            'updated_by' => $admin_id,
            'updated_date' => time()
        );
//        t($insertarr, 1);
        $insert_id = $this->att_goal_model->edit($insertarr, $code);

        if ($insert_id) {
            $msg = 'Attorney goal updated successfully';
            $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'attorney-goals');
        } else {
            $msg = 'Error in updating attorney goal';
            $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
            redirect($base_url . 'attorney-goals');
        }
    }

    function view($code = '') {
//    	$admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];
        $code = base64_decode($code);

               if($role_code == 'FIRMADM'){
            $sql = "SELECT pag.*, pf.firm_name, pf.firm_seq_no, pa.attorney_first_name, pa.attorney_last_name, pa.firm_seq_no, pa.attorney_seq_no 
                FROM plma_attorney pa
                LEFT JOIN plma_firm pf ON pf.firm_seq_no = pa.firm_seq_no
                LEFT JOIN plma_attorney_goal pag ON pag.attorney_seq_no = pa.attorney_seq_no     
                WHERE 1 and pag.firm_seq_no = '" . $firm_seq_no . "' and pag.at_goal_seq_no = '" . $code . "'";
            }
            elseif ($role_code == 'ATTR') {
                $sql = "SELECT pag.*, pa.attorney_first_name, pa.attorney_last_name, pa.user_seq_no, pf.firm_name
                FROM plma_attorney_goal pag
                LEFT JOIN plma_attorney pa ON pa.attorney_seq_no = pag.attorney_seq_no
                LEFT JOIN plma_firm pf ON pf.firm_seq_no = pag.firm_seq_no
                WHERE 1 and pag.firm_seq_no = '" . $firm_seq_no . "' AND pa.user_seq_no = '" . $admin_id . "' and pag.at_goal_seq_no = '" . $code . "'";
            
        }
        $query = $this->db->query($sql);
        $row = $query->result_array();
//        $this->data['all_att_goal'] = $row;
        $this->data['att_goal'] = $row; 
//        t($this->data['att_goal']); exit;
//echo 123; exit;

        $sql_1 = "SELECT pcl.client_first_name, pcl.client_last_name, pcl.client_seq_no, pcl.attorney_seq_no, pcl.firm_seq_no, pag.attorney_seq_no FROM plma_client pcl INNER JOIN plma_attorney_goal pag ON pcl.attorney_seq_no = pag.attorney_seq_no AND pcl.firm_seq_no = '" . $firm_seq_no . "'";
//        echo $sql_1; 
        $query_1 = $this->db->query($sql_1);
        $res = $query_1->result_array();
        $this->data['client'] = $res;
//        t($this->data['client']); exit;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/attorney_goals/edit', $this->data);
    }

    function link_client($code = '') {
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $code = base64_decode($code);
    }

    function fetchRevenue($param) {

        $this->load->model('client_revenue_model');
        $this->load->model('client_model');

        $attorney_seq_no = $this->input->post('attorney_seq_no');
        $current_year = $this->input->post('current_year');
        $gt_current_year = $this->input->post('current_year') - 3;

        $sql = " SELECT IFNULL(sum(pcr.fy_goal_percentage_of_last_fy),0) current_year_goal_percentage, IFNULL(sum(pcr.fy_goal_figure), 0) current_year_goal FROM plma_client_revenue pcr WHERE 1 and pcr.financial_year_fy >= " . $gt_current_year . " and pcr.financial_year_fy < " . $current_year . " and pcr.client_seq_no in ( SELECT pc.client_seq_no FROM plma_client pc WHERE 1 and pc.attorney_seq_no = '" . $attorney_seq_no . "' ) ";

        $res = $this->db->query($sql);
        $row = $res->result_array();

        echo json_encode(array('current_year_goal_percentage' => $row[0]['current_year_goal_percentage'], 'current_year_goal' => $row[0]['current_year_goal']));


        /* $select="client_seq_no";
          $cond="AND attorney_seq_no=$attorney_seq_no";
          $client_list = $this->client_model->fetch($cond,$select);

          if(count($client_list)>0){
          $client_id = array();
          foreach ($client_list as $key => $value) {
          $client_id[] = $value['client_seq_no'];
          }
          $client_id =  implode(',', $client_id);
          echo $client_id;
          }else{
          echo 0;
          } */
    }

}
