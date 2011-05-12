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
		$this->table->set_heading('No', '이름', '출생연도', '백 넘버', '포지션', '백업포지션', '타격', '수비','비고','');
		$i = 0 + $offset;
		foreach ($games as $game){
			$this->table->add_row(++$i, $game->name, $game->yob, $game->back_no, $game->pri_position, $game->second_position, $game->batting == 'R'? '우타' :'좌타', $game->field == 'R'? '우투':'좌투', $game->description,
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
			$game = array('name' => $this->input->post('name'),
							'yob' => $this->input->post('yob'),
							'back_no' => $this->input->post('back_no'),
							'pri_position' => $this->input->post('pri_position'),
							'second_position' => $this->input->post('second_position'),
							'batting' => $this->input->post('batting'),
							'field' => $this->input->post('field'),
							'description' => $this->input->post('description'));
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
		$this->validation->name = $game->name;
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
			$game = array('name' => $this->input->post('name'),
							'yob' => $this->input->post('yob'),
							'back_no' => $this->input->post('back_no'),
							'pri_position' => $this->input->post('pri_position'),
							'second_position' => $this->input->post('second_position'),
							'batting' => $this->input->post('batting'),
							'field' => $this->input->post('field'),
							'description' => $this->input->post('description'));
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
		$fields['name'] = 'name';
		$fields['yob'] = 'yob';
		$fields['back_no'] = 'back_no';
		$fields['pri_position'] = 'pri_position';
		$fields['second_position'] = 'second_position';
		$fields['batting'] = 'batting';
		$fields['field'] = 'field';
		$fields['description'] = 'description';
		
		$this->validation->set_fields($fields);
	}
	
	// validation rules
	function _set_rules(){
		$rules['name'] = 'trim|required';
		$rules['name'] = 'trim|required';
		$rules['yob'] = 'trim|required|callback_valid_date';
		
		$this->validation->set_rules($rules);
		
		$this->validation->set_message('required', '* required');
		$this->validation->set_message('isset', '* required');
		$this->validation->set_error_delimiters('<p class="error">', '</p>');
	}
	
	// date_validation callback
	function valid_date($str)
	{
		if(!ereg("^([0-9]{4})$", $str))
		{
			$this->validation->set_message('valid_date', 'date format is not valid. yyyy');
			return false;
		}
		else
		{
			return true;
		}
	}
}
?>