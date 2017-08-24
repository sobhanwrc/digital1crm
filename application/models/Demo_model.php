<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_next_prev_demo';
		$this->primary_key = 'id';
	}
}
