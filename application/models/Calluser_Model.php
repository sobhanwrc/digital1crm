<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calluser_Model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_call_user';
		$this->primary_key = 'call_seq_no';
	}
	
}

