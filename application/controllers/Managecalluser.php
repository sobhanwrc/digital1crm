<?php
 if (!defined('BASEPATH')) exit('No direct script access allowed');
 class Managecalluser extends MY_Controller{

   function __construct() 
    {
       parent::__construct();
       $this->isLogin();
       //$this->load->model('Calluser_Model');

       $this->load->model('Calluserview_Model');
        $this->load->model('Calluser_Model');
       $this->load->helper(array('form', 'url'));

    }

   public function index()
   {
      $this->load->model('Calluser_Model');
      $row=$this->Calluser_Model->fetch();
      $this->data['callview'] = $row;

      $this->get_include();
      $this->load->view($this->view_dir . 'operation_master/manageusers/managecalluserlist',$this->data);

   }
   public function  add()
   {

   	$this->get_include();
    $this->load->view($this->view_dir . 'operation_master/manageusers/managecalluseradd');
   }
   public function add_save()
   {
   	 $this->load->model('Calluser_Model');
   	 $arry_user=$this->input->post();
   	 unset($arry_user['add_new_attorney_btn']);
   	 $arry_user['password']=base64_encode($arry_user['password']);
   	 $res=$this->Calluser_Model->add($arry_user);
   	 
   	 if($res)
   	 {
   	 	redirect($base_url . 'Managecalluser/add');
   	 }

   }
   public function details($code='')
   {

   	  $this->load->model('Calluserview_Model');
   	  $code=base64_decode($code);
   	 
   	  $arry=$this->Calluserview_Model->getviewuser($code);
     
       $data['callview']=$arry;

       $this->get_include();
       $this->load->view($this->view_dir . 'operation_master/manageusers/managecalluserview',$data);

   }
   public function edit($code='')
   {

        $data=array();
        $code=base64_decode($code);
       
        $arry=$this->Calluserview_Model->getviewuser($code);
     
        $data['callview']=$arry;

        $this->get_include();
        $this->load->view($this->view_dir . 'operation_master/manageusers/managecalluseredit.php',$data);
   }
   public function edit_save($code='')
   {

     $code=base64_decode($code);
     $arry_user=$this->input->post();
    
     $arry_user['password']=base64_encode($arry_user['password']);

     $updatedata = $this->Calluser_Model->edit($arry_user, $code);

     if($updatedata)
     {
       $msg = 'Calluser updated successfully';
      redirect($base_url . 'Managecalluser/index');
     }

   }  
     public function delete($code='')
     {
        $del_id=base64_decode($code);
        $res=$this->db->where('call_seq_no',$del_id)->delete('plma_call_user');
        if($res)
         {
            redirect($base_url . 'Managecalluser/index');
         }

     }
     


  

        


}




?>