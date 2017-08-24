<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ui_lists_security_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_ui_list';
		$this->primary_key = 'ui_seq_no';
	}
}

