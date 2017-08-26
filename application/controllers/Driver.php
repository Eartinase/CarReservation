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

	

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */