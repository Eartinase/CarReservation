<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeInfo extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('CarsModel','CarsModel');
		$this->load->model('ReservationModel','ReservationModel');
		$this->load->model('CarsModel','CarsModel');
		$this->load->model('UserModel','UserModel');
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
		$empCode =  $this->session->userdata['logged_in']['employeeCode'];
		$data['ResToday'] =  $this-> ReservationModel-> getReserveTodayforDriver($empCode );
		$this->load->view('Homedriver' , $data);

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

	public function adminLogin(){
		
		$data["Type1"] = $this-> CarsModel -> getCarsByType(1);
 		$data["Type2"] = $this-> CarsModel -> getCarsByType(2);
 		$data["Type3"] = $this-> CarsModel -> getCarsByType(3);
 		$data["Type4"] = $this-> CarsModel -> getCarsByType(4);
 		$data["driver"] = $this-> UserModel -> getDriverInfo();
 		//$data["Reservation"] = $this-> ReservationModel->getCurrentReservation();
 		$this->load->view('HomeAdmin', $data);
	}



}


/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */