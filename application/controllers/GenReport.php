<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class genReport extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReservationModel','ReservationModel');
		$this->load->model('CarsModel','CarsModel');	
		$this->load->model('UserModel','UserModel');		
	}

	public function genPDFUserHistory(){	
		$empCode = $this->session->userdata['logged_in']['employeeCode'];
		$reserveInfo = $this-> ReservationModel->getCurReserveFormEmpCode($empCode);
		$userInfo = $this-> UserModel->getUserInfo('admin');
		$carType = array();
		foreach ($reserveInfo as $value) {
			$car =$this->CarsModel->getCarById($value->getCarId());
			$id = $car->getCarId();
			$v = $car->getCarType();
			$carType[$id] = $v;
		}

		$data['departmentName'] = $this->UserModel->getDepartmentName($this->session->userdata['logged_in']['department']);
		$data['reserveInfo'] = $reserveInfo;
		$data['userInfo']= $userInfo;
		$data['carType'] = $carType;
		$this->load->view('GenPDFUserHistory',$data);
	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */