<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Strategy_group_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_firm_sg';
		$this->primary_key = 'firm_sg_seq_no';
	}
}