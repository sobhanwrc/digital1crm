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
        $this->get_include();
        redirect($base_url . 'managelist/index');
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
        //echo $this->input->post('list');die;
        $admin_id = $this->data['admin_id'];

        $cond = "AND user_seq_no=$admin_id";
        $fetch_company_details = $this->app_users_model->fetch($cond);
        $fetch_company_id = $fetch_company_details[0]['firm_seq_no'];
//        t($fetch_company_details);die();

        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');

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
                    //t($objPHPExcel);die;
                    //Itrating through all the sheets in the excel workbook and storing the array data
                    foreach ($objPHPExcel->getWorksheetIterator() as $key => $worksheet) {
                        $main_array[] = $worksheet->toArray(NULL, TRUE, TRUE);
                        $main_array = $this->removeEmptyCell($main_array);
                        //                        $arrayData[$worksheet->getTitle()] = $main_array;
                    }
                       /*t($main_array);
                        die();*/
                    $i = 0;
                    $j = 0;

                    foreach ($main_array[0] as $k => $v) {
                        if ($k > 0) {
                            $phone_no1 = trim(preg_replace('/[^A-Za-z0-9]/', '', $v[6]));
                            $phone_no = substr($phone_no1, -10);
                            $total_phone_number_with_format = $this->madePhoneformate_for_upload($phone_no);

                            $name = explode(" ", $v[4]);
                            $fname = $name[0];
                            $lname = $name[1];

                            $email = $v[7];
                            $cond = " AND email='$email'";
                            $fetch_existing_email_details = $this->targets_model->fetch($cond);



                            if (count($fetch_existing_email_details) > 0) {
                                $i++;
                            } else {

                                $arr[$k]['target_first_name'] = $fname;
                                $arr[$k]['target_last_name'] = $lname;
                                $arr[$k]['company'] = $v[0];
                                $arr[$k]['address'] = $v[2];
                                $arr[$k]['categories'] = $v[1];
                                $arr[$k]['email'] = $v[7];
                                $arr[$k]['website'] = $v[3];
                                $arr[$k]['phone'] = $total_phone_number_with_format;
                                $arr[$k]['firm_seq_no'] = $admin_id;
                                $arr[$k]['firm_seq_no'] = $fetch_company_id;
                                $arr[$k]['type'] = $v[8];
                                $arr[$k]['created_date'] = time();
                                $arr[$k]['status'] = '1';
                                $arr[$k]['list_id'] = $this->input->post('list');
                            }
                        }
                    }
                    //echo $arr[$k]['target_first_name'];echo '<br/>';die;

                    foreach ($arr as $key => $value) {
                        if($value['target_first_name']!=""){
                            $add = $this->targets_model->add($value);
                            //echo $this->db->last_query();die;
                            $j++;
                        }
                    }                    
                }
            echo 1;
            } else {
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
        //t($firm_details); die();
        //$select = "firm_seq_no,firm_name";
        $this->data['firms'] = $firm_details;
        

        if ($firm_seq_no != '') {
            $cond = " and firm_seq_no = '" . $firm_seq_no . "'";
            $row = $this->managelist_model->fetch($cond);
            $this->data['managelist'] = $row;
        }

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/manage_list/search_from_contacts', $this->data);
    }

    function assign_to_list() {
        //t($this->input->post('list_id'));die;
        $checked_contact_array = $this->input->post('checked_ids');
        //t($checked_contact_array);die;
        if($checked_contact_array){
            $list_ids = $this->input->post('list_id');
            foreach ($checked_contact_array as $key => $value) {
                    $data = array(
                        'list_id' => $list_ids
                    );
                    $edit = $this->targets_model->edit($data, $value);
                    //echo $this->db->last_query();die;
            }
           
            //echo $this->db->last_query();die;

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
            $this->db->where('user_seq_no', $call_user_id);
            $this->db->delete('plma_assign_list_to_call_user'); 
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
            echo 1;
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