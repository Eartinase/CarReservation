<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('CarsModel');
		$this->load->model('ReservationModel');
		$this->load->model('TransactionModel');
		//$this->load->model('ReservationModel','ReservationModel');				
	}

	public function index(){
		$emId = $this->session->userdata['logged_in']['employeeCode'];
		$check = $this->ReservationModel->checkDriver($emId);
		$incar = false;
		foreach ($check->result() as $row){
			$incar = true;
		}

		$data = $this->ReservationModel->driverReserve();
		$send = array(
			'tab' => $data,
			'incar' => $incar
		);
		$this->load->view('DriverView', $send);
	}	

	public function ajax_loadEventDriver(){
		//$reserve = $this-> ReservationModel->getCurrentReservation();
		$emId = $this->session->userdata['logged_in']['employeeCode'];
		$reserve = $this-> ReservationModel -> getCurrentReservationFromDriver($emId);
		$data = array();
		if($reserve != ''){
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

	public function departure(){
		$CurrentId = $_POST['CurrentId'];
		$driverId = $_POST['driverId'];
		$Departure = $_POST['Departure'];
		$CarMilesStart = $_POST['CarMilesStart'];

		$this-> ReservationModel -> depart($CurrentId, $driverId, $Departure, $CarMilesStart);
		
		$emId = $this->session->userdata['logged_in']['employeeCode'];
		$result = $this-> ReservationModel -> driving($emId);
		$data = array(
			'tab' => $result
		);
		$this->load->view('Driving', $data);
	}

	public function arrival(){
		$CurrentId = $_POST['CurrentId'];
		$Arrival = $_POST['Arrival'];
		$CarMilesEnd = $_POST['CarMilesEnd'];	
		$emId = $this->session->userdata['logged_in']['employeeCode'];

		$this-> ReservationModel -> arrive($CurrentId, $Arrival, $CarMilesEnd, $emId);
		$data = array(
			'message' => "บันทึกข้อมูลเรียบร้อยแล้ว"
		);
		$this->load->view('Result',$data);
	}

	public function Driving(){
		$emId = $this->session->userdata['logged_in']['employeeCode'];

		$result = $this-> ReservationModel -> driving($emId);
		$data = array(
			'tab' => $result
		);

		$this->load->view('Driving',$data);
	}

	public function save_Transaction(){
		$rID = $_POST['id3'];
		$transID = $_POST['trans'];
		$note = $_POST['note']; 
		for ($i=0; $i < count($transID) ; $i++) {
			$this -> TransactionModel -> insert_Trans($rID , $transID[$i] , $note[$i]);
		}
		redirect('/HomeInfo/driverLogin','refresh');

	}
}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */