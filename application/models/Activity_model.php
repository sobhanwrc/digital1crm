<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_activity';
		$this->primary_key = 'activity_seq_no';
	}
}
