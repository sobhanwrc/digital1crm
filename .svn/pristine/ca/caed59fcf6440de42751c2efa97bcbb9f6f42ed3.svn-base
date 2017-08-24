<?php

/*
  if (!defined('BASEPATH'))
  exit('No direct script access allowed');
 */

class Signaturesettings extends MY_Controller {

    function __construct() {

        parent::__construct();

        $this->isLogin();

        $this->load->model('signature_model');

        $this->load->helper('url');

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
            $row = $this->signature_model->fetch($cond);
            $this->data['signature'] = $row;
        }
        $this->get_include();

        // print_r($data);
        //die();
        $this->load->view($this->view_dir . 'operation_master/signaturesettings/signature_view', $this->data);
    }

    function edit() {
        $msg = $this->input->post('msg');
        $admin_session_data = $this->session->userdata('admin_session_data');
        $farm_seq_no = $admin_session_data['firm_seq_no'];
        
        if ($farm_seq_no != '') {
            $cond = " and firm_seq_no = '" . $farm_seq_no . "'";
            $row = $this->signature_model->fetch($cond);
            if (count($row)) {
                $signature_arr = array(
                    'signature' => $this->input->post('msg')
                );
                $cond = " firm_seq_no = '" . $farm_seq_no . "'";
                $insert_id = $this->signature_model->edit_cond($signature_arr, $cond);
                if ($insert_id) {
                    echo "1";
                } else {
                    echo "0";
                }
            } else {
                $signature_arr = array(
                    'signature' => $this->input->post('msg'),
                    'firm_seq_no' => $farm_seq_no
                );

                $insert_id = $this->signature_model->add($signature_arr);
            }
        }
    }

}

?>