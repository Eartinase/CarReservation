<?php
defined('BASEPATH') || exit('No direct script access allowed');

class OutsideCarCon extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReservationModel','ReservationModel');
		$this->load->model('CarsModel','CarsModel');	
		$this->load->model('UserModel','UserModel');
		$this->load->model('OutsideCarModel','OutsideCarModel');
	}

	function sendRequest(){
		$carTypeID = $_POST['cartype'];
		$startDate = $_POST['dateS'];
		$endDate = $_POST['dateE'];
		$depID = $this->session->userdata['logged_in']['department'];
		$tel = $_POST['tel'];
		$place = $_POST['place'];
		$reason =($_POST['reason']=="0")?$_POST['reasonText']:$_POST['reason'];
		$data = array(
			'carTypeId' => $carTypeID,
			'depID' =>$depID ,
			'dateS' =>$startDate ,
			'dateE' => $endDate,
			'place' => $place,
			'tel' => $tel,
			'reason' => $reason
		);
		$this->OutsideCarModel->add_OutsideCar($data);		
		echo json_encode(array("status" => TRUE));	
	}

}