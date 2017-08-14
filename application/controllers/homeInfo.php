<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeInfo extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('CarsModel','CarsModel');
		$this->load->model('ReservationModel','ReservationModel');
		$this->load->model('CarsModel','CarsModel');
		
	}

	public function index()
	{				
		//$data["Reservation"] = $this-> ReservationModel->getCurrentReservation();
		$data["Type1"] = $this-> CarsModel -> getCarsByType(1);
 		$data["Type2"] = $this-> CarsModel -> getCarsByType(2);
 		$data["Type3"] = $this-> CarsModel -> getCarsByType(3);
 		$data["Type4"] = $this-> CarsModel -> getCarsByType(4);

		$this->load->view('Home', $data);
	}

}


/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */