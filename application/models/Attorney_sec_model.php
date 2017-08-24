<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attorney_sec_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_attorney_sec';
		$this->primary_key = 'asec_relation_seq_no';
	}
}