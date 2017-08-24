<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Practice_area extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('practice_area_model');
        $this->data['page'] = 'Dashboard';
    }
    function index(){
        
        $admin_id = $this->data['admin_id']; //exit;
        $role_code = $this->data['role_code'];

        $row = $this->practice_area_model->fetch();
        $this->data['practice_area'] = $row;
//        t($this->data['practice_area']); exit;
        
        $this->get_include();
        $this->load->view($this->view_dir . 'app_master/practice_area/listing', $this->data);
    }
    function add(){
//        echo 123;
        $admin_id = $this->data['admin_id'];
        
        $submit = $this->input->post('practice_area_submit');
        
        if(isset($submit)){
//             echo 456;    
            $prac_area_name = $this->input->post('prac_area_name');
            $prac_area_code = $this->input->post('prac_area_code');
            $remarks = $this->input->post('remarks');
            
            $data_arr = array(
                'practice_area_name' => $prac_area_name,
                'practice_area_code' => $prac_area_code,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'updated_by' => $admin_id,
                'created_date' => time(),
                'updated_date' => time()    
            );
//            t($data_arr);
            $insert = $this->practice_area_model->add($data_arr);
//            echo $this->db->last_query(); 
//            exit; 
            if ($insert) {
                $msg = 'Practice area added successfully.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                        <strong>Success!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'practice-area');
            } else {
                $msg = 'Something went wrong.';
                $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                        <strong>Faliur!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'practice-area');
            }
        }
 
    }
    function edit($code = ''){
//        echo 123; 
        $admin_id = $this->data['admin_id'];
        $code = base64_decode($code);
        
        $submit = $this->input->post('practice_area_edit_submit');
        
        if(isset($submit)){
//            echo 456; exit;
            $prac_area_name = $this->input->post('prac_area_name');
            $prac_area_code = $this->input->post('prac_area_code');
            $remarks = $this->input->post('remarks');
            
            $data_edit = array(
                'practice_area_name' => $prac_area_name,
                'practice_area_code' => $prac_area_code,
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'updated_by' => $admin_id,
                'created_date' => time(),
                'updated_date' => time()    
            );
//            t($data_edit);
            $edit = $this->practice_area_model->edit($data_edit, $code);
//            echo $this->db->last_query(); exit;
            if ($edit) {
//                echo 789; 
            $msg = 'Practice area survey modified successfully.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'practice-area');
        } else {
//            echo 145; 
            $msg = 'Something went wrong.';
            $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliur!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'practice-area');
        }
            
        } else{
//            echo 190; exit; 
            redirect($base_url . 'practice-area');
             }
    }
    function pa_code_exist(){
//    $prac_area_code = $this->input->post('prac_area_code');
//
//        if ($prac_area_code != '') {
//            $cond = " and practice_area_code = '" . $prac_area_code . "'";
////            echo $cond; exit;
//            $row = $this->practice_area_model->fetch($cond);
////            echo $this->db->last_query();
//            $this->data['prac_area_code'] = $row;
////            t($row); exit;
//            $row_1 = count($this->data['prac_area_code']);
//            if ($row_1 > 0) {
//                echo 'false';
//            } else {
//                echo 'true';
//            }
//        }
  }
    function edit_pa_code_exist(){ 
      
//      $prac_area_code = $this->input->post('prac_area_code');
//      $prac_area_code1 = $this->input->post('prac_area_code1');
//      
//        if ($prac_area_code != '') {
//            if ((!isset($prac_area_code1) && $prac_area_code1 != '') || $prac_area_code == $prac_area_code1) {
//                echo 'true';
//            } else {
//                $cond = " and practice_area_code = '" . $prac_area_code . "'";
//                $row = $this->practice_area_model->fetch($cond);
////                t($row);
////            echo $this->db->last_query(); exit;
//                $this->data['prac_area_code'] = $row;
//                $row_1 = count($this->data['prac_area_code']);
//                if ($row_1 > 0) {
//                    echo 'false';
//                } else {
//                    echo 'true';
//                }
//            }
//        }
    }
    //////////////For importing excel data/////////////
    
    function add_file(){
      $admin_id = $this->data['admin_id']; 
      $role_code = $this->data['role_code']; 
      
      $submit = $this->input->post('import_practice_area_submit');
      
      if(isset($submit)){
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');

        $fileSize = $_FILES['xls_file']['size'];
        $fileName = $_FILES['xls_file']['name'];
        $file_name = isset($fileName) ? $fileName : '';
       
       if($file_name != ''){
           $config['upload_path'] = $this->config->item('upload_path') . 'xls_file/';
           $RemoveFileSpace = preg_replace('/\s+/', '', $file_name);
           $expStr = explode('.', $RemoveFileSpace);
           $FileExt = strtolower(end($expStr));
           
            ///checking for file format and also if file is empty or not
           
           if($FileExt == 'xls' || $FileExt == 'xlx' || $FileExt == 'xlsx' && $fileSize > 0){         
               
               $temp_file = $expStr[0] . time() . '.' . $FileExt;
               if(move_uploaded_file($_FILES['xls_file']['tmp_name'], $config['upload_path'] . $temp_file)){
                   
                   ///read the text file
                   $excelFile = $config['upload_path'] . $temp_file;
                   
                   $objReader = new PHPExcel_Reader_Excel2007($this->phpexcel);
                   
                   ob_end_clean();

                   $objPHPExcel = $objReader->load($excelFile);
                   //Iterating through all the sheets in the excel workbook and storing the array data
                   foreach($objPHPExcel->getWorksheetIterator() as $key => $worksheet){
                       $main_array = $worksheet->toArray(NULL, TRUE, TRUE);
                   }
                  $mapping_fields = array();
                  foreach($main_array[0] as $key => $value){
                      $mapping_fields[] = $value;
//                     t($main_array); 
                  }
                  unlink($config['upload_path'] . $temp_file);
                  
                  $main_array_final = array();
                  foreach($main_array as $key => $value){
                    $main_array_filtered = array();
                    if($key > 0){
                         foreach ($value as $key1 => $val) {
                    $main_array_filtered[$mapping_fields[$key1]] = $value[$key1];
                }
                $main_array_final[] = $main_array_filtered;
                        
                    }
                  }
// t($main_array_final);
//        exit;
               foreach ($main_array_final as $key => $value) {
                   
                   $prac_area_name = ($value['Practice area name']) ? $value['Practice area name'] : '';
                   
                   $data_arr = array(
                       'practice_area_code' => 'NA',
                       'practice_area_name' => $prac_area_name,
                       'remarks_notes' => 'Practice Area',
                       'created_by' => $admin_id,
                       'updated_by' => $admin_id,
                       'created_date' => time(),
                       'updated_date' => time()    
                   );
//                   t($data_arr); exit;
                   $insert = $this->practice_area_model->add($data_arr);
               }
               if ($insert) {
                $msg = 'Data imported successfully';
                $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'practice_area');
            } else {
                 $msg = 'Data not imported successfully';
                 $this->session->set_flashdata('server_message', '<div class="alert alert-danger" id="general_msg_success" style="display:block">
                                                    <strong>Faliur!</strong> ' . $msg . ' </div>');
                redirect($base_url . 'practice_area');
        }
             }
           } else{
            
            $msg = 'Please check the file format';
            $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
            redirect($base_url . 'practice-area');
               
           }
           
       } else {
           $msg = 'Please select a file';
           $this->session->set_flashdata('server_message', '<div class="alert alert-success" id="general_msg_success" style="display:block">
                                                    <strong>Success!</strong> ' . $msg . ' </div>');
           redirect($base_url . 'practice-area');
           
       }  
      }
       
    }
}

