<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_module_number_module extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_module';
		$this->primary_key = 'id';
	}
}
