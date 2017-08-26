<?php
defined('BASEPATH') || exit('No direct script access allowed');

class AddDriver extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AddDriverModel');
	}

	public function index(){
		$this->load->view('AddDriverView');
	}

	public function addDriver(){
		$data = array(		
			'EmployeeCode'	=> $this->input->post('EmployeeCode'),
			'Username'		=> $this->input->post('Username'),
			'Password'		=> $this->input->post('Password'),
			'Name'			=> $this->input->post('Name'),
			'Email'			=> $this->input->post('Email'),
			'Department'	=> "ฝ่ายอาคารสถานที่",
			'Role'			=> "driver",			
			'Tel'			=> $this->input->post('Tel'),
			'DriverLicense'	=> $this->input->post('DriverLicense'),			
			);		
		$this -> AddDriverModel -> add($data);

		$message = array(
			'message' => 'Success'
			);
		$this->load->view('Result', $message);		
	}
	

}