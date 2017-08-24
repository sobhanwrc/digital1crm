<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends MY_Controller {

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
        $this->load->model('employee_model');
        $this->load->model('attorney_rpt_model');
        $this->load->model('attorney_sg_model');
        $this->load->model('designation_model');
        $this->load->model('attorney_model');
    }

    function index() {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
      if($role_code == 'SITEADM')  {
          $query = $this->db->query('SELECT * FROM UserView');
          $data = $query->result();   
      }elseif($role_code == 'FIRMADM'){
            $query = $this->db->query('SELECT * FROM UserView WHERE firm_seq_no="'.$this->data['firm_seq_no'].'"');
            $data = $query->result(); 
      } elseif($role_code == 'ATTR'){
          $query = $this->db->query('SELECT * FROM UserView');
          $data = $query->result();  
      }
        $this->data['fetch_digital1_staff'] = $data;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/staff/listing', $this->data);
    }

    function fetchEmployee($param) {

        $firm_id = $this->input->post('fimrs');
//         echo $firm_id; exit;


        if ($firm_id == 'all' || $firm_id == '') {
            $res1 = $this->db->query(
                    "   select 
                    pemp.*, 
                    puser.user_id, puser.user_seq_no,puser.group_code, 
                    paddr.*, 
                    pfirm.firm_seq_no,pfirm.firm_admin_seq_no,pfirm.firm_id,pfirm.firm_code,pfirm.firm_name,pfirm.firm_registration,pfirm.firm_jurisdiction,pfirm.address_seq_no,pfirm.remarks_notes,pfirm.sp_contact_name,pfirm.sp_contact_role,pfirm.approval_level,
                    pcity.city_name, 
                    pcountry.name, 
                    pstate.state_name, 
                    pcounty.county_name,
                    pcodes1.short_description pgender,
                    pcodes2.short_description pfull_part,
                    pcodes3.short_description pgroups
                from 
                    plma_empstaff pemp left join plma_user puser on puser.user_seq_no =  pemp.user_seq_no
                    left join plma_address paddr on paddr.address_seq_no = puser.address_seq_no 
                    left join plma_firm pfirm on pfirm.firm_seq_no = pemp.firm_seq_no
                    left join plma_city pcity on pcity.city_seq_no = paddr.city
                    left join plma_country pcountry on pcountry.country_seq_no = paddr.country
                    left join plma_county pcounty on pcounty.county_seq_no = paddr.county
                    left join plma_states pstate on pstate.state_seq_no = paddr.state
                    left join plma_codes pcodes1 on pcodes1.code =  pemp.empstaff_gender
                    left join plma_codes pcodes2 on pcodes2.code =  pemp.job_type
                    left join plma_codes pcodes3 on pcodes3.code = puser.group_code
            "
            );
        } else {
            $res1 = $this->db->query(
                    "   select 
                    pemp.*, 
                    puser.user_id, puser.user_seq_no,puser.group_code, 
                    paddr.*, 
                    pfirm.firm_seq_no,pfirm.firm_admin_seq_no,pfirm.firm_id,pfirm.firm_code,pfirm.firm_name,pfirm.firm_registration,pfirm.firm_jurisdiction,pfirm.address_seq_no,pfirm.remarks_notes,pfirm.sp_contact_name,pfirm.sp_contact_role,pfirm.approval_level,
                    pcity.city_name, 
                    pcountry.name, 
                    pstate.state_name, 
                    pcounty.county_name,
                    pcodes1.short_description pgender,
                    pcodes2.short_description pfull_part
                    pcodes3.short_description pgroups,
                from 
                    plma_empstaff pemp left join plma_user puser on puser.user_seq_no =  pemp.user_seq_no
                    left join plma_address paddr on paddr.address_seq_no = puser.address_seq_no 
                    left join plma_firm pfirm on pfirm.firm_seq_no = pemp.firm_seq_no
                    left join plma_city pcity on pcity.city_seq_no = paddr.city
                    left join plma_country pcountry on pcountry.country_seq_no = paddr.country
                    left join plma_county pcounty on pcounty.county_seq_no = paddr.county
                    left join plma_states pstate on pstate.state_seq_no = paddr.state
                    left join plma_codes pcodes1 on pcodes1.code =  pemp.empstaff_gender
                    left join plma_codes pcodes2 on pcodes2.code =  pemp.job_type
                    left join plma_codes pcodes3 on pcodes3.code = puser.group_code where pemp.created_by=$firm_id
            "
            );
        }
        $row1 = $res1->result_array();
        $this->data['all_employee'] = $row1; 
//        echo $this->db->last_query();
//        t($row1, 1);
//        exit;

        $select = "firm_seq_no,firm_name";
        $this->data['firms'] = $this->firm_model->fetch('', $select);

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/staff/listing', $this->data);
    }

    function details() {
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/staff/firm_view', $this->data);
    }

    function add() {
        //echo $_SERVER['DOCUMENT_ROOT']; exit;

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        
        $this->db->select('*')->from('plma_firm')->order_by('firm_name');
        $all_firm = $this->db->get()->result_array();
        $this->data['all_firm'] = $all_firm;
        
        $add_new_employee_btn = $this->input->post('add_new_employee_btn');
        if (isset($add_new_employee_btn)) {

            /////////// Insert user details into User table ////////////
            
            $user_id = $this->input->post('email_appointment_user');
            $password = $this->input->post('password');
            $password = md5($password);
            $emp_first_name = $this->input->post('first_name');
            $emp_last_name = $this->input->post('last_name'); 
//            $group = $this->input->post('group_code');
            $designation = $this->input->post('position_appointment_user');
            $date_of_appointment_user = $this->input->post('date_of_appointment_user');
            $mobile = $this->input->post('mobile_appointment_user');
            
            
            $country_code = $this->input->post('digital1_staff_country_code');
            $phone = $this->input->post('phone1_appointment_user');
            $phone_number = $country_code.$phone;
            
            
            $this->load->helper('string');
            $random = random_string('alnum', 16);
            $random1 = base64_encode($random);
            
            $assign_to = $this->input->post('all_firm_view');
            $all_firm_list = implode(',',$assign_to);
                    
            $final_password = $password . $random1;
            $user_data = array(
                'user_id' => $user_id,
                'password' => $final_password,
                'user_first_name' => $emp_first_name,
                'user_last_name' => $emp_last_name,
                'mobile' => $mobile,
                'role_code' => 'ATTR',
                'phone1' => $phone_number,
                'position' => $designation,
                'date_of_appointment' => $date_of_appointment_user,
                'address_seq_no' => $insertid,
                'authorized_by' => $admin_id,
                'authorized_date' => time(),
                'salt' => $random,
                'assign_to' => $all_firm_list,
                'created_by' => $admin_id,
                'created_date' => time(),
                'status' => 1
            );
//            echo "<pre>"; print_r($user_data); exit;
            $user_add = $this->user_model->add($user_data); 
            
            /////////// Insert user details into User table ////////////
            $data2 = array(
//                'firm_seq_no' => $firm_seq_no,
                'user_seq_no' => $user_add,
                'attorney_first_name' => $emp_first_name,
                'attorney_last_name' => $emp_last_name,
                'attorney_email1' => $user_id,
                'mobile' => $mobile,
                'phone1' => $phone_number,
                'position' => $designation,
                'date_of_appointment' => $date_of_appointment_user,
                'created_by' => $admin_id,
                'created_date' => time()
            );
//            echo "<pre>";
//            print_r($data2);
//            exit;

            $insertid2 = $this->attorney_model->add($data2);

            if ($user_add) {
                $msg = 'Employee added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'employee');
            } else {
                $msg = 'Error in adding Employee';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'employee/add');
            }

        } else {
    
            
            $cond1 = " and role_code = 'NLSTAFF' and status = 1";
            $this->data['all_user_to_be_staff'] = $this->user_model->fetch($cond1);
            $this->data['all_firms'] = $this->firm_model->fetch();
            $this->data['all_designations'] = $this->designation_model->fetch();
            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/staff/add', $this->data);
        }
    }
        function user_id_check() {
         $user_id = $this->input->post('user_id');
        if ($user_id != '') {
            $cond = " and user_id = '" . $user_id . "'";
            $row = $this->app_users_model->fetch($cond);
//            echo $this->db->last_query();
            $this->data['user_id'] = $row;
//            t($row, 1);
            $row_1 = count($this->data['user_id']);
            if ($row_1 > 0) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
//        echo "ok";
    }
        function edit_id_check() {
         $user_id = $this->input->post('user_id');
         $orig_user_id = $this->input->post('original_user_id');
        if ($user_id != '') {
          if ((!isset($orig_user_id) && $orig_user_id != '') || $user_id == $orig_user_id) {
                echo 'true';
            } else {
                $cond = " and user_id = '" . $user_id . "'";
            $row = $this->app_users_model->fetch($cond);
//            echo $this->db->last_query();
            $this->data['user_id'] = $row;
               $row_1 = count($this->data['user_id']);
            if ($row_1 > 0) {
                echo 'false';
            } else {
                echo 'true';
            }
            }
        }
    }

    function edit() {
        $code = base64_decode($this->uri->segment('3'));

        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $query = $this->db->query('SELECT * FROM UserView WHERE attorney_seq_no="'.$code.'"');
        $data = $query->result(); 
        $assign_to = explode(",",$data[0]->assign_to);

        $this->data['employee_details'] = $data;
        $this->data['assign_to'] = $assign_to;


        $this->db->select('*')->from('plma_firm')->order_by('firm_name');
        $all_firm = $this->db->get()->result_array();
        $this->data['all_firm'] = $all_firm;
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $country_code = $this->input->post('digital1_staff_country_code');
            $phone = $this->input->post('phone1_appointment_user');
            $phone_number = $country_code.$phone;
            
            $result = $this->db->query( 'CALL UpdateAttorney(?,?,?,?,?,?,?,?,?,?,?,?)', array(
                base64_decode($this->input->post('user_seq_no')),
                base64_decode($this->input->post('attorney_seq_no')),
                $this->input->post('first_name'),
                $this->input->post('last_name'),
                $this->input->post('email_appointment_user'),
                $this->input->post('mobile_appointment_user'),
                $phone_number,
                $this->input->post('position_appointment_user'),
                $this->input->post('date_of_appointment_user'),
                implode(",", $this->input->post('all_firm_view')),
                $admin_id,
                time()
        ) );
            if($result) {
                redirect($base_url . 'employee/');
            }
            
        }
        
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/staff/edit', $this->data);
    }

    function delete($code = '') {
          $attorney_seq_no = base64_decode($this->uri->segment(3)); 
          $user_seq_no = base64_decode($this->uri->segment(4)); 

          $result = $this->db->query( 'CALL DeleteAttorney(?,?)', array($attorney_seq_no,$user_seq_no) );
          redirect($base_url . 'employee/');
    }

    
 function fetch_country($selected = '') {
     //echo 123; exit;
        
        $cond="order by country_id='US' desc";
        $return = $this->country_model->fetch($cond);
        $array1 = array();
        $opt = ''; //<option value="">Country</option>
        foreach ($return as $key => $value) {
            if ($value['country_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['country_seq_no'] . '" selected="selected">' . $value['name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['country_seq_no'] . '" >' . $value['name'] . '</option>';
            }
        }
//        echo 123; exit;
//        t($opt); exit;
        return $opt;
    }

    function fetch_state($country_id = '', $selected = '') {
//        echo 123; exit;
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }

        $cond = " and country_seq_no = '" . $country_id . "'";
        $return = $this->states_model->fetch($cond);
        $array1 = array();
        $opt = ''; //<option value="">State</option>
        foreach ($return as $key => $value) {
            if ($value['state_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['state_seq_no'] . '" selected="selected">' . $value['state_name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['state_seq_no'] . '" >' . $value['state_name'] . '</option>';
            }
        }
//        echo 123; exit;
//        t($opt); exit;
        return $opt;
    }

    function fetch_county($country_id = '', $state_id = '', $selected = '') {
//        echo 123; exit;
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }
        if ($state_id == '') {
            $state_id = $this->input->post('state_id');
        }
        $cond = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "'";
        $return = $this->county_model->fetch($cond);
        $opt = ''; //<option value="">County</option>
        foreach ($return as $key => $value) {
            if ($value['county_seq_no'] == $selected) {
                $opt .= '<option value="' . $value['county_seq_no'] . '" selected="selected">' . $value['county_name'] . '</option>';
            } else {
                $opt .= '<option value="' . $value['county_seq_no'] . '" >' . $value['county_name'] . '</option>';
            }
        } 
      $cond2 = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "' "; //and county_seq_no = '".$value['county_seq_no']."'
            $return2 = $this->city_model->fetch($cond2);
            foreach ($return2 as $key => $value) {
            if ($value['city_seq_no'] == $selected) {
                $opt2 .= '<option value="'.$value['city_seq_no'].'" selected="selected">'.$value['city_name'].'</option>';
            }else{
                $opt .= '<option value="'.$value['city_seq_no'].'" >'.$value['city_name'].'</option>';
            }
        }
            
            $a = array(
            'county' => $opt,
            'city' => $opt2
        );
//            echo 123; exit;
//            t($a); exit;
        return $a;
    }

   function fetch_city($country_id = '', $state_id = '', $county_seq_no = '', $selected = '') {
    
       if($country_id == '') { $country_id = $this->input->post('country_id'); }
        if($state_id == '') { $state_id = $this->input->post('state_id'); }
        if($county_seq_no == '') { $county_seq_no = $this->input->post('county_seq_no'); }
        
        $cond = " and country_seq_no = '".$country_id."' and state_seq_no = '".$state_id."'";
        $return =  $this->city_model->fetch($cond); $opt = ''; //<option value="">City/Town</option>
        foreach ($return as $key => $value) {
            if ($value['city_seq_no'] == $selected) {
                $opt .= '<option value="'.$value['city_seq_no'].'" selected="selected">'.$value['city_name'].'</option>';
            }else{
                $opt .= '<option value="'.$value['city_seq_no'].'" >'.$value['city_name'].'</option>';
            }
        }
//        t($opt); exit;
        return $opt; 
        
    }
}
