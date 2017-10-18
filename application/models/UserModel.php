<?php
defined('BASEPATH') || exit('No direct script access allowed');

class UserModel extends CI_Model {
	private $employeeCode;
	private $username;
	private $name;
	private $departmentID;
	private $role;

	public function getEmployeeCode(){
		return $this->employeeCode;
	}

	public function getUsername(){
		return $this->username;
	}

	public function getName(){
		return $this->name;
	}

	public function getNamee($id){
		$this->db->select('Name');
		$this->db->where('EmployeeCode', $id);
		$query = $this->db->get('user');
		$name = "";
		foreach ($query->result() as $row){
			$name = $row->Name;
		}
		return $name;
	}
	
	public function getTel($id){
		$this->db->select('Tel');
		$this->db->where('EmployeeCode', $id);
		$query = $this->db->get('user');
		$Tel = "";
		foreach ($query->result() as $row){
			$Tel = $row->Tel;
		}
		return $Tel;
	}

	public function getDepartmentID(){
		return $this->departmentID;
	}

	public function getRole(){
		return $this->role;
	}

	public function setEmployeeCode($employeeCode){
		$this->employeeCode = $employeeCode;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setSurname($surname){
		$this->surname = $surname;
	}

	public function setDepartmentID($departmentID){
		$this->departmentID = $departmentID;
	}

	public function setRole($role){
		$this->role = $role;
	}

	public function checkLogin($data){
		$query = $this->db->get('user');
		$result = false;
		foreach ($query->result() as $row){
			if($row->Username == $data["username"] && $row->Password== $data["password"] ){				
				$result = true;
				break;				
			}
		}
		return $result;
	}

	public function login($data){
		$condition = "Username =" . "'" . $data['username'] . "' AND " . "Password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}		
	}

	public function getUserInfo($username){
		$userInfo = null;
		$query = $this->db->query('SELECT * FROM user where Username = "'.$username.'"');
		foreach ($query->result() as $row){
			$userInfo = new UserModel;
			$this->matchUserObject($userInfo,$row);
		}
		return $userInfo;
	}

	private function matchUserObject($userInfo,$row){
		$userInfo->setEmployeeCode($row->EmployeeCode);
		$userInfo->setUsername($row->Username);
		$userInfo->setName($row->Name);			
		$userInfo->setDepartmentID($row->depID);
		$userInfo->setRole($row->Role);
	}

	public function getDepartmentName($depid){		
		$query = $this->db->query("SELECT department from Department d join user u where d.depID = u.depID and d.depID = ".$depid);
		foreach($query->result() as $row){
			$depName = $row->department;
		}
		return $depName;
	}


	public function getDriverInfo(){
		$query = $this->db->get_where('user', array('role' => 'driver'));
		return $query->result_array();
	}

	public function getDriver(){
		$query = $this->db->get_where('user', array('role' => 'driver'));

		$option = "";
		
		foreach($query->result() as $row){
			$option .= "<option value=".$row->EmployeeCode.">".$row->Name."</option>/n";
		}

		return $option;
	}

	public function getDriverForSelection($carId){
		$sql = "SELECT DriverId FROM cars WHERE carId = ".$carId;
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) {
			$driverId = $row->DriverId;
		}
		$query = $this->db->get_where('user', array('role' => 'driver'));

		$option = "";		
		foreach($query->result() as $row){
			if($driverId == $row->EmployeeCode){
				$option .= "<option selected value=".$row->EmployeeCode.">".$row->Name."</option>";
			}else{
				$option .= "<option value=".$row->EmployeeCode.">".$row->Name."</option>/n ";
			}
		}
		return $option;
	}
	
	public function getDepartment(){
		$query = $this->db->get('Department');

		$depOption = "";

		foreach ($query->result() as $row) {
			$depOption .= "<option value=".$row->depID.">".$row->department."</option>/n";
		}

		return $depOption;

	}
}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */