<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class genAdmin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReservationModel','ReservationModel');
		$this->load->model('CarsModel','CarsModel');	
		$this->load->model('UserModel','UserModel');		
	}

	public function genAdminCarHistory(){	
		$empCode = $this->session->userdata['logged_in']['employeeCode'];
		$username = ($this->session->userdata['logged_in']['username']);

		$reserveInfo = $this-> ReservationModel->getCurReserveFormEmpCode($empCode);
		$userInfo = $this-> UserModel->getUserInfo($username);
		
		$carType = array();
		foreach ($reserveInfo as $value) {
			$car =$this->CarsModel->getCarById($value->getCarId());
			$id = $car->getCarId();
			$v = $car->getCarType();
			$carType[$id] = $v;
		}

		$data["Type1"] = $this-> CarsModel -> getCarsByType(1);
 		$data["Type2"] = $this-> CarsModel -> getCarsByType(2);
 		$data["Type3"] = $this-> CarsModel -> getCarsByType(3);
 		$data["Type4"] = $this-> CarsModel -> getCarsByType(4);	

		$data['reserveInfo'] = $reserveInfo;
		$data['userInfo']= $userInfo;
		$data['carType'] = $carType;
		$this->load->view('GenAdminCarHistory',$data);
	}

	public function ajax_changeData(){
		echo json_encode(array("status" => TRUE));
	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */