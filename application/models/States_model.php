<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class States_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_states';
		$this->primary_key = 'state_seq_no';
	}
}
