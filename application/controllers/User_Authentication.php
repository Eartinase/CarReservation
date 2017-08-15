<?php
defined('BASEPATH') || exit('No direct script access allowed');

class User_Authentication extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('UserModel','UserModel');
		$this->load->helper('form');
		
		// Load form validation library
		$this->load->library('form_validation');

	}

	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
				redirect('homeInfo','refresh');
			}else{
				$this->load->view('Login.php');
			}
		
	}

	public function Authen()
	{
	
		
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)  {
        	if(isset($this->session->userdata['logged_in'])){
				redirect('homeInfo','refresh');
			}else{

				$this->load->view('Login');
			}
        } else {
			$data["username"] = $_POST['username'];
			$data["password"] = $_POST['password'];
			$result = $this->UserModel->login($data);
			if($result){
				$username = $_POST['username'];
				$userInfo = $this->UserModel->getUserInfo($username);
				$session_data = array(
					'username' => $userInfo->getUsername(),
					'employeeCode' => $userInfo->getEmployeeCode(),
					'name' => $userInfo->getName(),
					//'surname' => $userInfo->getSurName(),
					'department'=>$userInfo->getDepartment(),
					'role'=>$userInfo->getRole()
					);
				$this->session->set_userdata('logged_in', $session_data);
				redirect('homeInfo','refresh');
			}else{
				$this->load->view('Login');
			}

		}
		
	}

	public function logout()
	{

		$this->session->unset_userdata('logged_in');
		session_destroy();
		$this->load->view('Login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */