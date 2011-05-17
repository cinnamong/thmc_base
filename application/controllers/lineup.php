<?php
class Lineup extends Controller {

	// num of records per page
	private $limit = 20;
	
	function Lineup(){
		parent::Controller();
		
		// load library
		$this->load->library(array('table','validation'));
		
		// load helper
		$this->load->helper('url');
		$this->load->helper('form');
		
		// load model
		$this->load->model('lineupModel','',TRUE);
	}
	
	function index($offset = 0){
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$lineups = $this->lineupModel->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('lineup/index/');
 		$config['total_rows'] = $this->lineupModel->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Lineup ID', '순번', '선수이름', '백넘버', '포지션', '상대팀', '날짜', '');
		$i = 0 + $offset;
		
		foreach ($lineups as $lineup){
			$this->table->add_row(++$i, $lineup->order_no, $lineup->player_name, $lineup->back_no, $lineup->position, $lineup->opponent, $lineup->date,
				anchor('lineup/view/'.$lineup->id,'view',array('class'=>'view')).' '.
				anchor('lineup/update/'.$lineup->id,'update',array('class'=>'update')).' '.
				anchor('lineup/delete/'.$lineup->id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this lineup?')"))
			);
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('lineupList', $data);
		
	}
	
	function add(){
		// set validation properties
		$this->_set_fields();
		
		// set common properties
		$data['title'] = 'Add new lineup';
		$data['message'] = '';
		$data['action'] = site_url('lineup/addLineup');
		$data['link_back'] = anchor('lineup/index/','Back to list of lineups',array('class'=>'back'));
	
		// load view
		$this->load->view('lineupEdit', $data);
	}
	
	function addLineup(){
		// set common properties
		$data['title'] = 'Add new lineup';
		$data['action'] = site_url('lineup/addLineup');
		$data['link_back'] = anchor('lineup/index/','Back to list of lineups',array('class'=>'back'));
		
		// set validation properties
		$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$lineup = array('order_no' => $this->input->post('order_no'),
							'game_id' => $this->input->post('game_id'),
							'opponent' => $this->input->post('opponent'),
							'date' => $this->input->post('date'),
							'player_id' => $this->input->post('player_id'),
							'player_name' => $this->input->post('player_name'),
							'position' => $this->input->post('position'),
							'back_no' => $this->input->post('back_no'));
			$id = $this->lineupModel->save($lineup);
			
			// set form input name="id"
			$this->validation->id = $id;
			
			// set user message
			$data['message'] = '<div class="success">add new lineup success</div>';
		}
		
		// load view
		$this->load->view('lineupEdit', $data);

	}
	
	function view($id){
		// set common properties
		$data['title'] = 'Lineup Details';
		$data['link_back'] = anchor('lineup/index/','Back to list of lineups',array('class'=>'back'));
		
		// get lineup details
		$data['lineup'] = $this->lineupModel->get_by_id($id)->row();
		
		// load view
		$this->load->view('lineupView', $data);
	}
	
	function update($id){
		//load form helper
		$this->load->helper('form');
		// set validation properties
		$this->_set_fields();
		
		// prefill form values
		$lineup = $this->lineupModel->get_by_id($id)->row();
		$this->validation->id = $id;
		$this->validation->order_no = $lineup->order_no;
		$this->validation->game_id = $lineup->game_id;
		$this->validation->opponent = $lineup->opponent;
		//$this->validation->date = date('Y-m-d',strtotime($lineup->date));
		$this->validation->player_id = $lineup->player_id;
		$this->validation->player_name = $lineup->player_name;
		//$_POST['position'] = strtoupper($lineup->position);
		$this->validation->back_no = $lineup->back_no;
		
		//$_POST['gender'] = strtoupper($lineup->gender);
		//$this->validation->dob = date('d-m-Y',strtotime($lineup->dob));
		
		// set common properties
		$data['title'] = 'Update lineup';
		$data['message'] = '';
		$data['action'] = site_url('lineup/updateLineup');
		$data['link_back'] = anchor('lineup/index/','Back to list of lineups',array('class'=>'back'));
	
		// load view
		$this->load->view('lineupEdit', $data);
	}
	
	function updateLineup(){
		// set common properties
		$data['title'] = 'Update lineup';
		$data['action'] = site_url('lineup/updateLineup');
		$data['link_back'] = anchor('lineup/index/','Back to list of lineups',array('class'=>'back'));
		
		// set validation properties
		$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('id');
			$lineup = array('order_no' => $this->input->post('order_no'),
							'game_id' => $this->input->post('game_id'),
							'opponent' => $this->input->post('opponent'),
							'date' => $this->input->post('date'),
							'player_id' => $this->input->post('player_id'),
							'player_name' => $this->input->post('player_name'),
							'position' => $this->input->post('position'),
							'back_no' => $this->input->post('back_no'));
			$this->lineupModel->update($id,$lineup);
			
			// set user message
			$data['message'] = '<div class="success">update lineup success</div>';
		}
		
		// load view
		$this->load->view('lineupEdit', $data);
	}
	
	function delete($id){
		// delete lineup
		$this->lineupModel->delete($id);
		
		// redirect to lineup list page
		redirect('lineup/index/','refresh');
	}
	
	// validation fields
	function _set_fields(){
		$fields['id'] = 'id';
		$fields['order_no'] = 'order_no';
		$fields['game_id'] = 'game_id';
		$fields['opponent'] = 'opponent';
		$fields['date'] = 'date';
		$fields['player_id'] = 'player_id';
		$fields['player_name'] = 'player_name';
		$fields['position'] = 'position';
		$fields['back_no'] = 'back_no';
		
		$this->validation->set_fields($fields);
	}
	
	// validation rules
	function _set_rules(){
		$rules['opponent'] = 'trim|required';
		$rules['player_name'] = 'trim|required';
		$rules['order_no'] = 'trim|required';
		$rules['back_no'] = 'trim|required';
		$rules['date'] = 'trim|required|callback_valid_date';
		
		$this->validation->set_rules($rules);
		
		$this->validation->set_message('required', '* required');
		$this->validation->set_message('isset', '* required');
		$this->validation->set_error_delimiters('<p class="error">', '</p>');
	}
	
	// date_validation callback
	function valid_date($str)
	{
		if(!ereg("^([0-9]{4})-(0[1-9]|1[012])-(0[012]|1[0-9])$", $str))
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