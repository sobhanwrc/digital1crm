<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meeting_Model extends CI_Model
{
	 public function getData()
	 {

	 	$query=$this->db->get('plma_meeting_appointment');
	 	return $query->result_array();
	 }
	 public function getview($code)
	 {
           // $this->db->where('meeting_seq_no',$code);
	       // $query=$this->db->get('plma_meeting_appointment');
	        //return $query->row_array();

            $sql="select * from plma_meeting_appointment where meeting_seq_no='".$code."'";
            $query=$this->db->query($sql);
            return $query->result_array();

	 }
	 public function geteditdata($id)
	 {
       $sql_edit="select * from plma_meeting_appointment where meeting_seq_no='".$id."'";
       $query=$this->db->query($sql_edit);
       return $query->result_array();


	 }
	 public function geteditcountry()
	 {

	 	$query_country=$this->db->get('plma_country');
	 	return $query_country->result_array();
	 }
	 public function geteditstate()
	 {

	 	$query_state=$this->db->get('plma_states');
	 	return $query_state->result_array();
	 }
	 public function geteditcity()
	 {
       $query_city=$this->db->get('plma_city');
	   return $query_city->result_array();
	 }

	 

	 
}