<?php


require_once APPPATH . 'models/Base_model.php';

class Word_translation extends Base_model
{

	public function __construct()
	{
		$this->load->database();
		$this->_db = 'word_translation';
		$this->_id_rel_1 = 'word_id';
		$this->_id_rel_2 = 'translation_id';
	}


}
