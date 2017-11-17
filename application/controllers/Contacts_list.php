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


        $cond1 = "AND firm_seq_no = '$firm_seq_no' limit 0,1000";
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

    public function add_new_contacts() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        $firm_seq_no = $admin_session_data['firm_seq_no'];

        $name = $this->input->post('name');
        $nm = explode(" ", $name);
        t($nm);
        die();
        $target_1st_name = $nm[0]['1'];
        $target_2nd_name = $nm[0]['2'];

        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $country_code = $this->input->post('country_code');

        $phone_number = $country_code . $phone;

        $cond = " AND firm_seq_no=$firm_seq_no AND email=$email AND status=1";
        $fetch_exit_user = $this->targets_model->fetch($cond);

        if (count($fetch_exit_user) > 0) {
            echo 2;
        } else {
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
//                    t($main_array);
//                    die();
                    $i = 0;
                    $j = 0;

                    foreach ($main_array[0] as $k => $v) {
                        if ($k > 0) {
                            $lead_source_date = $v[0];
                            $lead_date = $v[1];
                            $country = $v[2];
                            $company_name = $v[3];
                            $category_of_business = $v[4];
                            $address = $v[5];
                            $postcode = $v[6];
                            $website = $v[7];

                            $first_name = $v[8];
                            $last_name = $v[9];

                            $job_role = $v[10];
                            $office_contact_no = $v[11];
                            $mobile_contact_no = $v[12];
                            $email = $v[13];
                            $type = $v[14];

//                            $phone_no1 = explode("-", $mobile_contact_no);
//                            t($phone_no1);die();
//                            $total_mobile_contact_no = $this->madePhoneformate_for_upload($phone_no);
//
//                            $office_contact_number = trim(preg_replace('/[^A-Za-z0-9]/', '', $office_contact_no));
//                            $office_contact_number1 = substr($office_contact_number, -10);
//                            $total_office_number_with_format = $this->madePhoneformate_for_upload($office_contact_number1);

                            //fetch email for already exit contact
                            $cond = " AND email='$email' AND firm_seq_no='$firm_seq_no'";
                            $fetch_existing_email_details = $this->targets_model->fetch($cond);

                            if (count($fetch_existing_email_details) > 0) {
                                $i++;
                            } else {
                                $arr[$k]['target_first_name'] = $first_name;
                                $arr[$k]['target_last_name'] = $last_name;
                                $arr[$k]['company'] = $company_name;
                                $arr[$k]['address'] = $address;
                                $arr[$k]['categories'] = $category_of_business;
                                $arr[$k]['email'] = $email;
                                $arr[$k]['website'] = $website;
                                $arr[$k]['phone'] = $mobile_contact_no;
                                $arr[$k]['lead_source_and_date'] = $lead_source_date;
                                $arr[$k]['type'] = $type;
                                $arr[$k]['post_code'] = $postcode;
                                $arr[$k]['job_role'] = $job_role;
                                $arr[$k]['office_no'] = $office_contact_no;
                                $arr[$k]['country'] = $country;
                                $arr[$k]['lead_date'] = $lead_date;
                                $arr[$k]['created_date'] = time();
                                $arr[$k]['notification'] = 1;
                                $arr[$k]['status'] = '1';
                                $arr[$k]['firm_seq_no'] = $firm_seq_no;
                            }
                        }
                    }
                    foreach ($arr as $key => $value) {
                        if (!empty($value['email'])) {
                            $add = $this->targets_model->add($value);
                            $j++;
                        }
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
            } else {
                echo "Please select .xlsx file";
                exit();
            }
        }
    }

    function madePhoneformate_for_upload($mobile_no) {
        if ($mobile_no) {
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
