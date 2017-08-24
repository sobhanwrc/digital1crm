<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cli_att_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_cli_attorney';
		$this->primary_key = 'cli_attorney_seq_no';
	}
}
