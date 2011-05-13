<?php
class GameModel extends Model {
	
	private $tbl_game= 'game';
	
	function Game(){
		parent::Model();
	}
	
	function list_all(){
		$this->db->order_by('id','asc');
		return $this->db->get($tbl_game);
	}
	
	function count_all(){
		return $this->db->count_all($this->tbl_game);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('id','asc');
		return $this->db->get($this->tbl_game, $limit, $offset);
	}
	
	function get_by_id($id){
		$this->db->where('id', $id);
		return $this->db->get($this->tbl_game);
	}

	function get_total_rs(){
		$this->db->select_sum('rs');
		return $this->db->get('game');
	}

	function get_total_ra(){
		$this->db->select_sum('ra');
		$query = $this->db->get('game');
		return $query;
	}

	function get_total_point(){
		$this->db->select_sum('point');
		$query = $this->db->get('game');
		return $query;
	}
			
	function save($game){
		$this->db->insert($this->tbl_game, $game);
		return $this->db->insert_id();
	}
	
	function update($id, $game){
		$this->db->where('id', $id);
		$this->db->update($this->tbl_game, $game);
	}
	
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tbl_game);
	}
}
?>