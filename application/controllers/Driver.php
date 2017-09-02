<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('CarsModel');
		$this->load->model('ReservationModel');
		//$this->load->model('ReservationModel','ReservationModel');				
	}

	public function index(){
		$emId = $this->session->userdata['logged_in']['employeeCode'];
		$incar = $this->ReservationModel->checkDriver($emId);
		if($incar = null){
			$incar = false;
		}else{
			$incar = true;
		}
		$data = $this->ReservationModel->driverReserve();
		$send = array(
			'tab' => $data,
			'incar' => $incar
		);
		$this->load->view('DriverView', $send);
	}	

	public function depart(){
		$CurrentId = $_POST['CurrentId'];
		$driverId = $_POST['driverId'];
		$Departure = $_POST['Departure'];
		$CarMilesStart = $_POST['CarMilesStart'];

		$this-> ReservationModel -> depart($CurrentId, $driverId, $Departure, $CarMilesStart);
		
		$emId = $this->session->userdata['logged_in']['employeeCode'];
		$result = $this-> ReservationModel -> driving($emId);
		$data = array(
			'tab' => $result
		);
		$this->load->view('Driving', $data);
	}

	public function Driving(){
		$emId = $this->session->userdata['logged_in']['employeeCode'];

		$result = $this-> ReservationModel -> driving($emId);
		$data = array(
			'tab' => $result
		);

		$this->load->view('Driving',$data);
	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */