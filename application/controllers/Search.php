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
		//$carId = $this->input->post('carId');
		$carTypeId = (isset($_POST['carType']))?$_POST['carType']:"";
		$carId = (isset($_POST['carId']))?$_POST['carId']:"";
		if(!$carTypeId == ""){
			foreach ($carTypeId as $value) {
				$r = $this -> ReservationModel -> getReserveFromCarType($value , $carId);
				if($r != ""){
					$reserve = array_merge($reserve ,$r);
				}
			}

		}else{
			$reserve = $this-> ReservationModel->getCurrentReservation();
		}

		$data = array();

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

		echo json_encode($data);
		exit();
	
		
	}	

	public function test(){
		$startDate = (isset($_POST['dateS']))?$_POST['dateS']:"";
		$endDate = (isset($_POST['dateE']))?$_POST['dateE']:"";
		$data['availiableCars'] = $this->CarsModel->searchAvailableCars($startDate , $endDate , 1); 
		$this->load->view('testDataTable', $data);
	}


	public function reccommendCars(){
		$carTypeId = $this->input->post('cartype');
		$startDate = $this->input->post('dateS');
		$endDate = $this->input->post('dateE');
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