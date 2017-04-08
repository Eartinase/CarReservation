<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CarsModel');
	
	}

	public function index()
	{			
 		$data = array('r' => $this-> CarsModel -> getAllCar(),'searchCar'=>null);
		$this->load->view('SearchView',$data);
	}

	public function searchCar()
	{
		$startDateTime = '\''.$_POST['startDate'].' '.$_POST['startTime'].'\'';
		$endDateTime = '\''.$_POST['endDate'].' '.$_POST['endTime'].'\'';
		$carTypeId = (isset($_POST['carType']))?$_POST['carType']:NULL;
		$data = array('searchCar' => $this -> CarsModel -> searchCars($startDateTime,$endDateTime,$carTypeId));
		$this->load->view('SearchView',$data);
	}
	
}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */