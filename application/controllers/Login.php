<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->load->view('login.php');
	}

	public function Authen()
	{
		# code...
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */