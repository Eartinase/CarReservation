<?php
defined('BASEPATH') || exit('No direct script access allowed');

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
		$this->load->model('LoginModel');
		$data["username"] = $_POST['usr'];
		$data["password"] = $_POST['psw'];

		$result=$this -> LoginModel -> login($data);
		if($result == true){
			//redirect('home.php');
			$this->load->library('../controllers/homeInfo');
			//$this->load->library('../controllers/homeInfo');
			$this->homeInfo->index();
		}else{
			$this->load->view('login.php');
		}
		
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */