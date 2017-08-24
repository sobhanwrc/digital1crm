<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Activity_approvals extends MY_Controller {

    function __construct() {
        
        parent::__construct();
//        $this->isLogin();
        
        $this->load->model('user_model');
        $this->load->model('activity_approvals_model');
        $this->load->model('activity_model');

    }

    function index()
    {
//        $admin_all_session = $this->session->userdata('admin_session');
       $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $sql1 = "select * from plma_act_approval paa, plma_activity pact where paa.activity_seq_no = pact.activity_seq_no and paa.user_seq_no = '".$admin_id."'";
        $qry1 = $this->db->query($sql1);
        $res1 = $qry1->result_array(); //t($res1); exit;

        $this->data['approvals']= $res1;//$this->activity_approvals_model->fetch(" and user_seq_no = '".$admin_id."' ");

        $this->get_include();
        $this->load->view($this->view_dir . 'app_transaction/activity_approvals/listing', $this->data);
    }

    function approve($yn = '', $code ='')
    {
        $code = base64_decode($code);

//        $admin_all_session = $this->session->userdata('admin_session');
        $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];

        $arr = $arr1 = array();
        if ($yn == 'yes') { 
           $arr = array(
                'approval_date' => date('d-M-Y'),
                'approval_status' => $this->data['codes']['Approval Status'][1]['code'], //APPROVED
                'updated_by' => $admin_id,
                'updated_date' => time()
            ); 
            $arr1 = array(
                'activity_status' => $this->data['codes']['Activity Status'][2]['code'], //APPRACT
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
        }else if($yn == 'no')
        { 
            $arr = array(
                'approval_date' => date('d-M-Y'),
                'approval_status' => $this->data['codes']['Approval Status'][2]['code'], //NOTAPPR
                'updated_by' => $admin_id,
                'updated_date' => time()
            ); 
            $arr1 = array(
                'activity_status' => $this->data['codes']['Activity Status'][3]['code'], //NAPPRACT
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
        }
        

        $res2 = $this->activity_approvals_model->edit($arr, $code);

        $res0 = $this->activity_approvals_model->fetch(" and act_approval_seq_no = " . $code);
        $res3 = $this->activity_model->edit($arr1, $res0[0]['activity_seq_no']);

        redirect($base_url . 'activity_approvals');

    }

    /* 
    function index()
    {
    	$admin_all_session = $this->session->userdata('admin_session');
        $admin_id =  $this->data['admin_id'];
        
        $select="user_approver_type,user_seq_no,user_first_name,user_last_name";
        $cond = "AND approver=1 AND role_code=4";
        $this->data['approvers']=$this->user_model->fetch($cond,$select);

    	$this->get_include();
    	$this->load->view($this->view_dir . 'app_transaction/activity_approvals/listing', $this->data);
    }
    
    function add()
    {
    	$admin_all_session = $this->session->userdata('admin_session');
        
        $admin_id =  $this->data['admin_id'];

    	$this->get_include();
    	$this->load->view($this->view_dir . 'app_transaction/activity_approvals/listing', $this->data);
    }

    function edit()
    {
    	$admin_all_session = $this->session->userdata('admin_session');

    	$this->get_include();
    	$this->load->view($this->view_dir . 'app_transaction/activity/edit', $this->data);
    }*/

}
