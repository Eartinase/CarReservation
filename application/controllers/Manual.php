<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manual extends CI_Controller {

	public function Driver(){
		$this->load->view('DriverManual');
	}

	public function Admin(){
		$this->load->view('AdminManual');
	}

	public function User(){
		$this->load->view('UserManual');
	}

}

/* End of file Manual.php */
/* Location: ./application/controllers/Manual.php */