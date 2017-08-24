<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Callappointment_Model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_appointment_user';
		$this->primary_key = 'appt_seq_no';
	}
	
}

