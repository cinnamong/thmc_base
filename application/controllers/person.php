<?php
class Person extends Controller {

	// num of records per page
	private $limit = 20;
	
	function Person(){
		parent::Controller();
		
		// load library
		$this->load->library(array('table','validation'));
		
		// load helper
		$this->load->helper('url');
		$this->load->helper('form');
		
		// load model
		$this->load->model('personModel','',TRUE);
	}
	
	function index($offset = 0){
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$persons = $this->personModel->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('person/index/');
 		$config['total_rows'] = $this->personModel->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', '이름', '출생연도', '백 넘버', '포지션', '백업포지션', '타격', '수비','비고','');
		$i = 0 + $offset;
		foreach ($persons as $person){
			$this->table->add_row(++$i, $person->name, $person->yob, $person->back_no, $person->pri_position, $person->second_position, $person->batting == 'R'? '우타' :'좌타', $person->field == 'R'? '우투':'좌투', $person->description,
				anchor('person/view/'.$person->id,'view',array('class'=>'view')).' '.
				anchor('person/update/'.$person->id,'update',array('class'=>'update')).' '.
				anchor('person/delete/'.$person->id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('personList', $data);
	}
	
	function add(){
		// set validation properties
		$this->_set_fields();
		
		// set common properties
		$data['title'] = 'Add new person';
		$data['message'] = '';
		$data['action'] = site_url('person/addPerson');
		$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('personEdit', $data);
	}
	
	function addPerson(){
		// set common properties
		$data['title'] = 'Add new person';
		$data['action'] = site_url('person/addPerson');
		$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
		
		// set validation properties
		$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$person = array('name' => $this->input->post('name'),
							'yob' => $this->input->post('yob'),
							'back_no' => $this->input->post('back_no'),
							'pri_position' => $this->input->post('pri_position'),
							'second_position' => $this->input->post('second_position'),
							'batting' => $this->input->post('batting'),
							'field' => $this->input->post('field'),
							'description' => $this->input->post('description'));
			$id = $this->personModel->save($person);
			
			// set form input name="id"
			$this->validation->id = $id;
			
			// set user message
			$data['message'] = '<div class="success">add new person success</div>';
		}
		
		// load view
		$this->load->view('personEdit', $data);
	}
	
	function view($id){
		// set common properties
		$data['title'] = 'Person Details';
		$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
		
		// get person details
		$data['person'] = $this->personModel->get_by_id($id)->row();
		
		// load view
		$this->load->view('personView', $data);
	}
	
	function update($id){
		//load form helper
		$this->load->helper('form');
		// set validation properties
		$this->_set_fields();
		
		// prefill form values
		$person = $this->personModel->get_by_id($id)->row();
		$this->validation->id = $id;
		$this->validation->name = $person->name;
		$this->validation->back_no = $person->back_no;
		$this->validation->pri_position = $person->pri_position;
		$this->validation->second_position = $person->second_position;
		$this->validation->batting = $person->batting;
		$this->validation->field = $person->field;
		$this->validation->description = $person->description;
		//$_POST['gender'] = strtoupper($person->gender);
		$this->validation->yob = date('Y',strtotime($person->yob));
		
		// set common properties
		$data['title'] = 'Update person';
		$data['message'] = '';
		$data['action'] = site_url('person/updatePerson');
		$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('personEdit', $data);
	}
	
	function updatePerson(){
		// set common properties
		$data['title'] = 'Update person';
		$data['action'] = site_url('person/updatePerson');
		$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
		
		// set validation properties
		$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('id');
			$person = array('name' => $this->input->post('name'),
							'yob' => $this->input->post('yob'),
							'back_no' => $this->input->post('back_no'),
							'pri_position' => $this->input->post('pri_position'),
							'second_position' => $this->input->post('second_position'),
							'batting' => $this->input->post('batting'),
							'field' => $this->input->post('field'),
							'description' => $this->input->post('description'));
			$this->personModel->update($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		}
		
		// load view
		$this->load->view('personEdit', $data);
	}
	
	function delete($id){
		// delete person
		$this->personModel->delete($id);
		
		// redirect to person list page
		redirect('person/index/','refresh');
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