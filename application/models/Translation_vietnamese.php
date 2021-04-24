<?php


require_once APPPATH . 'models/Base_model.php';

class Translation_vietnamese extends Base_model
{

	public function __construct()
	{
		$this->load->database();
		$this->_db = 'translation_vn';
	}

	public function update_translation($id, $content) {
		$sql = '
				update translation_vn
				set content = "'. $content .'"
				where id='.$id .'
				';
		$query = $this->db->query($sql);
		return $query->row();
	}

}
