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
		$code = '567';
		$carId = $_POST['plateLicense'];
		$place = $_POST['place'];
		
		if( $this-> ReservationModel -> addReservation($carId ,$startDate , $endDate, $code,$place )){
			$data['message']="Success";
		}else{
			$data['message']="Fail";
		}
			redirect(base_url().'homeInfo','refresh');
			
	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */