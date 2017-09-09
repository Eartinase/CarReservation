<?php
defined('BASEPATH') || exit('No direct script access allowed');

class ReservationModel extends CI_Model {
	private $hireId;
	private $plateLicense;
	private $startDate;
	private $endDate;
	private $place;
	private $tel;
	private $departmentID;
	private $reason;

		public function __construct(){
		parent::__construct();
		
	}

	public function getDepartmentID()
	{
		return $this->departmentID;
	}

	public function getHireId(){
		return $this->hireId;
	}

	public function getEmployeeCode(){
		return $this->employeeCode;
	}

	public function getPlateLicese(){
		return $this->plateLicense;
	}

	public function getStartDate(){
		return $this->startDate;
	}

	public function getEndDate(){
		return $this->endDate;
	}

	public function getPlace(){
		return $this->place;
	}

	public function getTel(){
		return $this->tel;
	}

	public function getReason(){
		return $this->reason;
	}

	public function setEmployeeCode($employeeCode){
		$this->employeeCode = $employeeCode;
	}

	public function setPlateLicense($plateLicense){
		$this->plateLicense = $plateLicense;
	}

	public function setStartDate($startDate){
		 $this->startDate = $startDate;
	}

	public function setEndDate($endDate){
		 $this->endDate = $endDate;
	}

	public function setPlace($place){
		 $this->place = $place;
	}

	public function setHireId($hireId){
		 $this->hireId = $hireId;
	}

	public function setTel($tel){
		 $this->tel = $tel;
	}

	public function setDepartmentID($departmentID)
	{
		$this->departmentID = $departmentID;
	}

	public function setReason($reason){
		$this->reason = $reason;
	}

	public function add_OutsideCar($data){
		extract($data);
    	$this->db->insert('hirecar',
    		array(	
    			'depID' =>$depID ,
    			'CarTypeId' => $carTypeId,
				'StartDate' =>$dateS,
				'EndDate' => $dateE,
				'place' => $place,
				'Tel' => $tel,
				'reason' => $reason
    		));
		return true;
	}




}