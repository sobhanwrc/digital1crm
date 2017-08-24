<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_company';
		$this->primary_key = 'company_seq_no';
	}
}
