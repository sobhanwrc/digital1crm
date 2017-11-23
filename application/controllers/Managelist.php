<?php

/*
  if (!defined('BASEPATH'))
  exit('No direct script access allowed');
 */
class Managelist extends MY_Controller {

    function __construct() {

        parent::__construct();

        $this->isLogin();

        $this->load->model('managelist_model');
        $this->load->model('targets_model');
        $this->load->model('attorney_model');
        $this->load->model('user_model');
        $this->load->model('app_users_model');

        $this->load->helper('url');
        $this->load->helper('date');

        $admin_id = $this->data['admin_id'];

        $role_code = $this->data['role_code'];

        if ($role_code != 'FIRMADM') {
            exit('No direct access allowed');
        }
        // echo $role_code;
        //  echo"<hr>";
        //  echo $admin_id;
    }

    function index() {
        $admin_all_session = $this->session->userdata('admin_session_data');
        $farm_seq_no = $admin_all_session['firm_seq_no'];
        

        if ($farm_seq_no != '') {
            $cond = " and firm_seq_no = '" . $farm_seq_no . "'";
            $row = $this->managelist_model->fetch($cond);
            $this->data['managelist'] = $row;
        }
        $this->get_include();

        // print_r($data);
        //die();
        $this->load->view($this->view_dir . 'operation_master/manage_list/list_view', $this->data);
    }

