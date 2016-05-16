<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Sublimemodel extends CI_Model {
	
	protected $tbl;

	function __construct() {
		parent::__construct();
	}

	function setTable($tbl_name, $id_name) {
		$this->tbl = $tbl_name;	
		$this->id_name = $id_name;		
	}
	
	function get($order_by = NULL, $select = NULL) {
		if($select)$this->db->select($select);
		if($order_by)$this->db->order_by($order_by);
		/*echo($this->db->get_compiled_select($this->tbl));/*exit; */
		$query = $this->db->get($this->tbl);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by = NULL, $select = NULL) {
		$this->db->limit($limit, $offset);
		$query = $this->get($order_by, $select);
		return $query;
	}

	function get_where($col, $value = '', $order_by = NULL, $select = NULL) {
		if(is_array($col)){
			foreach($col as $k => $v){
				$this->db->where($k, $v);
			}
		}else{
			$this->db->where($col, $value);
		}
		$query = $this->get($order_by, $select);
		return $query;
	}
	
	function get_where_limit($limit, $offset, $col, $value = '', $order_by = NULL, $select = NULL) {
		if(is_array($col)){
			foreach($col as $k => $v){
				$this->db->where($k, $v);
			}
		}else{
			$this->db->where($col, $value);
		}
		$this->db->limit($limit, $offset);
		$query = $this->get($order_by, $select);
		return $query;
	}

	function _insert($data) {
		$this->db->insert($this->tbl, $data);
                /*echo($this->db->last_query());exit; */
		if($this->db->affected_rows()>0)
			return $this->db->insert_id();
		return false;
	}

	function _update($id, $data) {
		$this->db->where($this->id_name, $id);
		$this->db->update($this->tbl, $data);
		return $this->db->affected_rows();
	}

	function _delete($id) {
		$this->db->where($this->id_name, $id);
		$this->db->delete($this->tbl);
		return $this->db->affected_rows();
	}

	function count_where($column, $value) {
		$this->db->where($column, $value);
		$query = $this->db->get($this->tbl);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function count_all() {
		$query = $this->db->get($this->tbl);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function get_max() {
		$this->db->select_max($this->id_name);
		$query = $this->db->get($this->tbl);
		$row = $query->row();
		$id = $row->id;
		return $id;
	}

	function _custom_query($mysql_query) {
		$query = $this->db->query($mysql_query);
		return $query;
	}

}