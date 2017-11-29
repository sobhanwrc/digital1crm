<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Activity extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('activity_model');
        $this->load->model('activity_dtl_model');
        $this->load->model('activity_budget_model');
        $this->load->model('activity_budget_dtl_model');
        $this->load->model('act_attorney_model');
        $this->load->model('activity_approvals_model');
        $this->data['page'] = 'Dashboard';
        $this->load->model('client_contact_model');
        $this->load->model('target_contact_model');
        $this->load->model('add_contact_model');

        $this->load->model('Module6_Model');
        $this->load->model('targets_model');
        $this->load->model('Allnote_Model');
        $this->load->model('Module7_Model');
        $this->load->model('module_setting_model');
        $this->load->model('emailtemplate_model');
        $this->load->model('signature_model');
        $this->load->model('send_sms_model');
        $this->load->model('change_module_number_module');
        $this->load->model('sms_add_model');
        //t($this->data['codes']['Activity Status']) ; exit;
        //echo $this->code_desc('PENDACT'); exit;
    }

    function index() {
        
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_session_data['firm_seq_no'];

        $cond = " AND admin_id='$admin_id' AND firm_seq_no=$firm_seq_no AND client_product_purchased='Yes' AND status='Active' order by target_seq_no";
        $fetch_all_contact = $this->Module6_Model->fetch($cond);
        $this->data['fetch_all_contact'] = $fetch_all_contact;
        

        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/activity/listing', $this->data);
    }
    
    function add() {
        
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];

//        if ($role_code != 'ATTR') {
//             redirect($base_url . 'activity');
//        }

        $add_new_activity_btn = $this->input->post('add_new_activity_btn');

        if (isset($add_new_activity_btn)) {
            $firm_seq_no = $this->input->post('firm_seq_no');
            $origin_attorney_seq_no = $this->input->post('origin_attorney_seq_no');
            if($origin_attorney_seq_no){
//                echo 123; 
//                echo $origin_attorney_seq_no;
//                exit;
            }else{
                $origin_attorney_seq_no = $this->data['attorney_seq_no'];
            }
            $activity_type = $this->input->post('activity_type');
            $practice_area_type = $this->input->post('practice_area_type');
            $firm_sg_seq_no = $this->input->post('firm_sg_seq_no');
            $firm_section_seq_no = $this->input->post('firm_section_seq_no');
            $activity_reason_desc = $this->input->post('activity_reason_desc');
//             $this->input->post('potential_revenue');
            $potential_revenue = ($this->input->post('potential_revenue') > 0 ? $this->input->post('potential_revenue') : '0.00');
//             $potential_revenue = $this->removebenMask($potential_revenue); 
//    exit;
            $activity_status = $this->input->post('activity_status');
            $activity_created_date = $this->input->post('activity_created_date');
            $duration_from = $this->input->post('duration_from');
            $duration_to = $this->input->post('duration_to');
            $remarks_notes = $this->input->post('remarks_notes');
            $activity_name = $this->input->post('activity_name');
            
            $activity_val = $this->input->post('activity_goal_radio');
            $new_act_goal = $this->input->post('new_act_goal');
            $existing_act_goal = $this->input->post('existing_act_goal');
       
            if($new_act_goal){
                $goal_name=$new_act_goal;
            }else{
                $goal_name=$existing_act_goal;
            }

            $activity_arr = array(
                'firm_seq_no' => $firm_seq_no,
                'activity_name' => $activity_name,
                'activity_goal' => $goal_name,
                'act_option' => $activity_val,
                'origin_attorney_seq_no' => $origin_attorney_seq_no,
                'activity_type' => $activity_type,
                'practice_area_type' => $practice_area_type,
                'firm_sg_seq_no' => $firm_sg_seq_no,
                'firm_section_seq_no' => $firm_section_seq_no,
                'activity_reason_desc' => $activity_reason_desc,
                'potential_revenue' => $potential_revenue,
                'activity_status' => $activity_status,
                'activity_created_date' => $activity_created_date,
                'duration_from' => $duration_from,
                'duration_to' => $duration_to,
                'remarks_notes' => $remarks_notes,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//            t($activity_arr); exit; 
            $insert_id = $this->activity_model->add($activity_arr);


            if ($insert_id) {
                //add activity dtl
                if ($activity_type == 'INDIVIDUAL') {

                    $relation_type = $this->input->post('relation_type');
                    $relation_seq_no = $this->input->post('relation_seq_no');
                    $c = count($relation_seq_no);
                    //echo $c; 
                    //t($relation_seq_no,1);
                    $activity_dtl_status = $this->input->post('activity_dtl_status');
                    
                    $data = array();
                    $d = array(); 
                    $budget = $this->session->userdata('budgets');
                   // t($budget); 
                    //act_dtl - individual cost
                    foreach($relation_seq_no as $key => $value){
                      
                        $act_dtl_arr = array(
	                        'activity_seq_no' => $insert_id,
	                        'attorney_seq_no' => $origin_attorney_seq_no,
	                        'relation_type' => $relation_type,
	                        'relation_seq_no' => $value,
	                        'budgeted_cost' => '0.00',
	                        'potential_revenue' => $potential_revenue,
	                        'activity_dtl_status' => $activity_dtl_status,
	                        'remarks_notes' => $remarks_notes,
	                        'created_by' => $admin_id,
	                        'created_date' => time()
                    	);
                        $activity_dtl_seq_no = $this->activity_dtl_model->add($act_dtl_arr);
                        $d[] = $activity_dtl_seq_no;
                       
                        //t($act_dtl_arr); exit;
                    }
                    $budget_dtl_status = $this->input->post('budget_dtl_status');

                    $hr_bud = array();
                    $i = 1;
                    $j = 2;
                     
                    foreach ($budget as $key => $value) {
                        if ($i == 0 || $i % 2 == 0) {
                            $arr2 = array();
                        }
                        $arr2[$key] = $value;
                        if ($j % 2 == 0 && $i != 0) {
                            $hr_bud[] = $arr2;
                        }
                        $i++;
                        $j++;
                    }
                   // t($hr_bud); 
                     
                    foreach ($d as $k => $v) {
                        $total_cost = 0; 
                    foreach ($hr_bud as $key1 => $value1) {
                        $akeys = array_keys($value1);
                        //t($akeys); 
                        $tmp1 = explode('_', $akeys[1]);
                        $tmp2 = substr($tmp1[0], 0, 2);
                        //t($hr_bud);
                        if ($value1[$akeys[0]] != '' && $value1[$akeys[1]] != '') {
                             if($budget['opt']== 'ind'){
                                 $h= $value1[$akeys[0]];
                                 $cou=$value1[$akeys[1]];
                             } else {
                                 $h= ($value1[$akeys[0]]/$c);
                                 $cou= ($value1[$akeys[1]]/$c);
                             }
                            
                            $total_cost += $value1[$akeys[1]];
                            $act_bud_dtl_arr = array(
                                'activity_dtl_seq_no' => $v,
                                //'act_budget_seq_no' => $act_budget_seq_no,
                                'budget_code_type' => $tmp2,
                                'budget_code' => $tmp1[0],
                                'budget_code_hours' => $h,
                                'budget_code_cost' => $cou,
                                'budget_dtl_status' => $budget_dtl_status,
                                'remarks_notes' => $remarks_notes,
                                'created_by' => $admin_id,
                                'created_date' => time()
                            );
                            //t($act_bud_dtl_arr); exit();
                            $act_budget_seq_no11 = $this->activity_budget_dtl_model->add($act_bud_dtl_arr);
//                            echo $this->db->last_query();
                        }
//                       
                    }
                    }
                    
                    // t($act_budget_seq_no11); exit;
                    //echo $budget['opt'];   
                    //update totalcost 
                    if($budget['opt']== 'ind'){
                    //$act_dtl_arru = array(
                        $budgeted_cost = $total_cost;
                   // );
                    $sql = "UPDATE plma_activity_dtl set budgeted_cost='$budgeted_cost' where activity_seq_no='$insert_id'";
                    $query = $this->db->query($sql);
                    //$activity_dtl_seq_no1 = $this->activity_dtl_model->edit($act_dtl_arru, $insert_id);
                    }
                    else
                    {
                       // echo $c;
                        $t= ($total_cost/$c);
                        //t($activity_dtl_seq_no);
                       // echo $t; exit();
                     // foreach($activity_dtl_seq_no as $key => $value){
                         //$act_dtl_arru = array(
                        $budgeted_cost = $t;
                         // );
                         
                      $sql = "UPDATE plma_activity_dtl set budgeted_cost='$budgeted_cost' where activity_seq_no='$insert_id'";   
                    // echo $sql; exit();
                      //$activity_dtl_seq_no1 = $this->activity_dtl_model->edit($act_dtl_arru, $cond);   
                      $query = $this->db->query($sql);
                      //$res = $query->result_array();
                      //echo $this->db->last_query(); 
                      //exit;
                        //}  
                        
                    }
                    /* $act_budget_arru = array(
                      'budgeted_cost' => $total_cost
                      );
                      $act_budget_seq_no1 = $this->activity_budget_model->edit($act_budget_arru, $act_budget_seq_no); */

                    //echo $this->db->last_query(); exit;
                } else {
                    //other type of budgets
                }

                //add activity dtl

                $msg = 'Activity added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'activity');
            } else {
                $msg = 'Error in adding activity';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'activity/add');
            }
        } 
        else {
            $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.user_seq_no
                    FROM plma_attorney pa
                    LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                    WHERE pa.user_seq_no = '" . $admin_id . "'";
            $query = $this->db->query($sql);
//            echo $sql;
            $res = $query->result_array();
            $this->data['att_firm'] = $res;
          //  t($this->data['att_firm']); 
            
//            $att_firm=$res;
//            $firm = $att_firm[0]['firm_seq_no'];
//            // echo $firm; exit();
//           $sql1="select * from plma_activity where firm_seq_no=$firm"; 
//           $qu= $this->db->query($sql1);
//           $resu= $qu->result_array();
//           $this->data['activity_name'] = $resu;
           
           //t($this->data['activity_name'],1)  ;
            $sql2 = "SELECT * FROM plma_firm_sg WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY sg_type";
            $query2 = $this->db->query($sql2);
            $this->data['sg'] = $query2->result_array();

            $sql2 = "SELECT * FROM plma_firm_section WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY section_type";
            $query2 = $this->db->query($sql2);
            $this->data['section'] = $query2->result_array();

            $sql_3 = "SELECT pfa.*, pa.practice_area_seq_no, pa.practice_area_name "
                    . "FROM plma_firm_pa as pfa "
                    . "LEFT JOIN plma_practice_area as pa ON pfa.practice_area_seq_no = pa.practice_area_seq_no "
                    . "WHERE pfa.firm_seq_no = '" . $firm_seq_no . "' AND pfa.status=1";
            $query_3 = $this->db->query($sql_3);
            $this->data['practice_area'] = $query_3->result_array();
//            t($this->data['practice_area']); exit;


            $this->data['activity_type'] = $this->data['codes']['Activity Type'];  //t($this->data['codes']['Activity Type']); exit;
            $this->data['activity_status'] = $this->data['codes']['Activity Status']; //t( $this->data['codes']['Activity Status']); exit;
//            $this->data['practice_area'] = $this->data['codes']['Practice Areas']; 
            $this->data['act_dtl_status'] = $this->data['codes']['Activity Dtl Status'];
            $this->data['act_budget_status'] = $this->data['codes']['Activity Budget Status'];
            $this->data['budget_dtl_status'] = $this->data['codes']['Activity Budget Dtl Status'];

            $select="distinct (activity_goal)";
            $activity_goal=$this->activity_model->fetch('',$select);
            $this->data['activity_goal']=$activity_goal;
//            t($activity_goal);
//            exit;
            
            
            $this->get_include();
            $this->load->view($this->view_dir . 'app_transaction/activity/add', $this->data);
        }
    }

    function edit($code = '') {

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];

        $code = base64_decode($code);
        $sql4 = "
                SELECT * 
                FROM `plma_activity` 
                WHERE `activity_seq_no` = '" . $code . "'
            ";
        $query4 = $this->db->query($sql4);
        $res4 = $query4->result_array(); //t($res4); exit;
        $this->data['this_activity'] = $res4[0];
