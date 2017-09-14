<?php 
if (isset($this->session->userdata['logged_in'])) {
	$username = ($this->session->userdata['logged_in']['username']);
	$employeeCode = ($this->session->userdata['logged_in']['employeeCode']);
	$name = ($this->session->userdata['logged_in']['name']);
	$department = ($this->session->userdata['logged_in']['department']);
	$role = ($this->session->userdata['logged_in']['role']);
	if($role == "driver"){
		include "NavbarDriverLogged_in.php";
	}else if($role=="admin"){
		include "NavbarAdmin.php";
	}else{
		include "NavbarUserLogged_in.php";
	}			
}else{
	
	//redirect($base_url."HomeInfo");
}
?>