<?php


require_once APPPATH . 'models/Base_model.php';

class Source_model extends Base_model
{
	public function __construct()
	{
		$this->load->database();
		$this->_db = 'source';
	}

	public function get_source_word() {
		$sql = 'select source.name_source, count( words.word) as count_words, source.id
				from source
				inner join words on source.id = words.source_id
				group by source.name_source, source.id
				';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}
