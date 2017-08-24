<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Industry_Type_model extends MY_Model {
	function __construct() {
		parent::__construct();
		$this->table = 'plma_industry_type';
		$this->primary_key = 'industry_type_seq_no';
	}

  function list_industry_type() {
    $this->db->select('*')->from($this->table);
    return $this->db->get()->result_array();
  }

  function industry_type_details($industry_type_seq_no) {
    $this->db->select('*')->from($this->table)->where(" industry_type_seq_no='".$industry_type_seq_no."'");
    return $this->db->get()->result_array();
  }
}
