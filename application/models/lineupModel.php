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

	function get_total_rs(){
		$this->db->select_sum('rs');
		return $this->db->get('lineup');
	}

	function get_total_ra(){
		$this->db->select_sum('ra');
		$query = $this->db->get('lineup');
		return $query;
	}

	function get_total_point(){
		$this->db->select_sum('point');
		$query = $this->db->get('lineup');
		return $query;
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