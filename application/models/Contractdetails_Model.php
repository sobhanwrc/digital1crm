<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attorney_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_module4';
		$this->primary_key = 'id';
	}
}

