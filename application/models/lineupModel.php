<?php
class LineupModel extends Model {
	
	private $tbl_lineup= 'lineup';
	
	function Lineup(){
		parent::Model();
	}
	
	function list_all(){
		$this->db->order_by('id','asc');
		return $this->db->get($tbl_lineup);
	}
	
	function count_all(){
		return $this->db->count_all($this->tbl_lineup);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('id','asc');
		return $this->db->get($this->tbl_lineup, $limit, $offset);
	}
	
	function get_by_id($id){
		$this->db->where('id', $id);
		return $this->db->get($this->tbl_lineup);
	}

			
	function save($lineup){
		$this->db->insert($this->tbl_lineup, $lineup);
		return $this->db->insert_id();
	}
	
	function update($id, $lineup){
		$this->db->where('id', $id);
		$this->db->update($this->tbl_lineup, $lineup);
	}
	
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tbl_lineup);
	}
}
?>