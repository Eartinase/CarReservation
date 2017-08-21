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
		$carTypeId = array(1,2);
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
}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */