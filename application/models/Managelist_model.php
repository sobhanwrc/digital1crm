
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managelist_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'manage_list';
		$this->primary_key = 'list_id';
	}
}
?>