    function add_list() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_session_data['firm_seq_no'];
        $list_name = $this->input->post('list_name');
        $now_date = date('d/m/Y h:i:s');
        $data = array(
            'firm_seq_no' => $firm_seq_no,
            'list_name' => $list_name,
            'created_date' => $now_date,
        );
        $add = $this->managelist_model->add($data);
        if ($add) {
            echo 1;
            exit;
        } else {
            echo 0;
        }
    }

    function edit_list($list_id = '') {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_session_data['firm_seq_no'];
        $list_name = $this->input->post('list_name');
        $data = array(
            'list_name' => $list_name,
            'firm_seq_no' => $firm_seq_no,
        );
        $cond = " list_id = '" . $list_id . "'";
        $edit = $this->managelist_model->edit_cond($data, $cond);
        if ($edit) {
            echo 1;
            exit;
        } else {
            echo 0;
        }
    }

    function delete($code = '') {
        $code = base64_decode($code);
        $cond = $code;
        $row = $this->managelist_model->delete($cond);
        //echo $this->db->last_query(); exit;
        $admin_all_session = $this->session->userdata('admin_session_data');
        $farm_seq_no = $admin_all_session['firm_seq_no'];
        

        if ($farm_seq_no != '') {
            $cond = " and firm_seq_no = '" . $farm_seq_no . "'";
            $row = $this->managelist_model->fetch($cond);
            $this->data['managelist'] = $row;
        }
        $this->get_include();

        // print_r($data);
        //die();
        $this->load->view($this->view_dir . 'operation_master/manage_list/list_view', $this->data);
    }

    function madePhoneformate_for_upload($mobile_no) {
        $mobile_no = preg_replace('/[^A-Za-z0-9]/', '', $mobile_no);

        $mobile_no1 = substr($mobile_no, 0, 4);
        if ($mobile_no1) {
            $mobile_no1 = $mobile_no1;
        }
        $mobile_no2 = substr($mobile_no, 4, 10);
        if ($mobile_no2) {
            $mobile_no2 = $mobile_no2;
        }

        $new_mobile_no = '+44' . '(0)' . $mobile_no1 . ' ' . $mobile_no2;

        return $new_mobile_no;
    }

    function removeEmptyCell($main_array) {
        $main_array1 = array();
        foreach ($main_array as $key1 => $value1) {
            if (count($value1)) {
                $sub_array = array();
                foreach ($value1 as $key2 => $value2) {
                    if ($value2) {
                        $sub_array[$key2] = $value2;
                    }
                }
                $main_array1[$key1] = $sub_array;
            }
        }
        return $main_array1;
    }

    function import_contact_list() {
        $admin_id = $this->data['admin_id'];

        $company_session = $this->session->userdata('admin_session_data');
        $firm_seq_no = $company_session['firm_seq_no'];

        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');
        PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);

        $fileName = isset($_FILES['upload_file']['name']) ? $_FILES['upload_file']['name'] : '';

        if ($fileName != '') {
            $config['upload_path'] = $this->config->item('upload_path') . 'xls_file/';

            $RemoveFileSpace = preg_replace('/\s+/', '', $fileName);
            $expStr = explode('.', $RemoveFileSpace);
            $FileExt = strtolower(end($expStr));

            if ($FileExt == 'xlsx') {
                $temp_file = $expstr[0] . time() . '.' . $FileExt;

                if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $config['upload_path'] . $temp_file)) {
                        $excel_file = $config['upload_path'] . $temp_file;
                        


                        $objReader = new PHPExcel_Reader_Excel2007($this->phpexcel);
                        ob_end_clean();

                        $objPHPExcel = $objReader->load($excel_file);

                        //Itrating through all the sheets in the excel workbook and storing the array data
                        foreach ($objPHPExcel->getWorksheetIterator() as $key => $worksheet) {
                            $main_array1[] = $worksheet->toArray(NULL, TRUE, TRUE);
                            $main_array = $this->removeEmptyCell($main_array1);
                        }
                       // t($main_array);
                       // die();
                        $i = 0;
                        $j = 0;

                        foreach ($main_array[0] as $k => $v) {
                            if ($k > 0) {
                                $lead_source_date = $v[0];
                                $company_name = $v[1];
                                $category_of_business = $v[2];
                                $address = $v[3];
                                $postcode = $v[4];
                                $website = $v[5];
                                
                                $first_name = $v[6];
                                $last_name = $v[7];
                                
                                $job_role = $v[8];
                                $office_contact_no = trim($v[9]);
                                $mobile_contact_no = trim($v[10]);
                                $email = $v[11];
                                $type = $v[12]?$v[12]:'';
                                
                                // $phone_no1 = trim(preg_replace('/[^A-Za-z0-9]/', '', $mobile_contact_no));
                                // $phone_no = substr($phone_no1, -10);
                                // $total_phone_number_with_format = $this->madePhoneformate_for_upload($phone_no);
                                
                                // $office_contact_number = trim(preg_replace('/[^A-Za-z0-9]/', '', $office_contact_no));
                                // $office_contact_number1 = substr($office_contact_number, -10);
                                // $total_office_number_with_format = $this->madePhoneformate_for_upload($office_contact_number1);
                                
                                //fetch email for already exit contact
                                $cond = " AND email='$email' AND firm_seq_no='$firm_seq_no'";
                                $fetch_existing_email_details = $this->targets_model->fetch($cond);
                                
                                $cond = " AND phone='$mobile_contact_no' AND firm_seq_no='$firm_seq_no'";
                                $fetch_existing_phone_details = $this->targets_model->fetch($cond);

                                
                                $fetch_existing_office_phone_details = $this->targets_model->fetch($cond);                                

                                if (count($fetch_existing_email_details) > 0 || count($fetch_existing_phone_details) > 0 || count($fetch_existing_office_phone_details) > 0) {
                                    $i++;
                                } else {
                                    $arr[$k]['target_first_name'] = $first_name;
                                    $arr[$k]['target_last_name'] = $last_name;
                                    $arr[$k]['company'] = $company_name;
                                    $arr[$k]['address'] = $address;
                                    $arr[$k]['categories'] = $category_of_business;
                                    $arr[$k]['email'] = $email;
                                    $arr[$k]['website'] = $website;
                                    $arr[$k]['phone'] = $office_contact_no;
                                    $arr[$k]['lead_source_and_date'] = $lead_source_date;
                                    $arr[$k]['firm_seq_no'] = $firm_seq_no;
                                    $arr[$k]['type'] = $type;
                                    $arr[$k]['post_code'] = $postcode;
                                    $arr[$k]['job_role'] = $job_role;
                                    $arr[$k]['mobile'] = $mobile_contact_no;
                                    $arr[$k]['created_date'] = time();
                                    $arr[$k]['status'] = '1';
                                    $arr[$k]['list_id'] = $this->input->post('list');
                                }
                            }
                        }
                        
                        foreach ($arr as $key => $value) {
                            
                                $add = $this->targets_model->add($value);
                                $j++;
                            
                        }

                        if ($add) {
                            if ($i == 0 && $j > 0) {
                                $msg1 = $j . " New contacts are added.";
                            } else if ($i > 0 && $j > 0) {
                                $msg = $i . " Potential duplicate contacts are already added.";
                                $msg1 = $j . " New contacts are added.";
                            } else if ($i == 0 && $j = 0) {
                                $msg2 = " No contacts are added.";
                            }
                            echo $msg . " " . $msg1 . " " . $msg2;
                            exit();
                        } else {
                            if ($i == 0 && $j == 0) {
                                $msg2 = "No contacts are added.";
                            } else if ($i > 0 && $j == 0) {
                                $msg = $i . " Potential duplicate contacts are already added.";
                            }
                            echo $msg . " " . $msg2;
                            exit();
                        }
                    }
            }else {
                echo "Please select .xlsx file";
                exit();
            }
        }
    }

    function search_from_contacts() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $admin_session_data['firm_seq_no'];


        $cond1 = "AND firm_seq_no = '$firm_seq_no'";
        $firm_details = $this->targets_model->fetch($cond1);
