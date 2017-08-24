<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Call_log_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_call_log';
		$this->primary_key = 'id';
	}
}
