<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Activity_budget_report extends MY_Controller {

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
    }

    function index() {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];

        //################# Activity Fetch #######################//

        $sql = "SELECT pact.* FROM plma_activity pact "
                . "WHERE pact.firm_seq_no = '" . $firm_seq_no . "'";
        $query = $this->db->query($sql);
        $res = $query->result_array();
//        echo $this->db->last_query();
//        t($res); exit;
//       //################# Activity Goals Fetch #######################//

        $sql11 = "SELECT DISTINCT pact.activity_goal FROM plma_activity as pact "
                . "WHERE pact.firm_seq_no = '" . $firm_seq_no . "'";
        $query11 = $this->db->query($sql11);
        $res11 = $query11->result_array();
//        t($res11); 
//        exit;
        //###################### Budget Code Type Fetch e.g. ME, TR, CC etc From Codes Table.####################//

        $sql1 = "SELECT code, short_description FROM plma_codes where category_type='Budget Code Type'";
        $query1 = $this->db->query($sql1);
        $res1 = $query1->result_array();
        $this->data['category_type'] = $res1;
//        t($res1);
//        exit;
        //#################### Budget Codes Fetch (subcategory of budget code type) e.g. ME01, ME02, TR01 TR02 etc From Codes Table. ###############// 

        $sql2 = "SELECT code, short_description FROM plma_codes where category_type='Budget Codes'";
        $query2 = $this->db->query($sql2);
        $res2 = $query2->result_array();
        $this->data['budget_code'] = $res2;
//        t($res2);
//        exit;
        //######################## Activity-wise budget hour/cost fetch and sum - Begin #####################// 

        $bud_details_final = array();
        foreach ($res as $key => $value) {

            $activity_seq_no = $res[$key]['activity_seq_no'];
//            $activity_goal = $res[$key]['activity_goal'];
            //######################## Original activity budget hour/cost fetch Begin #####################//        
            /*
             * $sql_1 = "SELECT pabd.budget_code,pabd.budget_code_hours,pabd.budget_code_cost,
             * pad.activity_seq_no, pabd.activity_dtl_seq_no,SUM(pabd.budget_code_hours) as total_hour,
             * SUM(pabd.budget_code_cost) as total_cost
             * FROM plma_act_bud_dtl pabd 
             * LEFT JOIN plma_activity_dtl pad ON  pabd.activity_dtl_seq_no = pad.activity_dtl_seq_no 
             * LEFT JOIN plma_activity pa ON pad.activity_seq_no = pa.activity_seq_no 
             * WHERE pa.firm_seq_no = '" . $firm_seq_no . "' and pa.activity_seq_no = '" . $activity_seq_no. "' Group By pabd.budget_code";
             */
            //######################## Original activity budget hour/cost fetch end #####################//

            $sql_1 = "SELECT pabd.budget_code, pa.activity_name, pa.activity_goal, pad.activity_seq_no, pabd.budget_code_type, pabd.activity_dtl_seq_no, "
                    . "SUM(pabd.budget_code_hours) as total_hour, SUM(pabd.budget_code_cost) as total_cost "
                    . "FROM plma_act_bud_dtl pabd "
                    . "LEFT JOIN plma_activity_dtl pad ON  pabd.activity_dtl_seq_no = pad.activity_dtl_seq_no "
                    . "LEFT JOIN plma_activity pa ON pad.activity_seq_no = pa.activity_seq_no "
                    . "WHERE pa.firm_seq_no = '" . $firm_seq_no . "' AND pa.activity_seq_no = '" . $activity_seq_no . "' "
                    . "GROUP BY pabd.budget_code, pa.activity_goal";
            $qry_1 = $this->db->query($sql_1);
            $row = $qry_1->result_array();
//            t($row);
//            exit;
            $bud_details_type = array();
            foreach ($res1 as $key2 => $value2) {
                $bud_details = array();
                foreach ($row as $key1 => $value1) {
                    if ($value2['code'] == $value1['budget_code_type']) {
                        $bud_details[$value1['budget_code']] = $value1;                                                 /****** budget code on key (ME01, CC01 etc.) ******/
                    }
                }
                if (count($bud_details) > 0) {
                    $bud_details_type[$value2['code']] = $bud_details;                                                  /****** budget code type on key (ME,CC, TR etc.) ******/
                }
//               t($bud_details); 
            }
//            t($bud_details_type); 
//            exit; 
            $bud_details_type['activity_name'] = $value['activity_name'];
            $bud_details_type['activity_goal'] = $value['activity_goal'];
//            $bud_details_final['activity_goal'] = $value['activity_goal'];
            $bud_details_final[$value['activity_goal']][] = $bud_details_type;                                          /****** activity goal on key (from activity table data fetch) ******/
            
        }
//        t($bud_details_final);
//        exit;
        //######################## Activity-wise budget hour/cost fetch and sum - End #########################//
        //################# Sum of Total Hours/Total cost of all the activities under a firm - BEGIN  ##################//    
        $sql_2 = "SELECT pabd.budget_code, pa.activity_name,
               pad.activity_seq_no, pabd.budget_code_type, pabd.activity_dtl_seq_no,SUM(pabd.budget_code_hours) as total_hour,
               SUM(pabd.budget_code_cost) as total_cost
            FROM plma_act_bud_dtl pabd
            LEFT JOIN plma_activity_dtl pad ON  pabd.activity_dtl_seq_no = pad.activity_dtl_seq_no
            LEFT JOIN plma_activity pa ON pad.activity_seq_no = pa.activity_seq_no
            WHERE pa.firm_seq_no = '" . $firm_seq_no . "' Group By pabd.budget_code";
        $qry_2 = $this->db->query($sql_2);
        $row = $qry_2->result_array();
        $bud_details_sum_final = array();
        foreach ($res1 as $key2 => $value2) {
            $bud_details_sum = array();
            foreach ($row as $key1 => $value1) {
                if ($value2['code'] == $value1['budget_code_type']) {
                    $bud_details_sum[$value1['budget_code']] = $value1;
                }
            }
            if (count($bud_details_sum) > 0) {
                $bud_details_sum_final[$value2['code']] = $bud_details_sum;
            }
        }
//t($bud_details_sum_final);
//        exit;
        //################# Sum of Total Hours/Total cost of all the activities under a firm - END ##################//           
//        t($res11); 
//        t($bud_details_final);
//        exit;
        //######################## GROUP BY ACTIVITY GOAL - BEGIN #########################//
        $bud_details_final_array = array();
        foreach ($res11 as $key11 => $value11) {
                    $bud_details_final_array[$value11['activity_goal']] = $bud_details_final[$value11['activity_goal']];                                /**** FINAL ARRAY - (MAIN LOOP) ****/
                }
//            t($bud_details_final_array);
//            exit;
//            t($bud_details_sum_final);
//            exit;
        //######################## GROUP BY ACTIVITY GOAL - END #########################//

        $this->data['bud_details_sum_final'] = $bud_details_sum_final;
//        $this->data['bud_details_final'] = $bud_details_final;
        $this->data['bud_details_final_array'] = $bud_details_final_array;
        $this->data['budget_pg_total'] = $res;
        $this->data['activity_goals'] = $res11;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/activity_budget_report/listing', $this->data);
    }
    function client_target_budget_split_up($activity_seq_no){
        
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];
        
    }

}
