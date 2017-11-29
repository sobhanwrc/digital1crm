<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contacts_list extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->isLogin();

        $this->load->model('firm_model');
        $this->load->model('user_model');
        $this->load->model('app_users_model');
        $this->load->model('address_model');
        $this->load->model('country_model');
        $this->load->model('county_model');
        $this->load->model('states_model');
        $this->load->model('city_model');
        $this->load->model('firm_codes_model');
        $this->load->model('codes_model');
        $this->load->model('firm_attorney_model');
        $this->load->model('attorney_model');
        $this->load->model('attorney_rpt_model');
        $this->load->model('attorney_sg_model');
        $this->load->model('attorney_sec_model');
        $this->load->model('section_model');
        $this->load->model('designation_model');
        $this->load->model('group_model');
        $this->load->model('targets_model');
        $this->load->model('category_model');
        $this->load->model('super_master_model');
        $this->load->library('session');
    }

    function index() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $admin_session_data['firm_seq_no'];


        $cond1 = "AND firm_seq_no = '$firm_seq_no' order by target_seq_no desc";
        $firm_details = $this->targets_model->fetch($cond1);
        //t($firm_details); die();
        //$select = "firm_seq_no,firm_name";
        $this->data['firms'] = $firm_details;
        $this->db->select('*')->from('plma_industry_type');
        //t($cat_details); die();
        $this->data['categories'] = $this->db->get()->result_array();


        $cat_fetch = $this->category_model->max_id_fetch();
        $cat_id = $cat_fetch[0]['id'];
        $cond1 = "AND id = ' $cat_id'";
        $cat_details = $this->category_model->fetch($cond1);
        $this->data['cat_details'] = $cat_details;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/attorney/contact_list_view', $this->data);
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
    
    public function add_new_contacts(){
        $admin_session_data = $this->session->userdata('admin_session_data');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $admin_session_data['firm_seq_no'];
        
        $name = $this->input->post('name');
        $nm = explode(" ",$name);
        t($nm);die();
        $target_1st_name = $nm[0]['1'];
        $target_2nd_name = $nm[0]['2'];
        
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $country_code = $this->input->post('country_code');
        
        $phone_number = $country_code.$phone;
        
        $cond = " AND firm_seq_no=$firm_seq_no AND email=$email AND status=1";
        $fetch_exit_user = $this->targets_model->fetch($cond);
        
        if(count($fetch_exit_user) > 0){
            echo 2;
        }else{
//            $data = array(
//                'target_first_name' =>
//            );
        }
        
    }

    //use for download upload contact template implement by sobhan 17-05-17
    function export_digital1crm_names_upload($param) {
        $filename = 'Digital1CRM_upload_contacts.xlsx';
        $file = $this->config->item('upload_path') . 'upload_contacts_template/Digital1CRM_upload_contacts_new.xlsx';
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }

    //import contacts
    function upload_new_contacts() {
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
                                $email = trim($v[11]);
                                $type = $v[12]?$v[12]:'';
                                $country = trim($v[13]);

                                $cond = " AND country_id LIKE '%".$country."%'";
                                $select = "country_code";
                                $fetch_country = $this->country_model->fetch($cond,$select);
                                $country_code = $fetch_country[0]['country_code'];
                                if(!empty($country_code)){
                                    $country_code = $country_code;
                                }else{
                                    $country_code = '';
                                }
                                
                                $phone_no1 = trim(preg_replace('/[^A-Za-z0-9]/', '', $mobile_contact_no));
                                $phone_no = substr($phone_no1, -10);
                                $total_new_phone_no = $country_code.'-'.$phone_no;
                                
                                $office_contact_number = trim(preg_replace('/[^A-Za-z0-9]/', '', $office_contact_no));
                                $office_contact_number1 = substr($office_contact_number, -10);
                                $total_new_office_no = $country_code.'-'.$office_contact_number1;
                                
                                //fetch email for already exit contact
                                $cond = " AND email='$email' AND firm_seq_no='$firm_seq_no'";
                                $fetch_existing_email_details = $this->targets_model->fetch($cond);
                                
                                $cond = " AND phone='$mobile_contact_no' AND firm_seq_no='$firm_seq_no'";
                                $fetch_existing_phone_details = $this->targets_model->fetch($cond);

                                $cond = " AND office_no='$mobile_contact_no' AND firm_seq_no='$firm_seq_no'";
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
                                    $arr[$k]['phone'] = $total_new_phone_no;
                                    $arr[$k]['lead_source_and_date'] = $lead_source_date;
                                    $arr[$k]['firm_seq_no'] = $firm_seq_no;
                                    $arr[$k]['type'] = $type;
                                    $arr[$k]['post_code'] = $postcode;
                                    $arr[$k]['job_role'] = $job_role;
                                    $arr[$k]['mobile'] = $total_new_office_no;
                                    $arr[$k]['created_date'] = time();
                                    $arr[$k]['status'] = '1';
                                    $arr[$k]['country'] = $country;
                                }
                            }
                        }
                        t($arr);
                        die();

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

    function madePhoneformate_for_upload($mobile_no) {
        if($mobile_no){
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
        
    }

    //function for remove empty cell from array made by excel sheet
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

    //end

    function category_insert() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_session_data['firm_seq_no'];
        $category = $this->input->post('category');
        $this->session->set_userdata('cat_name', $category);
        $submit_date = $this->input->post('submit_date');

        $this->db->select('*')->from('plma_category')->where('firm_seq_no = "' . $firm_seq_no . '" AND industry_type_seq_no="' . $category . '"');

        $count_request = $this->db->get()->result_array();
        if (count($count_request) > 0) {
            echo 2;
            exit();
        } else {
            $this->db->select('*')->from('plma_super_master_target')
                    ->where('industry_type_seq_no ="' . $category . '"');
            $count_data = $this->db->get()->result_array();

            if (count($count_data) > 0) {
                $data = array(
                    'firm_seq_no' => $firm_seq_no,
                    'industry_type_seq_no' => $category,
                    'submit_date' => $submit_date,
                    'status' => 0,
                );
                $add = $this->category_model->add($data);
                if ($add) {
                    echo 1;
                    exit;
                }
            } else {
                echo 0;
            }
        }
    }

    function download_contacts() {
        $category1 = $this->input->post('category1');
        $id = $this->input->post('id');
        //echo $category1; die();
        //$category1 =  $this->input->post('category1');
        $cond1 = "AND  industry_type_seq_no = '" . $category1 . "'";
        $category_details = $this->super_master_model->fetch($cond1);
        $count1 = count($category_details);


        $data1 = array(
            'status' => '2',
        );
        $this->category_model->update_category($id, $data1);

        $admin_session_data = $this->session->userdata('admin_session_data');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $admin_session_data['firm_seq_no'];

        for ($i = 0; $i < $count1; $i++) {
            $firm_seq_no = $firm_seq_no;
            $first_name = $category_details[$i]['target_first_name'];
            $last_name = $category_details[$i]['target_last_name'];
            $company_id = $firm_seq_no;
            //$last_name = $category_details[$i]['target_last_name'];
            $email = $category_details[$i]['email'];
            $phone = $category_details[$i]['phone'];
            $mobile = $category_details[$i]['mobile'];
            $address = $category_details[$i]['address'];
            $company = $category_details[$i]['company'];
            $categories = $category_details[$i]['categories'];
            $type = $category_details[$i]['type'];
            $created_date = time();
            $updated_date = time();

            /* $cond2 = "AND  categories = '$category1' AND email= '$email'";
              $fetch_email_details = $this->targets_model->fetch( $cond2);
              $count1 = count($fetch_email_details); */
            // echo $count1; die();
            //echo $category1; die();
            //echo $this->db->last_query(); die();
            $data = array(
                'firm_seq_no' => $firm_seq_no,
                'target_first_name' => $first_name,
                'company_id' => $company_id,
                'target_last_name' => $last_name,
                'email' => $email,
                'phone' => $phone,
                'mobile' => $mobile,
                'address' => $address,
                'company' => $company,
                'categories' => $categories,
                'created_date' => $created_date,
                'updated_date' => $updated_date,
                'type' => $type,
                'status' => 1,
            );

            $add = $this->targets_model->add($data);
        }
        if ($add) {
            echo 1;
            $this->session->unset_userdata('cat_name');
            // $this->session->sess_destroy();
            exit;
        } else {
            echo 2;
            exit;
        }


        //t($category_details); die();
    }

}
