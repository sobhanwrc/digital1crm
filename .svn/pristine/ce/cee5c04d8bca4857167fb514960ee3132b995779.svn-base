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
        $this->load->model('client_model');
        $this->load->model('targets_model');
        $this->data['page'] = 'Dashboard';
    }

    function index() {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];
        $attorney_seq_no = $this->data['attorney_seq_no']; 

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
//        t($res11);
//        exit;
        //######################## Activity-wise budget hour/cost fetch and sum - Begin #####################// 

        $bud_details_final = array();
        foreach ($res11 as $key => $value) {

//            $activity_seq_no = $res[$key]['activity_seq_no'];
            $activity_goal = $value['activity_goal'];
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
                    . "WHERE pa.firm_seq_no = '" . $firm_seq_no . "' AND pa.activity_goal = '" . $activity_goal . "' "
                    . "GROUP BY pa.activity_goal,pabd.budget_code";
            $qry_1 = $this->db->query($sql_1);
            $row = $qry_1->result_array();
//            echo $this->db->last_query();
//              t($row);
//            exit;
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
//            $bud_details_type['activity_name'] = $value['activity_name'];
            $bud_details_type['activity_goal'] = $value['activity_goal'];
//            $bud_details_final['activity_goal'] = $value['activity_goal'];
            $bud_details_final[$value['activity_goal']] = $bud_details_type;                                          /****** activity goal on key (from activity table data fetch) ******/
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
//       t($bud_details_sum_final);
//        exit;
        //################# Sum of Total Hours/Total cost of all the activities under a firm - END ##################//           
//        t($res11); 
//        t($bud_details_final);
//        exit;
        //######################## GROUP BY ACTIVITY GOAL - BEGIN #########################//
//        $bud_details_final_array = array();
//        foreach ($res11 as $key11 => $value11) {
//                    $bud_details_final_array[$value11['activity_goal']] = $bud_details_final[$value11['activity_goal']];                                /**** FINAL ARRAY - (MAIN LOOP) ****/
//                }
//            t($bud_details_final_array);
//            exit;
//            t($bud_details_sum_final);
//            exit;
        //######################## GROUP BY ACTIVITY GOAL - END #########################//

        $this->data['bud_details_sum_final'] = $bud_details_sum_final;
        $this->data['bud_details_final'] = $bud_details_final;
//        $this->data['bud_details_final_array'] = $bud_details_final_array;
        $this->data['budget_pg_total'] = $res;
        $this->data['activity_goals'] = $res11;

        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/activity_budget_report/listing', $this->data);
    }

    function activity_budget_split_up($code = '') {

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];
    

        //################# Activity Fetch #######################//
        $activity_goal = base64_decode($code);

        $sql = "SELECT pact.*, CONCAT(pattr.attorney_first_name , ' ', pattr.attorney_last_name) as attorney_name, pattr.attorney_seq_no FROM plma_activity pact "
                . "LEFT JOIN plma_attorney pattr "
                . "ON pact.origin_attorney_seq_no = pattr.attorney_seq_no "
                . "WHERE pact.firm_seq_no = '" . $firm_seq_no . "' AND pact.activity_goal = '" . $activity_goal . "'";
        $query = $this->db->query($sql);
        $res = $query->result_array();
//        $activity_seq_no = $res[0]['activity_seq_no'];
//        echo $this->db->last_query();
//        t($res); exit;
        //################# Activity Goals Fetch #######################//


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

            $activity_seq_no = $value['activity_seq_no'];
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
                    . "WHERE pa.firm_seq_no = '" . $firm_seq_no . "' AND pa.activity_seq_no = '" . $activity_seq_no . "' AND pa.activity_goal = '" . $activity_goal . "' "
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
                        $bud_details[$value1['budget_code']] = $value1;                                                 /****** budget code on key (ME01, CC01 etc.) ***** */
                    }
                }
                if (count($bud_details) > 0) {
                    $bud_details_type[$value2['code']] = $bud_details;                                                  /*                     * **** budget code type on key (ME,CC, TR etc.) ***** */
                }
//               t($bud_details); 
            }
//            t($bud_details_type); 
//            exit; 
            $bud_details_type['activity_name'] = $value['activity_name'];
            $bud_details_type['activity_seq_no'] = $value['activity_seq_no'];
            $bud_details_type['activity_goal'] = $value['activity_goal'];
//            $bud_details_type['activity_goal'] = $value['activity_goal'];
            $bud_details_type['attorney_name'] = $value['attorney_name'];
            $bud_details_final[] = $bud_details_type;                                                               /*             * **** activity goal on key (from activity table data fetch) ***** */
        }
//            t($bud_details_final); 
//            exit;
        //######################## Activity-wise budget hour/cost fetch and sum - End #########################//
        //################# Sum of Total Hours/Total cost of all the activities under a firm - BEGIN  ##################//    
        $sql_2 = "SELECT pabd.budget_code, pa.activity_name, "
                . "pad.activity_seq_no, pad.relation_type, pad.relation_seq_no, pabd.budget_code_type, pabd.activity_dtl_seq_no,SUM(pabd.budget_code_hours) as total_hour, "
                . "SUM(pabd.budget_code_cost) as total_cost "
                . "FROM plma_act_bud_dtl pabd "
                . "LEFT JOIN plma_activity_dtl pad ON  pabd.activity_dtl_seq_no = pad.activity_dtl_seq_no "
                . "LEFT JOIN plma_activity pa ON pad.activity_seq_no = pa.activity_seq_no "
                . "WHERE pa.firm_seq_no = '" . $firm_seq_no . "' AND pa.activity_goal = '" . $activity_goal . "' "
                . "GROUP BY pabd.budget_code, pa.activity_goal";
        $qry_2 = $this->db->query($sql_2);
        $row = $qry_2->result_array();

