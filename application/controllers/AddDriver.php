<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddDriver extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AddDriverModel');
	}

	public function index()	
	{

		$this->load->view('AddDriverView');
	}

	public function addDriver()
	{
		$data = array(		
			'DriverName'	=> $this->input->post('DriverName'),  	
			);		
		$this -> AddDriverModel -> add($data);
		$this->load->view('result');
	}
	

}