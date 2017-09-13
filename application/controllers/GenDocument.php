<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class genDocument extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReservationModel','ReservationModel');
		$this->load->model('CarsModel','CarsModel');	
		$this->load->model('UserModel','UserModel');
	}

	public function index(){	
		$depID = $this->session->userdata['logged_in']['department'];
		$username = ($this->session->userdata['logged_in']['username']);

		$reserveInfo = $this-> ReservationModel->getCurReserveFormDepID($depID);
		$userInfo = $this-> UserModel->getUserInfo($username);
		$carType = array();
		if($reserveInfo != ""){
			foreach ($reserveInfo as $value) {
				$car =$this->CarsModel->getCarById($value->getCarId());
				$id = $car->getCarId();
				$v = $car->getCarType();
				$carType[$id] = $v;
			}
		}
		$data['departmentName'] = $this->UserModel->getDepartmentName($this->session->userdata['logged_in']['department']);
		$data['reserveInfo'] = $reserveInfo;
		$data['userInfo']= $userInfo;
		$data['carType'] = $carType;
		$this->load->view('GenDocument', $data);
	}

}