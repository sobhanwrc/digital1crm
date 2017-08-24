<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venue_model extends MY_Model {
	function __construct() {
		parent::__construct();
		$this->table = 'plma_venue';
		$this->primary_key = 'venue_seq_no';
	}

	function venue_list() {
		$this->db->select('plma_venue.venue_seq_no,plma_venue.venue_name,plma_venue.contact_person,plma_venue.contact_no,plma_venue.created_date,plma_user.user_first_name,plma_user.user_last_name,plma_country.name as country_name,plma_states.state_name,plma_city.city_name,plma_zips.zip')->select('plma_venue.venue_seq_no')->from('plma_venue')
				->join('plma_country', 'plma_country.country_seq_no = plma_venue.country_seq_no', 'INNER')
				->join('plma_states', 'plma_states.state_seq_no = plma_venue.state_seq_no', 'INNER')
				->join('plma_city', 'plma_city.city_seq_no = plma_venue.city_seq_no', 'INNER')
				->join('plma_zips', 'plma_zips.zips_seq_no = plma_venue.zips_seq_no', 'INNER')
				->join('plma_user', 'plma_user.user_seq_no = plma_venue.created_by', 'INNER')
				->order_by('country_name');
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}

	function venue_details($venue_seq_no) {
		$this->db->select('plma_venue.venue_seq_no,plma_venue.venue_name,plma_venue.venue_address,plma_venue.contact_person,plma_venue.contact_no,plma_venue.status,plma_venue.created_date,plma_user.user_first_name,plma_user.user_last_name,plma_country.name as country_name,plma_country.country_seq_no,plma_states.state_name,plma_states.state_seq_no,plma_city.city_name,plma_city.city_seq_no,plma_zips.zip,plma_zips.zips_seq_no')->select('plma_venue.venue_seq_no')->from('plma_venue')
				->join('plma_country', 'plma_country.country_seq_no = plma_venue.country_seq_no', 'INNER')
				->join('plma_states', 'plma_states.state_seq_no = plma_venue.state_seq_no', 'INNER')
				->join('plma_city', 'plma_city.city_seq_no = plma_venue.city_seq_no', 'INNER')
				->join('plma_zips', 'plma_zips.zips_seq_no = plma_venue.zips_seq_no', 'INNER')
				->join('plma_user', 'plma_user.user_seq_no = plma_venue.created_by', 'INNER')
				->where('plma_venue.venue_seq_no = "'.$venue_seq_no.'"');
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}

	function country_info() {
		$this->db->select('country_seq_no,name')->from('plma_country')->order_by('name');
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}

	function state_info($country_seq_no) {
		$this->db->select('state_seq_no,state_name')->from('plma_states')->where('country_seq_no = "'.$country_seq_no.'"')->order_by('state_name');
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}

	function city_info($state_seq_no) {
		$this->db->select('city_seq_no,city_name')->from('plma_city')->where('state_seq_no = "'.$state_seq_no.'"')->order_by('city_name');
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}

	function zip_info($city) {
		$this->db->select('zips_seq_no,zip')->from('plma_zips')->where('city = "'.$city.'"')->order_by('zip');
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}
	function venue_name($venue_data)
	{

		$shq=$this->db>query("select * from plma_venue where venue_seq_no='".$venue_data."'");
		
		return $shq->result_array();
	}
}