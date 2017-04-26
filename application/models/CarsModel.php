<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarsModel extends CI_Model {

	private $carId;
	private $carType;
	private $plateLicense;
	private $seat;
	private $detail;
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function getCarId()
	{
		return $this->carId;
	}

	public function getCarType()
	{
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
		$query = $this->db->query('SELECT c.carId,c.plateLicense, c.seat, ct.CarType FROM cars c LEFT JOIN carType ct ON c.carTypeId= ct.carTypeId');
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
		$query = $this->db->query('SELECT c.carId,c.plateLicense, c.seat, ct.CarType FROM cars c JOIN cartype ct ON c.carTypeId= ct.carTypeId WHERE c.carId =  '. $carId);
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
		$query = $this->db->query('SELECT c.carId,c.plateLicense, c.seat, ct.carType FROM cars c LEFT JOIN carType ct ON c.carTypeId= ct.carTypeId WHERE ct.CarTypeId = '.$Type);
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

	public function searchCars($startDateTime , $endDateTime, $carTypeId)
	{
		$car = null;
		$r = "";
		$query = $this->db->query('SELECT c.carId,c.plateLicense, c.seat, ct.CarType , ct.carTypeId FROM cars c JOIN cartype ct ON c.carTypeId= ct.carTypeId WHERE c.carId NOT IN( SELECT cr.carId FROM currentreservation cr WHERE (cr.EndDate BETWEEN '. $startDateTime .' AND '. $endDateTime .'AND cr.StartDate BETWEEN '. $startDateTime .' AND '. $endDateTime .')OR (StartDate <'.$startDateTime.' AND EndDate >'.$endDateTime.') )');
		foreach ($query->result() as $row)
		{
			if($carTypeId == null || in_array($row->carTypeId,$carTypeId) )
			{
				$car = new CarsModel;
				$this->matchCarObject($car,$row);

				if($r === "") 
				{
					$r = array();
				}
				array_push($r,$car);
			}
		}

		return $r;

	}


	

	private function matchCarObject($car,$row)
	{
		$car->setCarId($row->carId);
		$car->setSeat($row->seat);	
		$car->setPlateLicense($row->plateLicense);	
		$car->setCarType($row->CarType);

	}

	


	

}

/* End of file CarModel.php */
/* Location: ./application/models/CarModel.php */
/*
$cars, $date, $driver, $timeS, $timeE, $plateLicense, $place
*/