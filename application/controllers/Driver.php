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
		$data = $this->ReservationModel->driverReserve();
		$table = "";
		foreach ($data->result() as $row){
			$table .= "<tr>";
			$table .= "<td>".$row->currentid."</td>";
			$table .= "<td>".$row->CarType."</td>";
			$table .= "<td>".$row->PlateLicense."</td>";
			$table .= "<td>".$row->Name."</td>";
			$table .= "<td>".$row->place."</td>";
			$table .= "<td>".$row->StartDate."</td>";
			$table .= "<td>".$row->EndDate."</td>";
			$table .= "<td>active</td>";
			$table .= "<td><button class='btn btn-success' name='".$row->currentid."''>ยืนยัน</button></td>";
		}	

		$send = array(
			'tab' => $table
		);

		$this->load->view('DriverView', $send);
	}	

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */