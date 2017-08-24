<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Target_conversion extends MY_Controller {

    function __construct() {
        
        parent::__construct();
//        $this->isLogin();
        
        $this->load->model('user_model');
        $this->load->model('codes_model');
        $this->load->model('target_conversion_model');
        $this->load->model('targets_model');
        $this->load->model('firm_model');
        $this->load->model('client_model');
//        $this->data['page'] = 'Dashboard';
    }

    function index()
    {
        $admin_id = $this->data['admin_id'];
        $role_code = $this->data['role_code'];
        
        $sql_12 = "select ptgt.firm_seq_no from plma_firm pfirm, plma_target ptgt where ptgt.firm_seq_no = pfirm.firm_seq_no group by ptgt.firm_seq_no";
        $res_12 = $this->db->query($sql_12);
        $row2 = $res_12->result_array();
//        t($row2[0]['firm_seq_no']); exit;
        $firm_code = $row2[0]['firm_seq_no'];
        if ($role_code == 'FIRMADM') {
            $sql_13 = "Select ptgt.*,f.firm_name, f.firm_seq_no from plma_target as ptgt inner join plma_firm as f "
                    . " on ptgt.firm_seq_no=f.firm_seq_no where f.firm_admin_seq_no=$admin_id";
        }
//        echo $sql_13; exit;
        $res_13 = $this->db->query($sql_13);
        $row3 = $res_13->result_array();
        //t($row[0]['firm_seq_no']); exit;
        $firm_code = $row3[0]['firm_seq_no'];

        $select = "firm_seq_no,firm_name";
        $this->data['firms'] = $this->firm_model->fetch('', $select);
        
        $sql = "select 
            p_trgt.* ,
            p_trgt.remarks_notes trgt_remark,
            p_code.*, 
            paddr.*,
            pcity.city_name, 
            pcountry.name, 
            pstate.state_name,
            pfirm.firm_seq_no
        from 
            plma_target p_trgt,
            plma_codes p_code,
            plma_address paddr,
            plma_city pcity, 
            plma_country pcountry, 
            plma_states pstate,
            plma_firm pfirm
        where
            p_trgt.firm_seq_no = pfirm.firm_seq_no and
            p_code.code = p_trgt.target_gender and 
            paddr.address_seq_no = p_trgt.address_seq_no and 
            pcity.city_seq_no = paddr.city and 
            pcountry.country_seq_no = paddr.country and
            pstate.state_seq_no = paddr.state and pfirm.firm_admin_seq_no = '" . $admin_id . "'";
        
        $res = $this->db->query($sql);
//        echo $sql; exit;
        $row1 = $res->result_array();
        $this->data['all_targets1'] = $row1;
//        t($this->data['all_targets1']); exit;
        foreach($row1 as $key => $value)
        {
            $status_tgt = $value['association_status'];
            $cond1 = "AND code = '$status_tgt' AND category_type='Target Status'";
            $status = $this->codes_model->fetch($cond1);
//              echo $this->db->last_query(); die();
            $ind_1 = $value['industry_type'];
            $cond2 = "AND code = '$ind_1' AND category_type='Industry Type'";
            $ind_type = $this->codes_model->fetch($cond2);
//                echo $this->db->last_query(); die();
            $row1[$key]['association_status'] = $status[0]['short_description'];
            $row1[$key]['industry_type'] = $ind_type[0]['short_description'];
        }
        $this->data['all_targets'] = $row1;
        
        $sql_1 = "SELECT user_seq_no, user_first_name, user_last_name FROM plma_user WHERE role_code IN ('FIRMADM', 'ATTR') GROUP BY user_seq_no";
        $query = $this->db->query($sql_1);
        $firm_admin = $query->result_array();
//        echo $this->db->last_query(); die();
        $this->data['firm_admin'] = $firm_admin;
//        t($this->data['firm_admin']); exit;
        
        
        $sql_4 = "SELECT user_seq_no, user_first_name, user_last_name FROM plma_user WHERE role_code IN ('ATTR') AND approver = '1' AND created_by = '" . $admin_id . "'";
        $query_1 = $this->db->query($sql_4);
        $approvers = $query_1->result_array();
//        echo $this->db->last_query(); die();
        $this->data['approvers'] = $approvers;
//        t($this->data['approvers']); exit;
    	$this->get_include();
    	$this->load->view($this->view_dir . 'operation_master/target_conversion/listing', $this->data);
    }
    function fetchFirmCodes($param) {    
//         echo "ok"; exit;
        $firm_id = $this->input->post('fimrs');
        // echo $firm_id; exit;

        if ($firm_id == 'all' || $firm_id == '') {
//             echo "ok"; exit;
            $sql = "Select tgt.*,f.firm_name, f.firm_seq_no from plma_target as tgt inner join plma_firm as f "
                    . " on tgt.firm_seq_no=f.firm_seq_no";
        } else {
//             echo "ok"; exit;
            $sql = "Select tgt.*,f.firm_name, f.firm_seq_no from plma_target as tgt inner join plma_firm as f "
                    . " on tgt.firm_seq_no=f.firm_seq_no where f.firm_admin_seq_no=$firm_id";
        }
//        echo $sql; exit;
        $res = $this->db->query($sql);
        $row1 = $res->result_array();
        $this->data['all_targets1'] = $row1;
        foreach($row1 as $key => $value)
        {
            $status_tgt = $value['association_status'];
            $cond1 = "AND code = '$status_tgt' AND category_type='Target Status'";
            $status = $this->codes_model->fetch($cond1);
//              echo $this->db->last_query(); die();
            $ind_1 = $value['industry_type'];
            $cond2 = "AND code = '$ind_1' AND category_type='Industry Type'";
            $ind_type = $this->codes_model->fetch($cond2);
//                echo $this->db->last_query(); die();
            $row1[$key]['association_status'] = $status[0]['short_description'];
            $row1[$key]['industry_type'] = $ind_type[0]['short_description'];
        }
        $this->data['all_targets'] = $row1;
        // t($firm_codes);exit;

        $select = "firm_seq_no,firm_name";
        $this->data['firms'] = $this->firm_model->fetch('', $select);
        $this->data['firm_id'] = $firm_id;
        
        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/target_conversion/listing', $this->data);
    }
    function convert($code = '')
    {
            $code = base64_decode($code); 
            
//            $admin_all_session = $this->session->userdata('admin_session');
            $admin_id  =  $this->data['admin_id'];
        $role_code = $this->data['role_code'];
            
            $sql = "select pfirm.firm_seq_no from plma_firm pfirm, plma_target ptgt where ptgt.firm_seq_no = pfirm.firm_seq_no and pfirm.firm_admin_seq_no = '" . $admin_id . "' group by ptgt.firm_seq_no";
            $res = $this->db->query($sql);
            $row4 = $res->result_array();
            $firm_code = $row4[0]['firm_seq_no'];
//            echo $firm_code; exit;
            $cond = "AND target_seq_no = '".$code."'";
            $row = $this->targets_model->fetch($cond);
            $this->data['targets'] = $row[0];
            $target_seq_no = $row[0]['target_seq_no'];
            
//            echo $target_seq_no; exit;

            $sql_32 = "INSERT INTO `plma_client` (`firm_seq_no`, `attorney_seq_no`, `client_id`, `client_code`, `client_first_name`, `client_last_name`, `client_dob`, `client_gender`, `social_security_no`, `client_company_name`, `address_seq_no`, `industry_type`, `created_by`, `created_date`, `remarks_notes`) "
                    . "SELECT `firm_seq_no`, `attorney_seq_no`, `target_id`, `target_code`, `target_first_name`, `target_last_name`, `target_dob`, `target_gender`, `social_security_no`, `target_company_name`, `address_seq_no`, `industry_type`, `created_by`, `created_date`, `remarks_notes` "
                    . "FROM `plma_target` WHERE `target_seq_no` = '".$code."'";
            $query = $this->db->query($sql_32, $code);
//            echo $this->db->last_query(); exit;
            $client_seq_no = $this->db->insert_id();
            
            $conv_doc_ref = $this->input->post('conv_doc_ref');
//            $user_seq_no = $this->input->post('user_seq_no');
            $conv_approved_by = $this->input->post('conv_approved_by');
            $remarks = $this->input->post('remarks');
            
            $data_con = array(
                'target_seq_no' => $target_seq_no,
                'client_seq_no' => $client_seq_no,
                'firm_seq_no' => $firm_code,
                'conversion_date' => time(),
                'conversion_doc_ref' => $conv_doc_ref,
                'user_seq_no' => $admin_id,                                        /////////LOGGED IN AS FIRM ADMIN
                'conv_approved_by' => $conv_approved_by,                           ////////APPROVED BY APPROVERS ONLY
                'remarks_notes' => $remarks,
                'created_by' => $admin_id,
                'created_date' => time(),
                'updated_by' => $admin_id,
                'updated_date' => time()
            );
//            echo "<pre>"; print_r($data_con); exit;
            $convert_det = $this->target_conversion_model->add($data_con, $code);
            if ($query) {
//                echo"ok"; die();
                 $data_array = array('association_status' => CONVERTED);
//                echo "<pre>"; print_r($data_array); exit;
                $status_change = $this->targets_model->edit($data_array, $row[0]['target_seq_no']); 
//                echo $this->db->last_query(); exit;
                $msg = 'Target converted successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'target_conversion');
               
            }else{
                $msg = 'error in converting Target';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
                redirect($base_url . 'target_conversion');
            }

    	$this->get_include();
    	$this->load->view($this->view_dir . 'operation_master/target_conversion/listing', $this->data);
    }

}