//        t($firm_details); die();
        //$select = "firm_seq_no,firm_name";
        $this->data['firms'] = $firm_details;
        

        if ($firm_seq_no != '') {
            $cond = " and firm_seq_no = '" . $firm_seq_no . "'";
            $row = $this->managelist_model->fetch($cond);
            $this->data['managelist'] = $row;
        }
//        t($row); die();

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/manage_list/search_from_contacts', $this->data);
    }
    
    function index1() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $admin_session_data['firm_seq_no'];
        
        $my_search = $this->input->post('search');
        $my_order = $this->input->post('order');
        
        if ($role_code == 'FIRMADM') {

            $no_of_columns_in_list = explode(',', "target_first_name, target_last_name, email, company, type, phone");
            $sql_target = "SELECT * "
                    . " FROM plma_target "
                    . " WHERE firm_seq_no = '" . (int) $firm_seq_no . "' ";
        }
        
        $query_target = $this->db->query($sql_target);
        $all_target_array = $query_target->result_array();
        
        $CountAllQueryData = count($all_target_array);

        $AllFilteredData = $CountAllQueryData;  
        
        if($role_code == 'FIRMADM'){
            $sql_target .= " AND((target_first_name LIKE '%" . $my_search['value'] . "%') ";
            $sql_target .= " OR($no_of_columns_in_list[1] LIKE '%" . $my_search['value'] . "%') ";
            $sql_target .= " OR($no_of_columns_in_list[2] LIKE '%" . $my_search['value'] . "%') ";
            $sql_target .= " OR($no_of_columns_in_list[3] LIKE '%" . $my_search['value'] . "%') ";
            $sql_target .= " OR($no_of_columns_in_list[4] LIKE '%" . $my_search['value'] . "%') ";
            $sql_target .= " OR($no_of_columns_in_list[5] LIKE '%" . $my_search['value'] . "%')) ";
        }
        $query_target = $this->db->query($sql_target);
        $all_target_array = $query_target->result_array();
        
        $CountAllQueryData = count($all_target_array);
        
        $sorted_column = '';
        if ($my_order[0]['column'] == 0) {
            $sorted_column = 0;
        } else if ($my_order[0]['column'] > 0) {
            $sorted_column = $my_order[0]['column'] - 1;
        }
        $start = $this->input->post('start');
        $length = $this->input->post('length');

        if ($length == '-1') {
            $sql_target .= " ORDER BY " . $no_of_columns_in_list[$sorted_column] . "  " . $my_order[0]['dir'] . " ";
        } else {
            $sql_target .= " ORDER BY " . $no_of_columns_in_list[$sorted_column] . "  " . $my_order[0]['dir'] . " LIMIT " . $start . "," . $length . " ";
        }
        $query_target = $this->db->query($sql_target);
        $all_target_array = $query_target->result_array();

        $all_target_list = array();
        
        $index = 0;

        foreach($all_target_array as $key => $value){
            $target_id = $value['target_seq_no'];
            $nested_data = array();
            $index++;
            
            $nested_data[] = ' <input type="checkbox" name="checked_ids[]" id="examplecBox" class="myCheckbox" multiple="multiple" value = " '.$target_id.'"> ' . $index . '';
            $nested_data[] = (!empty($value['target_first_name']) || $value['target_last_name'] != ' ') ? $value['target_first_name'].' '.$value['target_last_name'] : 'N/A';
            $nested_data[] = !empty($value['email'])? $value['email']: 'N/A';
            $nested_data[] = !empty($value['company'])? $value['company'] :'N/A';
            $nested_data[] = !empty($value['type'])? $value['type']: 'N/A';
            $nested_data[] = !empty($value['phone']) ? $value['phone']: 'N/A';  
            $all_target_list[] = $nested_data;
        }

        $json_data = array(
            "draw" => intval($this->input->post('draw')), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($AllFilteredData), // total number of records
            "recordsFiltered" => intval($CountAllQueryData), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $all_target_list   // total data array
        );
        echo json_encode($json_data);  // send data as json format
    }

    function assign_to_list() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $admin_session_data['firm_seq_no'];

        $checked_contact_array = $this->input->post('checked_ids');
        if($checked_contact_array){
            $list_ids = $this->input->post('list_id');

            foreach ($checked_contact_array as $key => $value) {
                $cond = "AND firm_seq_no=$firm_seq_no AND target_seq_no=$value";
                $select = "list_id";
                $check_exit_list_id = $this->targets_model->fetch($cond, $select);
                $check_exit_list_id1 = $check_exit_list_id[0]['list_id'];

                if(!empty($check_exit_list_id)){
                    $data = array(
                        'list_id' => $check_exit_list_id1.','.$list_ids
                    );
                }else{
                    $data = array(
                        'list_id' => $list_ids
                    );
                }

                $edit = $this->targets_model->edit($data, $value);
            }

            echo 1;
        } else {
            echo 0;
        }
    }

    function assign_to_call_user() {
        //t($this->input->post('list_id'));die;
        $list_ids = $this->input->post('list_id');
        $call_user_id = $this->input->post('call_user_id');
        $admin_session_data = $this->session->userdata('admin_session_data');
        if($list_ids){
            // $this->db->where('user_seq_no', $call_user_id);
            // $this->db->delete('plma_assign_list_to_call_user'); 
            foreach ($list_ids as $value) {
                $data = array(
                    'list_id' => $value,
                    'firm_seq_no' => $admin_session_data['firm_seq_no'],
                    'user_seq_no' => $call_user_id,
                    'created_date' => time()
                );

                $insert_id = $this->db->insert('plma_assign_list_to_call_user', $data); 
            }
            
            echo 1; 
           
        } else {
            $this->db->where('user_seq_no', $call_user_id);
            $this->db->delete('plma_assign_list_to_call_user'); 
            echo 2;
        }
    }

    function selected_list() {
        //echo $this->input->post('call_user_id');die;
        $call_user_id = $this->input->post('call_user_id');
        if ($call_user_id != '') {
            $this->db->select('list_id')->from('plma_assign_list_to_call_user')->where('user_seq_no',$call_user_id);

            $row = $this->db->get()->result_array();
            
            echo json_encode($row);
        }
    }

}

?>