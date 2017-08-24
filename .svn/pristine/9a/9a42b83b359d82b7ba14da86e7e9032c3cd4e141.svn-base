<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Budgeting extends MY_Controller {

    function __construct() {
        
        parent::__construct();
        $this->isLogin();
        
        $this->load->model('user_model');
//        echo 456;
    }

    function index()
    {
//    	$admin_all_session = $this->session->userdata('admin_session');

//        echo 123;exit;
    	$this->get_include();
    	$this->load->view($this->view_dir . 'app_transaction/hour_budgeting_tools/listing', $this->data);
    }

    function edit()
    {
//    	$admin_all_session = $this->session->userdata('admin_session');

    	$this->get_include();
    	$this->load->view($this->view_dir . 'app_transaction/hour_budgeting_tools/edit', $this->data);
    }

}

