<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_profiles_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_profile';
		$this->primary_key = 'profile_seq_no';
	}
}
