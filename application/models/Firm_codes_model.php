<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Firm_codes_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_firm_codes';
		$this->primary_key = 'firm_code_seq_no';
	}
}