//        t($this->data['this_activity'] ); exit();

        $add_new_activity_btn = $this->input->post('add_new_activity_btn');
        if (isset($add_new_activity_btn)) {
            $firm_seq_no = $this->input->post('firm_seq_no');
            $origin_attorney_seq_no = $this->input->post('origin_attorney_seq_no');
            $activity_type = $this->input->post('activity_type');
            $practice_area_type = $this->input->post('practice_area_type');
            $firm_sg_seq_no = $this->input->post('firm_sg_seq_no');
            $firm_section_seq_no = $this->input->post('firm_section_seq_no');
            $activity_reason_desc = $this->input->post('activity_reason_desc');
            $potential_revenue = $this->input->post('potential_revenue');
            $potential_revenue = $this->removebilMask($potential_revenue);
            $activity_status = $this->input->post('activity_status');
            $activity_created_date = $this->input->post('activity_created_date');
            $duration_from = $this->input->post('duration_from');
            $duration_to = $this->input->post('duration_to');
            $remarks_notes = $this->input->post('remarks_notes');
            $activity_name = $this->input->post('activity_name');
            
            $activity_val = $this->input->post('activity_goal_radio');
            $new_act_goal = $this->input->post('new_act_goal');
            $existing_act_goal = $this->input->post('existing_act_goal');
       
            if($activity_val== 'new_goal'){   
                $goal_name=$new_act_goal;
                
            }else{
                $goal_name=$existing_act_goal;
            }

            $activity_arr = array(
                'firm_seq_no' => $firm_seq_no,
                'activity_name' => $activity_name,
                'activity_goal' => $goal_name,
                'act_option' => $activity_val,
                'origin_attorney_seq_no' => $origin_attorney_seq_no,
                'activity_type' => $activity_type,
                'practice_area_type' => $practice_area_type,
                'firm_sg_seq_no' => $firm_sg_seq_no,
                'firm_section_seq_no' => $firm_section_seq_no,
                'activity_reason_desc' => $activity_reason_desc,
                'potential_revenue' => $potential_revenue,
                'activity_status' => $activity_status,
                'activity_created_date' => $activity_created_date,
                'duration_from' => $duration_from,
                'duration_to' => $duration_to,
                'remarks_notes' => $remarks_notes,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );

            // t($activity_arr); exit();
            $insert_id = $this->activity_model->edit($activity_arr, $code);

            //update activity dtl potential 
            $activity_dtl_arr = array(
                'potential_revenue' => $potential_revenue,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
            $insert_id1 = $this->activity_dtl_model->edit_cond($activity_dtl_arr, "activity_seq_no='" . $code . "'");

            if ($insert_id) {
                
                      if ($activity_type == 'INDIVIDUAL') {
                          
                     $this->activity_dtl_model->delete_cond(" AND activity_seq_no='" . $code . "'");
                     
                    $relation_type = $this->input->post('relation_type');
                    $relation_seq_no = $this->input->post('relation_seq_no');
                    //$c = count($relation_seq_no);
                    //echo $c; 
                    //t($relation_seq_no,1);
                    $activity_dtl_status = $this->input->post('activity_dtl_status');
                    
                    //$data = array();
                    //$d = array(); 
                   // $budget = $this->session->userdata('budgets');
                   // t($budget); 
                    //act_dtl - individual cost
                    foreach($relation_seq_no as $key => $value){
                      
                        $act_dtl_arr = array(
                        'activity_seq_no' => $code,
                        'attorney_seq_no' => $origin_attorney_seq_no,
                        'relation_type' => $relation_type,
                        'relation_seq_no' => $value,
                        'budgeted_cost' => '0.00',
                        'potential_revenue' => $potential_revenue,
                        'activity_dtl_status' => $activity_dtl_status,
                        'remarks_notes' => $remarks_notes,
                        'updated_by' => $admin_id,
                        'updated_date' => time()
                    );   
                        
                        $activity_dtl_seq_no = $this->activity_dtl_model->add($act_dtl_arr);
                        //$d[] = $activity_dtl_seq_no;
                       
                        //t($act_dtl_arr); exit;
                    }
                 }
                $msg = 'Activity updated successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'activity');
            } else {
                $msg = 'Error in updating activity';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'activity/edit/' . base64_encode($code));
            }
        } else {
            if ($role_code == 'FIRMADM') {

                $origin_att = $res4[0]['origin_attorney_seq_no']; /////origin attorney fetch

                $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pf.firm_admin_seq_no, pa.attorney_seq_no, pa.user_seq_no
                    FROM plma_attorney pa
                    LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                    WHERE pf.firm_admin_seq_no = '" . $admin_id . "' AND pa.attorney_seq_no = '" . $origin_att . "'";
            } elseif ($role_code == 'ATTR') {

                $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.user_seq_no
                    FROM plma_attorney pa
                    LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                    WHERE pa.user_seq_no = '" . $admin_id . "'";
            }


            //echo $sql;
            //echo $sql;
//            echo $sql;

            $query = $this->db->query($sql);
            $res = $query->result_array();

            $this->data['att_firm'] = $res; //t($res); exit;

            $this->data['att_firm'] = $res;
            //print_r($this->data['att_firm']); exit();


            $sql2 = "SELECT * FROM plma_firm_sg WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY sg_type";
            $query2 = $this->db->query($sql2);
            $this->data['sg'] = $query2->result_array();

            $sql2 = "SELECT * FROM plma_firm_section WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY section_type";
            $query2 = $this->db->query($sql2);
            $this->data['section'] = $query2->result_array();

            $sql_3 = "SELECT pfa.*, pa.practice_area_seq_no, pa.practice_area_name "
                    . "FROM plma_firm_pa as pfa "
                    . "LEFT JOIN plma_practice_area as pa ON pfa.practice_area_seq_no = pa.practice_area_seq_no "
                    . "WHERE pfa.firm_seq_no = '" . $firm_seq_no . "' AND pfa.status=1";
            $query_3 = $this->db->query($sql_3);
            $this->data['practice_area'] = $query_3->result_array();

            $this->data['activity_type'] = $this->data['codes']['Activity Type'];  //t($this->data['codes']['Activity Type']); exit;
            $this->data['activity_status'] = $this->data['codes']['Activity Status'];
//            $this->data['practice_area'] = $this->data['codes']['Practice Areas']; 
            $this->data['act_dtl_status'] = $this->data['codes']['Activity Dtl Status'];
//            t($this->data['act_dtl_status']); exit;
            $this->data['act_budget_status'] = $this->data['codes']['Activity Budget Status'];
            $this->data['budget_dtl_status'] = $this->data['codes']['Activity Budget Dtl Status'];

            //act dtl fetch
            $sql111 = "SELECT pf.firm_name, pf.firm_admin_seq_no, pf.firm_seq_no, patt.attorney_first_name, patt.attorney_last_name, pad.*
FROM plma_activity_dtl pad
LEFT JOIN plma_activity pa ON  pa.activity_seq_no = pad.activity_seq_no
LEFT JOIN plma_firm pf ON pf.firm_seq_no = pa.firm_seq_no
LEFT JOIN plma_attorney patt ON patt.attorney_seq_no = pad.attorney_seq_no
WHERE pa.firm_seq_no = '" . $firm_seq_no . "' and pad.activity_seq_no = '" . $code . "'";
            $act_dtl_qry = $this->db->query($sql111);
            $act_dtl_res = $act_dtl_qry->result_array();

//            t($act_dtl_res); exit;
            $ind_bud_dtl = array();
            foreach ($act_dtl_res as $key => $value) {
                $name = $this->fetch_CT($value['relation_type'], $value['relation_seq_no']);
                $act_dtl_res[$key]['ct_name'] = $name;

                $sql222 = "SELECT *
            FROM plma_act_bud_dtl pabd
            LEFT JOIN plma_activity_dtl pad ON  pabd.activity_dtl_seq_no = pad.activity_dtl_seq_no
            LEFT JOIN plma_activity pa ON pad.activity_seq_no = pa.activity_seq_no
            WHERE pa.firm_seq_no = '" . $firm_seq_no . "' and pa.activity_seq_no = '" . $code . "' and pad.relation_seq_no = '" . $value['relation_seq_no'] . "' ";
                $qry222 = $this->db->query($sql222);
                //t($qry222->result_array()); exit;
                $narr = array();
                foreach ($qry222->result_array() as $key12 => $value12) {
                    $narr[$value12['budget_code']] = $value12;
                }
                $ind_bud_dtl[] = $narr;
            }

            $sql100 = "SELECT DISTINCT `budget_dtl_status` FROM `plma_act_bud_dtl` WHERE `activity_dtl_seq_no` = '" . $act_dtl_res[0]['activity_dtl_seq_no'] . "'";
            $query100 = $this->db->query($sql100);
            $res100 = $query100->result_array();
            $this->data['budget_dtl_status1'] = $res100[0]['budget_dtl_status'];


            $this->data['ind_bud_dtl'] = $ind_bud_dtl;
            $this->data['act_dtl_res'] = $act_dtl_res;
//            t($this->data['budget_dtl_status1']); exit;

            $sql300 = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.user_seq_no
                FROM plma_attorney pa
                LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                WHERE pa.user_seq_no = '" . $admin_id . "'";
            $query300 = $this->db->query($sql300);
            $res300 = $query300->result_array();

            if ($act_dtl_res[0]['relation_type'] == 'T') {
                $sql200 = "SELECT *
                    FROM plma_target pt                    
                    WHERE pt.firm_seq_no = '" . $res300['firm_seq_no'] . "' and pt.target_seq_no not in (select ptcc.target_seq_no from plma_tgt_cli_conv ptcc)"; //
                $query200 = $this->db->query($sql200);
                $res200 = $query200->result_array();
            } else if ($act_dtl_res[0]['relation_type'] == 'C') {
                $sql200 = "SELECT *
             FROM plma_client pc                    
                    WHERE 1 and pc.firm_seq_no = '" . $res300['firm_seq_no'] . "'"; //
                $query200 = $this->db->query($sql200);
                $res200 = $query200->result_array();
            }
            $this->data['thisallrelation'] = $res200;
            //t($res200); exit;
            //
            
            $select="distinct (activity_goal)";
            $activity_goal=$this->activity_model->fetch('',$select);
            $this->data['activity_goal']=$activity_goal;

            $this->get_include();
            $this->load->view($this->view_dir . 'app_transaction/activity/edit', $this->data);
        }
    }

    function view($code = '',$md='',$id='' ) {

        $target_seq_no = base64_decode($code);
        
        $module_no = base64_decode($md);
        //echo $module_no;die();
        $id = base64_decode($id);
        //echo $target_seq_no."</br>";echo $module_no;echo $id;die();

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];
        
        $cond="AND target_seq_no='".$target_seq_no."' ";
        $get_data=$this->Targets_model->fetch($cond);
        //print_r($get_data);die();
        $this->data['module6_data']=$get_data;

        $this->data['module_no']=$module_no;

         $condnote = " and admin_id ='".$admin_id."' and target_seq_no=$target_seq_no order by id DESC";
         $note = $this->Allnote_Model->fetch($condnote);
         $this->data['viewallnotes']=$note;

        $sql4 = "
            SELECT * 
            FROM `plma_activity` 
            WHERE `activity_seq_no` = '" . $code . "'
        ";
        $query4 = $this->db->query($sql4);
        $res4 = $query4->result_array(); 
