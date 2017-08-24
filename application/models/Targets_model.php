<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Targets_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_target';
		$this->primary_key = 'target_seq_no';
	}
        
        public function dist_category()
        {
            $this->db->distinct();
            $this->db->select('categories');
            $query = $this->db->get('plma_target');
            return $query->result_array();
        }        
}
