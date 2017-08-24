<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Section_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_firm_section';
		$this->primary_key = 'firm_section_seq_no';
	}
}