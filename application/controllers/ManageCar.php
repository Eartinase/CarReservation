<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageCar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('CarsModel');
	}

	public function index(){
		$this->load->view('AllCar');
	}

	public function AddCar(){		
		$driverOption = $this->UserModel->getDriver();
		$depOption = $this->UserModel->getDepartment();

		$data = array(
			'driverOption' => $driverOption,
			'depOption' => $depOption
		);
		$this->load->view('AddCar', $data);
	}

	public function ajax_carlist(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		//$depID = $this->session->userdata['logged_in']['department'];	
		$allCar = $this->CarsModel->getAllCar();
		$data = array();
		$no=0;
		if($allCar != ''){
			foreach ($allCar as $value) {
				//$car = $this->CarsModel->getCarById($value->getCarId());
				$no++;
				$data[] = array(					
					"<center>".$value->getPlateLicese()."</center>",
					"<center>".$value->getCarType()."</center>",	   	         
					"<center>".$value->getBrand()."\n".$value->getGeneration()."</center>",
					"<center>".$value->getSerial()."</center>",
					"<center>".$value->getSeat()."</center>",
					"<center>".$value->getItemLabel()."</center>",
					"<center>".$value->getFuel()."</center>",
					"<center>".$value->getDepartment()."</center>",
					"<center>".$value->getDescription()."</center>",

					"<form method='post' action='".base_url()."ManageCar/EditCar'>\n".
					"<input type='text' hidden name='carId' value='".$value->getCarId()."'>\n".
					"<button class='btn btn-success' type='submit'>รายละเอียด</button>\n".
					"</form>"	               		               	
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

	public function EditCar(){
		$driverOption = $this->UserModel->getDriver();
		$depOption = $this->UserModel->getDepartment();

		$carDetail = $this->CarsModel->getCarForEdit($_POST["carId"]);		
		
		$data = array(
			'color' 		=> $carDetail['color'],
			'plateLicense' 	=> $carDetail['plateLicense'],
			'carType' 		=> $carDetail['carType'],
			'registerDate'	=> $carDetail['registerDate'],
			'price' 		=> $carDetail['price'],
			'brand' 		=> $carDetail['brand'],
			'generation' 	=> $carDetail['generation'],
			'serial' 		=> $carDetail['serial'],
			'purchaseYear' 	=> $carDetail['purchaseYear'],
			'seat' 			=> $carDetail['seat'],
			'itemLabel' 	=> $carDetail['itemLabel'],
			'driver' 		=> $carDetail['driver'],
			'department' 	=> $carDetail['department'],
			'description' 	=> $carDetail['description'],
			'generation' 	=> $carDetail['generation'],
			'fuel' 			=> $carDetail['fuel'],
			'carId' 		=> $carDetail['carId'],
			'depId' 		=> $carDetail['depId'],
			'depOption'		=> $depOption,
			'driverOption'	=> $driverOption
		);
		$this->load->view('EditCar',$data);
	}

	public function EditOrDel(){
		$carId = $_POST["carId"];

		if (isset($_POST['confirm'])) {
			$data = array(		
				'PlateLicense'	=> $this->input->post('plateLicense'), 
				'Color' 		=> $this->input->post('color'),
				'CarTypeId' 	=> $this->input->post('carType'),
				'RegisterDate'	=> $this->input->post('RegisterDate'),
				'Price'			=> $this->input->post('price'),
				'Brand'			=> $this->input->post('brand'),
				'Generation'	=> $this->input->post('generation'),
				'serial'		=> $this->input->post('serial'),
				'PurchaseYear'	=> $this->input->post('PurchaseYear'),
				'Seat' 			=> $this->input->post('seat'),
				'itemLabel'		=> $this->input->post('itemLabel'),
				'DriverId' 		=> $this->input->post('driverId'),
				'fuel'			=> $this->input->post('Fuel'),
				'depID'			=> $this->input->post('depId'),
				'description'	=> $this->input->post('description'),
				'OpenReserve'	=> $this->input->post('open')
			);		
			$this -> CarsModel -> Update($data, $carId);
		}elseif (isset($_POST['del'])) {
			$this->CarsModel->deleteCar($carId);
		}
		$this->load->view('AllCar');
	}

}

/* End of file ManageCar.php */
/* Location: ./application/controllers/ManageCar.php */