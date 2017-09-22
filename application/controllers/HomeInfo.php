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

	public function index(){				
		//$data["Reservation"] = $this-> ReservationModel->getCurrentReservation();
		$data["Type1"] = $this-> CarsModel -> getCarsByType(1);
 		$data["Type2"] = $this-> CarsModel -> getCarsByType(2);
 		$data["Type3"] = $this-> CarsModel -> getCarsByType(3);
 		$data["Type4"] = $this-> CarsModel -> getCarsByType(4);
 		//$data["Reservation"] = $this-> ReservationModel->getCurrentReservation();
		$this->load->view('Home', $data);
	}

	public function driverLogin(){
		$this->load->view('HomeDriver');

	}

	public function ajax_loadEvent(){
		$reserve = $this-> ReservationModel->getCurrentReservation();
		$data = array();
		if($reserve != ''){
		foreach ($reserve as $value) {				
				$data[] = array(
					'id' => $value->getReserveId(),
	                "title" => $value->getPlateLicese(),
	                "start" => $value->getStartDate(),
	                "end" => $value->getEndDate(),
	                "color" => $value->getColor(),
	                "editable" => false
	               );
			}
		}
		echo json_encode($data);
		exit();
	}



}


/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */