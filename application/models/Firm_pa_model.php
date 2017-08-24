<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Firm_pa_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_firm_pa';
		$this->primary_key = 'firm_pa_seq_no';
	}
}