//t($res4, 1);
        $this->data['this_activity'] = $res4[0];

        if ($role_code == 'FIRMADM') {

            $origin_att = $res4[0]['origin_attorney_seq_no']; /////origin attorney fetch

            $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pf.firm_admin_seq_no, pa.attorney_seq_no, pa.user_seq_no
                    FROM plma_attorney pa
                    LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                    WHERE pf.firm_admin_seq_no = '" . $admin_id . "' AND pa.attorney_seq_no = '" . $origin_att . "'";
        } elseif ($role_code == 'ATTR') {

            $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.user_seq_no
                FROM plma_attorney pa
                LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                WHERE pa.user_seq_no = '" . $admin_id . "'";
        }
        $query = $this->db->query($sql);
        $res = $query->result_array();
        $this->data['att_firm'] = $res;
//        t($res,1);

        $sql2 = "SELECT * FROM plma_firm_sg WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY sg_type";
        $query2 = $this->db->query($sql2);
        $this->data['sg'] = $query2->result_array();

        $sql2 = "SELECT * FROM plma_firm_section WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY section_type";
        $query2 = $this->db->query($sql2);
        $this->data['section'] = $query2->result_array();

        $this->data['activity_type'] = $this->data['codes']['Activity Type'];  //t($this->data['codes']['Activity Type']); exit;
        $this->data['activity_status'] = $this->data['codes']['Activity Status'];
        $this->data['act_dtl_status'] = $this->data['codes']['Activity Dtl Status'];
//        $this->data['practice_area'] = $this->data['codes']['Practice Areas']; 

        $sql_3 = "SELECT pfa.*, pa.practice_area_seq_no, pa.practice_area_name "
                . "FROM plma_firm_pa as pfa "
                . "LEFT JOIN plma_practice_area as pa ON pfa.practice_area_seq_no = pa.practice_area_seq_no "
                . "WHERE pfa.firm_seq_no = '" . $firm_seq_no . "' AND pfa.status=1";
        $query_3 = $this->db->query($sql_3);
        $this->data['practice_area'] = $query_3->result_array();

        //activity detail fetch
        $sql111 = "SELECT pf.firm_name, pf.firm_admin_seq_no, pf.firm_seq_no, patt.attorney_first_name, patt.attorney_last_name, pad.*
FROM plma_activity_dtl pad
LEFT JOIN plma_activity pa ON  pa.activity_seq_no = pad.activity_seq_no
LEFT JOIN plma_firm pf ON pf.firm_seq_no = pa.firm_seq_no
LEFT JOIN plma_attorney patt ON patt.attorney_seq_no = pad.attorney_seq_no
WHERE pa.firm_seq_no = '" . $firm_seq_no . "' and pad.activity_seq_no = '" . $code . "'";
        $act_dtl_qry = $this->db->query($sql111);
        $act_dtl_res = $act_dtl_qry->result_array();


        $ind_bud_dtl = array();
        foreach ($act_dtl_res as $key => $value) {
            $name = $this->fetch_CT($value['relation_type'], $value['relation_seq_no']);
            //$act_dtl_res[$key]['ct_name'] = $name;
            $act_dtl_res[$key]['ct_name'] = $name;
            $sql222 = "SELECT *
            FROM plma_act_bud_dtl pabd
            LEFT JOIN plma_activity_dtl pad ON  pabd.activity_dtl_seq_no = pad.activity_dtl_seq_no
            LEFT JOIN plma_activity pa ON pad.activity_seq_no = pa.activity_seq_no
            WHERE pa.firm_seq_no = '" . $firm_seq_no . "' and pa.activity_seq_no = '" . $code . "' and pad.relation_seq_no = '" . $value['relation_seq_no'] . "' ";
            $qry222 = $this->db->query($sql222);
            //t($qry222->result_array()); exit;
            $narr = array();
            foreach ($qry222->result_array() as $key12 => $value12) {
                $narr[$value12['budget_code']] = $value12;
            }
            $ind_bud_dtl[] = $narr;
        }

//        t($act_dtl_res); exit;


        $this->data['ind_bud_dtl'] = $ind_bud_dtl;
        $this->data['act_dtl_res'] = $act_dtl_res;
        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/activity/view', $this->data);
    }

    function make_ct_budget() {
        $this->session->set_userdata('budgets', $this->input->post());
        echo json_encode($this->session->userdata('budgets'));
    }

    function get_rel_type_users($activity_seq_no = '') {
//        $admin_all_session = $this->session->userdata('admin_session');
        $activity_seq_no = base64_decode($activity_seq_no);
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];
        $attorney_seq_no = $this->data['attorney_seq_no']; 
//    exit;
        /*** attorney seq no fetch using admin id ***/
        $cond = "AND origin_attorney_seq_no= (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "') AND activity_seq_no= '" . $activity_seq_no . "'"; 
        $activity_details = $this->activity_model->fetch($cond);
//        echo $this->db->last_query();
//         t($activity_details);
//         exit;
        
        if (count($activity_details) > 0) {
            $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.created_by, pa.user_seq_no, pac.origin_attorney_seq_no, pac.activity_seq_no
                FROM plma_attorney pa
                LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                LEFT JOIN plma_activity pac ON pa.attorney_seq_no = pac.origin_attorney_seq_no
                LEFT JOIN plma_act_attorney pact ON pac.activity_seq_no = pact.activity_seq_no
                WHERE pac.origin_attorney_seq_no = '" . $attorney_seq_no . "' AND pac.activity_seq_no = '" . $activity_seq_no . "'";
        } else {
            $sql = "SELECT pact.*, pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.created_by, pa.user_seq_no
                FROM plma_attorney pa
                LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                LEFT JOIN plma_act_attorney pact ON pa.attorney_seq_no = pact.attorney_seq_no
                WHERE pa.attorney_seq_no = '" . $attorney_seq_no . "' AND pact.activity_seq_no = '" . $activity_seq_no . "'";
        }

//         echo $sql;
        $query = $this->db->query($sql);
        $res1 = $query->result_array();
        $res1 = $res1[0];
//        echo $this->db->last_query();
//        t($res1); 
//        exit;

        $reltyp = $this->input->post('reltyp');
