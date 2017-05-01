<?php
defined('BASEPATH') || exit('No direct script access allowed');

class CarModel extends CI_Model {

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

	public function showReserve(){
		$query = $this->db->select('cr.*, color, c.plateLicense')      
		->from('cartype as ct')					     
		->join('cars as c', 'c.carTypeId = ct.carTypeId')      
		->join('currentreservation as cr', 'cr.carId = c.carId')      
		->get();

		return $query->result_array();
		 
	}

	public function showCar(){
		$result = "";

		$this->db->select('*');
		$car = $this->db->get('cartype');

		foreach ($car->result() as $row)
		{
			$result .= $row->CarType."<br>";
			
			
			$resultPlate = $this->db->select('plateLicense')
			->from('cars')
			->join('cartype', 'cars.carTypeId = cartype.cartypeid')
			->where('cartype', $row->CarType)
			->get();

			foreach($resultPlate->result() as $plate){

				$result .= "&emsp;".$plate->plateLicense."<br>";

			}
			$result .= "<br>";
		}		
		return $result;		
	}	
}

/* End of file CarModel.php */
/* Location: ./application/models/CarModel.php */
/*
$cars, $date, $driver, $timeS, $timeE, $plateLicense, $place
*/