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
		$driverId =  $_POST['filterDriver'];
		//$carId = $this->input->post('carId');
		$carTypeId = (isset($_POST['carType']))?$_POST['carType']:"";
		$carId = (isset($_POST['carId']))?$_POST['carId']:"";
		if(!$carTypeId == ""  && $driverId == "all"){
			foreach ($carTypeId as $value) {
				$r = $this -> ReservationModel -> getReserveFromCarTypeALLDriver($value , $carId);
				if($r != ""){
					$reserve = array_merge($reserve ,$r);
				}
			}
		}else if($carTypeId != "" && $driverId != "all" ){
			foreach ($carTypeId as $value) {
				$r = $this -> ReservationModel -> getReserveFromCarTypeDriver($value , $carId , $driverId);
				if($r != ""){
					$reserve = array_merge($reserve ,$r);
				}
			}
		}else if($driverId != "all"){
			$reserve = $this-> ReservationModel->getReserveFromDriver($driverId);
		}else{
			$reserve = $this-> ReservationModel->getCurrentReservation();
		}

		$data = array();
		if($reserve != ""){
			foreach ($reserve as $value) {	
					$data[] = array(
						'id' => $value->getReserveId(),
		                "title" => $value->getPlateLicese(),
		                "start" => $value->getStartDate(),
		                "end" => $value->getEndDate(),
		                "color" => $value->getColor(),
		              	"editable" => false
		               );
				}
		}
		
		echo json_encode($data);
		exit();
	
		
	}	

	public function reccommendCars(){
		$carTypeId = $this->input->post('cartype');
		$startDate = $this->input->post('dateS2');
		$endDate = $this->input->post('dateE2');
		$availiableCars = $this->CarsModel->searchAvailableCars($startDate , $endDate , $carTypeId); 
		$data = array();
		foreach ($availiableCars as $value) {	
				 $data[] = array(
				 	'carId' => $value->getCarId(),
					'carType' => $value->getCarType(),
	               	"plateL" => $value->getPlateLicese(),
	               	"start" => $startDate,
	               	"end" => $endDate
	       );
		}
		echo json_encode($data);
		exit();
	}
}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */