<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Reserve extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('ReservationModel');
		$this->load->model('CarsModel');
	}

	public function addReserve(){
		$startDate = $_POST['dateS'];
		$endDate = $_POST['dateE'];
		$depID = $this->session->userdata['logged_in']['department'];
		$carId = $_POST['plateLicense'];
		$place = $_POST['place'];
		$tel = $_POST['tel'];
		$check = $this-> ReservationModel -> addReservation($carId, $startDate, $endDate, $depID, $place, $tel);
		
		if( $check ) {
			$data['check'] = true;			
		}else{
			$data['check'] = false;
			$data['message']="ไม่สามารถทำการจองได้เนื่องจากรถได้ถูกจองแล้ว";			
		}
		$this->load->view('UnableToReserve', $data);				
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
			'carId'	=> $ReserveInfo->getCarId(),
			'carTypeId' => $selectCar->getCarTypeId(),
			'plateLicense' => $ReserveInfo->getPlateLicese(),
			'driverId' => $ReserveInfo->getDriverId(),
			'startDate' => $ReserveInfo->getStartDate(),
			'endDate' => $ReserveInfo->getEndDate(),
			'place' => $ReserveInfo->getPlace(),
			'tel' => $ReserveInfo->getTel()
			);
		echo json_encode($data);
				
		//$carlist = $this->CarsModel-> getCarsByType($selectCar);
		//$key = array_search($selectCar, $carlist);
		//if($key !== FALSE) {
		//	unset($carlist[$key]);
		//}
		//$data['car'] = $carlist;
		
	}

	public function outsideCar(){
		$this->load->view('OutsideCar');
	}

	public function ajax_getCar($carID){
		$selectCar = $this->CarsModel->getCarById($carID);
		$data = array(
			'carId'	=> $selectCar->getCarId(),
			'carType' => $selectCar->getCarType(),
			'plateLicense' => $selectCar->getPlateLicese()	
			);
		echo json_encode($data);
	}

	public function showReserveHistory(){
		$data["Type1"] = $this-> CarsModel -> getCarsByType(1);
 		$data["Type2"] = $this-> CarsModel -> getCarsByType(2);
 		$data["Type3"] = $this-> CarsModel -> getCarsByType(3);
 		$data["Type4"] = $this-> CarsModel -> getCarsByType(4);
		$this->load->view('UserHistory',$data);
	}

	public function ajax_update(){
		$reserveId = $this->input->post('id');
		$carId = $this->input->post('plateL');
		$depID =  $this->session->userdata['logged_in']['department'];
		$dateS = $this->input->post('dateS');
		$dateE = $this->input->post('dateE');
		$place = $this->input->post('placeEdit');
		$tel = $this-> input->post('telEdit');
		if($this->ReservationModel->checkReservationforEdit($carId ,$dateS , $dateE ,$reserveId)){
			$data = array(
				'carId' => $carId,
				'driverId'=> 0,
				'depID' =>$depID ,
				'dateS' =>$dateS ,
				'dateE' => $dateE,
				'place' => $place,
				'tel' => $tel,
				'accept' => 0
			);			
			$this-> ReservationModel ->updateReserve($reserveId , $data);
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array("status" => FALSE));
		}		
	}

	public function ajax_reservelist(){
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
		$depID = $this->session->userdata['logged_in']['department'];
		$currentReserve = $this->ReservationModel->getCurReserveFormDepID($depID);
		$data = array();
		$no=0;
		if($currentReserve != ''){
			foreach ($currentReserve as $value) {
				$car = $this->CarsModel->getCarById($value->getCarId());
				$no++;
				$data[] = array(
	                   "<center>".$value->getCarId()."</center>",
	                   "<center>".$car->getCarType()."</center>",
	                   "<center>".$value->getPlateLicese()."</center>",
	                   "<center>".date("Y-m-d H:i", strtotime($value->getStartDate()))."</center>",
	                   "<center>".date("Y-m-d H:i", strtotime($value->getEndDate()))."</center>",
	                   $value->getPlace(),
	                   '<center>active</center>',
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

	public function ajax_reserve_history(){
		$depID = $this->session->userdata['logged_in']['department'];
		$currentReserve = $this->ReservationModel->getCurReserveFormDepID($depID);
		$data = array();
		if($currentReserve != ''){
			foreach ($currentReserve as $value) {
				$data[] = array(
					'id' => $value->getReserveId(),
	                "title" => $value->getPlateLicese(),
	                "start" => $value->getStartDate(),
	                "end" => $value->getEndDate(),
	                "color" => $value->getColor(),
	                "editable" => true
	               );			
			}
		}
		echo json_encode($data);
		exit;
	}

	public function DriverList(){
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
		$depID = $this->session->userdata['logged_in']['employeeCode'];
		$currentReserve = $this->ReservationModel->getCurReserveFormDepID($depID);
		$data = array();
		$no=0;
		//if($currentReserve != ''){
			foreach ($currentReserve as $value) {
				$car = $this->CarsModel->getCarById($value->getCarId());
				$no++;
				$data[] = array(
	                   "<center>รหัส</center>",
	                   "<center>".$car->getCarType()."</center>",
	                   "<center>".$value->getPlateLicese()."</center>",
	                   "<center>".$value->employeeCode."</center>",
	                   $value->getPlace(),
	                   "<center>".date("Y-m-d H:i", strtotime($value->getStartDate()))."</center>",
	                   "<center>".date("Y-m-d H:i", strtotime($value->getEndDate()))."</center>",

	                   '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_reserve('."'".$value->getReserveId()."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
	                   <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteRes('."'".$value->getReserveId()."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
	               );			
			}
		//}
		 $output = array(            
                "data" => $data
            );		
		//output to json format
		echo json_encode($output);
		exit;
	}
}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */