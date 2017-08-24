<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calluserview_Model extends CI_Model
{
	 public function getviewuser($code='')
	 {

	 	$sql="select * from plma_call_user where call_seq_no='".$code."'";
        $arry=$this->db->query($sql);
        return $arry->result_array();
	 }
	
}

