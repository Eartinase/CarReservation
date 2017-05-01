<?php
defined('BASEPATH') || exit('No direct script access allowed');

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
		$reserve = array();
		//$startDateTime = '\''.$_POST['startDate'].' '.$_POST['startTime'].'\'';
		//$endDateTime = '\''.$_POST['endDate'].' '.$_POST['endTime'].'\'';
		//$data["searchCar"] =  $this -> CarsModel -> searchCars($startDateTime,$endDateTime,$carTypeId);
		// get Car Object that All availiable
		$carTypeId = (isset($_POST['carType']))?$_POST['carType']:"";
		$carId = (isset($_POST['carId']))?$_POST['carId']:"";
		if(!$carTypeId == ""){
			foreach ($carTypeId as $value) {
				$r =$this -> ReservationModel -> getReserveFromCarType($value , $carId);
				if($r != null){
					$reserve = array_merge($reserve ,$r);
				}
				
			}

		}else{
			$reserve = $this-> ReservationModel->getCurrentReservation();
		}
			
		$data["Reservation"] = $reserve;	
		$this->load->view('calendarView',$data);		
		
	}	
}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */