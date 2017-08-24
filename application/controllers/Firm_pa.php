<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Firm_pa extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();


        $this->load->model('firm_pa_model');
        $this->load->model('firm_model');
        $this->load->model('app_users_model');
        $this->load->model('practice_area_model');
 
        $this->data['page'] = 'Dashboard';
    }
    function index()
    {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        
        $sql = '';
        if($role_code == 'SITEADM'){
            $sql = "SELECT pfa.*, pa.practice_area_name, pa.practice_area_seq_no, pa.practice_area_code, pf.firm_seq_no, pf.firm_name, pf.firm_admin_seq_no "
                . "FROM plma_firm_pa pfa "
                . "INNER JOIN plma_firm pf ON pfa.firm_seq_no = pf.firm_seq_no "
                . "INNER JOIN plma_practice_area pa ON pfa.practice_area_seq_no = pa.practice_area_seq_no "
                . "WHERE pfa.status=1";  
        } elseif($role_code == 'FIRMADM') {
            $sql = "SELECT pfa.*, pa.practice_area_name, pa.practice_area_seq_no, pa.practice_area_code, pf.firm_seq_no, pf.firm_name, pf.firm_admin_seq_no "
               . "FROM plma_firm_pa pfa "
               . "INNER JOIN plma_practice_area pa ON pfa.practice_area_seq_no = pa.practice_area_seq_no "
               . "INNER JOIN plma_firm pf ON pfa.firm_seq_no = pf.firm_seq_no "
               . "WHERE pf.firm_admin_seq_no = '" . $admin_id . "' AND pfa.status=1";   
        }
            $res = $this->db->query($sql);
//            echo $this->db->last_query();
            $row = $res->result_array();
            $this->data['all_practice_area'] = $row;
//            t($this->data['all_practice_area']);
//            exit; 
        ////////////////// Fetching of firms for firm filter ////////////////////////    
        if ($role_code == 'SITEADM') {
            $select = "firm_seq_no,firm_name";
            $this->data['firms'] = $this->firm_model->fetch('', $select);
        }
        ///////////////////// Fetch Site Admin Details //////////////////////
        $sql_1 = "SELECT user_seq_no, user_first_name, user_last_name, role_code from plma_user WHERE role_code = 'SITEADM'";
        $query = $this->db->query($sql_1);
        $row_1 = $query->result_array();
        $this->data['user_det'] = $row_1;
//        t($this->data['user_det']); exit;
        
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/firm_pa/listing', $this->data);
    }
    function fetchFirm(){
        
        $firm_seq_no = $this->input->post('firms'); 
        
        $sql = '';
        
        if ($firm_seq_no == 'all' || $firm_seq_no == ''){
//            echo 123;
            $sql = "SELECT pfa.*, pa.practice_area_name, pa.practice_area_seq_no, pa.practice_area_code, pf.firm_seq_no, pf.firm_name, pf.firm_admin_seq_no "
                . "FROM plma_firm_pa pfa "
                . "INNER JOIN plma_firm pf ON pfa.firm_seq_no = pf.firm_seq_no "
                . "INNER JOIN plma_practice_area pa ON pfa.practice_area_seq_no = pa.practice_area_seq_no "
                . "WHERE pfa.status=1";  
           
       } else {
//           echo 456;
           $sql = "SELECT pfa.*, pa.practice_area_name, pa.practice_area_seq_no, pa.practice_area_code, pf.firm_seq_no, pf.firm_name, pf.firm_admin_seq_no "
                . "FROM plma_firm_pa pfa "
                . "INNER JOIN plma_firm pf ON pfa.firm_seq_no = pf.firm_seq_no "
                . "INNER JOIN plma_practice_area pa ON pfa.practice_area_seq_no = pa.practice_area_seq_no "
                . "WHERE pf.firm_seq_no = '" . $firm_seq_no . "' AND pfa.status=1";
       }
        $res = $this->db->query($sql);
//            echo $this->db->last_query();
        $row = $res->result_array();
        $this->data['all_practice_area'] = $row;
//            t($this->data['all_practice_area']);
//            exit;        
        
            $select = "firm_seq_no,firm_name";
            $this->data['firms'] = $this->firm_model->fetch('', $select);
        
        
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/firm_pa/listing', $this->data);
    }
    
    function request_practice_area(){
        
//        echo 123; exit;
        $submit = $this->input->post('request_practice_area_submit');
//         echo "ok"; exit;
//        if($submit){
//            echo 789;
     $user_seq_no = $this->input->post('user_seq_no');
     $prac_area_name = $this->input->post('prac_area_name');
     $request_reason = $this->input->post('request_reason'); 
          if(isset($user_seq_no))
          { 
//          echo 456; exit;
                $cond = "AND `status` = '1' AND `user_seq_no` = '" . $user_seq_no . "'";
                $row = $this->app_users_model->fetch($cond);
//                t($row, 1);
          }
          if ((count($row) > 0)) {
           //                    echo 456;
            $user_seq_no = $row[0]['user_seq_no'];
            $user_first_name = $row[0]['user_first_name'];
            $user_id = $row[0]['user_id'];   
            
            $mail = $this->sendRequestMailto($user_seq_no, $user_first_name, $user_id,$prac_area_name,$request_reason);
            
            if($mail){
                 $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . 'Your request has been sent for approval.' . '</font></span>');
                  redirect($base_url . 'firm_pa');
            } else {
                    $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . 'wrong username  <br> Please try again.' . '</font></span>');
                    redirect($base_url . 'firm_pa');
                }
            
          } else {
               $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . 'wrong username  <br> Please try again.' . '</font></span>');
               redirect($base_url . 'firm_pa');
          }

//        }
        
        
    }
    function sendRequestMailto($user_seq_no, $user_first_name, $user_id,$prac_area_name,$request_reason){
        
         $admin_id = $this->data['admin_id'];
          
         $email_to = $user_id;
         
         $sql = "SELECT pu.user_seq_no, pu.user_id, pf.firm_seq_no, pf.firm_name, pf.firm_admin_seq_no "
                 . "FROM plma_user pu "
                 . "INNER JOIN plma_firm pf ON pu.user_seq_no = pf.firm_admin_seq_no "
                 . "WHERE pf.firm_admin_seq_no = '" . $admin_id . "'";
         $query = $this->db->query($sql);
         $row = $query->result_array();
         $email_from = $row[0]['user_seq_no'];
         $firm_name =  $row[0]['firm_name'];
         $subject = "Request for adding new practice area";
         
         $message_content = "A request for adding a new practice area has been made by the admin of '" . $firm_name . "'. The new practice area to be added is '" . $prac_area_name . "' and the reason provided for the change is '" . $request_reason . "'  Please review the list and the request and make necessary changes.";
         $this->load->library('email');
//            $this->email->initialize($config);
//            $this->email_config();
        $this->email->from($email_from);
        $this->email->to($email_to);
        $this->email->subject($subject);
        $this->email->message($message_content);
        $send = $this->email->send();


        if ($send) {
            return 1;
        } else {
            return 0;
        }
        
    }
}