//        $activity_seq_no = base64_decode($activity_seq_no);
        $options = '';
        if ($reltyp == 'T') {

            if ($activity_seq_no != '') {

//                $sql = "SELECT *
//                    FROM plma_target pt                    
//                    WHERE pt.firm_seq_no = '" . $firm_seq_no . "' and pt.target_seq_no not in (select ptcc.target_seq_no from plma_tgt_cli_conv ptcc) and pt.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "') and pt.target_seq_no not in (select pad_.relation_seq_no from plma_activity_dtl pad_ where pad_.activity_seq_no = '" . $activity_seq_no . "' )"; //
                $sql = "SELECT *
                    FROM plma_target pt                    
                    WHERE pt.firm_seq_no = '" . $firm_seq_no . "'  and pt.association_status !='CONVERTED'  and pt.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "') and pt.target_seq_no not in (select pad_.relation_seq_no from plma_activity_dtl pad_ where pad_.activity_seq_no = '" . $activity_seq_no . "' )"; //
            } else {
//                $sql = "SELECT *
//                    FROM plma_target pt                    
//                    WHERE pt.firm_seq_no = '" . $firm_seq_no . "' and pt.target_seq_no not in (select ptcc.target_seq_no from plma_tgt_cli_conv ptcc) and pt.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "')"; //
                $sql = "SELECT *
                    FROM plma_target pt                    
                    WHERE pt.firm_seq_no = '" . $firm_seq_no . "' and pt.association_status !='CONVERTED' and pt.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "')"; //
            }

            $query = $this->db->query($sql);
//        echo $this->db->last_query();
            $res = $query->result_array();
//        t($res);
//         exit;
            //$options = '<option value="">Target Company</option>';
            //$options[]= array('label'=>'Target Company','value'=>'');
            foreach ($res as $key => $value) {
                $options[]=array('label'=>$value['target_company_name'],'value'=>$value['target_seq_no']);
                //$options .= '<option value="' . $value['target_seq_no'] . '">' .$value['target_company_name'] . '</option>';
            }
        } else if ($reltyp == 'C') {
            if ($activity_seq_no != '') {
                $sql = "SELECT *
                    FROM plma_client pc                    
                    WHERE 1 and pc.firm_seq_no = '" . $firm_seq_no . "' and pc.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "') and pc.client_seq_no not in (select pad_.relation_seq_no from plma_activity_dtl pad_ where pad_.activity_seq_no = '" . $activity_seq_no . "')"; //
            } else {
                $sql = "SELECT *
                    FROM plma_client pc                    
                    WHERE 1 and pc.firm_seq_no = '" . $firm_seq_no . "' and pc.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "')"; //
            }


            $query = $this->db->query($sql);
//            echo $this->db->last_query();
//            exit;
            $res = $query->result_array();
            //$options[]= array('label'=>'Client Company','value'=>'');
            //$options = '<option value="">Client Company</option>';
            foreach ($res as $key => $value) {
                $options[]=array('label'=>$value['client_company_name'],'value'=>$value['client_seq_no']);
                //$options .= '<option value="' . $value['client_seq_no'] . '">' .$value['client_company_name']  . '</option>';
            }
        }
        //echo $this->db->last_query();
        
        echo json_encode($options);
    }
    
    function get_rel_type_users_new($activity_seq_no = '') {
//        $admin_all_session = $this->session->userdata('admin_session');
        $activity_seq_no = base64_decode($activity_seq_no);
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];
        $attorney_seq_no = $this->data['attorney_seq_no']; 
//    exit;
        /*** attorney seq no fetch using admin id ***/
        $cond = "AND origin_attorney_seq_no= (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "') AND activity_seq_no= '" . $activity_seq_no . "'"; 
        $activity_details = $this->activity_model->fetch($cond);
//        echo $this->db->last_query();
//         t($activity_details);
//         exit;
        
        if (count($activity_details) > 0) {
            $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.created_by, pa.user_seq_no, pac.origin_attorney_seq_no, pac.activity_seq_no
                FROM plma_attorney pa
                LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                LEFT JOIN plma_activity pac ON pa.attorney_seq_no = pac.origin_attorney_seq_no
                LEFT JOIN plma_act_attorney pact ON pac.activity_seq_no = pact.activity_seq_no
                WHERE pac.origin_attorney_seq_no = '" . $attorney_seq_no . "' AND pac.activity_seq_no = '" . $activity_seq_no . "'";
        } else {
            $sql = "SELECT pact.*, pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.created_by, pa.user_seq_no
                FROM plma_attorney pa
                LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                LEFT JOIN plma_act_attorney pact ON pa.attorney_seq_no = pact.attorney_seq_no
                WHERE pa.attorney_seq_no = '" . $attorney_seq_no . "' AND pact.activity_seq_no = '" . $activity_seq_no . "'";
        }

//         echo $sql;
        $query = $this->db->query($sql);
        $res1 = $query->result_array();
        $res1 = $res1[0];
//        echo $this->db->last_query();
//        t($res1); 
//        exit;

        $reltyp = $this->input->post('reltyp');
//        $activity_seq_no = base64_decode($activity_seq_no);
        $options = '';
        if ($reltyp == 'T') {

            if ($activity_seq_no != '') {

//                $sql = "SELECT *
//                    FROM plma_target pt                    
//                    WHERE pt.firm_seq_no = '" . $firm_seq_no . "' and pt.target_seq_no not in (select ptcc.target_seq_no from plma_tgt_cli_conv ptcc) and pt.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "') and pt.target_seq_no not in (select pad_.relation_seq_no from plma_activity_dtl pad_ where pad_.activity_seq_no = '" . $activity_seq_no . "' )"; //
                $sql = "SELECT *
                    FROM plma_target pt                    
                    WHERE pt.firm_seq_no = '" . $firm_seq_no . "'  and pt.association_status !='CONVERTED'  and pt.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "') "; //
            } else {
//                $sql = "SELECT *
//                    FROM plma_target pt                    
//                    WHERE pt.firm_seq_no = '" . $firm_seq_no . "' and pt.target_seq_no not in (select ptcc.target_seq_no from plma_tgt_cli_conv ptcc) and pt.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "')"; //
                $sql = "SELECT *
                    FROM plma_target pt                    
                    WHERE pt.firm_seq_no = '" . $firm_seq_no . "' and pt.association_status !='CONVERTED' and pt.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "')"; //
            }

            $query = $this->db->query($sql);
//        echo $this->db->last_query();
            $res = $query->result_array();
//        t($res);
//         exit;
            $options = '<option value="">Target Company</option>';
            foreach ($res as $key => $value) {
                $options .= '<option value="' . $value['target_seq_no'] . '">' .$value['target_company_name'] . '</option>';
            }
        } else if ($reltyp == 'C') {
            if ($activity_seq_no != '') {
                $sql = "SELECT *
                    FROM plma_client pc                    
                    WHERE 1 and pc.firm_seq_no = '" . $firm_seq_no . "' and pc.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "') "; //
            } else {
                $sql = "SELECT *
                    FROM plma_client pc                    
                    WHERE 1 and pc.firm_seq_no = '" . $firm_seq_no . "' and pc.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "')"; //
            }


            $query = $this->db->query($sql);
//            echo $this->db->last_query();
//            exit;
            $res = $query->result_array();
            $options = '<option value="">Client Company</option>';
            foreach ($res as $key => $value) {
                $options .= '<option value="' . $value['client_seq_no'] . '">' .$value['client_company_name']  . '</option>';
            }
        }
        //echo $this->db->last_query();
        echo json_encode($options);
    }

    function fetch_CT($reltyp, $code) {

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];

        $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pf.firm_admin_seq_no, pa.attorney_seq_no, pa.user_seq_no "
               . "FROM plma_attorney pa "
               . "INNER JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no "
               . "WHERE pf.firm_admin_seq_no = '" . $admin_id . "'";
//        echo $sql;
        $query = $this->db->query($sql);
        $res1 = $query->result_array();
        $res1 = $res1[0];
//        t($res1); exit; 

        if ($reltyp == 'T') {
            $sql = "SELECT *
                        FROM plma_target pt                    
                        WHERE pt.firm_seq_no = '" . $firm_seq_no . "' and pt.target_seq_no = '" . $code . "'  ";
            $query = $this->db->query($sql);
            $res = $query->result_array();
            //$name = $res[0]['target_first_name'] . ' ' . $res[0]['target_last_name'];
            $name = $res[0]['target_company_name'];
        } else if ($reltyp == 'C') {
// echo $code; exit;
            $sql = "SELECT *
                        FROM plma_client pc                    
                        WHERE 1 and pc.client_seq_no = '" . $code . "' and  pc.firm_seq_no = '" . $firm_seq_no . "'";
            $query = $this->db->query($sql);
            $res = $query->result_array();

            //$name = $res[0]['client_first_name'] . ' ' . $res[0]['client_last_name'];
            $name = $res[0]['client_company_name'];
        }
          //t($res);  exit();
//echo $name; exit;
        //return $name;
        return $name;
    }

    function update_single_budget_dtl($actseqno, $activity_dtl_seq_no = '') {
//echo 123; exit;
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $budget = $this->input->post();

        $actseqno = base64_decode($actseqno);

        if ($activity_dtl_seq_no == '') {
            $sql_adsn = "SELECT * FROM `plma_activity_dtl` WHERE activity_seq_no = '" . $actseqno . "'";
            $qry_adsn = $this->db->query($sql_adsn);
            $res_adsn = $qry_adsn->result_array();

            $activity_dtl_seq_no = $res_adsn[0]['activity_dtl_seq_no'];
        }

        //$this->input->post()
//        t($budget); exit;
        $hr_bud = array();
        $i = 0;
        $j = 1;
        foreach ($budget as $key => $value) {
            if ($i == 0 || $i % 2 == 0) {
                $arr2 = array();
            }
            $arr2[$key] = $value;
            if ($j % 2 == 0 && $i != 0) {
                $hr_bud[] = str_replace('$ ', '', $arr2);
            }
            $i++;
            $j++;
        }

//        t($hr_bud); exit;
        $total_cost = 0;
        foreach ($hr_bud as $key1 => $value1) {
            $akeys = array_keys($value1);
//            t($akeys); exit;
           $tmp1 = explode('_', $akeys[0]);
           $tmp2 = substr($tmp1[0], 0, 2);
//            t($hr_bud); 
//            exit;
            if ($value1[$akeys[0]] != '' && $value1[$akeys[1]] != '') {

                //check if exist
                $sql_exist = "SELECT * FROM `plma_act_bud_dtl` WHERE `activity_dtl_seq_no` = '" . $activity_dtl_seq_no . "' and `budget_code` = '" . $tmp1[0] . "'";
                $query_exist = $this->db->query($sql_exist);
                $res_exist = $query_exist->result_array();
//                t($res_exist);
//                exit;
                $cc = count($res_exist);

                if ($cc == 0) {
                    $total_cost += $value1[$akeys[1]];
                    $act_bud_dtl_arr = array(
                        'activity_dtl_seq_no' => $activity_dtl_seq_no,
                        //'act_budget_seq_no' => $act_budget_seq_no,
                        'budget_code_type' => $tmp2,
                        'budget_code' => $tmp1[0],
                        'budget_code_hours' => $value1[$akeys[0]],
                        'budget_code_cost' => $value1[$akeys[1]],
                        'created_by' => $admin_id,
                        'created_date' => time()
                    );
                    //t($act_bud_dtl_arr);
                    $act_budget_seq_no11 = $this->activity_budget_dtl_model->add($act_bud_dtl_arr);
                } else if ($cc > 0) {
                    $total_cost += $value1[$akeys[1]];
                    $act_bud_dtl_arr = array(
                        'budget_code_hours' => $value1[$akeys[0]],
                        'budget_code_cost' => $value1[$akeys[1]],
                        'updated_by' => $admin_id,
                        'updated_date' => time()
                    );
                    $act_budget_seq_no11 = $this->activity_budget_dtl_model->edit_cond($act_bud_dtl_arr, " activity_dtl_seq_no = '" . $activity_dtl_seq_no . "' and budget_code = '" . $tmp1[0] . "'");
                }


                //echo $this->db->last_query();
            } else {
                $res = $this->activity_budget_dtl_model->delete_cond(" and activity_dtl_seq_no = '" . $activity_dtl_seq_no . "' and budget_code = '" . $tmp1[0] . "'");
            }
            //t($act_bud_dtl_arr); exit;
        }

        //update totalcost 
        $act_dtl_arru = array(
            'budgeted_cost' => $total_cost
        );
        $activity_dtl_seq_no1 = $this->activity_dtl_model->edit($act_dtl_arru, $activity_dtl_seq_no);


        echo $total_cost;
    }

    /**
     * [add_clients_targets description]
     * @param string $code [activity seq no]
     */
    function add_clients_targets($code = '', $seen = '') {

        $code = base64_decode($code);

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];

        $sql4 = "
            SELECT * 
            FROM `plma_activity` 
            WHERE `activity_seq_no` = '" . $code . "'
        ";
        $query4 = $this->db->query($sql4);
        $res4 = $query4->result_array(); //t($res4, 1);
        $this->data['this_activity'] = $res4[0];

        if ($role_code == 'FIRMADM') {

            $origin_att = $res4[0]['origin_attorney_seq_no']; /////origin attorney fetch

            $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pf.firm_admin_seq_no, pa.attorney_seq_no, pa.user_seq_no
                    FROM plma_attorney pa
                    LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                    WHERE pf.firm_admin_seq_no = '" . $admin_id . "' AND pa.attorney_seq_no = '" . $origin_att . "'";
        } elseif ($role_code == 'ATTR') {

            $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.user_seq_no
                FROM plma_attorney pa
                LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                WHERE pa.user_seq_no = '" . $admin_id . "'";
        }
        $query = $this->db->query($sql);
        $res = $query->result_array();
        $this->data['att_firm'] = $res;

        $sql2 = "SELECT * FROM plma_firm_sg WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY sg_type";
        $query2 = $this->db->query($sql2);
        $this->data['sg'] = $query2->result_array();

        $sql2 = "SELECT * FROM plma_firm_section WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY section_type";
        $query2 = $this->db->query($sql2);
        $this->data['section'] = $query2->result_array();
        $sql_3 = "SELECT pfa.*, pa.practice_area_seq_no, pa.practice_area_name "
                . "FROM plma_firm_pa as pfa "
                . "LEFT JOIN plma_practice_area as pa ON pfa.practice_area_seq_no = pa.practice_area_seq_no "
                . "WHERE pfa.firm_seq_no = '" . $firm_seq_no . "' AND pfa.status=1";
        $query_3 = $this->db->query($sql_3);
        $this->data['practice_area'] = $query_3->result_array();
        $this->data['activity_type'] = $this->data['codes']['Activity Type'];  //t($this->data['codes']['Activity Type']); exit;
        $this->data['activity_status'] = $this->data['codes']['Activity Status'];
//        $this->data['practice_area'] = $this->data['codes']['Practice Areas']; 
        $this->data['act_dtl_status'] = $this->data['codes']['Activity Dtl Status'];
        $this->data['act_budget_status'] = $this->data['codes']['Activity Budget Status'];
        $this->data['budget_dtl_status'] = $this->data['codes']['Activity Budget Dtl Status'];



        //act dtl fetch
        $sql111 = "SELECT pf.firm_name, pf.firm_admin_seq_no, pf.firm_seq_no, patt.attorney_first_name, patt.attorney_last_name, pad.*, pa.origin_attorney_seq_no
FROM plma_activity_dtl pad
LEFT JOIN plma_activity pa ON  pa.activity_seq_no = pad.activity_seq_no
LEFT JOIN plma_firm pf ON pf.firm_seq_no = pa.firm_seq_no
LEFT JOIN plma_attorney patt ON patt.attorney_seq_no = pad.attorney_seq_no
WHERE pa.firm_seq_no = '" . $res[0]['firm_seq_no'] . "' and pad.activity_seq_no = '" . $code . "'";
        $act_dtl_qry = $this->db->query($sql111);
        $act_dtl_res = $act_dtl_qry->result_array();

//        t($act_dtl_res); exit;
        $ind_bud_dtl = array();

        foreach ($act_dtl_res as $key => $value) {

            $name = $this->fetch_CT($value['relation_type'], $value['relation_seq_no']);
            //$act_dtl_res[$key]['ct_name'] = $name;
            $act_dtl_res[$key]['ct_name'] = $name;
            
            $c= $value['contact_seq_no']; 
            $t= $value['relation_type'];
            if($t == 'C'){
            $s= "select * from plma_client_contact where contact_seq_no='$c'";
            $qu= $this->db->query($s);
            $return= $qu->result_array();
            }
            elseif($t== 'T')
            {
            $s= "select * from plma_target_contact where contact_seq_no='$c'";
            $qu= $this->db->query($s);
            $return= $qu->result_array();
            }
            //t($return); exit();
            
            $act_dtl_res[$key]['con_name'] = $return[0]['first_name']." ".$return[0]['last_name'];
            
            $sql222 = "SELECT *
            FROM plma_act_bud_dtl pabd
            LEFT JOIN plma_activity_dtl pad ON  pabd.activity_dtl_seq_no = pad.activity_dtl_seq_no
            LEFT JOIN plma_activity pa ON pad.activity_seq_no = pa.activity_seq_no
            WHERE pa.firm_seq_no = '" . $res[0]['firm_seq_no'] . "' and pa.activity_seq_no = '" . $code . "' and pad.relation_seq_no = '" . $value['relation_seq_no'] . "' ";
            $qry222 = $this->db->query($sql222);
            //t($qry222->result_array()); exit;
            $narr = array();
            foreach ($qry222->result_array() as $key12 => $value12) {

                $narr[$value12['budget_code']] = $value12;
            }
            $ind_bud_dtl[] = $narr;
        }

//        echo "<pre>"; print_r($act_dtl_res); exit();
      //  t($act_dtl_res); exit;
        $this->data['ind_bud_dtl'] = $ind_bud_dtl;
        $this->data['act_dtl_res'] = $act_dtl_res;
        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/activity/addct_own', $this->data);
    }

    function add_ct_potential_rev() {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $activity_seq_no = $this->input->post('activity_seq_no');
        $potential_rev = $this->input->post('potential_rev');
        $relation_seq_no = $this->input->post('relation_seq_no');
        $contact_seq_no = $this->input->post('contact_seq_no');
        $relation_type = $this->input->post('relation_type');
        $origin_attorney_seq_no = $this->input->post('origin_attorney_seq_no');
        if($origin_attorney_seq_no){
//            echo 123; exit;
            
        } else{
//            echo 456; 
          $origin_attorney_seq_no = $this->data['attorney_seq_no'];  
//        exit;
        }
        $activity_dtl_status = $this->input->post('activity_dtl_status');

        // insert to activity details table
        $arr1 = array(
            'activity_seq_no' => $activity_seq_no,
            'attorney_seq_no' => $origin_attorney_seq_no,
            'relation_type' => $relation_type,
            'relation_seq_no' => $relation_seq_no,
            'contact_seq_no'=>$contact_seq_no,
            'budgeted_cost' => '0',
            'potential_revenue' => $potential_rev,
            'activity_dtl_status' => $activity_dtl_status,
            'created_by' => $admin_id,
            'created_date' => time()
        );
//        t($arr1); exit; 
        $insert_id1 = $this->activity_dtl_model->add($arr1);

        //  update potential rev in activity table;
        $sql2 = " update plma_activity set potential_revenue = potential_revenue + '" . $potential_rev . "' where activity_seq_no = '" . $activity_seq_no . "'";
        $res2 = $this->db->query($sql2);

        if ($insert_id1 && $res2) {
            echo json_encode(array('  msg' => 'ok'));
        }
    }

    function add_attorney_to_activity($code = '') {
//        echo 123; exit;
        $code = base64_decode($code);

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];

        $sql4 = "
            SELECT * 
            FROM `plma_activity` 
            WHERE `activity_seq_no` = '" . $code . "'
        ";
        $query4 = $this->db->query($sql4);
        $res4 = $query4->result_array(); //
//        t($res4, 1);
        $this->data['this_activity'] = $res4[0];

        if ($role_code == 'FIRMADM') {

            $origin_att = $res4[0]['origin_attorney_seq_no']; /////origin attorney fetch

            $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pf.firm_admin_seq_no, pa.attorney_seq_no, pa.user_seq_no
                    FROM plma_attorney pa
                    LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                    WHERE pf.firm_admin_seq_no = '" . $admin_id . "' AND pa.attorney_seq_no = '" . $origin_att . "'";
        } elseif ($role_code == 'ATTR') {
            $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.user_seq_no
                FROM plma_attorney pa
                LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                WHERE pa.user_seq_no = '" . $admin_id . "'";
        }
        $query = $this->db->query($sql);
        $res = $query->result_array(); //t($res); exit;
        $this->data['att_firm'] = $res;

        $sql2 = "SELECT * FROM plma_firm_sg WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY sg_type";
        $query2 = $this->db->query($sql2);
        $this->data['sg'] = $query2->result_array();

        $sql2 = "SELECT * FROM plma_firm_section WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY section_type";
        $query2 = $this->db->query($sql2);
        $this->data['section'] = $query2->result_array();

        $sql_3 = "SELECT pfa.*, pa.practice_area_seq_no, pa.practice_area_name "
                . "FROM plma_firm_pa as pfa "
                . "LEFT JOIN plma_practice_area as pa ON pfa.practice_area_seq_no = pa.practice_area_seq_no "
                . "WHERE pfa.firm_seq_no = '" . $firm_seq_no . "' AND pfa.status=1";
        $query_3 = $this->db->query($sql_3);
        $this->data['practice_area'] = $query_3->result_array();
        $this->data['activity_type'] = $this->data['codes']['Activity Type'];  //t($this->data['codes']['Activity Type']); exit;
        $this->data['activity_status'] = $this->data['codes']['Activity Status'];
