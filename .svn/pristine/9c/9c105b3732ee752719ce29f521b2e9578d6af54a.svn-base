<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_settings_model extends MY_Model {
	function __construct() {
		parent::__construct();
		$this->table = 'plma_payment_settings';
		$this->primary_key = 'payment_settings_seq_no';
	}

	function payment_settings_list($firm_seq_no) {
		$this->db->select('plma_payment_settings.payment_settings_seq_no, plma_payment_settings.paypal_info,plma_payment_settings.bank_info,plma_user.user_first_name,plma_user.user_last_name,plma_payment_settings.created_date')->from('plma_payment_settings')
				->join('plma_firm', 'plma_firm.firm_seq_no = plma_payment_settings.firm_seq_no', 'INNER')
				->join('plma_user', 'plma_user.user_seq_no = plma_payment_settings.created_by', 'INNER')
				->where('plma_payment_settings.firm_seq_no = "'.$firm_seq_no.'"')
				->order_by('payment_settings_seq_no');
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}

	function payment_settings_details($payment_settings_seq_no) {
		$this->db->select('*')->from('plma_payment_settings')->where('payment_settings_seq_no = "'.$payment_settings_seq_no.'"');

		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}
}
