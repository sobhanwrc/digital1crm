<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_empstaff';
		$this->primary_key = 'empstaff_seq_no';
	}
}