<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageCar extends CI_Controller {

	public function index(){
		$this->load->view('AllCar');
	}

	public function AddCar(){
		$this->load->model('UserModel');
		
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
		$this->load->model('CarsModel');
		$allCar = $this->CarsModel->getAllCar();
		$data = array();
		$no=0;
		if($allCar != ''){
			foreach ($allCar as $value) {
				$car = $this->CarsModel->getCarById($value->getCarId());
				$no++;
				$data[] = array(
					
	            	"<center>".$value->getPlateLicense()."</center>",
	               	"<center>".$value->getCarTypeId()."</center>",	      	         
	                "<center>".$value->getBrand()." ".$value->getGeneration()."</center>",
	                "<center>".$value->getSerial()."</center>",
	                "<center>".$value->getSeat()."</center>",
	                "<center>".$value->getItemLabel()."</center>",
	                "<center>".$value->getFuel()."</center>",
	                "<center>".$value->getDepID()."</center>",
	                "<center>".$value->getDescription()."</center>",
	                "<p>...</p>"


	                   /*
	                   "<center>".$car->getCarType()."</center>",
	                   "<center>".$value->getPlateLicese()."</center>",
	                   "<center>".date("Y-m-d H:i", strtotime($value->getStartDate()))."</center>",
	                   "<center>".date("Y-m-d H:i", strtotime($value->getEndDate()))."</center>",
	                   $value->getPlace(),
	                   '<center>active</center>',
	                   '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_reserve('."'".$value->getReserveId()."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
	                   <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteRes('."'".$value->getReserveId()."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
	                   */
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

}

/* End of file ManageCar.php */
/* Location: ./application/controllers/ManageCar.php */