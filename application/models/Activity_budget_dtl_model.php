<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity_budget_dtl_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_act_bud_dtl';
		$this->primary_key = 'act_bud_dtl_seq_no';
	}
}
