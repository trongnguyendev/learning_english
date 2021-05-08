<?php
class Base_model extends  CI_Model
{

	protected $_db;
	protected  $_id_rel_1;
	protected  $_id_rel_2;

	public function __construct()
	{
		$this->load->database();
	}

	public function all()
	{
		$query = $this->db->get($this->_db);
		return $query->result_array();
	}

	public function find($param, $field)
	{
		$query = $this->db->get_where($this->_db, array($field => $param));
		return $query->row_array();
	}

	public function find_bool($param, $field) {
		$isfind = $this->find($param, $field);
		if($isfind) {
			return $isfind['id'];
		}
		return false;
	}

	public function store($data)
	{
		$insert = $this->db->insert($this->_db, $data);
		if ($insert) {
			return $this->db->insert_id();
		}
		return false;
	}

	public function store_resp_result($data)
	{
		$insert = $this->db->insert($this->_db, $data);
		if ($insert) {
			return $this->db->result();
		}
		return false;
	}

	// function for table main
	public function sync($id, $id_rel, $column_rel)
	{
		if(isset($id) && isset($id_rel) && isset($column_rel)) {
			$sql = 'update ' . $this->_db . ' set ' . $column_rel . '=' . $id_rel . ' where id=' . $id;
			$query = $this->db->query($sql);
			echo $this->db->last_query();
//			if($query) {
//				return true;
//			}
//			return false;
		}
	}

	// function for table pivot
	public function sync_many($id_rel_1, $id_rel_2) {
		if(isset($id_rel_1) && isset($id_rel_2)) {
			$sql_sync_many_relationship = 'insert into '. $this->_db .'('. $this->_id_rel_1 . ',' . $this->_id_rel_2 .') values('. $id_rel_1 . "," . $id_rel_2 .')';
			$query_pivot = $this->db->query($sql_sync_many_relationship);
			if($query_pivot) {
				return true;
			}
			return false;
		}
	}

	public function update($id, $data)
	{
		if(isset($id) && isset($data)) {
			$this->db->where('id', $id);
			$this->db->update($this->_db, $data);
		}
	}

	public  function delete($id) {
		if(isset($id) && $this->find_bool($id, 'id')) {
			$this->db->where('id', $id);
			$this->db->delete($this->_db);
			return true;
		}
		return false;
	}
}
