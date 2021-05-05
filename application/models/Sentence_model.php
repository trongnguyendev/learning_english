<?php

require_once APPPATH . 'models/Base_model.php';

class Sentence_model extends Base_model
{
	public function __construct()
	{
		$this->load->database();
		$this->_db = 'sentences';
	}

	public function update_sentence($id, $data_update) {
		$new_sentence = $data_update['new_sentence'];

		if($this->find_bool($id, 'id')) {
			$sql = 'update sentences '
				.'set content = "'. $new_sentence .'" '
				.'where id='. $id .' ';
			$query = $this->db->query($sql);
			return true;
		}
		return false;
	}
}
