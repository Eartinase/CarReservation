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
		$this->load->view('Login.php');
	}

	public function Authen()
	{
		$this->load->model('LoginModel');
		$data["username"] = $_POST['usr'];
		$data["password"] = $_POST['psw'];

		$result=$this -> LoginModel -> login($data);
		if($result == true){
			redirect($config['base_url'].'homeInfo/','refresh')	;		
		}else{
			$this->load->view('Login.php');
		}
		
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */