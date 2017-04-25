<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReservationModel','ReservationModel');
		$this->load->model('CarsModel','CarsModel');
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
		$carTypeId = (isset($_POST['carType']))?$_POST['carType']:"";
		$data["searchCar"] =  $this -> CarsModel -> searchCars($startDateTime,$endDateTime,$carTypeId);
		// get Car Object that All availiable
		$data["Reserve"] = ""; // collect related ReserveObject on that dateTime
		$data["STime"] = $startDateTime;
		$data["ETime"] = $endDateTime;
		$carArray = array(); // collect CarObject from SearhCarById 

		if($_POST['startTime'] == null || $_POST['endTime'] == null){
			$data["Reserve"] =  $this -> ReservationModel -> getReserveFromSearch($startDateTime,$endDateTime,$carTypeId);
			if($data["Reserve"] != null ){
				foreach ($data["Reserve"] as $key => $value) 
					{
						array_push($carArray ,$this-> CarsModel-> getCarById($key));
					}

			}
		
		}

		$data["reserveCarOb"] = $carArray;
		$this->load->view('SearchView',$data);
		//return $data;
	}
	
}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */