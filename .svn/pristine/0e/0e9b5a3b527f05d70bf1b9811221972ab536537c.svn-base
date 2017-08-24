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
        //t($this->data['codes']['Activity Status']) ; exit;
        //echo $this->code_desc('PENDACT'); exit;
    }

    function index() {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        if ($role_code == 'SITEADM') {
            $sql = "SELECT pact.*, pf.firm_name, "
//                    . "pc1.short_description practice_area, pc2.short_description act_status, pc3.short_description act_type, "
                    . "fsg.sg_name gsname,fs.section_name sname, patt.attorney_first_name, patt.attorney_last_name "
                    . "FROM plma_activity pact "
                    . "LEFT JOIN plma_attorney patt ON patt.attorney_seq_no = pact.origin_attorney_seq_no "
                    . "LEFT JOIN plma_firm pf ON pf.firm_seq_no = pact.firm_seq_no "
//                    . "LEFT JOIN plma_codes pc1 ON pc1.code = pact.practice_area_type "
//                    . "LEFT JOIN plma_codes pc2 ON pc2.code = pact.activity_status "
//                    . "LEFT JOIN plma_codes pc3 ON pc3.code = pact.activity_type "
                    . "LEFT JOIN plma_firm_sg fsg ON fsg.firm_sg_seq_no = pact.firm_sg_seq_no "
                    . "LEFT JOIN plma_firm_section fs ON fs.firm_section_seq_no = pact.firm_section_seq_no "
                    . "WHERE 1 AND ORDER BY pact.firm_seq_no";
            $query = $this->db->query($sql);
            $res = $query->result_array();
        } else if ($role_code == 'FIRMADM') {
            //firm admin
            $sql1 = "SELECT pf.firm_seq_no
                FROM plma_firm pf
                WHERE pf.firm_admin_seq_no = '" . $admin_id . "' ";
            $query1 = $this->db->query($sql1);
            $res1 = $query1->result_array();

            $sql = "SELECT pact.*, pf.firm_name, "
//                    . "pc1.short_description practice_area, "
//                    ."pc2.short_description act_status, pc3.short_description act_type, "
                    ."fsg.sg_name gsname,fs.section_name sname, pattr.attorney_first_name, "
                    ."pattr.attorney_last_name
                    FROM plma_activity pact
                    LEFT JOIN plma_attorney pattr ON pattr.attorney_seq_no = pact.origin_attorney_seq_no
                    LEFT JOIN plma_firm pf ON pf.firm_seq_no = pact.firm_seq_no "
//                   ."LEFT JOIN plma_codes pc1 ON pc1.code = pact.practice_area_type "
//                   ."LEFT JOIN plma_codes pc2 ON pc2.code = pact.activity_status "
//                   ."LEFT JOIN plma_codes pc3 ON pc3.code = pact.activity_type "
                   ."LEFT JOIN plma_firm_sg fsg ON fsg.firm_sg_seq_no = pact.firm_sg_seq_no
                    LEFT JOIN plma_firm_section fs ON fs.firm_section_seq_no = pact.firm_section_seq_no
                    WHERE pact.firm_seq_no = '" . $res1[0]['firm_seq_no'] . "'
                    ORDER BY pact.firm_seq_no";
            $query = $this->db->query($sql);
            $res = $query->result_array();
        } else if ($role_code == 'ATTR') {
            $sql1 = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pa.attorney_seq_no, pa.user_seq_no
                FROM plma_attorney pa
                LEFT JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                WHERE pa.user_seq_no = '" . $admin_id . "'";
            $query1 = $this->db->query($sql1);
            $res1 = $query1->result_array();

            $sql = "SELECT pact.*, pf.firm_name, pact.practice_area_type, pact.activity_status, pact.activity_type,  fsg.sg_name gsname,fs.section_name sname, pattr.attorney_first_name, pattr.attorney_last_name, pact.firm_seq_no "
                    . "FROM plma_activity pact LEFT JOIN plma_attorney pattr ON pattr.attorney_seq_no = pact.origin_attorney_seq_no "
                    . "LEFT JOIN plma_firm pf ON pf.firm_seq_no = pact.firm_seq_no "
                    . "LEFT JOIN plma_firm_sg fsg ON fsg.firm_sg_seq_no = pact.firm_sg_seq_no "
                    . "LEFT JOIN plma_firm_section fs ON fs.firm_section_seq_no = pact.firm_section_seq_no "
                    . "WHERE pact.firm_seq_no = '" . $res1[0]['firm_seq_no'] . "' "
                    . "AND pact.origin_attorney_seq_no = '" . $res1[0]['attorney_seq_no'] . "' ORDER BY pact.firm_seq_no";  //exit;
            $query = $this->db->query($sql);
            $res = $query->result_array();
        }

        $this->data['all_activity'] = $res; //t($res); exit;
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

            $activity_arr = array(
                'firm_seq_no' => $firm_seq_no,
                'activity_name' => $activity_name,
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
//            t($activity_arr); 
            $insert_id = $this->activity_model->add($activity_arr);


            if ($insert_id) {
                //add activity dtl
                if ($activity_type == 'INDIVIDUAL') {

                    $relation_type = $this->input->post('relation_type');
                    $relation_seq_no = $this->input->post('relation_seq_no');
                    $activity_dtl_status = $this->input->post('activity_dtl_status');

                    $budget = $this->session->userdata('budgets');
//                    t($budget); exit;
                    //act_dtl - individual cost
                    $act_dtl_arr = array(
                        'activity_seq_no' => $insert_id,
                        'attorney_seq_no' => $origin_attorney_seq_no,
                        'relation_type' => $relation_type,
                        'relation_seq_no' => $relation_seq_no,
                        'budgeted_cost' => '0.00',
                        'potential_revenue' => $potential_revenue,
                        'activity_dtl_status' => $activity_dtl_status,
                        'remarks_notes' => $remarks_notes,
                        'created_by' => $admin_id,
                        'created_date' => time()
                    );
//                    t($act_dtl_arr); exit;
                    $activity_dtl_seq_no = $this->activity_dtl_model->add($act_dtl_arr);
                    //$act_budget_status = $this->input->post('act_budget_status');
                    //act_bud - total cost
                    /* $act_budget_arr = array(
                      'activity_dtl_seq_no' => $activity_dtl_seq_no,
                      'budgeted_cost' => '0.00',
                      'act_budget_status' => $act_budget_status,
                      'remarks_notes' => $remarks_notes,
                      'created_by' => $admin_id,
                      'created_date' => time()
                      );

                      $act_budget_seq_no = $this->activity_budget_model->add($act_budget_arr); */
                    $budget_dtl_status = $this->input->post('budget_dtl_status');

                    //act_budget_dtl - individual all cost together
//                    t($budget);
                    $hr_bud = array();
                    $i = 0;
                    $j = 1;
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
//                    t($hr_bud); exit;
                    $total_cost = 0;
                    foreach ($hr_bud as $key1 => $value1) {
                        $akeys = array_keys($value1);
                        //t($akeys); exit;
                        $tmp1 = explode('_', $akeys[0]);
                        $tmp2 = substr($tmp1[0], 0, 2);
                        //t($hr_bud);
                        if ($value1[$akeys[0]] != '' && $value1[$akeys[1]] != '') {
                            $total_cost += $value1[$akeys[1]];
                            $act_bud_dtl_arr = array(
                                'activity_dtl_seq_no' => $activity_dtl_seq_no,
                                //'act_budget_seq_no' => $act_budget_seq_no,
                                'budget_code_type' => $tmp2,
                                'budget_code' => $tmp1[0],
                                'budget_code_hours' => $value1[$akeys[0]],
                                'budget_code_cost' => $value1[$akeys[1]],
                                'budget_dtl_status' => $budget_dtl_status,
                                'remarks_notes' => $remarks_notes,
                                'created_by' => $admin_id,
                                'created_date' => time()
                            );
                            $act_budget_seq_no11 = $this->activity_budget_dtl_model->add($act_bud_dtl_arr);
//                            echo $this->db->last_query();
                        }
//                        t($act_bud_dtl_arr); exit;
                    }

                    //update totalcost 
                    $act_dtl_arru = array(
                        'budgeted_cost' => $total_cost
                    );
                    $activity_dtl_seq_no1 = $this->activity_dtl_model->edit($act_dtl_arru, $activity_dtl_seq_no);

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
//            t($this->data['att_firm']); exit;

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

            $activity_arr = array(
                'firm_seq_no' => $firm_seq_no,
                'activity_name' => $activity_name,
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

            $this->get_include();
            $this->load->view($this->view_dir . 'app_transaction/activity/edit', $this->data);
        }
    }

    function view($code = '') {

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
                    WHERE pt.firm_seq_no = '" . $firm_seq_no . "'  and pt.target_seq_no !='CONVERTED'  and pt.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "') and pt.target_seq_no not in (select pad_.relation_seq_no from plma_activity_dtl pad_ where pad_.activity_seq_no = '" . $activity_seq_no . "' )"; //
            } else {
//                $sql = "SELECT *
//                    FROM plma_target pt                    
//                    WHERE pt.firm_seq_no = '" . $firm_seq_no . "' and pt.target_seq_no not in (select ptcc.target_seq_no from plma_tgt_cli_conv ptcc) and pt.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "')"; //
                $sql = "SELECT *
                    FROM plma_target pt                    
                    WHERE pt.firm_seq_no = '" . $firm_seq_no . "' and pt.target_seq_no !='CONVERTED' and pt.attorney_seq_no = (select tmp.attorney_seq_no from plma_attorney tmp where tmp.user_seq_no = '" . $admin_id . "')"; //
            }

            $query = $this->db->query($sql);
//        echo $this->db->last_query();
            $res = $query->result_array();
//        t($res);
//         exit;
            $options = '<option value="">Select Target</option>';
            foreach ($res as $key => $value) {
                $options .= '<option value="' . $value['target_seq_no'] . '">' . $value['target_first_name'] . ' ' . $value['target_last_name'] . '</option>';
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
            $options = '<option value="">Select Client</option>';
            foreach ($res as $key => $value) {
                $options .= '<option value="' . $value['client_seq_no'] . '">' . $value['client_first_name'] . ' ' . $value['client_last_name'] . '</option>';
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

        $sql = "SELECT pa.attorney_first_name, pa.attorney_last_name, pf.firm_name, pf.firm_seq_no, pf.firm_admin_seq_no, pa.attorney_seq_no, pa.user_seq_no
                FROM plma_attorney pa
                INNER JOIN plma_firm pf ON pa.firm_seq_no = pf.firm_seq_no
                WHERE pf.firm_admin_seq_no = '" . $admin_id . "'";
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
            $name = $res[0]['target_first_name'] . ' ' . $res[0]['target_last_name'];
        } else if ($reltyp == 'C') {
// echo $code; exit;
            $sql = "SELECT *
                        FROM plma_client pc                    
                        WHERE 1 and pc.client_seq_no = '" . $code . "' and  pc.firm_seq_no = '" . $firm_seq_no . "'";
            $query = $this->db->query($sql);
            $res = $query->result_array();

            $name = $res[0]['client_first_name'] . ' ' . $res[0]['client_last_name'];
        }
//          t($res); 
//echo $name; exit;
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
            $act_dtl_res[$key]['ct_name'] = $name;

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
        //t($ind_bud_dtl); exit;
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

    /* function insert_single_budget_dtl($actseqno, $activity_dtl_seq_no)
      {
      $admin_all_session = $this->session->userdata('admin_session');
      $admin_id  =  $this->data['admin_id'];
      $role_code = $this->data['role_code'];

      $budget = $this->input->post();
      //t($budget); exit;
      $actseqno = base64_decode($actseqno);
      //$this->input->post()
      $hr_bud = array();
      $i = 0;
      $j = 1;
      foreach ($budget as $key => $value) {
      if ($i == 0 || $i%2 == 0) {
      $arr2 = array();
      }
      $arr2[$key] = $value;
      if ($j%2 == 0 && $i != 0) {
      $hr_bud[] = $arr2;
      }
      $i++; $j++;
      }
      //t($hr_bud); exit;
      $total_cost = 0;
      foreach ($hr_bud as $key1 => $value1) {
      $akeys = array_keys($value1);
      //t($akeys); exit;
      $tmp1 = explode('_', $akeys[0]);
      $tmp2 = substr($tmp1[0], 0, 2);
      //t($hr_bud);
      if ($value1[$akeys[0]] != '' && $value1[$akeys[1]] != '') {
      //check if exist
      $sql_exist = "SELECT * FROM `plma_act_bud_dtl` WHERE `activity_dtl_seq_no` = '".$activity_dtl_seq_no."' and `budget_code` = '".$tmp1[0]."'";
      $query_exist = $this->db->query($sql_exist);
      $res_exist = $query_exist->result_array();

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
      }else if($cc > 0){
      $total_cost += $value1[$akeys[1]];
      $act_bud_dtl_arr = array(
      'budget_code_hours' => $value1[$akeys[0]],
      'budget_code_cost' => $value1[$akeys[1]],
      'updated_by' => $admin_id,
      'updated_date' => time()
      );
      $act_budget_seq_no11 = $this->activity_budget_dtl_model->edit_cond($act_bud_dtl_arr, " activity_dtl_seq_no = '".$activity_dtl_seq_no."' and budget_code = '".$tmp1[0]."'");
      }
      //echo $this->db->last_query();
      }else{
      $res = $this->activity_budget_dtl_model->delete_cond(" and activity_dtl_seq_no = '".$activity_dtl_seq_no."' and budget_code = '".$tmp1[0]."'");
      }
      //t($act_bud_dtl_arr); exit;
      }

      //update totalcost
      $act_dtl_arru = array(
      'budgeted_cost' => $total_cost
      );
      $activity_dtl_seq_no1 = $this->activity_dtl_model->edit($act_dtl_arru, $activity_dtl_seq_no);


      echo $total_cost ; //.'pp'
      } */

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

}