//        $this->data['practice_area'] = $this->data['codes']['Practice Areas']; 
        $this->data['act_dtl_status'] = $this->data['codes']['Activity Dtl Status'];
        /* $this->data['act_budget_status'] = $this->data['codes']['Activity Budget Status'];
          $this->data['budget_dtl_status'] = $this->data['codes']['Activity Budget Dtl Status']; */


        $sql7 = "SELECT * FROM plma_attorney a WHERE a.firm_seq_no = '" . $res[0]['firm_seq_no'] . "' and a.attorney_seq_no not in (select b.attorney_seq_no from plma_act_attorney b where b.activity_seq_no = '" . $code . "') and a.attorney_seq_no <> (select c.origin_attorney_seq_no from plma_activity c where c.activity_seq_no = '" . $code . "')";
        $qry7 = $this->db->query($sql7);
        $res7 = $qry7->result_array();
        $this->data['all_attr'] = $res7;

        /**
         * Fetch invitee
         */
        $squl = "SELECT 
    pa.attorney_seq_no, 
    pa.attorney_first_name,
    pa.attorney_last_name,
    paa.activity_seq_no
    
FROM 
    plma_act_attorney paa 
    LEFT JOIN plma_attorney pa ON pa.attorney_seq_no = paa.attorney_seq_no
   
WHERE    
    paa.activity_seq_no =  '" . $code . "'
    ";
        $qury = $this->db->query($squl);
        $rslt = $qury->result_array();
        foreach ($rslt as $key => $value) {
            $sql_bud = "select COALESCE(sum(pad.budgeted_cost), 0) budgeted_cost, COALESCE(sum(pad.potential_revenue),0) potential_revenue from plma_activity_dtl pad where pad.activity_seq_no = '" . $value['activity_seq_no'] . "' and pad.attorney_seq_no = '" . $value['attorney_seq_no'] . "'

 and pad.attorney_seq_no <> ( select pat.origin_attorney_seq_no from plma_activity pat where 
pat.activity_seq_no =  '" . $code . "' ) GROUP BY
    pad.activity_seq_no,
    pad.attorney_seq_no";
            $qry_bud = $this->db->query($sql_bud);
            $res_bud = $qry_bud->result_array();
//            echo $this->db->last_query();
            $rslt[$key]['budgeted_cost'] = ($res_bud[0]['budgeted_cost'] != '') ? $res_bud[0]['budgeted_cost'] : 0;
            $rslt[$key]['potential_revenue'] = ($res_bud[0]['potential_revenue'] != '') ? $res_bud[0]['potential_revenue'] : 0;
        }
        
//        t($rslt); exit;
        $this->data['invitee_budget_sum_up'] = $rslt;




        //t($act_dtl_res); exit;
        //t($ind_bud_dtl); exit;
        $this->data['ind_bud_dtl'] = $ind_bud_dtl;
        $this->data['act_dtl_res'] = $act_dtl_res;
        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/activity/add_attorney', $this->data);
    }

    function add_att_act() {
//        echo 123; 
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];

        $activity_seq_no = $this->input->post('activity_seq_no');
        $attorney_seq_no = $this->input->post('attorney_seq_no');
//        t($attorney_seq_no);
//        $firm_seq_no = $this->input->post('firm_seq_no');
        $remarks_notes = $this->input->post('remarks_notes');
        foreach ($attorney_seq_no as $key => $value) {
//           echo 456;
            $arr1 = array(
                'activity_seq_no' => $activity_seq_no,
                'attorney_seq_no' => $value,
                'seen' => 0,
                'remarks_notes' => $remarks_notes,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//           echo 789;
//         t($arr1);   
            $insert_id1 = $this->act_attorney_model->add($arr1);
//        echo $this->db->last_query(); exit;
        }
        if ($insert_id1) {
            echo json_encode(array('msg' => 'added'));
        }
    }

    function all_activity_invitation() {

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $sql1 = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.user_seq_no
            FROM plma_attorney pa
            LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
            WHERE pa.user_seq_no = '" . $admin_id . "'";
        $query1 = $this->db->query($sql1);
        $res1 = $query1->result_array();

        $sql = "SELECT pact_attr.*, pact.*, pf.firm_name, pc1.short_description practice_area, pc2.short_description act_status, pc3.short_description act_type,  fsg.sg_name gsname,fs.section_name sname, pattr.attorney_first_name, pattr.attorney_last_name
                FROM plma_act_attorney pact_attr
                LEFT JOIN plma_activity pact ON pact.activity_seq_no = pact_attr.activity_seq_no
                LEFT JOIN plma_attorney pattr ON pattr.attorney_seq_no = pact.origin_attorney_seq_no
                LEFT JOIN plma_firm pf ON pf.firm_seq_no = pact.firm_seq_no
                LEFT JOIN plma_codes pc1 ON pc1.code = pact.practice_area_type
                LEFT JOIN plma_codes pc2 ON pc2.code = pact.activity_status
                LEFT JOIN plma_codes pc3 ON pc3.code = pact.activity_type
                LEFT JOIN plma_firm_sg fsg ON fsg.firm_sg_seq_no = pact.firm_sg_seq_no
                    LEFT JOIN plma_firm_section fs ON fs.firm_section_seq_no = pact.firm_section_seq_no
                WHERE 1
                AND pact_attr.attorney_seq_no = (select ab.attorney_seq_no from plma_attorney ab where ab.user_seq_no = '" . $admin_id . "')"; // AND pact.firm_seq_no = '".$res1[0]['firm_seq_no']."'
        // AND pact.origin_attorney_seq_no = '".$res1[0]['attorney_seq_no']."'
        $query = $this->db->query($sql);
        $res = $query->result_array(); //t($res); exit;

        $this->data['all_activity'] = $res;
        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/activity/invitation', $this->data);
    }

    function add_own_clients_targets($code = '', $seen = '') {

        $code = base64_decode($code);

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];

        /**
         * make read the notification
         */
        if ($seen != '') {
            $res_1 = $this->act_attorney_model->fetch(" and activity_seq_no = '" . $code . "' and attorney_seq_no = (select tmp_.attorney_seq_no from plma_attorney tmp_ where tmp_.user_seq_no = '" . $admin_id . "')");
            $res_1 = $res_1[0];

            if ($res_1['seen'] == 0) {
                $arr1 = array(
                    'seen' => 1,
                    'updated_by' => $admin_id,
                    'updated_date' => time()
                );
                $insert_id1 = $this->act_attorney_model->edit_cond($arr1, " activity_seq_no = '" . $code . "' and attorney_seq_no = (select tmp_.attorney_seq_no from plma_attorney tmp_ where tmp_.user_seq_no = '" . $admin_id . "')");
                //echo $this->db->last_query(); exit;
            }
        }

        //attorney seq no
        $ss = "select ab.attorney_seq_no from plma_attorney ab where ab.user_seq_no = '" . $admin_id . "'";
        $sqr = $this->db->query($ss);
        $rss = $sqr->result_array();

        $this->data['thisattr'] = $rss[0]['attorney_seq_no'];

        $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.user_seq_no
                    FROM plma_attorney pa
                    LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                    LEFT JOIN plma_activity pact ON pa.attorney_seq_no = pact.origin_attorney_seq_no
                    WHERE pact.activity_seq_no = '" . $code . "'";
        $query = $this->db->query($sql);
        $res = $query->result_array(); //t($res); exit;

        $this->data['att_firm'] = $res;

        $sql2 = "SELECT * FROM plma_firm_sg WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY sg_type";
        $query2 = $this->db->query($sql2);
        $this->data['sg'] = $query2->result_array();

        $sql2 = "SELECT * FROM plma_firm_section WHERE firm_seq_no = '" . $res[0]['firm_seq_no'] . "' ORDER BY section_type";
        $query2 = $this->db->query($sql2);
        $this->data['section'] = $query2->result_array();

        $sql_3 = "SELECT pfa.*, pa.practice_area_seq_no, pa.practice_area_name "
                . "FROM plma_firm_pa as pfa "
                . "LEFT JOIN plma_practice_area as pa ON pfa.practice_area_seq_no = pa.practice_area_seq_no "
                . "WHERE pfa.firm_seq_no = '" . $firm_seq_no . "' AND pfa.status=1";
        $query_3 = $this->db->query($sql_3);
        $this->data['practice_area'] = $query_3->result_array();

        $this->data['activity_type'] = $this->data['codes']['Activity Type'];  //t($this->data['codes']['Activity Type']); exit;
        $this->data['activity_status'] = $this->data['codes']['Activity Status'];
//         $this->data['practice_area'] = $this->data['codes']['Practice Areas']; 
        $this->data['act_dtl_status'] = $this->data['codes']['Activity Dtl Status'];
        /* $this->data['act_budget_status'] = $this->data['codes']['Activity Budget Status'];
          $this->data['budget_dtl_status'] = $this->data['codes']['Activity Budget Dtl Status']; */

        $sql4 = "
                SELECT *, (SELECT sum(`potential_revenue`) FROM plma_activity_dtl WHERE `activity_seq_no` = '" . $code . "' and `attorney_seq_no` = (select IFNULL(ab.attorney_seq_no, 0) from plma_attorney ab where ab.user_seq_no = '" . $admin_id . "') ) prev
                FROM `plma_activity` 
                WHERE `activity_seq_no` = '" . $code . "'
            ";
        $query4 = $this->db->query($sql4);
        $res4 = $query4->result_array(); //t($res4, 1);
        $this->data['this_activity'] = $res4[0];

        //act dtl fetch
        $sql111 = "SELECT pf.firm_name, pf.firm_admin_seq_no, pf.firm_seq_no, patt.attorney_first_name, patt.attorney_last_name, pad.*
    FROM plma_activity_dtl pad
    LEFT JOIN plma_activity pa ON  pa.activity_seq_no = pad.activity_seq_no
    LEFT JOIN plma_firm pf ON pf.firm_seq_no = pa.firm_seq_no
    LEFT JOIN plma_attorney patt ON patt.attorney_seq_no = (select ab.attorney_seq_no from plma_attorney ab where ab.user_seq_no = '" . $admin_id . "')
    WHERE pa.firm_seq_no = '" . $res[0]['firm_seq_no'] . "' and pad.activity_seq_no = '" . $code . "' and pad.attorney_seq_no = (select ab.attorney_seq_no from plma_attorney ab where ab.user_seq_no = '" . $admin_id . "')";
        $act_dtl_qry = $this->db->query($sql111);
        $act_dtl_res = $act_dtl_qry->result_array();
        
        $ind_bud_dtl = array();
        foreach ($act_dtl_res as $key => $value) {
            $name = $this->fetch_CT($value['relation_type'], $value['relation_seq_no']);
//             t($name); exit;
            $act_dtl_res[$key]['ct_name'] = $name;

            $sql222 = "SELECT *
                FROM plma_act_bud_dtl pabd
                LEFT JOIN plma_activity_dtl pad ON  pabd.activity_dtl_seq_no = pad.activity_dtl_seq_no
                LEFT JOIN plma_activity pa ON pad.activity_seq_no = pa.activity_seq_no
                WHERE pa.firm_seq_no = '" . $res[0]['firm_seq_no'] . "' and pa.activity_seq_no = '" . $code . "' and pad.relation_seq_no = '" . $value['relation_seq_no'] . "' ";
            $qry222 = $this->db->query($sql222);

            $narr = array();
            foreach ($qry222->result_array() as $key12 => $value12) {

                $narr[$value12['budget_code']] = $value12;
            }
            $ind_bud_dtl[] = $narr;
        }

        //t($act_dtl_res); exit;
        //
        //t($ind_bud_dtl); exit;
        $this->data['ind_bud_dtl'] = $ind_bud_dtl;
        $this->data['act_dtl_res'] = $act_dtl_res;
