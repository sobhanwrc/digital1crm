<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Firm_designation extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

 
        // $this->load->model('firm_pa_model');
        // $this->load->model('firm_model');
        $this->load->model('designation_model');
        $this->load->model('app_users_model');
        $this->load->model('practice_area_model');
        $this->load->model('firm_designation_model');
 
        $this->data['page'] = 'Dashboard';
    }
    function index()
    {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $this->data['firm_seq_no'];
        
        
      
            $sql = "SELECT * FROM plma_firm_designation WHERE firm_seq_no = '" . $firm_seq_no . "'";   
      
            $res = $this->db->query($sql);
           // echo $this->db->last_query();
            $row = $res->result_array();
            $this->data['all_firm_designation'] = $row;
             // t($this->data['all_firm_designation']);
            // exit; 
        ////////////////// Fetching of firms for firm filter ////////////////////////    
        if ($role_code == 'SITEADM') {
            $select = "firm_seq_no,firm_name";
            $this->data['firms'] = $this->Designation_model->fetch('', $select);
        }
        ///////////////////// Fetch Site Admin Details //////////////////////
        $sql_1 = "SELECT * FROM plma_designation";
        $query = $this->db->query($sql_1);
        $row_1 = $query->result_array();
        $this->data['user_det'] = $row_1;
       // t($this->data['user_det']); exit;
        
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/firm_designation/listing', $this->data);
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
		//   t($this->data['all_practice_area']);
		// exit;        
        
            $select = "firm_seq_no,firm_name";
            $this->data['firms'] = $this->designation_model->fetch('', $select);
        
        
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/firm_designation_model/listing', $this->data);
    }
    
    function add(){
        
        $admin_id = $this->data['admin_id'];
        $firm_seq_no = $this->data['firm_seq_no']; 
    	$dgnation_seq_no = $this->input->post('designation_seq_no');
      // t($dgnation_seq_no); die();
    	$rmark_area_name = $this->input->post('prac_area_name');
    
    	 foreach($dgnation_seq_no as $key => $value){

            // echo "ok"; die();           
    	 	$cond = "AND designation_code = '" . $value . "'";
	        $designation = $this->designation_model->fetch($cond);

	       foreach($designation as $key_designation => $value_designation){
	        $designation_seq_no = $value_designation['designatino_seq_no'];
	        $designation_code = $value_designation['designation_code'];
	        $designation = $value_designation['designation'];

	        $data=array(

              
               'designation_seq_no' => $designation_seq_no,
               'firm_seq_no' => $firm_seq_no,
               'designation_code' => $designation_code,
               'designation' => $designation,
               'remarks_notes' => $rmark_area_name,
               'created_by' => $admin_id,
               'updated_by' => $admin_id,
               'created_date' => time(),
               'updated_date' => time()   
               
             );
 	// t($data);
  $insert = $this->firm_designation_model->add($data);
  // echo $this->db->last_query(); 

   // $insert = $this->firm_designation_model->add($data);
    // echo $this->db->last_query(); 
	       }
	        
      
       
       
    
        }
        
//      echo $this->db->last_query(); 
    //  exit;
       // print_r($datas); die();
       // $this->firm_designation->submit($datas);
       // echo "ok"; exit;
       redirect($base_url . 'firm-designation');
         
    }

}
