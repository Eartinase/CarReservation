<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarsModel extends CI_Model {

	private $carId;
	private $carTypeId;
	private $carType;
	private $plateLicense;
	private $seat;
	private $detail;
	private $depID;
	
	public function __construct()
	{
		parent::__construct();
		
	}

	

	public function getCarId()
	{
		return $this->carId;
	}

	public function getCarTypeId(){
		return $this->carTypeId;
	}

	public function getCarType(){
		return $this->carType;
	}

	public function getPlateLicese()
	{
		return $this->plateLicense;
	}

	public function getSeat()
	{
		return $this->seat;
	}

	public function getDetail(){
		return $this->detail;
	}

	public function setCarId($carId)
	{
		$this->carId = $carId;
	}

	public function setCarTypeId($carTypeId){
		$this->carTypeId = $carTypeId;
	}

	public function setCarType($carType)
	{
		$this->carType = $carType;
	}
	
	public function setPlateLicense($plateLicense)
	{
		$this->plateLicense = $plateLicense;
	}

	public function setSeat($seat)
	{
		$this->seat = $seat;
	}

	public function setDetail(){
		$this->detail = $detail;
	}

	public function getAllCar()
	{
		$car = null;
		$r = "";
		$query = $this->db->query('SELECT c.carId,c.plateLicense, c.seat, ct.* FROM cars c LEFT JOIN carType ct ON c.carTypeId= ct.carTypeId');
		foreach ($query->result() as $row)
		{
			$car = new CarsModel;
			$this->matchCarObject($car,$row);
			if($r === "") 
			{
				$r = array();
			}
			array_push($r,$car);
		}
		return $r;
	}

	public function getCarById($carId){
		$car = null;
		$query = $this->db->query('SELECT c.carId , c.plateLicense, c.seat, ct.* FROM cars c JOIN cartype ct ON c.carTypeId = 
			ct.carTypeId WHERE c.carId =  '. $carId);
		foreach ($query->result() as $row)
		{
			$car = new CarsModel;
			$this->matchCarObject($car,$row);
		}			
		return $car;
	}

	public function getCarsByType($Type)
	{
		$car = null;
		$r = "";
		$query = $this->db->query('SELECT c.carId , c.plateLicense , c.seat, ct.* FROM cars c LEFT JOIN cartype ct ON c.carTypeId= ct.carTypeId WHERE ct.CarTypeId = '.$Type);
		foreach ($query->result() as $row)
		{
			$car = new CarsModel;
			$this->matchCarObject($car,$row);

			if($r === "") 
			{
				$r = array();
			}
			array_push($r,$car);
		}
		return $r;
	}

	public function searchAvailableCars($startDateTime , $endDateTime, $carTypeId)
	{
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

	private function matchCarObject($car,$row)
	{
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

		foreach ($query->result() as $row)
		{			
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