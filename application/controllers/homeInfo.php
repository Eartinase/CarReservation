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
 		$data["Type5"] = $this-> CarsModel -> getCarsByType(5);

		$this->load->view('home', $data);
	}

	public function add(){
		$timeS = $_POST['date'].' '.$_POST['timeS'];
		$timeE = $_POST['date'].' '.$_POST['timeE'];
		$code = '567';
		$data = array(		
			'carId' => $this->input->post('plateLicense'),
			'driverId' => $this->input->post('driver'),
			'employeeCode' => $code,	
			'StartDate' => $timeS,
			'EndDate' =>$timeE,			
			'place' => $this->input->post('place')
			);
			
		$this -> CarsModel -> add($data);
		$this->load->view('result');
	}
}


/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */