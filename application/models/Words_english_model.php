<?php

require_once APPPATH . 'models/Base_model.php';

class Words_english_model extends  Base_model {

	public function __construct()
	{
		$this->load->database();
		$this->_db = 'words';
	}

	public function get_word_by_id($id) {
		$sql = 'select *
				from words_english 
				inner join family_word on words_english.family_word_id = family_word.id
				inner join categories on words_english.category_id = categories.id
				inner join english_translation on words_english.id = english_translation.word_english_id
				inner join translation_vietnamese on translation_vietnamese.id = english_translation.word_vietnamese_id
				where words_english.id='. $id .'
				';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_words_by_word($word) {
		$sql = 'select *
				from words
				where word="'. $word .'"
				';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_words()  {
		$sql = 'select w.word, type.acronym_type, tvn.content, wf.name_family
				from words w
				inner join word_type on w.id = word_type.word_id
				inner join type on type.id = word_type.type_id
				inner join word_translation wt on wt.word_id = w.id
				inner join translation_vn tvn on wt.translation_id = tvn.id and type.id = tvn.type_id
				inner join word_family wf on wf.id = w.word_family_id
				';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_words_family() {
		$sql = 'select distinct word_family.name_family, words.source_id
				from source
				inner join words on source.id = words.source_id
				inner join word_family on word_family.id = words.word_family_id';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_word_translation($word) {
		$sql = '
				select distinct words.word, type.acronym_type, translation_vn.content as translation, sentences.content as sentence, type.id, sentences.id as sentence_id, translation_vn.id as translation_id
				from words 
				inner join word_translation on word_translation.word_id = words.id 
				inner join translation_vn on translation_vn.id = word_translation.translation_id 
				inner join word_type on word_type.word_id = words.id
				inner join type on type.id = word_type.type_id and translation_vn.type_id = type.id
				inner join sentences on sentences.translation_id = translation_vn.id
				inner join word_family on word_family.id = words.word_family_id
				where word_family.name_family="'.$word .'"
				order by type.acronym_type asc
				';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_word_translation_like($word) {
		$sql = '
				select words.word,  words.id, type.acronym_type, translation_vn.content as translation, words.is_first as word_first, translation_vn.is_first
				from words 
				inner join word_translation on word_translation.word_id = words.id 
				inner join translation_vn on translation_vn.id = word_translation.translation_id 
				inner join word_type on word_type.word_id = words.id
				inner join type on type.id = word_type.type_id
				inner join sentences on sentences.translation_id = translation_vn.id
				inner join word_family on word_family.id = words.word_family_id
				where words.word like "'.$word .'%"
				order by type.acronym_type desc
				';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function test() {
		return 'aaaaaaaaa';
	}

}
