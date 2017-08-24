<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manageappointmentuser extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();

        $this->load->model('firm_model');
        $this->load->model('user_model');
        $this->load->model('app_users_model');


        $this->load->model('Callappointment_Model');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $admin_id = $this->data['admin_id'];

        $cond = " AND user_seq_no= $admin_id";
        $fetch = $this->user_model->fetch($cond);
        $company_id = $fetch[0]['firm_seq_no'];

        $role_code = $this->data['role_code'];

        $firm_seq_no = $this->data['firm_seq_no'];

        if ($role_code == 'ATTR') {
            redirect($base_url . 'login/logout');
        }

        $cond = " AND firm_seq_no=$company_id";
        $row = $this->Callappointment_Model->fetch($cond);
        $this->data['callview'] = $row;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/manageusers/manageappointuserlist', $this->data);
    }

    public function add() {
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/manageusers/manageappointuseradd', $this->data);
    }

    public function add_save() {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        //$firm_seq_no = $this->data['firm_seq_no'];
        $admin_all_session = $this->session->userdata('admin_session_data');
        $firm_seq_no = $admin_all_session['firm_seq_no'];
        //echo $firm_seq_no;die;
        $array_data = $this->input->post();

        /* echo "<pre>";
          print_r($array_data);
          echo "</pre>";
          die(); */

        $password = md5($array_data['password']);
        $this->load->helper('string');
        $random = random_string('alnum', 16);
        $random1 = base64_encode($random);

        $final_password = $password . $random1;


//-------------------insert user login table------------------------------------------
        $data1 = array(
            'firm_seq_no' => $firm_seq_no,
            'user_first_name' => $array_data['f_name'],
            'user_last_name' => $array_data['l_name'],
            'user_id' => $array_data['email'],
            'mobile' => $array_data['mobile'],
            'phone1' => $array_data['phone1'],
            'phone2' => $array_data['phone2'],
            'position' => $array_data['position'],
            'date_of_appointment' => $array_data['date_of_appointment'],
//                'first_name' => $first_name,
//                'last_name' => $last_name,
//                'email_appointment_user' => $email_appointment_user,
            'password' => $final_password,
            'role_code' => 'APPT',
            'salt' => $random,
            'created_by' => $admin_id,
            'created_date' => time(),
            'status' => 1
//                'mobile_appointment_user' => $mobile_appointment_user,
//                'mobile_appointment_user' => $mobile_appointment_user,
//                'phone1_appointment_user' => $phone1_appointment_user,
//                'phone2_appointment_user' => $phone2_appointment_user,
//                'position_appointment_user' => $position_appointment_user,
//                'date_of_appointment_user' => $date_of_appointment_user,
        );


        $user_add = $this->user_model->add($data1);
        //echo $this->db->last_query();die;
//--------------------------------------------------------------------------------------
        $shq = "select user_seq_no from plma_user order by user_seq_no desc limit 0,1;";
        $res = $this->db->query($shq);
        // $user_=$res->row_array();
        $row = $res->result_array();
        $user_seq_no = $row[0]['user_seq_no'];

        $array_data['firm_seq_no'] = $firm_seq_no;
        $array_data['user_seq_no'] = $user_seq_no;
        $array_data['created_by'] = $admin_id;
        $array_data['created_date'] = time();
        //$array_data['']=;
        //-------------------new code-----------------------//
        $appointment_data_user = array(
            'firm_seq_no' => $firm_seq_no,
            'user_seq_no' => $user_seq_no,
            'f_name' => $array_data['f_name'],
            'l_name' => $array_data['l_name'],
            'email' => $array_data['email'],
            'mobile' => $array_data['country_code3'] . $array_data['mobile'],
            'phone1' => $array_data['country_code1'] . $array_data['phone1'],
            'phone2' => $array_data['country_code2'] . $array_data['phone2'],
            'position' => $array_data['position'],
            'date_of_appointment' => $array_data['date_of_appointment'],
            //                'first_name' => $first_name,
            //                'last_name' => $last_name,
            //                'email_appointment_user' => $email_appointment_user,
            'password' => $final_password,
            'created_by' => $admin_id,
            'created_date' => time(),
                //                'mobile_appointment_user' => $mobile_appointment_user,
                //                'mobile_appointment_user' => $mobile_appointment_user,
                //                'phone1_appointment_user' => $phone1_appointment_user,
                //                'phone2_appointment_user' => $phone2_appointment_user,
                //                'position_appointment_user' => $position_appointment_user,
                //                'date_of_appointment_user' => $date_of_appointment_user,
        );
        //---------------end----------------------//




        $res = $this->Callappointment_Model->add($appointment_data_user);
        //echo $this->db->last_query();die;

        if ($res) {
            redirect($base_url . 'Manageappointmentuser/index');
        }
    }

    public function details($code = '') {
        $code = base64_decode($code);
        $cond = " and appt_seq_no = '" . $code . "'";
        $row = $this->Callappointment_Model->fetch($cond);
        
        $mobile = $row[0]['mobile'];
        $mobile_length = strlen($mobile);
        if ($mobile_length == 17) {
            $country_code3 = substr($mobile, 0, 3);
        }
        $mobile_number = substr($mobile, -11);
        $this->data['country_code_3'] = $country_code3;
        $this->data['mobile'] = $mobile_number;
        
        $phone1 = $row[0]['phone1'];
        $phone1_length = strlen($phone1);
        if($phone1_length == 17){
            $countyr_code2 = substr($phone1, 0, 3);
        }
        $phone1_number = substr($phone1, -11);
        $this->data['country_code2'] = $countyr_code2;
        $this->data['phone1_number'] = $phone1_number;
        
        $phone2 = $row[0]['phone2'];
        $phone2_length = strlen($phone2);
        if($phone2_length){
            $country_code1 = substr($phone2, 0, 3);
        }
        $phone2_number = substr($phone2, -11);
        $this->data['country_code1'] = $country_code1;
        $this->data['phone2_number'] = $phone2_number;
        
        $this->data['callview'] = $row;
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/manageusers/manageappointmentuserview', $this->data);
    }

    public function edit($code = '') {
        $code = base64_decode($code);

        $cond = " and appt_seq_no = '" . $code . "'";
        $row = $this->Callappointment_Model->fetch($cond);
//     echo $this->db->last_query();
//     t($row);
//     die;
        $mobile = $row[0]['mobile'];
        $mobile_length = strlen($mobile);
        if ($mobile_length == 17) {
            $country_code3 = substr($mobile, 0, 3);
        }
        $mobile_number = substr($mobile, -11);
        $this->data['country_code_3'] = $country_code3;
        $this->data['mobile'] = $mobile_number;
        
        $phone1 = $row[0]['phone1'];
        $phone1_length = strlen($phone1);
        if($phone1_length == 17){
            $countyr_code2 = substr($phone1, 0, 3);
        }
        $phone1_number = substr($phone1, -11);
        $this->data['country_code2'] = $countyr_code2;
        $this->data['phone1_number'] = $phone1_number;
        
        $phone2 = $row[0]['phone2'];
        $phone2_length = strlen($phone2);
        if($phone2_length){
            $country_code1 = substr($phone2, 0, 3);
        }
        $phone2_number = substr($phone2, -11);
        $this->data['country_code1'] = $country_code1;
        $this->data['phone2_number'] = $phone2_number;

        $this->data['callview'] = $row;
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/manageusers/manageappointmentuseredit', $this->data);
    }

    public function edit_save($code = '') {
        $code = base64_decode($code);
        $arry_user = $this->input->post();

        //-----------------------------------------------------------------
        $user_seq_no = $arry_user['user_seq_no'];
        //echo $user_seq_no;die();
        $password = $arry_user['password'];
        $password = md5($password);
        $user_email = $arry_user['email'];
        //unset($arry_user['user_seq_no']);
        $this->load->helper('string');
        $random = random_string('alnum', 16);
        $random1 = base64_encode($random);
        $final_password = $password . $random1;
        $data_upt = array('user_id' => $user_email, 'password' => $final_password, 'salt' => $random);
        $this->db->where('user_seq_no', $user_seq_no);
        $this->db->update('plma_user', $data_upt);


        //----------------new code------------------//


        $edit_user_details = array(
            'f_name' => $arry_user['f_name'],
            'l_name' => $arry_user['l_name'],
            'email' => $arry_user['email'],
            'mobile' => $arry_user['country_code3'] . $arry_user['mobile'],
            'phone1' => $arry_user['country_code1'] . $arry_user['phone1'],
            'phone2' => $arry_user['country_code2'] . $arry_user['phone2'],
            'position' => $arry_user['position'],
            'date_of_appointment' => $arry_user['date_of_appointment'],
                //                'first_name' => $first_name,
                //                'last_name' => $last_name,
                //                'email_appointment_user' => $email_appointment_user,
                //                'mobile_appointment_user' => $mobile_appointment_user,
                //                'mobile_appointment_user' => $mobile_appointment_user,
                //                'phone1_appointment_user' => $phone1_appointment_user,
                //                'phone2_appointment_user' => $phone2_appointment_user,
                //                'position_appointment_user' => $position_appointment_user,
                //                'date_of_appointment_user' => $date_of_appointment_user,
        );


        $updatedata = $this->Callappointment_Model->edit($edit_user_details, $code);

        if ($updatedata) {
            $this->session->set_flashdata('msg', 'Appointmentuser updated successfully');
        } else {
            $this->session->set_flashdata('msg', 'No updates done');
        }
        redirect($base_url . 'Manageappointmentuser/index');


        //-------------------------------------------------------------------
        /* echo "<pre>";
          print_r($arry_user);
          echo "</pre>";
          die(); */
        /* $arry_user['password']=base64_encode($arry_user['password']);

          $updatedata = $this->Callappointment_Model->edit($arry_user, $code);

          if($updatedata)
          {
          $msg = 'Calluser updated successfully';
          redirect($base_url . 'Manageappointmentuser/index');
          } */
    }

    public function delete($code = '') {

        $del_id = base64_decode($code);
        // $deletedata=$this->db->where('appt_seq_no',$del_id)->delete('plma_appointment_user');
        $deletedata = $this->Callappointment_Model->delete($del_id);
        if ($deletedata) {
            redirect($base_url . 'Manageappointmentuser/index');
        }
    }

}

?>