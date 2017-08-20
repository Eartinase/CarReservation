<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<?php 
		include "Header.php";
	?>

	
</head>
<body style="margin:2%">
	<?php 
	if (isset($this->session->userdata['logged_in'])) {
		$username = ($this->session->userdata['logged_in']['username']);
		$employeeCode = ($this->session->userdata['logged_in']['employeeCode']);
		$name = ($this->session->userdata['logged_in']['name']);
		$department = ($this->session->userdata['logged_in']['department']);
		$role = ($this->session->userdata['logged_in']['role']);
		include "NavbarUserLogged_in.php";
	}else{
		redirect('/HomeInfo','refresh');
	}	
	?>
	<div class="container" style="margin-top:50px">
		<center>
			<h3>เพิ่มคนขับ</h3>
		</center>
	<form action="addDriver/addDriver" method="post">
		ชื่อคนขับ: <input type="text" name="DriverName" class="form-control" required> <br>
		<center><button type="submit" class="btn btn-primary" >เพิ่มคนขับ</button></center>
	</form>
	</div>
	
</body>
</html>