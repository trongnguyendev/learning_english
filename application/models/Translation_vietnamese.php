<?php


require_once APPPATH . 'models/Base_model.php';

class Translation_vietnamese extends Base_model
{

	public function __construct()
	{
		$this->load->database();
		$this->_db = 'translation_vn';
	}

	public function update_translation($id, $data_update) {
		$new_translation = $data_update['new_translation'];
		$updated_at = $data_update['updated_at'];

		if($this->find_bool($id, 'id')) {
			$sql = 'update translation_vn '
					.'set content = "'. $new_translation .'", updated_at = "'. $updated_at .'" '
					.'where id='. $id .' ';
			$query = $this->db->query($sql);
			return true;
		}
		return false;
	}

}
