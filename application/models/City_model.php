<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_city';
		$this->primary_key = 'city_seq_no';
	}
}
