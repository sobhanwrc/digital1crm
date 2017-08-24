<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Target_conversion_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_tgt_cli_conv';
		$this->primary_key = 'tgt_conversion_seq_no';
	}
}
