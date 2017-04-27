	<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Todo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Todo_Model');
	}

	// List all your items
	public function index( $offset = 0 )
	{

	}

	// Add a new item
	public function add()
	{
		$this->load->view('todo_add');
	}

	public function add2()
	{
		$result = $this -> Todo_Model -> add($this->input->post('content'));
		
		if ($result == 1) {
			$koichi['message'] = "success";
		} else {
			$koichi['message'] = "fail";
		}
		
		$this->load->view('todo_message', $koichi);
	
	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Todo.php */
/* Location: ./application/controllers/Todo.php */
