<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Firm_address_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_firm_address';
		$this->primary_key = 'firm_address_seq_no';
	}
}
