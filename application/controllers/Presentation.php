<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
* 
*/
class Presentation extends MY_Controller
{
	
	function __construct() {

        parent::__construct();
        $this->isLogin();

        $this->load->model('user_model');
        $this->load->model('activity_model');
        $this->load->model('activity_dtl_model');
        $this->load->model('activity_budget_model');
        $this->load->model('activity_budget_dtl_model');
        $this->load->model('act_attorney_model');
        $this->load->model('activity_approvals_model');
        $this->data['page'] = 'Dashboard';
        $this->load->model('client_contact_model');
        $this->load->model('target_contact_model');
        $this->load->model('add_contact_model');

        $this->load->model('Module6_Model');
        $this->load->model('targets_model');
        $this->load->model('Allnote_Model');
        $this->load->model('Module7_Model');
        $this->load->model('module_setting_model');
        $this->load->model('emailtemplate_model');
        $this->load->model('signature_model');
        $this->load->model('send_sms_model');
        $this->load->model('change_module_number_module');
        $this->load->model('sms_add_model');
        //t($this->data['codes']['Activity Status']) ; exit;
        //echo $this->code_desc('PENDACT'); exit;
    }

    public function index(){
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no=$admin_session_data['firm_seq_no'];

        $presentation_query = "SELECT * FROM `plma_presentation_files` WHERE firm_seq_no=$firm_seq_no order by `id` desc";
        $fetch = $this->db->query($presentation_query);
        $fetch_details = $fetch->result_array();

        $this->data['getdata']=$fetch_details;

    	$this->get_include();
    	$this->load->view($this->view_dir . 'presentation/listings', $this->data);
    }

    public function upload_doc() {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no=$admin_session_data['firm_seq_no'];

        $title_name=$this->input->post('title_name');
        $file_name=$_FILES['file']['name'];
        $a=preg_match('/\s/',$file_name);
        //echo $a;
        //echo $file_name;die();
        
          if($a==0) {
                $config['upload_path'] = './assets/upload/attachments';
                $config['allowed_types'] = 'doc|docx|pdf|ppt|flv|mov|gif|jpg|png|xlsx';
                $new_name = str_replace(' ', '_', $file_name);
                $new_name = str_replace(')', '_', $new_name);
                $new_name = str_replace('(', '_', $new_name);
                $config['file_name'] = $new_name;
                
                $this->load->library('upload', $config);
                  
                if($this->upload->do_upload('file'))
                {
                     $data=array('firm_seq_no'=>$firm_seq_no,'title'=>$title_name,'presentation_file_name'=>$new_name,'created_date'=>time());
                     $insert_id=$this->db->insert('plma_presentation_files',$data);
                     
                     if($insert_id)
                     {
                        echo '1';
                     }
                }
                else {
                    echo '0';
                }

            } else{

                $new_name = str_replace(' ', '_', $file_name);
                $new_name = str_replace(')', '_', $new_name);
                $new_name = str_replace('(', '_', $new_name);

                $config['upload_path'] = './assets/upload/attachments';
                $config['allowed_types'] = 'doc|docx|pdf|ppt|flv|mov|gif|jpg|png|xlsx';
                $config['file_name'] = $new_name;
                
                $this->load->library('upload', $config);
                  
                if($this->upload->do_upload('file'))
                {
                     $data=array('firm_seq_no'=>$firm_seq_no,'title'=>$title_name,'presentation_file_name'=>$new_name,'created_date'=>time());
                     $insert_id=$this->db->insert('plma_presentation_files',$data);
                     if($insert_id)
                     {
                        echo '1';
                     }
                }
                else {
                    echo '0';
                }

           }
    }

    public function delete() {
        $delt_id=$this->input->post('delt_id');
        $iddlt=base64_decode($delt_id);

        $this->db->select('*')->from('plma_presentation_files')->where('id="'.$iddlt.'"');
        $row=$this->db->get()->result_array();
        $file_name=$row[0]['document_name'];
        @unlink('./assets/upload/attachments/'.$file_name);

        $this->db->where('id',$iddlt);
        $delete_id=$this->db->delete('plma_presentation_files');
        if($delete_id)
        {
            echo '1';
        }

    }

    public function view_document() {
        $doc_ids=$this->input->post('doc_id');
        $id=base64_decode($doc_ids);
        $this->db->select('*')->from('plma_presentation_files')->where('id="'.$id.'"');
        $row=$this->db->get()->result_array();
        echo json_encode($row);
        
    }

    public function edit_document($code='') {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no=$admin_session_data['firm_seq_no'];
        $id=$this->input->post('uid');
        $title_name=$this->input->post('title_edit');
        $hid_file_name=$this->input->post('hid_file_name');
        $file_name=$_FILES['file_edit']['name'];
        if(!empty($file_name)){
            //echo $title_name.'#'.$file_name.'#'.$id;
            @unlink('./assets/upload/attachments/'.$hid_file_name);
            $config['upload_path'] = './assets/upload/attachments';
            $config['allowed_types'] = 'doc|docx|pdf|ppt|flv|mov|gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $this->load->library('upload', $config);
            if($this->upload->do_upload('file_edit'))
            {
                 $data_upt=array('title'=>$title_name,'presentation_file_name'=>$file_name,'created_date'=>time());
                 $this->db->where('id',$id,'firm_seq_no',$firm_seq_no);
                 $update_id=$this->db->update('plma_presentation_files',$data_upt);
                 if($update_id)
                 {
                    echo '1';
                 }
            }

        }else{
             $data_upt=array('title'=>$title_name,'created_date'=>time());
             $this->db->where('id',$id,'firm_seq_no',$firm_seq_no);
             $update_id=$this->db->update('plma_presentation_files',$data_upt);
             if($update_id)
              {
                    echo '1';
              }
        }
    }

}

?>