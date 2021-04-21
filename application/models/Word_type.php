<?php

require_once APPPATH . 'models/Base_model.php';

class Word_type extends  Base_model {

	public function __construct()
	{
		$this->load->database();
		$this->_db = 'word_type';
		$this->_id_rel_1 = 'word_id';
		$this->_id_rel_2 = 'type_id';
	}

}
