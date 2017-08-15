<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class calendar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('CarsModel','CarsModel');
		$this->load->model('ReservationModel','ReservationModel');
		$this->load->model('CarsModel','CarsModel');		
	}

	public function index()
	{				
		$data["Reservation"] = $this-> ReservationModel->getCurrentReservation();
		$this->load->view('CalendarView', $data);
	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */