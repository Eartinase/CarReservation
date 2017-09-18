<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class genReport extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReservationModel','ReservationModel');
		$this->load->model('CarsModel','CarsModel');	
		$this->load->model('UserModel','UserModel');		
	}

	public function genPDFUserHistory(){	
		$empCode = $this->session->userdata['logged_in']['employeeCode'];
		$reserveInfo = $this-> ReservationModel->getCurReserveFormEmpCode($empCode);
		$userInfo = $this-> UserModel->getUserInfo('admin');
		$carType = array();
		foreach ($reserveInfo as $value) {
			$car =$this->CarsModel->getCarById($value->getCarId());
			$id = $car->getCarId();
			$v = $car->getCarType();
			$carType[$id] = $v;
		}

		$data['departmentName'] = $this->UserModel->getDepartmentName($this->session->userdata['logged_in']['department']);
		$data['reserveInfo'] = $reserveInfo;
		$data['userInfo']= $userInfo;
		$data['carType'] = $carType;
		$this->load->view('GenPDFUserHistory',$data);
	}

	public function genExcelUserHistory(){	
		$depID = $this->session->userdata['logged_in']['department'];
		$reserveInfo = $this-> ReservationModel->getCurReserveFormDepID($depID);
		$userInfo = $this-> UserModel->getUserInfo('admin');
		$carType = array();
		foreach ($reserveInfo as $value) {
			$car =$this->CarsModel->getCarById($value->getCarId());
			$id = $car->getCarId();
			$v = $car->getCarType();
			$carType[$id] = $v;
		}

		$data['reserveInfo'] = $reserveInfo;
		$data['userInfo']= $userInfo;
		$data['carType'] = $carType;
		$this->load->view('GenExcelUserHistory',$data);
	}

	public function index(){	
		$depID = $this->session->userdata['logged_in']['department'];
		$username = ($this->session->userdata['logged_in']['username']);

		$reserveInfo = $this-> ReservationModel->getCurReserveFormDepID($depID);
		$userInfo = $this-> UserModel->getUserInfo($username);
		$carType = array();
		if($reserveInfo != ""){
			foreach ($reserveInfo as $value) {
				$car =$this->CarsModel->getCarById($value->getCarId());
				$id = $car->getCarId();
				$v = $car->getCarType();
				$carType[$id] = $v;
			}
		}
		$data['departmentName'] = $this->UserModel->getDepartmentName($this->session->userdata['logged_in']['department']);
		$data['reserveInfo'] = $reserveInfo;
		$data['userInfo']= $userInfo;
		$data['carType'] = $carType;
		$this->load->view('GenDocument', $data);
		//$this->load->view('SelectCost', $data);
	}

	public function selectCost(){	
		$depID = $this->session->userdata['logged_in']['department'];
		$username = ($this->session->userdata['logged_in']['username']);

		$reserveInfo = $this-> ReservationModel->getCurReserveFormDepID($depID);
		$userInfo = $this-> UserModel->getUserInfo($username);
		$carType = array();
		if($reserveInfo != ""){
			foreach ($reserveInfo as $value) {
				$car =$this->CarsModel->getCarById($value->getCarId());
				$id = $car->getCarId();
				$v = $car->getCarType();
				$carType[$id] = $v;
			}
		}
		$data['departmentName'] = $this->UserModel->getDepartmentName($this->session->userdata['logged_in']['department']);
		$data['reserveInfo'] = $reserveInfo;
		$data['userInfo']= $userInfo;
		$data['carType'] = $carType;
		$this->load->view('selectCost', $data);
	}

	public function genAdminCarHistory(){	
		$empCode = $this->session->userdata['logged_in']['employeeCode'];
		$username = ($this->session->userdata['logged_in']['username']);

		$reserveInfo = $this-> ReservationModel->getCurReserveFormEmpCode($empCode);
		$userInfo = $this-> UserModel->getUserInfo($username);
		
		$carType = array();
		foreach ($reserveInfo as $value) {
			$car =$this->CarsModel->getCarById($value->getCarId());
			$id = $car->getCarId();
			$v = $car->getCarType();
			$carType[$id] = $v;
		}

		$data["Type1"] = $this-> CarsModel -> getCarsByType(1);
		$data["Type2"] = $this-> CarsModel -> getCarsByType(2);
		$data["Type3"] = $this-> CarsModel -> getCarsByType(3);
		$data["Type4"] = $this-> CarsModel -> getCarsByType(4);	

		$data['reserveInfo'] = $reserveInfo;
		$data['userInfo']= $userInfo;
		$data['carType'] = $carType;
		$this->load->view('GenAdminCarHistory',$data);
	}

	public function genCost() {
		$carTypeId = $this->CarsModel->getCarTypeIdByName($_GET['carTypeId']);

		$this->load->model('CostModel');
		$cost = $this->CostModel->getCostPerHour($carTypeId);

		$duration = ceil($this->CostModel->getDuration($_GET['reserveId']));
		$data = array(
			'carTypeId' => $carTypeId,
			'cost' => $cost,
			'duration' => $duration
		);

		$this->load->view('GenCost',$data);
	}



	public function ajax_changeData(){
		$plateL = $_POST['plateLicense'];
		$robj = $this->ReservationModel->getReserveFromCarID($plateL);
		$data = array();
		foreach ($robj as $value) {	
			$data[] = array(
				'rId' => $value['CurrentId'],
				'name' => "นรินทร์ธร วรเมธีกุล",
				"department" => $value['depID'],
				"start" => $value['StartDate'],
				"end" => $value['EndDate'],
				"place" => $value['Place']
			);
		}
		
		//output to json format
		echo json_encode($data);
	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */