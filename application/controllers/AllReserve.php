<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllReserve extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('ReservationModel');
		$this->load->model('CarsModel');
		$this->load->model('UserModel');
	}
	
	public function index(){				
		//$data["Reservation"] = $this-> ReservationModel->getCurrentReservation();
		$data["Type1"] = $this-> CarsModel -> getCarsByType(1);
 		$data["Type2"] = $this-> CarsModel -> getCarsByType(2);
 		$data["Type3"] = $this-> CarsModel -> getCarsByType(3);
 		$data["Type4"] = $this-> CarsModel -> getCarsByType(4);
 		//$data["Reservation"] = $this-> ReservationModel->getCurrentReservation();
		$this->load->view('AllReserveList', $data);
	}

	public function ajax_reservelist(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$depID = $this->session->userdata['logged_in']['department'];
		$currentReserve = $this->ReservationModel->getCurrentReservation();
		$data = array();
		$no=0;
		if($currentReserve != ''){
			foreach ($currentReserve as $value) {
				$car = $this->CarsModel->getCarById($value->getCarId());
				$no++;
				$data[] = array(
					"<center>".$value->getCarId()."</center>",
					"<center>".$this->UserModel->getNamee($value->getEmployeeCode())."</center>",
					"<center>".$this->UserModel->getTel($value->getEmployeeCode())."</center>",
					"<center>".$car->getCarType()."</center>",
					"<center>".$value->getPlateLicese()."</center>",
					"<center>".date("Y-m-d H:i", strtotime($value->getStartDate()))."</center>",
					"<center>".date("Y-m-d H:i", strtotime($value->getEndDate()))."</center>",
					$value->getPlace(),					
					'<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_reserve('."'".$value->getReserveId()."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteRes('."'".$value->getReserveId()."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
					);			
			}
		}
		$output = array(            
			"data" => $data
			);		
		//output to json format
		echo json_encode($output);
		exit;
	}

	public function ajax_deleteReserve($reserveID){
		$this->ReservationModel->deleteReserve($reserveID);
		echo json_encode(array("status" => TRUE));
	}	

	public function ajax_edit($rID){
		$ReserveInfo = $this->ReservationModel->getCurrentReservationFromID($rID);
		$selectCar = $this->CarsModel->getCarById($ReserveInfo->getCarId());

		$data = array(
			'reserveId' => $ReserveInfo->getReserveID(),
			'carTypeId' => $selectCar->getCarTypeId(),			
			'reserver' => $this->ReservationModel->getReserverName($rID),
			'startDate' => $ReserveInfo->getStartDate(),
			'endDate' => $ReserveInfo->getEndDate(),
			'tel' => $this->ReservationModel->getTelFromReserveId($rID),
			'carId'	=> $ReserveInfo->getCarId(),
			'place' => $ReserveInfo->getPlace()	
			
			);
		echo json_encode($data);		
	}

	public function ajax_update(){
		$reserveId = $this->input->post('id');
		$carType= $this->input->post('carType');
		$carId = $this->input->post('plateL');
		$dateS = $this->input->post('dateS');
		$dateE = $this->input->post('dateE');
		$tel = $this->input->post('telEdit');
		$place = $this->input->post('placeEdit');

		//$depID =  $this->session->userdata['logged_in']['department'];		
		
		if($this->ReservationModel->checkReservationforEdit($carId ,$dateS , $dateE ,$reserveId)){
			$data = array(					
				'carId' => $carId,
				'dateS' =>$dateS ,
				'dateE' => $dateE,
				'tel' => $tel,
				'place' => $place,
				'driverId'=> 0,
				//'depID' =>$depID ,				
				'accept' => 0
			);			
			$this-> ReservationModel ->updateReserveAdmin($reserveId , $data);
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array("status" => FALSE));
		}		
	}
}

/* End of file AllReserve.php */
/* Location: ./application/controllers/AllReserve.php */