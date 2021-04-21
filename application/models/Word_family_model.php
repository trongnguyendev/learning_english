<?php


require_once APPPATH . 'models/Base_model.php';

class Word_family_model extends Base_model
{
	public function __construct()
	{
		$this->load->database();
		$this->_db = 'word_family';
	}

	public function get_family_word($data) {
		if(!empty($data)) {
			$this->db->select('name_family');
			$this->db->from($this->_db);
			$this->db->like('name_family', $data, 'after');
			return $this->db->get()->result_array();
		}
	}


	public function check_family_word($data) {
		$this->db->like('name_family', $data);
		$query = $this->db->get($this->_db);
		$result = $query->row();
		if($query->num_rows() >= 1) {
			return $result->id;
		}
		return '';
	}

}
