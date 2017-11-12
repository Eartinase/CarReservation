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
	position: fixed;	
	top:10%;
	margin-left: 0px;
	width: 170px;
}
.but{
	background-color: #fcd522;
	border-radius: 0px;
	color:black;
	margin-bottom: 15px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
}

</style>
<body >
	<?php 
	include "NavbarChooser.php";
	?>	
	<div class="sidenav">
		<a href="#page1" class="snav"><button class="but btn">จองรถ</button></a>
		<a href="#page2" class="snav"><button class="but btn">ขอใช้รถภายนอก</button></a>
		<a href="#page3" class="snav"><button class="but btn">ประวัติการจอง</button></a>
		<a href="#page4" class="snav"><button class="but btn">ประวัติการใช้งาน</button></a>		
		
	</div>
	<div class="container" id ="boxCal">
		<div id="page1">
			<h1 align="center">คู่มือการใช้งาน</h1><hr>
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