<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<?php 
	include "Header.php";
	?>
	
</head>
<body>

	<?php 
	if (isset($this->session->userdata['logged_in'])) {
		$username = ($this->session->userdata['logged_in']['username']);
		$employeeCode = ($this->session->userdata['logged_in']['employeeCode']);
		$name = ($this->session->userdata['logged_in']['name']);
		$department = ($this->session->userdata['logged_in']['department']);
		$role = ($this->session->userdata['logged_in']['role']);
		include "NavbarUserLogged_in.php";
	}	
	?>
	<div  class="container" style="margin: 100px;">	
		<center>
			<h3>เพิ่มรถ</h3>
		</center>
		<form action="<?php echo base_url(); ?>AddCar/Add" method="post">
			ทะเบียน: <input type="text" name="plateLicense" class="form-control" required> <br>
			ทะเบียนตัวถัง: <input type="text" name="serial" class="form-control" required> <br>
			ประเภทรถ: <select name ="carType" class="form-control" required>
			<?php 
			echo $cartype ;
					//echo var_dump($rslt);
			?>
		</select><br>
		จำนวนที่นั่ง: <input type="number" class="form-control" name="seat" required> <br>
		คนขับ: <select name = "driver" class="form-control">
		<option> -- </option>
		<?php 
		echo $driver ;
					//echo var_dump($driver);
		?>
	</select>
	<br>
	<!--center><input type="file" name="pic" accept="image/*" ></center><br-->
	<center><button type="submit" class="btn btn-primary" >เพิ่มรถ</button></center>
</form>
</div>
</body>
</html>