//        t($row);
//        exit;



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
//        t($row);
//        exit;
        //################# Sum of Total Hours/Total cost of all the activities under a firm - END ##################//           
//        t($res11); 
//        t($bud_details_final);
//        exit;

        $this->data['bud_details_sum_final'] = $bud_details_sum_final;
        $this->data['bud_details_final'] = $bud_details_final;
//        $this->data['bud_details_final_array'] = $bud_details_final_array;
        $this->data['budget_pg_total'] = $res;
        $this->data['activity_goals'] = $res11;
//        t($res);
//        exit;
//        
//        
//        exit;
        //############################# CLIENT/TARGET WISE ACTIVITY BUDGET SPLIT UP - Begin ##################################################//
         $all_activity_array=array();
        foreach ($res as $key => $value) {
          $activity_details_by_activity = array();
            $activity_seq_no = $value['activity_seq_no'];
            $relation_seq_no = $value['relation_seq_no'];

            $sql_activity1 = "SELECT  pad.relation_type, pad.relation_seq_no, "
                    . " pact.activity_name, pact.firm_seq_no "
                    . "FROM plma_act_bud_dtl as pabd "
                    . "LEFT JOIN plma_activity_dtl as pad ON pabd.activity_dtl_seq_no = pad.activity_dtl_seq_no "
                    . "LEFT JOIN plma_activity as pact ON pad.activity_seq_no = pact.activity_seq_no "
                    . "WHERE pact.firm_seq_no = '" . $firm_seq_no . "' and pact.activity_seq_no = '" . $activity_seq_no . "'"
                    . "GROUP BY pad.relation_seq_no";
            $query_activity = $this->db->query($sql_activity1);
            $activity_details_client_group_by = $query_activity->result_array();
//            t($activity_details_client_group_by);


            $sql_activity = "SELECT pabd.act_bud_dtl_seq_no, pabd.activity_dtl_seq_no, pabd.budget_code_type, pabd.budget_code, pabd.budget_code_hours, pabd.budget_code_cost, "
                    . "pad.activity_dtl_seq_no, pad.activity_seq_no, pad.relation_type, pad.relation_seq_no, "
                    . "pact.activity_seq_no, pact.activity_name, pact.firm_seq_no "
                    . "FROM plma_act_bud_dtl as pabd "
                    . "LEFT JOIN plma_activity_dtl as pad ON pabd.activity_dtl_seq_no = pad.activity_dtl_seq_no "
                    . "LEFT JOIN plma_activity as pact ON pad.activity_seq_no = pact.activity_seq_no "
                    . "WHERE pact.firm_seq_no = '" . $firm_seq_no . "' and pact.activity_seq_no = '" . $activity_seq_no . "'"
                    . "";
            $query_activity = $this->db->query($sql_activity);
            $activity_details = $query_activity->result_array();

//            t($activity_details);
//            exit;   
            foreach ($activity_details_client_group_by as $key_client => $value_client) {
                $client_lebel_array = array();
                $client_lebel_array['client_seq_no'] = $value_client['relation_seq_no'];
                $client_lebel_array['client_type'] = $value_client['relation_type'];
                $client_seq_no=$value_client['relation_seq_no'];
                $client_type=$value_client['relation_type'];
                if($client_type=='C'){
                    $select="client_first_name,client_last_name,client_company_name,type";
                    $cond="AND client_seq_no=$client_seq_no";
                    $client_details=$this->client_model->fetch($cond,$select);
                    $client_name=$client_details[0]['client_first_name'].' '.$client_details[0]['client_last_name'];
                    $client_company = $client_details[0]['client_company_name'];
                    $type = $client_details[0]['type'];
                    
                }
                if($client_type=='T'){
                     $select="target_first_name,target_last_name,target_company_name,type";
                    $cond="AND target_seq_no=$client_seq_no";
                    $client_details=$this->targets_model->fetch($cond,$select);
                    $client_name=$client_details[0]['target_first_name'].' '.$client_details[0]['target_last_name'];
                    $client_company = $client_details[0]['target_company_name'];
                    $type = $client_details[0]['type'];
                }
                $client_lebel_array['client_name']=$client_name;
                $client_lebel_array['client_company']=$client_company;
                $client_lebel_array['type']=$type;
                $value_v['client_name']=$client_name;
                $value_v['client_company']=$client_company;
                $value_v['type']=$type;
                foreach ($res1 as $key_category => $value_category) {
                    foreach ($activity_details as $key_details => $value_details) {
                        if ($value_category['code'] == $value_details['budget_code_type']) {
                             if ($value_client['relation_seq_no'] == $value_details['relation_seq_no']) {
                                 $client_lebel_array[$value_category['code']][$value_details['budget_code']] = $value_details;
                             }
                            
                        }
                    }
                }
//                foreach ($activity_details as $key_details => $value_details) {
//                    
//                    if ($value_client['relation_seq_no'] == $value_details['relation_seq_no']) {
//                        $client_lebel_array[] = $value_details;
//                    }
//                }
//              t($client_lebel_array);
//              exit;
                $activity_details_by_activity['activity_seq_no'] = $activity_seq_no;
                $activity_details_by_activity[] = $client_lebel_array;
            }
            $all_activity_array[]=$activity_details_by_activity;
        }
        
  

//        t($all_activity_array);
//        exit;

        $this->data['all_activity_array'] = $all_activity_array;

//        t($c_bud_dtls);
//        exit;
//        
        //############################# CLIENT/TARGET WISE ACTIVITY BUDGET SPLIT UP - End ##################################################// 
        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/activity_budget_report/activity_budget', $this->data);
    }

}
