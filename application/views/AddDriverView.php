<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>	
	<?php 
		include "header.php";
	?>

	
</head>
<body style="margin:2%">
	<form action="addDriver/addDriver" method="post">
		ชื่อคนขับ: <input type="text" name="DriverName" class="form-control" required> <br>
		<center><button type="submit" class="btn btn-primary" >เพิ่มคนขับ</button></center>
	</form>
	
</body>
</html>