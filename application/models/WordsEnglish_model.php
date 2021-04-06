<?php
class WordsEnglish_model extends  CI_Model {
	protected $content, $type, $family_word;
	const db = 'words_english';
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}

	public function get() {
		$query = $this->db->get(self::db);
		return $query->result_array();
	}

	public function find($id) {
		$query = $this->db->get_where('words_english', array('id' => $id));
		return $query->row_array();
	}

	public function findByFamily($family) {
		$query = $this->db->get_where('words_english', array('family_word' => $family));
		return $query->row_array();
	}

	public function store() {
//		$this->content
	}

	public function update() {

	}

	public function destroy($id) {

	}
}
