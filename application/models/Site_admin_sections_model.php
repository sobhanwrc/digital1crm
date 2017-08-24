<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_admin_sections_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_sections';
		$this->primary_key = 'section_seq_no';
	}
}