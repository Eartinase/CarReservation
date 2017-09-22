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

	public function getCarTypeId(){
		return $this->carTypeId;
	}

	public function setCarTypeId($carTypeId){
		$this->carTypeId = $carTypeId;
	}

	public function getPlateLicense(){
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




	public function getCarType(){
		return $this->carType;
	}

	public function setCarType($carType){
		$this->carType = $carType;
	}


	public function getPlateLicese(){
		return $this->plateLicense;
	}

	public function setPlateLicense($plateLicense){
		$this->plateLicense = $plateLicense;
	}

	public function getSeat(){
		return $this->seat;
	}

	public function setSeat($seat){
		$this->seat = $seat;
	}

	public function getDetail(){
		return $this->detail;
	}

	public function setDetail(){
		$this->detail = $detail;
	}


	public function getAllCar(){
		$car = null;
		$r = "";
		$sql = 'SELECT c.carId, c.PlateLicense, c.Color, c.RegisterDate,'.
			' c.Price, c.Brand, c.Generation, c.serial, c.PurchaseYear, '.
			'c.Seat, c.itemLabel, c.fuel, d.department'.
			'FROM cars c '.
			'JOIN carType ct ON c.carTypeId= ct.carTypeId'.
			'JOIN Department d ON d.depID = c.depID';
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			$car = new CarsModel;
			$this->matchCarObject($car,$row);
			if($r === ""){
				$r = array();
			}
			array_push($r,$car);
		}
		return $r;
	}
/*
	public function allCarForAdmin(){
		$query = $this->db->get('cars');
		foreach ($query->result() as $row) {
			$car = new CarsModel;
		}
	}
*/
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