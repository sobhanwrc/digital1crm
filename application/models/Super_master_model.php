<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Super_master_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_super_master_target';
		$this->primary_key = 'target_seq_no';
	}
}