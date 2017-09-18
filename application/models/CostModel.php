<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CostModel extends CI_Model {
	public function getCostPerHour($cartypeid){
		$sql = 'select CostPerHour from cost where CarTypeId = \''.$cartypeid.'\'';
		$result = $this->db->query($sql);
		foreach($result->result() as $row){
			$cost = $row->CostPerHour;
		}
		return $cost;
	}

	public function getDuration($reserveId){
		$sql = 'SELECt (`EndDate`-`StartDate`)/10000 as time from currentreservation where CurrentId = '.$reserveId;

		$result = $this->db->query($sql);

		foreach($result->result() as $row){
			$duration = $row->time;
		}
		return $duration;

	}
	

}

/* End of file CostModel.php */
/* Location: ./application/models/CostModel.php */