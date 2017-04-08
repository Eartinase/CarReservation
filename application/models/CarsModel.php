<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarsModel extends CI_Model {

	private $carId;
	private $carType;
	private $plateLicense;
	private $seat;
	
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

	public function getCarsByType($Type)
	{
		$car = null;
		$r = "";
		$query = $this->db->query('SELECT c.carId,c.plateLicense, c.seat, ct.CarType FROM cars c LEFT JOIN carType ct ON c.carTypeId= ct.carTypeId WHERE ct.CarTypeId = $Type');
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
		$query = $this->db->query('SELECT c.carId,c.plateLicense, c.seat, ct.CarType , ct.carTypeId FROM cars c JOIN carType ct ON c.carTypeId= ct.carTypeId WHERE c.PlateLicense NOT IN( SELECT cr.PlateLicense FROM currentreservation cr WHERE cr.EndDate BETWEEN '. $startDateTime .' AND '. $endDateTime .'AND cr.StartDate BETWEEN '. $startDateTime .' AND '. $endDateTime .')');
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