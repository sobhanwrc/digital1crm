<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module9_Model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_module9';
		$this->primary_key = 'module_9_seq_no';
	}
}
