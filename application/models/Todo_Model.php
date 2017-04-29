	<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Todo_Model extends CI_Model {

	public function add($content)
	{
		$data = array(
			'todo_content' => $content
		);

		return $this->db->insert('todo', $data);
	}

	

}

/* End of file Todo.php */
/* Location: ./application/models/Todo.php */