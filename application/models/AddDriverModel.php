<?php
defined('BASEPATH') || exit('No direct script access allowed');

class AddDriverModel extends CI_Model {

	public function add($input){		
		return $this->db->insert('user', $input);
	}




}

/* End of file AddCarModel.php */
/* Location: ./application/models/AddCarModel.php */