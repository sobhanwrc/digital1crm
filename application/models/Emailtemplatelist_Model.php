<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emailtemplatelist_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_template';
		$this->primary_key = 'id';
	}
}

?>
