<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	public $table;
	public $primary_key;

	function __construct()
	{
		parent::__construct();
	}

	function fetch($cond = '', $select = '*', $limit = NULL, $offset = NULL, $table = NULL) {

        if ($cond) {
            $where = ' 1 ' . $cond;
            $this->db->where($where, null, false);
        }
		//$this->db->cache_on();
        $this->db->select($select);
        $this->db->limit($limit, $offset);
        //$this->db->orderby("attribute_name", "ASC");
        $Table = empty($table) ? $this->table : $table;
        $query = $this->db->get($Table);
        return $query->result_array();
    }

    function add($data_field = array()) {

        $this->db->insert($this->table, $data_field);
        return $this->db->insert_id();
    }

    function edit($data_field = array(), $id) {

        $this->db->cache_on();
        $this->db->where($this->primary_key, $id);
        $result = $this->db->update($this->table, $data_field);
        if ($this->db->affected_rows() > 0)
            return $this->db->affected_rows();;
    }

    function edit_cond($data_field = array(), $where) {
        $re = $this->db->update($this->table, $data_field, $where);
        return $this->db->affected_rows();
    }

    function delete_cond($cond = '') {
        $where = ' 1 ' . $cond;
        $this->db->where($where, NULL, false);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    function delete($id) {
        $this->db->where($this->primary_key, $id)->delete($this->table);
        return $this->db->affected_rows();
    }

	function count_all() {
	    return $this->db->count_all_results($this->table);
	}

	function count_all_cond($cond = '') {
	    if ($cond) {
	        $where = ' 1 ' . $cond;
	        $this->db->where($where, null, false);
	    }

	    $this->db->select('COUNT(*) AS cnt');
	    $query = $this->db->get($this->table);
	    $arrcnt = $query->result_array();
	    return $arrcnt[0]['cnt'];
	}
}