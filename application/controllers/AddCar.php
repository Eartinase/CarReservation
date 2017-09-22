<?php
defined('BASEPATH') || exit('No direct script access allowed');

class AddCar extends CI_Controller {   
	public function __construct(){
		parent::__construct();
		$this->load->model('AddCarModel');
	}

	public function index(){		
		$cartype = $this-> AddCarModel ->CarTypeDriver();
		$this->load->view('AddCarView', $cartype);
	}

	public function Add(){		
		$data = array(		
			'plateLicense'	=> $this->input->post('plateLicense'), 
			'seat' 			=> $this->input->post('seat'),
			'carTypeId' 	=> $this->input->post('carType'),	
			'driverId' 		=> $this->input->post('driver'),
			'Img'			=>$this->input->post('pic'),
			'serial'		=> $this->input->post('serial')		 	
			);		
		$this -> AddCarModel -> add($data);
		$message = array(
			'message' => 'Success'
			);
		$this->load->view('Result', $message);
	}   

}

/* End of file AddCar.php */
/* Location: ./application/controllers/AddCar.php */