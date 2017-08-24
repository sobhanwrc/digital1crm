<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_ui_acl_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_role_ui_acl';
		$this->primary_key = 'role_ui_acl_seq_no';
	}
}

