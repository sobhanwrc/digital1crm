<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Audit_trails extends MY_Controller {

    function __construct() {
        
        parent::__construct();
//        $this->isLogin();
        
        $this->load->model('user_model');
        $this->data['page'] = 'Dashboard';
    }

    function index()
    {
//    	$admin_all_session = $this->session->userdata('admin_session');

    	$this->get_include();
    	$this->load->view($this->view_dir . 'app_transaction/audit_trails/listing', $this->data);
    }

    function edit()
    {
//    	$admin_all_session = $this->session->userdata('admin_session');

    	$this->get_include();
    	$this->load->view($this->view_dir . 'app_transaction/audit_trails/edit', $this->data);
    }

}


