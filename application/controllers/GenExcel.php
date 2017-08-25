<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class genExcel extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReservationModel','ReservationModel');
		$this->load->model('CarsModel','CarsModel');	
	}

	public function genExcelUserHistory(){	
		//$empCode = $this->session->userdata['logged_in']['employeeCode'];
		$reserveInfo = $this-> ReservationModel->getCurReserveFormEmpCode(0);
		$carType = array();
		foreach ($reserveInfo as $value) {
			$car =$this->CarsModel->getCarById($value->getCarId());
				$id = $car->getCarId();
				$v = $car->getCarType();
				$carType[$id] = $v;
		}


		$data['reserveInfo'] = $reserveInfo;
		$data['carType'] = $carType;	
		$this->load->view('GenExcelUserHistory',$data);
	}

}