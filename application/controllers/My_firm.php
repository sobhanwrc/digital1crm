<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_firm extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();
        
        $this->load->model('user_model');
        $this->load->model('address_model');
        $this->load->model('city_model');
        $this->load->model('country_model');
        $this->load->model('county_model');
        $this->load->model('states_model');
        $this->load->model('firm_model');

        $this->data['page'] = 'My Firm';
    }

    function index()
    {
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $cond = " and user_seq_no = '".$admin_id."' and role_code = '2'";
        $row = $this->user_model->fetch( $cond ); //t($row); exit;
        
        if (count($row) > 0) {
            $cond1 = " and firm_admin_seq_no = '".$admin_id."'";
            $row1 = $this->firm_model->fetch( $cond1 );
            $this->data['firm_info'] = $row1[0]; //t($row1); exit;

            $cond2 = " and address_seq_no = '".$row1[0]['address_seq_no']."'";
            $row2 = $this->address_model->fetch( $cond2 );
            $this->data['address_info'] = $row2[0]; //t($row2[0]); die();

            $this->data['country_info'] = $this->fetch_country($row2[0]['country']); 
            $this->data['state_info'] = $this->fetch_state($row2[0]['country'], $row2[0]['state']);
            $this->data['county_info'] = $this->fetch_county($row2[0]['country'], $row2[0]['state'], $row2[0]['county']);
            $this->data['city_info'] = $this->fetch_city($row2[0]['country'], $row2[0]['state'], $row2[0]['county'], $row2[0]['city']);
        }

        $cond="order by country_id='US' desc";
        $this->data['countries'] = $this->country_model->fetch($cond);
    	$admin_id = $this->session->userdata($admin_session['admin_id']);
    	$this->get_include();
    	$this->load->view($this->view_dir . 'myfirm/firm_dashboard.php', $this->data);
    }

    function general_info()
    {
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $firm_name = $this->input->post('firm_name');
        $firm_id = $this->input->post('firm_id');
        $firm_code = $this->input->post('firm_code');
        $firm_reg = $this->input->post('firm_reg');
        $firm_jurisdiction = $this->input->post('firm_jurisdiction');

        $firmid_1 = $this->input->post('firmid_1');

        $data_arr1 = array(
            'firm_admin_seq_no' => $admin_id,
            'firm_name' => $firm_name,
            'firm_id' => $firm_id,
            'firm_code' => $firm_code,
            'firm_registration' => $firm_reg,
            'firm_jurisdiction' => $firm_jurisdiction,
            'created_by' => $admin_id,
            'created_date' => time()
        );

        $data_arr2 = array(
            'firm_name' => $firm_name,
            'firm_id' => $firm_id,
            'firm_code' => $firm_code,
            'firm_jurisdiction' => $firm_jurisdiction,
            'updated_by' => $admin_id,
            'updated_date' => time()
        );

        if ($firmid_1 != '' && $firmid_1 != '0') {
            // EDIT
            $cond = " firm_admin_seq_no = '".$admin_id."' and firm_seq_no = '".$firmid_1."'";
            $this->firm_model->edit_cond($data_arr2, $cond);
            $msg = 'update';
            echo json_encode(
                array(
                    'msg' => $msg
                )
            );
        }else{
            // ADD
            $insertid = $this->firm_model->add($data_arr1);
            $msg = 'add'; //. $this->db->last_query();
            echo json_encode(
                array(
                    'id' => $insertid,
                    'msg' => $msg
                )
            );
        }
    }

    function address_info()
    {
//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $address_seq_no = $this->input->post('address_seq_no');
        $id = $this->input->post('firmid_2');

        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $mobile = $this->input->post('mobile');
        $web_url = $this->input->post('web_url');
        $social_url = $this->input->post('social_url');
        $addr_line_1 = $this->input->post('addr_line_1');
        $addr_line_2 = $this->input->post('addr_line_2');
        $country = $this->input->post('country');
        $state = $this->input->post('state');
        $county = $this->input->post('county');
        $city = $this->input->post('city');
        $postal_code = $this->input->post('postal_code');

        if ($address_seq_no == 0) {
            // add
            $data = array(
                'address_line1' => $addr_line_1,
                'address_line2' => $addr_line_2,
                'city' => $city,
                'state' => $state,
                'postal_code' =>$postal_code,
                'country' => $country,
                'county' => $county,
                'email' => $email,
                'phone' => $phone,
                'mobile_cell' => $mobile,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
                'created_by' => $admin_id,
                'created_date' => time()
            );

            $insertid = $this->address_model->add($data);

            $data_arr2 = array(
                'address_seq_no' => $insertid,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );

            $cond = " firm_seq_no = '".$id."'";
            $this->firm_model->edit_cond($data_arr2, $cond);

            $msg = 'add'; //. $this->db->last_query();
            echo json_encode(
                array(
                    'id' => $insertid,
                    'msg' => $msg
                )
            );

        }else if ($address_seq_no > 0) {
            // Edit
            $data = array(
                'address_line1' => $addr_line_1,
                'address_line2' => $addr_line_2,
                'city' => $city,
                'state' => $state,
                'postal_code' =>$postal_code,
                'country' => $country,
                'county' => $county,
                'email' => $email,
                'phone' => $phone,
                'mobile_cell' => $mobile,
                'website_url' => $web_url,
                'social_media_url' => $social_url,
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
            $cond = " address_seq_no = '".$address_seq_no."'";
            $this->address_model->edit_cond($data, $cond);
            
            $msg = 'update';
            echo json_encode(
                array(
                    'msg' => $msg
                )
            );
        }else{
            // not executed
        }
    }

    function sp_info()
    {
//        $admin_all_session = $this->session->userdata('admin_session');
         $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $firmid_3 = $this->input->post('firmid_3');
        $sp_contact_name = $this->input->post('sp_name');
        $sp_contact_role = $this->input->post('sp_role');

        $data_arr2 = array(
            'sp_contact_name' => $sp_contact_name,
            'sp_contact_role' => $sp_contact_role,
            'updated_by' => $admin_id,
            'updated_date' => time()
        );

        if ($firmid_3 != '' && $firmid_3 != '0') {
            // EDIT
            $cond = " firm_seq_no = '".$firmid_3."'";
            $this->firm_model->edit_cond($data_arr2, $cond);
            $msg = 'update';
            echo json_encode(
                array(
                    'msg' => $msg
                )
            );
        }
    }

    function remarks_info()
    {
//        $admin_all_session = $this->session->userdata('admin_session');
         $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $firmid_4 = $this->input->post('firmid_4');
        $remarks = $this->input->post('remarks');

        $data_arr2 = array(
            'remarks_notes' => $remarks,
            'updated_by' => $admin_id,
            'updated_date' => time()
        );

        if ($firmid_4 != '' && $firmid_4 != '0') {
            // EDIT
            $cond = " firm_seq_no = '".$firmid_4."'";
            $this->firm_model->edit_cond($data_arr2, $cond);
            $msg = 'update';
            echo json_encode(
                array(
                    'msg' => $msg
                )
            );
        }
    }

    function fetch_country($selected = '')
    {
        $return = $this->country_model->fetch(); 
        $array1 = array(); $opt = '<option value="">Country</option>'; //<option value="">Country</option>
        foreach ($return as $key => $value) {
            if ($value['country_seq_no'] == $selected) {
                $opt .= '<option value="'.$value['country_seq_no'].'" selected="selected">'.$value['name'].'</option>';
            }else{
                $opt .= '<option value="'.$value['country_seq_no'].'" >'.$value['name'].'</option>';
            }
        } 
        return $opt;
    }

    function fetch_state($country_id = '', $selected = '')
    {
        if($country_id == '') { $country_id = $this->input->post('country_id'); }

        $cond = " and country_seq_no = '".$country_id."'";
        $return = $this->states_model->fetch($cond);
        $array1 = array(); $opt = ''; //<option value="">State</option>
        foreach ($return as $key => $value) {
            if ($value['state_seq_no'] == $selected) {
                $opt .= '<option value="'.$value['state_seq_no'].'" selected="selected">'.$value['state_name'].'</option>';
            }else{
                $opt .= '<option value="'.$value['state_seq_no'].'" >'.$value['state_name'].'</option>';
            }
        }
        return $opt;
    }

    function fetch_county($country_id = '', $state_id = '', $selected = '')
    {
        if($country_id == '') { $country_id = $this->input->post('country_id'); }
        if($state_id == '') { $state_id = $this->input->post('state_id'); }
        $cond = " and country_seq_no = '".$country_id."' and state_seq_no = '".$state_id."'";
        $return = $this->county_model->fetch($cond);
        $opt = ''; //<option value="">County</option>
        foreach ($return as $key => $value) {
            if ($value['county_seq_no'] == $selected) {
                $opt .= '<option value="'.$value['county_seq_no'].'" selected="selected">'.$value['county_name'].'</option>';
            }else{
                $opt .= '<option value="'.$value['county_seq_no'].'" >'.$value['county_name'].'</option>';
            }
        }
        return $opt;
    }

    function fetch_city($country_id = '', $state_id = '', $county_seq_no = '', $selected = '')
    {
        if($country_id == '') { $country_id = $this->input->post('country_id'); }
        if($state_id == '') { $state_id = $this->input->post('state_id'); }
        if($county_seq_no == '') { $county_seq_no = $this->input->post('county_seq_no'); }
        
        $cond = " and country_seq_no = '".$country_id."' and state_seq_no = '".$state_id."' and county_seq_no = '".$county_seq_no."'";
        $return =  $this->city_model->fetch($cond); $opt = ''; //<option value="">City/Town</option>
        foreach ($return as $key => $value) {
            if ($value['city_seq_no'] == $selected) {
                $opt .= '<option value="'.$value['city_seq_no'].'" selected="selected">'.$value['city_name'].'</option>';
            }else{
                $opt .= '<option value="'.$value['city_seq_no'].'" >'.$value['city_name'].'</option>';
            }
        }
        return $opt;
    }

} 