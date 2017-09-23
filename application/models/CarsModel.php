<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarsModel extends CI_Model {

	private $carId;
	private $plateLicense;
	private $color;
	private $carTypeId;
	private $registerDate;
	private $price;
	private $brand;
	private $generation;
	private $serial;
	private $purchaseYear;
	private $seat;
	private $itemLabel;
	private $driverId;
	private $fuel;
	private $depID;
	private $department;
	private $description;
	
	private $carType;	
	
	private $detail;	
	
	public function __construct(){
		parent::__construct();		
	}	

	public function getCarId(){
		return $this->carId;
	}

	public function setCarId($carId){
		$this->carId = $carId;
	}

	public function getPlateLicese(){
		return $this->plateLicense;
	}

	public function setPlateLicense($plateLicense){
		$this->plateLicense = $plateLicense;
	}

	public function getColor(){
		return $this->color;
	}

	public function setColor($color){
		$this->color = $color;
	}

	public function getCarTypeId(){
		return $this->carTypeId;
	}

	public function setCarTypeId($carTypeId){
		$this->carTypeId = $carTypeId;
	}

	public function getRegisterDate(){
		return $this->registerDate;
	}

	public function setRegisterDate($registerDate){
		$this->registerDate = $registerDate;
	}

	public function getPrice(){
		return $this->price;
	}

	public function setPrice($price){
		$this->price = $price;
	}

	public function getBrand(){
		return $this->brand;
	}

	public function setBrand($brand){
		$this->brand = $brand;
	}

	public function getGeneration(){
		return $this->generation;
	}

	public function setGeneration($generation){
		$this->generation = $generation;
	}

	public function getSerial(){
		return $this->serial;
	}

	public function setSerial($serial){
		$this->serial = $serial;
	}

	public function getPurchaseYear(){
		return $this->purchaseYear;
	}

	public function setPurchaseYear($purchaseYear){
		$this->purchaseYear = $purchaseYear;
	}
	
	public function getSeat(){
		return $this->seat;
	}

	public function setSeat($seat){
		$this->seat = $seat;
	}

	public function getItemLabel(){
		return $this->itemLabel;
	}

	public function setItemLabel($itemLabel){
		$this->itemLabel = $itemLabel;
	}

	public function getDriverId(){
		return $this->driverId;
	}

	public function setDriverId($driverId){
		$this->driverId = $driverId;
	}

	public function getFuel(){
		return $this->fuel;
	}

	public function setFuel($fuel){
		$this->fuel = $fuel;
	}

	public function getDepID(){
		return $this->depID;
	}

	public function setDepID($depID){
		$this->depID = $depID;
	}

	public function getCarType(){
		return $this->carType;
	}

	public function setCarType($carType){
		$this->carType = $carType;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getDetail(){
		return $this->detail;
	}

	public function setDetail($detail){
		$this->detail = $detail;
	}

	public function getDepartment(){
		return $this->department;
	}

	public function setDepartment($department){
		$this->department = $department;
	}

	public function getAllCar(){
		$car = null;
		$r = "";
		$sql = 'SELECT c.carId, c.PlateLicense, ct.CarType, c.RegisterDate, c.Color, '.
			' c.Price, c.Brand, c.Generation, c.serial, c.PurchaseYear, '.
			'c.Seat, c.itemLabel, c.fuel, d.department, c.Description '.
			'FROM cars c '.
			'JOIN cartype ct ON c.carTypeId= ct.carTypeId '.
			'JOIN Department d ON d.depID = c.depID';
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			$car = new CarsModel;
			$this->matchCarObject2($car,$row);
			if($r === ""){
				$r = array();
			}
			array_push($r,$car);
		}
		return $r;
	}

	private function matchCarObject2($car,$row){
		$car->setCarId($row->carId);
		$car->setPlateLicense($row->PlateLicense);	
		$car->setColor($row->Color);	
		//$car->setCarTypeId($row->CarTypeId);
		$car->setRegisterDate($row->RegisterDate);
		$car->setPrice($row->Price);
		$car->setBrand($row->Brand);
		$car->setGeneration($row->Generation);
		$car->setSerial($row->serial);
		$car->setPurchaseYear($row->PurchaseYear);		
		$car->setSeat($row->Seat);
		$car->setItemLabel($row->itemLabel);
		//$car->setDriverId($row->DriverId);
		$car->setFuel($row->fuel);
		$car->setDepartment($row->department);
		$car->setDescription($row->Description);
		$car->setCarType($row->CarType);
	}

	public function getCarById($carId){
		$car = null;
		$query = $this->db->query('SELECT c.carId , c.plateLicense, c.seat, ct.* FROM cars c JOIN cartype ct ON c.carTypeId = 
			ct.carTypeId WHERE c.carId =  '. $carId);
		foreach ($query->result() as $row){
			$car = new CarsModel;
			$this->matchCarObject($car,$row);
		}			
		return $car;
	}

	public function getCarsByType($Type){
		$car = null;
		$r = "";
		$query = $this->db->query('SELECT c.carId , c.plateLicense , c.seat, ct.* FROM cars c LEFT JOIN cartype ct ON c.carTypeId= ct.carTypeId WHERE ct.CarTypeId = '.$Type);
		foreach ($query->result() as $row){
			$car = new CarsModel;
			$this->matchCarObject($car,$row);

			if($r === "") {
				$r = array();
			}
			array_push($r,$car);
		}
		return $r;
	}

	public function searchAvailableCars($startDateTime , $endDateTime, $carTypeId){
		$car = null;
		$r = array();
		$query = $this->db->query('SELECT c.carId,c.plateLicense, c.seat, ct.* FROM cars c JOIN cartype ct 
			ON c.carTypeId= ct.carTypeId 
			WHERE c.carId NOT IN( SELECT cr.carId FROM currentreservation cr 
				WHERE (cr.EndDate BETWEEN \''. $startDateTime .'\' AND \''. $endDateTime .'\' 
					AND cr.StartDate BETWEEN \''. $startDateTime .'\' AND \''. $endDateTime .'\')
		OR (StartDate <\''.$startDateTime.'\' AND EndDate >\''.$endDateTime.'\') )');
		foreach ($query->result() as $row)
		{
			if($row->CarTypeId == $carTypeId) 
			{
				$car = new CarsModel;
				$this->matchCarObject($car,$row);
				array_push($r,$car);
			}
		}		
		return $r;
	}

	private function matchCarObject($car,$row){
		$car->setCarId($row->carId);
		$car->setCarTypeId($row->CarTypeId);
		$car->setSeat($row->seat);	
		$car->setPlateLicense($row->plateLicense);	
		$car->setCarType($row->CarType);
	}	


	public function add($input){
		$query = $this->db->select('carId')
		->from('cars')
		->where('plateLicense', $input["carId"])
		->get();

		foreach ($query->result() as $row){			
			$input["carId"] = $row->carId;
		}		
		return $this->db->insert('currentreservation', $input);
	}	

	public function getCost($carTypeId){		
		$query = $this->db->query('select ((timeend-TimeStart)/10000)*CostPerHour as price from cost where CarTypeId = '.$carTypeId);
		$result = $this->db->query($query);		
	}

	public function getCarTypeIdByName($carType){
		$sql = 'SELECT CarTypeId FROM cartype WHERE CarType = \''.$carType.'\'';
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			$result = $row->CarTypeId;  
		}
		return $result;
	}

	public function getCarTypeName($c){
		$sql = 'SELECT CarType FROM cartype WHERE CarTypeId =\''.$c.'\'';
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			$result = $row->CarType;  
		}
		return $result;
	}
}

/* End of file CarModel.php */
/* Location: ./application/models/CarModel.php */
/*
$cars, $date, $driver, $timeS, $timeE, $plateLicense, $place
*/