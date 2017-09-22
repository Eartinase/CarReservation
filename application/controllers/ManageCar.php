<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageCar extends CI_Controller {

	public function index(){
		$this->load->view('AllCar');
	}

	public function AddCar(){
		$this->load->model('UserModel');
		
		$driverOption = $this->UserModel->getDriver();
		$depOption = $this->UserModel->getDepartment();
				
		$data = array(
			'driverOption' => $driverOption,
			'depOption' => $depOption
		);
		$this->load->view('AddCar', $data);
	}

}

/* End of file ManageCar.php */
/* Location: ./application/controllers/ManageCar.php */