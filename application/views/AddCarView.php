<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>

	<script src='../fullcalendar/lib/jquery.min.js'></script>
	<link rel="stylesheet" type="text/css" href="../fullcalendar/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../fullcalendar/bootstrap/css/bootstrap-theme.css">
	<script src='../fullcalendar/bootstrap/js/bootstrap.js'></script>

	
</head>
<body style="margin:2%">
	<form action="Add" method="post">
		ทะเบียน: <input type="text" name="plateLicense" class="form-control" required> <br>
		ประเภทรถ: <select name ="carType" class="form-control" required>
					<?php 
					echo $cartype ;
					//echo var_dump($rslt);
					?>
				</select><br>
		จำนวนที่นั่ง: <input type="number" class="form-control" name="seat" required> <br>
		คนขับ: <select name = "driver" class="form-control" required>
					<?php 
					echo $driver ;
					//echo var_dump($driver);
					?>
				</select>
		<br>
		<center><input type="file" name="pic" accept="image/*" ></center><br>
		<center><button type="submit" class="btn btn-primary" >เพิ่มรถ</button></center>
	</form>
	
</body>
</html>