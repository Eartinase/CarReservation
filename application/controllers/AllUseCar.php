<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllUseCar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('ReservationModel');
		$this->load->model('CarsModel');
		$this->load->model('UserModel');
	}
	
	public function index(){						
		$this->load->view('AllUseCar');
	}

	public function ajax_reservelist(){		
		$depID = $this->session->userdata['logged_in']['department'];
		$currentReserve = $this->ReservationModel->getPrevReservation();
		$data = array();
		$no=0;
		if($currentReserve != ''){
			foreach ($currentReserve as $value) {
				$car = $this->CarsModel->getCarById($value->getCarId());
				$no++;
				$data[] = array(
					"<center>".$this->CarsModel->getPlateLicenseFromCarId($value->getCarId())."</center>",
					"<center>".$this->UserModel->getNamee($value->getEmployeeCode())."</center>",
					"<center>".$this->UserModel->getTel($value->getEmployeeCode())."</center>",
					"<center>".$car->getCarType()."</center>",
					"<center>".$value->getPlateLicese()."</center>",
					"<center>".date("Y-m-d H:i", strtotime($value->getStartDate()))."</center>",
					"<center>".date("Y-m-d H:i", strtotime($value->getEndDate()))."</center>",
					$value->getPlace()
					
					);			
			}
		}
		$output = array(            
			"data" => $data
			);		
		//output to json format
		echo json_encode($output);
		exit;
	}
		
}

/* End of file AllReserve.php */
/* Location: ./application/controllers/AllReserve.php */