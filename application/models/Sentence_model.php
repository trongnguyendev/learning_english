<?php

require_once APPPATH . 'models/Base_model.php';

class Sentence_model extends Base_model
{
	public function __construct()
	{
		$this->load->database();
		$this->_db = 'sentences';
	}
}
