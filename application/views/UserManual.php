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
		<a href="#page1" class="snav">การจองรถ</a> 
		<br><br>
		<a href="#page2" class="snav">ขอใช้รถภายนอก</a>
		<br><br>
		<a href="#page3" class="snav">ประวัติการจอง</a>
		<br><br>
		<a href="#page4" class="snav">ประวัติการใช้งาน</a>		
		
	</div>
	<div class="container">
		<div id="page1">
			<h1 align="center">คู่มือการใช้งาน</h1>
			<h2 align="center">จองรถ</h2>
			
			<div class="imgcon">
				<img class="manualimg" src="<?php echo base_url('application/views/img/admin1.JPG')?>">
			</div>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ปฏิทินแสดงการจองรถอยู่ในปัจจุบัน ผู้ใช้สามารถดูตารางการใช้งานได้จากปฏิทิน และสามารถดูตารางเวลาของรถที่ต้องการได้จากแถบค้นหารถทางด้านซ้าย</p>
		</div>
		<br><br>

		<div id="page2">			
			<h2 align="center">ขอใช้รถภายนอก</h2>
			
			<div class="imgcon">
				<img class="manualimg" src="<?php echo base_url('application/views/img/admin2.JPG')?>">
			</div>
			<p>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				หากประเภทรถที่คุณต้องการไม่ว่าง คุณสามารถใช้บริการรถภายนอกได้จากเมนูนี้ ประวัติการเขียนใบคำร้องของคุณจะอยู่ที่ตารางด้านซ้าย เลือกเพื่อออกรายงานเบิกงบประมาณสำหรับการใช้งานรถในครั้งนั้นๆ
			</p>
		</div>

		<br><br>

		<div id="page3">			
			<h2 align="center">ประวัติการจอง</h2>
			
			<div class="imgcon">
				<img class="manualimg" src="<?php echo base_url('application/views/img/admin3.JPG')?>">
			</div>
			<p>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				คุณสามารถดูประวัติการจองทั้งหมดได้จากหน้านี้ กด edit เพื่อแก้ไข และ delete เพื่อลบการจองทิ้ง เมื่อคนขับได้บันทึกข้อมูลการใช้งานรถแล้ว ข้อมูลการจองนั้นจะหายไป และคุณจะแก้ข้อมูลไม่ได้อีก
			</p>
		</div>

		<br><br>

		<div id="page4">			
			<h2 align="center">ประวัติการใช้งาน</h2>
			
			<div class="imgcon">
				<img class="manualimg" src="<?php echo base_url('application/views/img/admin4.JPG')?>">
			</div>
			<p>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				แสดงการใช้งานรถของคุณ
			</p>
		</div>

		<br><br>
	</div>
</body>
</html>