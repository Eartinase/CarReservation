<!DOCTYPE html>
<html>
<head>
	<title>ระบบบริหารจัดการรถยนต์</title>
	<meta charset="utf-8">
	<?php 
	include "Header.php";
	?>
	
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
	<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
	
	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')?>"></script>
	<link rel="icon" href="<?php echo base_url('assets/favicon.ico')?>" sizes="16x16">
	
</head>
<style type="text/css">
	body{
		font-family: 'Prompt', sans-serif;
	}
	.head{
		font-weight: bold;
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



</body>
</html>