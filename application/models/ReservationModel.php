<?php
defined('BASEPATH') || exit('No direct script access allowed');

class ReservationModel extends CI_Model {

	private $employeeCode;
	private $plateLicense;
	private $startDate;
	private $endDate;
	private $place;
	private $driverId;
	private $color;
	private $carId;

 	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function getEmployeeCode()
	{
		return $this->employeeCode;
	}

	public function getPlateLicese()
	{
		return $this->plateLicense;
	}

	public function getStartDate()
	{
		return $this->startDate;
	}

	public function getEndDate()
	{
		return $this->endDate;
	}

	public function getPlace()
	{
		return $this->place;
	}

	public function getDriverId()
	{
		return $this->driverId;
	}

	public function getColor()
	{
		return $this->color;
	}

	public function getCarId()
	{
		return $this->carId;
	}

	public function setEmployeeCode($employeeCode)
	{
		$this->employeeCode = $employeeCode;
	}

	public function setPlateLicense($plateLicense)
	{
		$this->plateLicense = $plateLicense;
	}

	public function setStartDate($startDate)
	{
		 $this->startDate = $startDate;
	}

	public function setEndDate($endDate)
	{
		 $this->endDate = $endDate;
	}

	public function setPlace($place)
	{
		 $this->place = $place;
	}

	public function setDriverId($driverId)
	{
		 $this->driverId = $driverId;
	}

	public function setColor($color)
	{
		 $this->color = $color;
	}

	public function setCarId($carId)
	{
		 $this->carId = $carId;
	}

	public function getCurrentReservation()
	{
		$reserveInfo = null;
		$r = "";
		$query = $this->db->query('SELECT cr.* , color, c.plateLicense FROM cartype ct JOIN cars c ON c.carTypeId = ct.carTypeId JOIN currentreservation cr ON cr.carId = c.carId');
		foreach ($query->result() as $row)
		{
			$reserveInfo = new ReservationModel;
			$this->matchReservationObject($reserveInfo,$row);
			if($r === "") 
			{
				$r = array();
			}
			array_push($r,$reserveInfo);
		}
		
		return $r;
	
	}

	public function getReserveFromDate($startDateTime,$endDateTime,$carTypeId){
		$reserveInfo = null;
		$r = "";
		$query = $this->db->query('SELECT cr.* , c.carId , ct.carTypeId , ct.color , c.plateLicense FROM cartype ct JOIN cars c ON c.carTypeId = ct.carTypeId JOIN currentreservation cr ON cr.carId = c.carId WHERE (startDate BETWEEN '. $startDateTime .' AND '. $endDateTime .') OR (endDate BETWEEN '. $startDateTime .' AND '. $endDateTime .')');
		foreach ($query->result() as $row)
		{
			if($carTypeId == null || in_array($row->carTypeId,$carTypeId) )
			{
				$reserveInfo = new ReservationModel;
				$this->matchReservationObject($reserveInfo,$row);
				if($r === "") 
				{
					$r = array();
				}
				array_push($r,$reserveInfo);
			}
		}
		
		return $r;
	
	}

	public function getReserveFromCarType($carTypeId ,$carId){
		$reserveInfo = null;
		$r = "";
		$carIdCheck = $this->checkCarIdType($carId);
		$query = $this->db->query('SELECT cr.* , c.carId , ct.carTypeId , ct.color , c.plateLicense FROM cartype ct JOIN cars c ON c.carTypeId = ct.carTypeId JOIN currentreservation cr ON cr.carId = c.carId where c.cartypeId = '.$carTypeId);

		foreach ($query->result() as $row) {
			if($carId == null || in_array($row->carId,$carId) || !in_array($row->carTypeId, $carIdCheck) )
			{
				$reserveInfo = new ReservationModel;
				$this->matchReservationObject($reserveInfo,$row);
				if($r === "") 
				{
					$r = array();
				}
				array_push($r,$reserveInfo);
			}
		}
		
		return $r;

	}

	private function checkCarIdType($carId){
		$r = ['not','have'];
		if($carId != null){
			foreach ($carId as $value) {
			$query = $this->db->query('SELECT carTypeId FROM cars where carId = '.$value);
				foreach ($query->result() as $row){
					array_push($r,$row->carTypeId);
				}
			}
		}
		

		return $r;
			
		
	}

	public function addReservation($carId ,$startDate , $endDate, $code,$place){
		if($this->checkReservation($carId,$startDate , $endDate)){
			$data = array(		
				'carId' => $carId,
				'driverId' => 'driver',
				'employeeCode' => $code,	
				'StartDate' => $startDate,
				'EndDate' =>$endDate,			
				'place' => $place
				);

			$query = $this->db->select('driverId')
				->from('cars')
				->where('carId', $data["carId"])
				->get();

			foreach ($query->result() as $row)
			{			
				$input["driverId"] = $row->driverId;
			}		
			
			
			return $this->db->insert('currentreservation', $data);
			

		}else{
			return false;
		}


	}

	// function for check that Reservation is not duplicate
	private function checkReservation($carId , $startDate , $endDate){
			$query = $this->db->query('SELECT carId FROM currentreservation WHERE carId = '.$carId.' AND ((EndDate BETWEEN (\''. $startDate .'\') AND (\''. $endDate .'\')) OR (StartDate BETWEEN (\''. $startDate .'\') AND (\''. $endDate .'\')) OR (StartDate <= (\''. $endDate .'\') AND EndDate >= (\''. $startDate .'\')))');
			$row = $query->row();
			 if(!isset($row)){
			 	return true;
			 }else{
			 	return false;
			 }

			 //SELECT carId FROM currentreservation WHERE carId = 1 AND (EndDate BETWEEN 10-5-2017 AND 13-5-2017 AND StartDate BETWEEN 10-5-2017 AND 13-5-2017) OR (StartDate < 10-5-2017 AND EndDate > 13-5-2017) 
	}

	public function getCurReserveFormEmpCode($employeeCode){
		$currentReserve = null;
		$r = "";
		$query = $this->db->query('SELECT cr.* , c.carId , ct.carTypeId , ct.color , c.plateLicense FROM cartype ct JOIN cars c ON c.carTypeId = ct.carTypeId JOIN currentreservation cr ON cr.carId = c.carId where cr.EmployeeCode = '.$employeeCode);
		foreach ($query->result() as $row)
		{
				$currentReserve = new ReservationModel;
				$this->matchReservationObject($currentReserve,$row);
				if($r === "") 
				{
					$r = array();
				}
				array_push($r,$currentReserve);
		}
		
		return $r;

	}
	

	private function matchReservationObject($reserveInfo,$row)
	{
		$reserveInfo->setEmployeeCode($row->EmployeeCode);
		$reserveInfo->setPlateLicense($row->plateLicense);
		$reserveInfo->setStartDate($row->StartDate);	
		$reserveInfo->setEndDate($row->EndDate);
		$reserveInfo->setPlace($row->Place);
		$reserveInfo->setDriverId($row->DriverId);
		$reserveInfo->setColor($row->color);
		$reserveInfo->setCarId($row->carId);

	}

	


	

}

/* End of file CarModel.php */
/* Location: ./application/models/CarModel.php */
/*
$cars, $date, $driver, $timeS, $timeE, $plateLicense, $place
*/