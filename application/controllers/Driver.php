<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CarsModel');
		//$this->load->model('ReservationModel','ReservationModel');
				
	}

	public function index(){				
		$this->load->view('DriverView');
	}

	public function showReserveHistory(){
		$data["Type1"] = $this-> CarsModel -> getCarsByType(1);
 		$data["Type2"] = $this-> CarsModel -> getCarsByType(2);
 		$data["Type3"] = $this-> CarsModel -> getCarsByType(3);
 		$data["Type4"] = $this-> CarsModel -> getCarsByType(4);
		$this->load->view('UserHistory',$data);
	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */