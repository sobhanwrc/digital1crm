<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model5 extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_module5';
		$this->primary_key = 'id';
	}
	
}

?>