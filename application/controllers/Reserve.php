<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Reserve extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReservationModel');
		
	}

	public function addReserve(){
		$startDate = $_POST['dateS'].' '.$_POST['timeS'];
		$endDate = $_POST['dateE'].' '.$_POST['timeE'];
		$code = $this->session->userdata['logged_in']['employeeCode'];
		$carId = $_POST['plateLicense'];
		$place = $_POST['place'];
		
		$check = $this-> ReservationModel -> addReservation($carId ,$startDate , $endDate,$code,$place);
		
		if( $check ) {
			$data['check'] = true;
			
		}else{
			$data['check'] = false;
			$data['message']="ไม่สามารถทำการจองได้เนื่องจากรถได้ถูกจองแล้ว";
			
		}

		$this->load->view('Result', $data);
				
	}

	public function outsideCar(){
		$this->load->view('outsideCar');
	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */