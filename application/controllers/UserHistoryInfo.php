<?php
defined('BASEPATH') || exit('No direct script access allowed');

class UserHistoryInfo extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('ReservationModel','ReservationModel');
		$this->load->model('CarsModel','CarsModel');
		$this->load->model('UserModel','UserModel');
		$this->load->helper('form');

	}

	public function index()
	{
		$cars = array();
		$empCode = $this->session->userdata['logged_in']['employeeCode'];
		$currentReserve = $this->ReservationModel->getCurReserveFormEmpCode($empCode);
		if($currentReserve!= null){
			foreach ($currentReserve as $value) {
				$car = $this->CarsModel->getCarById($value->getCarId());
				array_push($cars ,$car);
			}
		}

		$data["currentReserve"] = $currentReserve;
		$data["cars"] = $cars;
		$this->load->view('UserHistory', $data);

	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */