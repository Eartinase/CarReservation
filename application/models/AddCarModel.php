<?php
defined('BASEPATH') || exit('No direct script access allowed');

class AddCarModel extends CI_Model {

	public function CarTypeDriver(){
		$this->db->select('*');
		$query = $this->db->get('cartype');

		$rslt["cartype"] = " ";

		foreach ($query->result() as $row) {
			$rslt["cartype"] .= "<option value='".$row->CarTypeId."'>".$row->CarType."</option> \n";
		}

		$this->db->select('*');
		$query = $this->db->get('drivers');

		$rslt["driver"] = " ";
		foreach ($query->result() as $row) {
			$rslt["driver"] .= "<option value='".$row->DriverId."'>".$row->DriverName."</option> \n";
		}

		return $rslt;
	}

	public function add($input){		
		return $this->db->insert('cars', $input);
	}


}

/* End of file AddCarModel.php */
/* Location: ./application/models/AddCarModel.php */