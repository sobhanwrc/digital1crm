<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointment_Model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_appointment_details';
		$this->primary_key = 'id';
	}
}
