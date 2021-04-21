<?php


require_once APPPATH . 'models/Base_model.php';

class Type_model extends Base_model
{
	public function __construct()
	{
		$this->load->database();
		$this->_db = 'type';
	}

	public function get_type_by_family($family) {
		$sql ='select distinct type.acronym_type, type.id, words.word
				from words
				inner join word_type on word_type.word_id = words.id
				inner join type on type.id = word_type.type_id
				inner join word_family on word_family.id = words.word_family_id
				where word_family.name_family="'. $family .'"';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}
