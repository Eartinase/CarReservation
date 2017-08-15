<?php
defined('BASEPATH') || exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function login($data)
	{
		$query = $this->db->get('user');
		$result = false;
		foreach ($query->result() as $row)
		{
			if($row->Username == $data["username"] && $row->Password== $data["password"] ){				
				$result = true;
				break;				
			}
		}
		return $result;
	}

}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */