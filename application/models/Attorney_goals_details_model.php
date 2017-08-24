<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attorney_goals_details_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_att_goal_dtl';
		$this->primary_key = 'at_goal_dtl_seq_no';
	}
}
