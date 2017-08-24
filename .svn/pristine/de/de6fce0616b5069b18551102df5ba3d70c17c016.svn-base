<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Meeting_Appointment extends MY_Controller {

    function __construct() 
    {
      parent::__construct();

        $this->isLogin();

        $this->load->model('firm_model');
        $this->load->model('user_model');
        $this->load->model('app_users_model');
        $this->load->model('address_model');
        $this->load->model('country_model');
        $this->load->model('county_model');
        $this->load->model('states_model');
        $this->load->model('city_model');
        $this->load->model('firm_codes_model');
        $this->load->model('codes_model');
        $this->load->model('firm_attorney_model');
        $this->load->model('attorney_model');
        $this->load->model('attorney_rpt_model');
        $this->load->model('attorney_sg_model');
        $this->load->model('attorney_sec_model');
        $this->load->model('section_model');
        $this->load->model('designation_model');
        $this->load->model('group_model');
       $this->load->model('Meeting_Model');
        $this->load->helper(array('form', 'url'));
    }
    
    
    public function index()
    {

             $list=$this->Meeting_Model->getData();
             $data['meeting']=$list;

             $this->get_include();
             $this->load->view($this->view_dir . 'operation_master/meeting/listing',$data);
    }
    public function add()
    {
        
         $this->get_include();
         $this->load->view($this->view_dir . 'operation_master/meeting/add', $this->data);
    }
    public function add_save()
    {
               
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
                 if ($this->upload->do_upload('profile_photo'))
                 {
                     $filename=$this->upload->do_upload('profile_photo');
                      print_r($filename['profile_photo']);

                 }

                

         /*$arry=$this->input->post();
         unset($arry['add_new_attorney_btn']);
        
         $res=$this->db->insert('plma_meeting_appointment',$arry);

         if($res)
         {
            $this->load->view($this->view_dir . 'operation_master/meeting/listing');
         }
          */
    }
    public function details($code = '')
    {  
            $data=array();
            $code = base64_decode($code);
            $list=$this->Meeting_Model->getview($code);
            $data['views']=$list;

            $getcountry=$this->Meeting_Model->geteditcountry();
            $data['country']=$getcountry;

            $getstate=$this->Meeting_Model->geteditstate();
            $data['state']=$getstate;
         
            $getcity=$this->Meeting_Model->geteditcity();
            $data['city']=$getcity;

            $this->get_include();
            $this->load->view($this->view_dir . 'operation_master/meeting/meeting_view',$data);
        
    
    }
    public function edit($code='')
    {
         $data=array();
        $cid=base64_decode($code);
        //echo $cid;
        $getrow=$this->Meeting_Model->geteditdata($cid);
        $data['views']=$getrow;

        $getcountry=$this->Meeting_Model->geteditcountry();
        $data['country']=$getcountry;

        $getstate=$this->Meeting_Model->geteditstate();
        $data['state']=$getstate;
         
        $getcity=$this->Meeting_Model->geteditcity();
        $data['city']=$getcity;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/meeting/edit',$data);
        

    }
    public function edit_save($code='')
    {
      $array_data=$this->input->post();
      $cid=base64_decode($code);
    
      unset($array_data['firmid_2']);
      unset($array_data['general_save_change']);
      unset($array_data['competitor_tab']);
   
        $this->db->where('meeting_seq_no',$cid);
        $res=$this->db->update('plma_meeting_appointment',$array_data);

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/meeting/listing');

    }
    public function delete($code='')
    {
      $del_id=base64_decode($code);
      $res=$this->db->where('meeting_seq_no',$del_id)->delete('plma_meeting_appointment');
       if($res)
         {
            $this->load->view($this->view_dir . 'operation_master/meeting/listing');
         }
    }





   }