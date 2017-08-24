<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class County_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_county';
		$this->primary_key = 'county_seq_no';
	}
}
