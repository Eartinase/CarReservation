<!DOCTYPE html>
<html>
<head>
	<title>ระบบบริหารจัดการรถยนต์</title>
	<meta charset="utf-8">
	<?php 
	include "Header.php";
	?>
	<link rel="icon" href="<?php echo base_url('assets/favicon.ico')?>" sizes="16x16">
	
</head>
<style type="text/css">
body{
	font-family: 'Prompt', sans-serif;
}
.head{
	font-weight: bold;
}	
p{
	font-size: 13pt;
}
.manualimg{
	width: 90%;
	height: : auto;
}
.imgcon{
	text-align: center;
}
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 30%;
  left: 0;
  /*
  background-color: #111;
  */

  overflow-x: hidden;
  padding-top: 20px;
}
.snav{
	background-color: lightblue; 
}

</style>
<body >
	
	<?php 
	include "NavbarChooser.php";
	?>	
	<div class="sidenav">
		<a href="#page1" class="snav">การออกรถ</a>
		<br><br>

		<a href="#page2" class="snav">การตรวจสอบข้อมูล<br>ย้อนหลัง</a>
	</div>
	<div class="container">
		<div id="page1">
			<h1 align="center">คู่มือการใช้งาน</h1>
			<h2 align="center">การออกรถ</h2>
			<p>ในหน้าหลัก คุณสามารถดูรายละเอียดรถของคุณได้จากปฏิทิน</p>
			<div class="imgcon">
				<img class="manualimg" src="<?php echo base_url('application/views/img/driver1.JPG')?>">
			</div>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายการรถด้านซ้าย คือรายการรถที่คุณจะต้องขับ กดปุ่ม "ยืนยันเวลากลับ" ก่อนออกรถเพื่อใส่รายละเอียดเพิ่มเติม เมื่อคุณกดออกรถแล้ว คุณสามารถเพิ่มข้อมูลเพื่อบันทึกอุบัติเหตุ หรือรายละเอียดเพิ่มเติมระหว่างการขับได้ คุณไม่สามารถกลับมาแก้ข้อมูลได้อีก กรุณาตรวจสอบก่อนกดยืนยัน</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ปฏิทิน แสดงรายการรถทั้งหมดที่คุณต้องขับ คุณสามารถคลิกเพื่อเข้าไปดูข้อมูลการจองเพิ่มเติมได้ดังภาพล่าง</p>
			<div class="imgcon">
				<img class="manualimg" src="<?php echo base_url('application/views/img/driver2.JPG')?>">
			</div>
		</div>

<br><br>
		<div id="page2">
			<h2 align="center">ตรวจสอบข้อมูลย้อนหลัง</h2>
			<div class="imgcon">
				<img class="manualimg" src="<?php echo base_url('application/views/img/driver3.JPG')?>">
			</div>
			<p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เมนูประวัติการออกรถ แสดงข้อมูลการใช้งานรถย้อนหลังของคุณ คุณไม่สามารถแก้ไขข้อมูลอะไรในหน้านี้ได้ หากต้องการแก้ไข กรุณาติดต่อเจ้าหน้าที่
			</p>
		</div>
		<br><br>
	</div>
</body>
</html>