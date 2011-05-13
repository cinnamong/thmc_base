<?php
class Game extends Controller {

	// num of records per page
	private $limit = 20;
	
	function Game(){
		parent::Controller();
		
		// load library
		$this->load->library(array('table','validation'));
		
		// load helper
		$this->load->helper('url');
		$this->load->helper('form');
		
		// load model
		$this->load->model('gameModel','',TRUE);
	}
	
	function index($offset = 0){
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$games = $this->gameModel->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('game/index/');
 		$config['total_rows'] = $this->gameModel->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Game ID', '상대팀', '날짜', '시간', '구장', '날씨', '온도', '홈/어웨이','승패','승점','RS','RA', 'Diff','');
		$i = 0 + $offset;
		foreach ($games as $game){
			$this->table->add_row(++$i, $game->opponent, $game->date, $game->time, $game->ballpark, $game->weather, $game->temperature, $game->field == 'Visitor'? '어웨이':'홈', $game->result == 'W'? '승': ($game->result == 'L'? '패':'무'), $game->point, $game->rs, $game->ra, $game->diff,
				anchor('game/view/'.$game->id,'view',array('class'=>'view')).' '.
				anchor('game/update/'.$game->id,'update',array('class'=>'update')).' '.
				anchor('game/delete/'.$game->id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this game?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('gameList', $data);
		
	}
	
	function add(){
		// set validation properties
		$this->_set_fields();
		
		// set common properties
		$data['title'] = 'Add new game';
		$data['message'] = '';
		$data['action'] = site_url('game/addGame');
		$data['link_back'] = anchor('game/index/','Back to list of games',array('class'=>'back'));
	
		// load view
		$this->load->view('gameEdit', $data);
	}
	
	function addGame(){
		// set common properties
		$data['title'] = 'Add new game';
		$data['action'] = site_url('game/addGame');
		$data['link_back'] = anchor('game/index/','Back to list of games',array('class'=>'back'));
		
		// set validation properties
		$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$game = array('date' => $this->input->post('date'),
							'time' => $this->input->post('time'),
							'ballpark' => $this->input->post('ballpark'),
							'opponent' => $this->input->post('opponent'),
							'weather' => $this->input->post('weather'),
							'temperature' => $this->input->post('temperature'),
							'field' => $this->input->post('field'),
							'result' => $this->input->post('result'),
							'point' => $this->input->post('point'),
							'rs' => $this->input->post('rs'),
							'ra' => $this->input->post('ra'),
							'diff' => $this->input->post('diff'));
			$id = $this->gameModel->save($game);
			
			// set form input name="id"
			$this->validation->id = $id;
			
			// set user message
			$data['message'] = '<div class="success">add new game success</div>';
		}
		
		// load view
		$this->load->view('gameEdit', $data);

	}
	
	function view($id){
		// set common properties
		$data['title'] = 'Game Details';
		$data['link_back'] = anchor('game/index/','Back to list of games',array('class'=>'back'));
		
		// get game details
		$data['game'] = $this->gameModel->get_by_id($id)->row();
		
		//get total rs & ra & point
		$total_rs = $this->gameModel->get_total_rs();
		$total_ra = $this->gameModel->get_total_ra();
		$total_point = $this->gameModel->get_total_point();
		
		// load view
		$this->load->view('gameView', $data);
	}
	
	function update($id){
		//load form helper
		$this->load->helper('form');
		// set validation properties
		$this->_set_fields();
		
		// prefill form values
		$game = $this->gameModel->get_by_id($id)->row();
		$this->validation->id = $id;
		$this->validation->date = date('d-m-Y',strtotime($game->date));
		//$_POST['gender'] = strtoupper($game->gender);
		//$this->validation->dob = date('d-m-Y',strtotime($game->dob));
		
		// set common properties
		$data['title'] = 'Update game';
		$data['message'] = '';
		$data['action'] = site_url('game/updateGame');
		$data['link_back'] = anchor('game/index/','Back to list of games',array('class'=>'back'));
	
		// load view
		$this->load->view('gameEdit', $data);
	}
	
	function updateGame(){
		// set common properties
		$data['title'] = 'Update game';
		$data['action'] = site_url('game/updateGame');
		$data['link_back'] = anchor('game/index/','Back to list of games',array('class'=>'back'));
		
		// set validation properties
		$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('id');
			$game = array('date' => $this->input->post('date'),
							'time' => $this->input->post('time'),
							'ballpark' => $this->input->post('ballpark'),
							'opponent' => $this->input->post('opponent'),
							'weather' => $this->input->post('weather'),
							'temperature' => $this->input->post('temperature'),
							'field' => $this->input->post('field'),
							'result' => $this->input->post('result'),
							'point' => $this->input->post('point'),
							'rs' => $this->input->post('rs'),
							'ra' => $this->input->post('ra'),
							'diff' => $this->input->post('diff'));
			$this->gameModel->update($id,$game);
			
			// set user message
			$data['message'] = '<div class="success">update game success</div>';
		}
		
		// load view
		$this->load->view('gameEdit', $data);
	}
	
	function delete($id){
		// delete game
		$this->gameModel->delete($id);
		
		// redirect to game list page
		redirect('game/index/','refresh');
	}
	
	// validation fields
	function _set_fields(){
		$fields['id'] = 'id';
		$fields['date'] = 'date';
		$fields['time'] = 'time';
		$fields['ballpark'] = 'ballpark';
		$fields['opponent'] = 'opponent';
		$fields['weather'] = 'weather';
		$fields['temperature'] = 'temperature';
		$fields['field'] = 'field';
		$fields['result'] = 'result';
		$fields['point'] = 'point';
		$fields['rs'] = 'rs';
		$fields['ra'] = 'ra';
		$fields['diff'] = 'diff';
		
		$this->validation->set_fields($fields);
	}
	
	// validation rules
	function _set_rules(){
		$rules['opponent'] = 'trim|required';
		$rules['field'] = 'trim|required';
		$rules['result'] = 'trim|required';
		$rules['point'] = 'trim|required';
		$rules['date'] = 'trim|required|callback_valid_date';
		
		$this->validation->set_rules($rules);
		
		$this->validation->set_message('required', '* required');
		$this->validation->set_message('isset', '* required');
		$this->validation->set_error_delimiters('<p class="error">', '</p>');
	}
	
	// date_validation callback
	function valid_date($str)
	{
		if(!ereg("^(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-([0-9]{4})$", $str))
		{
			$this->validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
			return false;
		}
		else
		{
			return true;
		}
	}
		
}
?>