<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_country';
		$this->primary_key = 'country_seq_no';
	}
}
