<?php


require_once APPPATH . 'models/Base_model.php';

class Translation_vietnamese extends Base_model
{

	public function __construct()
	{
		$this->load->database();
		$this->_db = 'translation_vn';
	}

}
