<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Address extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('address_model');
        $this->load->model('city_model');
        $this->load->model('country_model');
        $this->load->model('county_model');
        $this->load->model('states_model');
        $this->load->model('codes_model');
        $this->load->model('zips_model');
    }

    //	########################## AJAX CALLS ############################
    function fetch_country() {
        
        $select="country_seq_no,name";
        $cond = "order by country_id='US' desc";
        $return = $this->country_model->fetch($cond,$select);
        $array1 = array();
        $opt = '<option value="">Country</option>';
        foreach ($return as $key => $value) {
            $opt .= '<option value="' . $value['country_seq_no'] . '">' . $value['name'] . '</option>';
        }

        echo $opt;
    }

    function fetch_state($country_id = '') {
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }
        //echo $country_id; die();
        $select="state_seq_no,state_code,state_name";
        $cond = " and country_seq_no = '" . $country_id . "'";
        $return = $this->states_model->fetch($cond,$select); //echo $this->db->last_query();
        $array1 = array();
        $opt = '<option value="">State</option>';
        foreach ($return as $key => $value) {
            $opt .= '<option value="' . $value['state_seq_no'] . '"  state_code="' . $value['state_code'] . '">' . $value['state_name'] . '</option>';
        }
        echo json_encode($opt);
    }

    function fetch_county($country_id = '', $state_id = '') {
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }
        if ($state_id == '') {
            $state_id = $this->input->post('state_id');
        }
        $select="county_seq_no,county_name";
        $cond = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "'";
        $return = $this->county_model->fetch($cond,$select);
        $opt = '<option value="">County</option>';
        $opt2 = '<option value="">City/Town</option>';
        foreach ($return as $key => $value) {
            $opt .= '<option value="' . $value['county_seq_no'] . '">' . $value['county_name'] . '</option>';
        }

         $cond2 = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "' "; //and county_seq_no = '".$value['county_seq_no']."'
            $return2 = $this->city_model->fetch($cond2);
            foreach ($return2 as $key2 => $value2) {
                $opt2 .= '<option value="' . $value2['city_seq_no'] . '">' . $value2['city_name'] . '</option>';
            }
            
        $a = array(
            'county' => $opt,
            'city' => $opt2
        );

        echo json_encode($a);
    }

    function fetch_city($country_id = '', $state_id = '', $county_seq_no = '') {
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }
        if ($state_id == '') {
            $state_id = $this->input->post('state_id');
        }
        if ($county_seq_no == '') {
            $county_seq_no = $this->input->post('county_seq_no');
        }
         $select="city_seq_no,city_name";
        $cond = " and country_seq_no = '" . $country_id . "' and state_seq_no = '" . $state_id . "' and county_seq_no = '" . $county_seq_no . "'";
        $return = $this->city_model->fetch($cond,$select);
        $opt = '<option value="">City/Town</option>';
        foreach ($return as $key => $value) {
            $opt .= '<option value="' . $value['city_seq_no'] . '">' . $value['city_name'] . '</option>';
        }
        echo json_encode($opt);
    }

    function fetch_code_description($code_category = '') {
      
        $code_category = $this->input->post('code_category');
      
        $select = "distinct (short_description),code";
        $cond = "AND category_type='$code_category'";
        $codes = $this->codes_model->fetch($cond, $select);

        $opt = '<option value="">Select One</option>';

        foreach ($codes as $key => $value) {
            $opt .= '<option value="' . $value['code'] . '">' . $value['short_description'] . '</option>';
        }
        echo json_encode($opt);
    }

    function zip_code_check($state_id = '', $city_id = '') {
        //// Fetch state from states table

        if ($state_id == '') {
            $state_id = $this->input->post('state');
        }

        if ($city_id == '') {
            $city_id = $this->input->post('city');
        }
            

        $state_id = $this->input->post('state');
        $select1 = "state_code";
        $cond1 = "AND state_seq_no='" . $state_id . "'";
        $state = $this->states_model->fetch($cond1, $select1); //t($state); exit;
        ///fetch city from city table

        $city_id = $this->input->post('city');
        $select2 = "city_name";
        $cond2 = "AND city_seq_no='" . $city_id . "'";
        $city = $this->city_model->fetch($cond2, $select2); //t($city); exit;

        $postal_code = $this->input->post('zip');

      //  if(strlen($postal_code)>5){
       //    $postal_code = substr($postal_code, 0,5);
      //  }
        
        if ($postal_code != '') {
            
            $select="zips_seq_no";
            $cond = " AND state = '" . $state[0]['state_code'] . "' AND city = '" . $city[0]['city_name'] . "' AND zip = '" . $postal_code . "'";
            $row = $this->zips_model->fetch($cond,$select); 
            
           // echo $this->db->last_query();
//            t($row); 
//            exit;
            
            $row_1 = count($row);
            if ($row_1 > 0) {
                echo 'true';
            } else {
                echo 'false';
            }
        }
    }

//	########################## RETURNING ARRAY ############################	
}
