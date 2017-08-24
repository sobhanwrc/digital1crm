<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'plma_category';
		$this->primary_key = 'id';
	}
        
         function max_id_fetch()
         {
              $this->db->select_max('id');
              $query = $this->db->get('plma_category');
               return $query->result_array();
         }
         function update_category($id,$data1)
         {
                //echo $category1; die();
                //t($data1);  die();
             
                $this->db->where('id', $id);
                $this->db->update('plma_category', $data1);
                //echo $this->db->last_query(); die();
         }
         
         
         
         
         
}