//        t($this->data['act_dtl_res']);
//        t($this->data['ind_bud_dtl']);
//        exit;
        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/activity/addct_own', $this->data);
    }

    function approve_request($code = '') {
        $code = base64_decode($code);

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        /*
          get the firm seq no
         */
        $res0 = $this->activity_model->fetch(" and activity_seq_no = '" . $code . "'", "firm_seq_no");

        //fetch the first approver in the user list
        $sql1 = "select min(a.user_seq_no) user_sn from plma_user a, plma_attorney b where b.user_seq_no = a.user_seq_no and b.firm_seq_no = '" . $res0[0]['firm_seq_no'] . "' and a.approver = 1  ";
        $qry1 = $this->db->query($sql1);
        $res1 = $qry1->result_array();
        ///t($res1[0]); exit;

        /*
          set processing as status for the activity
         */
        //t($this->data['codes']['Approvers']); exit;
        $arr = array(
            'activity_seq_no' => $code,
            'firm_seq_no' => $res0[0]['firm_seq_no'],
            'user_seq_no' => $res1[0]['user_sn'],
            'approver_type' => $this->data['codes']['Approvers'][3]['code'], // 'SECHEAD'
            'approval_date' => date('d-M-Y'),
            'approval_status' => $this->data['codes']['Approval Status'][0]['code'], //APPRUR
            'remarks_notes' => 'Sending for approval',
            'created_by' => $admin_id,
            'created_date' => time()
        );

        //t($arr); exit;

        $res2 = $this->activity_approvals_model->add($arr); //echo $this->db->last_query() ; exit;

        $arr1 = array(
            'activity_status' => $this->data['codes']['Activity Status'][1]['code'] //PENDACT
        );

        $res3 = $this->activity_model->edit($arr1, $code);

        redirect($base_url . 'activity');
    }
    
    function get_activity()
    {   
        $admin_id = $this->data['admin_id'];
        $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.user_seq_no
                    FROM plma_attorney pa
                    LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                    WHERE pa.user_seq_no = '" . $admin_id . "'";
            $query = $this->db->query($sql);
            //echo $sql;
            $res = $query->result_array();
            $this->data['att_firm'] = $res;
            //t($this->data['att_firm']);
//            
            $att_firm=$res;
            $firm = $att_firm[0]['firm_seq_no'];
        //echo $firm; 
           $sql1="select activity_goal as name from plma_activity where firm_seq_no=$firm"; 
           $qu= $this->db->query($sql1);
           $resu= $qu->result_array();
           $this->data['results']['results'] = $resu; 
          
           //t($this->data['activity_goal']);
           
            echo json_encode($this->data['results']);
        
     
    }
    
    function fetch_contact($relation_id, $type)
	{
		 $relation_id = $this->input->post('id');
                 $type = $this->input->post('type');
                 if($type== 'C'){
		 $sql1="select * from plma_client_contact where client_seq_no=$relation_id"; 
                 $qu= $this->db->query($sql1);
                 $return= $qu->result_array();
                 }
                 elseif($type== 'T'){
                 $sql1="select * from plma_target_contact where target_seq_no=$relation_id"; 
                 $qu= $this->db->query($sql1);
                 $return= $qu->result_array();  
                 }
		//$cond = "client_seq_no = '".$relation_id."'";
		//$return = $this->client_contact_model->fetch('',$cond);
                //echo $this->db->last_query(); 
                //t($return);
               // exit;
		$opt = '<option value="">Contact Name</option>';
		foreach ($return as $key => $value) {
			$opt .= '<option value="'.$value['contact_seq_no'].'">'.$value['first_name']." ".$value['last_name'].'</option>';
		}
		echo json_encode($opt);
	}

        
        
    function details($target_seq_no = ''){
        $admin_id = $this->data['admin_id'];
//        $firm_seq_no = $this->data['firm_seq_no'];
        $company_session = $this->session->userdata('admin_session_data');
        $firm_seq_no = $company_session['firm_seq_no'];
        
        $cond123 = " AND user_seq_no=$admin_id AND status='1'";
        $fetch_admin_name = $this->user_model->fetch($cond123);
        
        $fetch_admin_first_name = $fetch_admin_name[0]['user_first_name'];
        $fetch_admin_last_name = $fetch_admin_name[0]['user_last_name'];
        
        $this->data['call_user_admin_name'] = $fetch_admin_first_name. ' '.$fetch_admin_last_name; 
        
        $target_seq_no = base64_decode($target_seq_no);
        
        $this->data['target_seq_nos']=$target_seq_no;
        $this->data['company_ids']=$firm_seq_no;

        $cond = " AND admin_id='$admin_id' AND target_seq_no='$target_seq_no' AND status='Active'";
        $fetch_contact_details = $this->Module6_Model->fetch($cond);
        $contact_id = $fetch_contact_details[0]['id'];
        $this->data['fetch_contact_details'] = $fetch_contact_details;
        
        $user_name = explode(' ', $fetch_contact_details[0]['name']);
        $this->data['user_1st_name'] = $user_name[0];
        $this->data['user_last_name'] = $user_name[1];

        $fetch_cond = " AND module_name='module6' AND firm_seq_no='".$firm_seq_no."' AND status=1";
        $module_details = $this->sms_add_model->fetch($fetch_cond);
        $this->data['module_details']= $module_details;
        
        $user_phone = explode("-", $fetch_contact_details[0]['phone']);
        $this->data['country_code'] = $user_phone[0];
        $this->data['home_phone_number'] = $user_phone[1];
        
        $cond1 = " AND target_seq_no='$target_seq_no'";
        $select1 = "target_image, lead_source_and_date";
        $fetch_image_from_targets_table = $this->targets_model->fetch($cond1,$select1);
        $contact_image = $fetch_image_from_targets_table[0]['target_image'];
        $this->data['lead_source'] = $fetch_image_from_targets_table[0]['lead_source_and_date'];
        $this->data['contact_image'] = $contact_image;
        
        
        $condnote = " AND  target_seq_no ='".$target_seq_no."' and admin_id='".$admin_id."' and status!='Inactive' order by id DESC";
        $note=$this->Allnote_Model->fetch($condnote);
        $this->data['viewallnotes']=$note;
        
        
        //for previous & next
        $iddd= "Select id from `plma_module6` WHERE id='$contact_id' and firm_seq_no='$firm_seq_no' and status='Active' order by id";
        $quu= $this->db->query($iddd);
        $arrr= $quu->result_array();

        $prev_id=$arrr[0]['id']-1;
        $iddd_prev = "select max(target_seq_no) as target_seq_no from plma_module6 where target_seq_no < $target_seq_no AND firm_seq_no=$firm_seq_no and status='Active'";
        $quu_prev= $this->db->query($iddd_prev);
        $arrr_prev= $quu_prev->result_array();

        $next_id=$arrr[0]['id']+1;
        $iddd_next= "select min(target_seq_no) as target_seq_no from plma_module6 where target_seq_no > $target_seq_no AND firm_seq_no=$firm_seq_no and status='Active'";        
        $quu_next= $this->db->query($iddd_next);
        $arrr_next= $quu_next->result_array();

        $this->data['next_target_seq_no'] = $arrr_next[0]['target_seq_no'];
        $this->data['prev_target_seq_no'] = $arrr_prev[0]['target_seq_no'];
        //end
        
        
        $cond_module = "AND module_name = 'module6'";
        $fetch_module_details = $this->module_setting_model->fetch($cond_module);
        $this->data['fetch_module_details'] =  $fetch_module_details;

        //-------------primary contact details---------------//
        $cond123 = " AND firm_seq_no='$firm_seq_no' AND target_seq_no='$target_seq_no'";
        $fetch_add_contact_details = $this->add_contact_model->fetch($cond123);
        //echo $this->db->last_query();die;
        $this->data['fetch_add_contact_details'] = $fetch_add_contact_details[0];

        $primary_contact_phone = $fetch_add_contact_details[0]['phone'];
        //--------end------------//
        
        $cond = " AND form_model='module6' AND form_id=$admin_id AND to_id=$target_seq_no";
        $fetch_sms_details = $this->send_sms_model->fetch($cond);
        $this->data['sms_content'] = $fetch_sms_details;
        
        
        //code for fetching note
        $row = $this->change_module_number_module->fetch();
        $this->data['notes'] = $row;
        
        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/activity/detils_page', $this->data);
        
    }
    
    function add_allnotes(){
        $admin_id = $this->data['admin_id'];

        $data=$this->input->post("note");
        $target_seq_no=$this->input->post("target_seq_no");
        $status = $this->input->post("status");
//        $date=date('Y-m-d');
        $date = time();
        $getdata=array('user_seq_no'=>$admin_id,'admin_id'=>$admin_id,'target_seq_no'=>$target_seq_no,'content'=>$data,'status'=>$status,'added_date'=>$date,'module'=>$module_no);
        $res=$this->db->insert('plma_all_notes',$getdata);
        
        if(count($res) > 0){
            echo 1;
            exit;
        }
    }
    
    function do_not_call_again(){
        $admin_id = $this->data['admin_id'];
        
        $user_company_id = $this->input->post('user_company_id');
        $target_seq_no = $this->input->post('target_seq_no');
        $do_not_call_note = $this->input->post('note');
        
        if(!empty($target_seq_no)){
            $cond = " AND admin_id=$admin_id AND target_seq_no=$target_seq_no and firm_seq_no=$user_company_id";
            $fetch_module_two_user = $this->Module6_Model->fetch($cond);            
            $id = $fetch_module_two_user[0]['id'];
            
            $data_field = array(
                'status' => 2
            );
            $edit = $this->Module6_Model->edit($data_field,$id);
            
            $data = array(
                'status' => 3
            );
            $edit1 = $this->targets_model->edit($data,$target_seq_no);
            
            if(count($edit) > 0){
                $data_field = array(
                    'user_seq_no'=>$admin_id,
                    'admin_id'=> $admin_id,
                    'target_seq_no'=> $target_seq_no,
                    'content'=> $do_not_call_note,
                    'status'=> 'Inactive',
                    'added_date'=>time()
                );
                $add_do_not_call_notes = $this->db->insert('plma_all_notes',$data_field);
                if(count($add_do_not_call_notes) > 0){
                    echo 1;
                    exit;
                }
            }
        }
    }
    
    function goods_services_delivered(){
        $admin_id = $this->data['admin_id'];

        $product_purchased_date = $this->input->post('product_purchased_date'); 
        $services_delivered1 = $this->input->post('services_delivered1');
        $product_purchased_notes = $this->input->post('product_purchased_notes'); 
        $target_seq_no = $this->input->post('target_seq_no');
        $user_company_id = $this->input->post('user_company_id');
        
        if($services_delivered1== 2 ){
            
            if(!empty($product_purchased_notes)){
                $data_field = array(
                    'user_seq_no'=>$admin_id,
                    'admin_id'=> $admin_id,
                    'target_seq_no'=> $target_seq_no,
                    'content'=> $product_purchased_notes,
                    'status'=> 'Active',
                    'added_date'=>time()
                );
                $add_appiontment_notes = $this->db->insert('plma_all_notes',$data_field);
            }
            
            echo 2;
            exit;
        }

        if($services_delivered1==1){
            $cond = " AND target_seq_no=$target_seq_no AND firm_seq_no=$user_company_id AND status='Active'";
            $fetch_user_details = $this->Module6_Model->fetch($cond);
            $name = explode(" ", $fetch_user_details[0]['name']);
            $fetch_user_id = $fetch_user_details[0]['id'];

            $data = array(
                'admin_id' => $admin_id,
                'target_seq_no' => $target_seq_no,
                'firm_seq_no' => $user_company_id,
                'target_first_name' => $name[0],
                'target_last_name' => $name[1],
                'address' => $fetch_user_details[0]['address'],
                'email_target_id' => $fetch_user_details[0]['email'],
                'home_phone' => $fetch_user_details[0]['phone'],
                'mobile' => $fetch_user_details[0]['mobile'],
                'company_name' => $fetch_user_details[0]['company_name'],
                'categories' => $fetch_user_details[0]['categories'],
//                'client_product_purchased' => $product_purchase,
                'type' => $fetch_user_details[0]['type'],
//                'purchased_date' => $product_purchased_date,
                'status' => 'Active',
                'updated_date' => time(),
                'created_date' => time()

            );
//            t($data);die();
            $add = $this->Module7_Model->add($data);
            //echo $this->db->last_query();die;
            if(!empty($product_purchased_notes)){
                $data_field = array(
                    'user_seq_no'=>$admin_id,
                    'admin_id'=> $admin_id,
                    'target_seq_no'=> $target_seq_no,
                    'content'=> $product_purchased_notes,
                    'status'=> 'Active',
                    'added_date'=>time()
                );
                $add_appiontment_notes = $this->db->insert('plma_all_notes',$data_field);
            }

            $data12 = array(
                'status' => 'Inactive'
            );
            $edit = $this->Module6_Model->edit($data12,$fetch_user_id);

            if($edit){
                echo 1;
            }
        }
    }






    //----------------------- edit_details for module6-----------------------//
   function edit_details()
    {
       //$admin_id = $this->data['admin_id'];
       $first_name=$this->input->post("first_name");
       $last_name=$this->input->post("last_name");
       $email=$this->input->post("email");
       $country_code1=$this->input->post("country_code1");
       $mobile=$this->input->post("mobile");
       $address1=$this->input->post("address1");
       $seq_no=$this->input->post("seq_no");
       $target_company_name=$this->input->post("target_company_name");
       $industry_type=$this->input->post("industry_type");
       $phione = $this->input->post("phione");
       $target_seq_no = $this->input->post("target_seq_no");

       $data=array('name'=>$first_name." ".$last_name,'email'=>$email,'phone'=>$country_code1.'-'.$phione , 'mobile' => $mobile,'address'=>$address1,'company_name'=>$target_company_name, 'categories'=>$industry_type);
       //t($data);die;
       $res=$this->Module6_Model->edit($data,$seq_no);
       //echo $this->db->last_query();die;


       $target_data=array('target_first_name'=>$first_name,'target_last_name'=>$last_name,'email'=>$email,'phone'=>$country_code1.'-'.$phione , 'mobile' => $mobile,'address'=>$address1,'company'=>$target_company_name, 'categories'=>$industry_type);
       $target_res=$this->targets_model->edit($target_data,$target_seq_no);
       if($res && $target_res)
       {
         echo "1";
       }
    }
    function temp_email($id= '', $company_id= ' ')
    {
        $target_seq_no=base64_decode($id);
        $firm_seq_no=base64_decode($company_id);
        //echo $target_seq_no.'#'.$firm_seq_no;die();
        $admin_id = $this->data['admin_id'];

       $cond = "AND created_by=$firm_seq_no";
       $user_login_template = $this->emailtemplate_model->fetch($cond);
       
       $this->data['user_login_template'] = $user_login_template;
       $this->data['aid'] = $admin_id;
       //print_r($user_login_template);die();

       $contact_id = base64_decode($id);
       $company_id = base64_decode($company_id);
       //echo $contact_id.'#'.$company_id;die();
       $cond = " and firm_seq_no='{$firm_seq_no}' AND target_seq_no=$target_seq_no";
       $a=$this->targets_model->fetch($cond);
       $this->data['fetch_details']=$this->targets_model->fetch($cond);
       //echo $contact_id;die();
         /*echo "<pre>";
       print_r($a);
       echo "</pre>";die();*/
       $this->data['contact_id'] = $contact_id;
       $this->data['firm_seq_no'] = $this->data['fetch_details'][0]['firm_seq_no'];
       $this->data['target_seq_no']=$target_seq_no;

       $this->db->select('*')->from('plma_document');
       $row=$this->db->get()->result_array();
       $this->data['document']=$row;

       $this->get_include();
       $this->load->view($this->view_dir . 'app_transaction/activity/send_message_module6', $this->data);


    }
    function get_email_template()
    {
        $firm_seq_no=$this->data['firm_seq_no'];
        $this->db->select('*')->from('plma_signature')->where('firm_seq_no="'.$firm_seq_no.'"');
        $template_details = $this->db->get();
        echo json_encode($template_details->result_array());
    }
    function temp_sendmail() {
       $admin_session_data = $this->session->userdata('admin_session_data');
       $admin_id = $admin_session_data['admin_id'];
       $firm_seq_no = $admin_session_data['firm_seq_no'];
       $email = $this->input->post('email');
       $subject = $this->input->post('sub');
       $message_text = $this->input->post('msg');
      
       $target_seq_no=$this->input->post('target_seq_no');
       $attach_array = $this->input->post('attach_array');
       //$appt_seq_no=$this->data['appt_seq_no'];
       
       //$this->db->select('*')->from('plma_module2')->where('target_seq_no="'.$target_seq_no.'"');
      // $module2_view = $this->db->get()->result_array();
       
       
       $this->db->select('*')->from('plma_target')->where('target_seq_no="'.$target_seq_no.'"');
       $target_details = $this->db->get()->result_array();
        
       $cond = "AND user_seq_no=$admin_id";
       $user_login_details = $this->user_model->fetch($cond);

       $this->db->select('*')->from('plma_target')->where('email="'.$email.'"');
       $target_details = $this->db->get()->result_array();

        $cond123 = " AND firm_seq_no='$firm_seq_no'";
        $fetch_signature_details = $this->signature_model->fetch($cond123);

      $message_text = str_ireplace('$name', ucwords($target_details[0]['target_first_name']." ".$target_details[0]['target_last_name']), $message_text);
       $message_text = str_ireplace('$address', $target_details[0]['address'], $message_text);
       $message_text = str_ireplace('$phone', $target_details[0]['phone'], $message_text);
       $message_text = str_ireplace('$email', $target_details[0]['email'], $message_text);
       $message_text = str_ireplace('$company', $target_details[0]['company'], $message_text);
       $message_text = str_ireplace('$categories', $target_details[0]['categories'], $message_text);

       $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'sitemail.isqweb.it',
            'smtp_port' => 587,
            'smtp_user' => 'digital1crm@isqweb.com',
            'smtp_pass' => 'grT54rDDy6k',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        
       $this->load->library('email');
       $this->email->from($user_login_details[0]['user_id'], $user_login_details[0]['user_first_name']." ".$user_login_details[0]['user_last_name']);
        $this->email->to($email);
        $this->email->set_mailtype("html");
        $this->email->subject($subject);
        $msg="<html><body>".$message_text."<br>".$this->input->post('signature_content')."</body></html>";
        $this->email->message($msg);
        
        if(count($attach_array) > 0){
            for($i=0;$i<count($attach_array);$i++){
                $file_name = trim($attach_array[$i]);
                $this->email->attach("./assets/upload/attachments/$file_name");
            }
            
        }  
        $this->email->send();
        /*$last_id = $this->db->query( 'CALL UpdateModule2(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', array(
            $admin_id,
            $firm_seq_no,
            $message_text,
            $target_details[0]['target_seq_no'],
            $target_details[0]['target_first_name'],
            $target_details[0]['target_last_name'],
            $target_details[0]['email'],
            $target_details[0]['company_id'],
            $target_details[0]['phone'],
            $target_details[0]['mobile'],
            $target_details[0]['address'],
            $target_details[0]['company'],
            $target_details[0]['categories'],
            $target_details[0]['type'],
            time()
        ));*/
       
           $note_arry=array('user_seq_no'=>$admin_id,'target_seq_no'=>$target_seq_no,'admin_id'=>$admin_id,'content'=>$message_text,'status'=>'Active','added_date'=>time(),'modified_date'=>time(),'module'=>'module2');
           $note_data=$this->Allnote_Model->add($note_arry);
           
        if($note_data) {
            echo "1";
        }
        else {
            echo "0";
        }
            
    }
    //----------------end-------------------//


}