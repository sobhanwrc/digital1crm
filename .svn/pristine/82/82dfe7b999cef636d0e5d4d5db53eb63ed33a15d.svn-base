<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostGroup_model extends MY_Model {
	function __construct() {
		parent::__construct();
		$this->table = 'plma_post_group';
		$this->primary_key = 'post_group_seq_no';
	}

  function post_group_list() {
    $this->db->select('*')->from('plma_post_group');
    return $this->db->get()->result_array();
  }

	function post_group_details($post_group_seq_no) {
		$this->db->select('*')->from('plma_post_group');
		return $this->db->get()->result_array();
	}
}
