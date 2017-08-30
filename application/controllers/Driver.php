<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('CarsModel');
		$this->load->model('ReservationModel');
		//$this->load->model('ReservationModel','ReservationModel');				
	}

	public function index(){		
		$data = $this->ReservationModel->driverReserve();
		$table = "";
		$send = array(
			'tab' => $data
		);

		$this->load->view('DriverView', $send);
	}	

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */