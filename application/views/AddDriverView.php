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
	include "NavbarChooser.php";
	?>
	<div class="container" style="margin-top:50px">
		<center>
			<h3>เพิ่มคนขับ</h3>
		</center>
		<form action="addDriver/addDriver" method="post">
			รหัสพนักงาน: <input type="text" name="EmployeeCode" class="form-control" required> <br>
			ชื่อคนขับ: <input type="text" name="Name" class="form-control" required> <br>
			
			<div class="row">
				<div class="col-md-6">
					ชื่อผู้ใช้: <input type="text" name="Username" class="form-control" required> <br>
				</div>
				<div class="col-md-6">
					รหัสผ่าน: <input type="text" name="Password" class="form-control" required> <br>
				</div>
			</div>		
			
			<div class="row">
				<div class="col-md-6">
					เบอร์ติดต่อ: <input type="text" name="Tel" class="form-control" required> <br>
				</div>
				<div class="col-md-6">
					อีเมล์: <input type="text" name="Email" class="form-control" required> <br>
				</div>
			</div>
			
			เลขใบขับขี่: <input type="text" name="DriverLicense" class="form-control" required> <br>
			<center><button type="submit" class="btn btn-primary" >เพิ่มคนขับ</button></center>
		</form>
	</div>
	
</body>
</html>