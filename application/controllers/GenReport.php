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
		//$empCode = $this->session->userdata['logged_in']['employeeCode'];
		$reserveInfo = $this-> ReservationModel->getCurReserveFormEmpCode(0);
		$userInfo = $this-> UserModel->getUserInfo('admin');
		$carType = array();
		foreach ($reserveInfo as $value) {
			$car =$this->CarsModel->getCarById($value->getCarId());
			$id = $car->getCarId();
			$v = $car->getCarType();
			$carType[$id] = $v;
		}


		$data['reserveInfo'] = $reserveInfo;
		$data['userInfo']= $userInfo;
		$data['carType'] = $carType;
		$this->load->view('GenPDFUserHistory',$data);
	}


	public function genReserveHistoryByCar(){				
		$this->load->view('ReserveHistoryByCar');
	}

	public function genReserveSummary(){				
		$this->load->view('ReserveSummary');
	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */