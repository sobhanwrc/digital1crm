<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Firm_designation_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_firm_designation';
		$this->primary_key = 'firm_designation_seq_no';
	}
}

