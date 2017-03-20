<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserve extends CI_Controller {

	public function index()
	{		
		$this->load->model('CarModel');
		$data["result"] = $this-> CarModel ->showReserve();
		$data["carList"] = $this-> CarModel ->showCar();

		$this->load->view('reserveCar', $data);
	}

	public function add(){
		$timeS = $_POST['date'].' '.$_POST['timeS'];
		$timeE = $_POST['date'].' '.$_POST['timeE'];
		$code = '567';
		$data = array(		
			'plateLicense' => $this->input->post('plateLicense'),
			'driverId' => $this->input->post('driver'),
			'employeeCode' => $code,	
			'StartDate' => $timeS,
			'EndDate' =>$timeE,			
			'place' => $this->input->post('place')
			);
		$this->load->model('CarModel');		
		$this -> CarModel -> add($data);
		$this->load->view('result');

	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */