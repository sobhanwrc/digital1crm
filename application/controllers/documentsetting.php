<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class documentsetting extends MY_Controller {

	 function __construct() {

        parent::__construct();
        $this->isLogin();

    }
    function index()
    {

         $admin_session_data = $this->session->userdata('admin_session_data');
         $this->db->select('*')->from('plma_document')->where('firm_seq_no',$admin_session_data['firm_seq_no']);
         $get_data=$this->db->get()->result_array();
         
         $this->data['getdata']=$get_data;
        
         $this->get_include();
         $this->load->view($this->view_dir . 'operation_master/document_setting/document_listing', $this->data);
    }
    function upload_doc()
    {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no=$admin_session_data['firm_seq_no'];
        $title_name=$this->input->post('title_name');
        $file_name=$_FILES['file']['name'];
        $a=preg_match('/\s/',$file_name);
        //echo $a;
        //echo $file_name;die();
        
          if($a==0)
          {
                $config['upload_path'] = './assets/upload/attachments';
                $config['allowed_types'] = 'doc|docx|pdf|ppt|flv|mov|gif|jpg|png|xlsx';
                $config['max_size'] = '50000';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';
                $this->load->library('upload', $config);
                  
                if($this->upload->do_upload('file'))
                {
                     $data=array('firm_seq_no'=>$firm_seq_no,'title'=>$title_name,'document_name'=>$file_name,'created_date'=>time(),'updated_date'=>time());
                     $insert_id=$this->db->insert('plma_document',$data);
                     if($insert_id)
                     {
                        echo '1';
                     }
                }

           } 
           else
           {

            $new_name = str_replace(' ', '_', $file_name);

            $config['upload_path'] = './assets/upload/attachments';
                $config['allowed_types'] = 'doc|docx|pdf|ppt|flv|mov|gif|jpg|png|xlsx';
                $config['max_size'] = '50000';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';
                $this->load->library('upload', $config);
                  
                if($this->upload->do_upload('file'))
                {
                     $data=array('firm_seq_no'=>$firm_seq_no,'title'=>$title_name,'document_name'=>$new_name,'created_date'=>time(),'updated_date'=>time());
                     $insert_id=$this->db->insert('plma_document',$data);
                     if($insert_id)
                     {
                        echo '1';
                     }
                }

           }
      }
     function view_document()
     {
        $doc_ids=$this->input->post('doc_id');
        $id=base64_decode($doc_ids);
        $this->db->select('*')->from('plma_document')->where('id="'.$id.'"');
        $row=$this->db->get()->result_array();
        echo json_encode($row);
        
     }
     function edit_document($code='')
      {
        $admin_session_data = $this->session->userdata('admin_session_data');
        $firm_seq_no=$admin_session_data['firm_seq_no'];
        $id=$this->input->post('uid');
        $title_name=$this->input->post('title_edit');
        $hid_file_name=$this->input->post('hid_file_name');
        $file_name=$_FILES['file_edit']['name'];
        if(!empty($file_name))
         {
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
                 $data_upt=array('title'=>$title_name,'document_name'=>$file_name,'created_date'=>time(),'updated_date'=>time());
                 $this->db->where('id',$id,'firm_seq_no',$firm_seq_no);
                 $update_id=$this->db->update('plma_document',$data_upt);
                 if($update_id)
                 {
                    echo '1';
                 }
            }

         }
        else
         {
             $data_upt=array('title'=>$title_name,'created_date'=>time(),'updated_date'=>time());
             $this->db->where('id',$id,'firm_seq_no',$firm_seq_no);
             $update_id=$this->db->update('plma_document',$data_upt);
             if($update_id)
              {
                    echo '1';
              }
         }
      }
      function delete()
      {
        $delt_id=$this->input->post('delt_id');
        $iddlt=base64_decode($delt_id);
        $this->db->select('*')->from('plma_document')->where('id="'.$iddlt.'"');
        $row=$this->db->get()->result_array();
        $file_name=$row[0]['document_name'];
         @unlink('./assets/upload/attachments/'.$file_name);
        $this->db->where('id',$iddlt);
        $delete_id=$this->db->delete('plma_document');
        if($delete_id)
        {
            echo '1';
        }

      }
   
  }   