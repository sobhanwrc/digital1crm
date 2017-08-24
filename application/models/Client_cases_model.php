<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_cases_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_client_cases';
		$this->primary_key = 'client_case_seq_no';
	}
}

