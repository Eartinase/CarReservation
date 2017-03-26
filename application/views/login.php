<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<script src='fullcalendar/lib/jquery.min.js'></script>
	<link rel="stylesheet" type="text/css" href="fullcalendar/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="fullcalendar/bootstrap/css/bootstrap-theme.css">
	<script src='fullcalendar/bootstrap/js/bootstrap.js'></script>

</head>
<body style="margin:2%;">
	<center><h1>เข้าสู่ระบบ</h1></center>
	<form action="Login/Authen" method="post">
		<input type="text" placeholder="username" name="usr" class="form-control"> <br>
		<input type="password" placegolder="password" name="psw" class="form-control">
		<br>
		<center><input class="btn btn-primary" type="submit" value="เข้าสู่ระบบ"></center>
	</form>
</body>
</html>