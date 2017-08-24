<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_contact_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_client_contact';
		$this->primary_key = 'contact_seq_no';
	}
}
