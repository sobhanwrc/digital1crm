<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->isLogin();
        $this->load->model('user_model');
        $this->data['page'] = 'Profile';
    }

    function index()
    {
//    	$admin_id = $this->session->userdata($admin_session['admin_id']);
    	$this->get_include();
    	$this->load->view($this->view_dir . 'profile/profile', $this->data);
    }

}