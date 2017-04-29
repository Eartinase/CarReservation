<html>
<head>
	<meta charset="utf-8">
	<title></title>
	
	<?php 
		include "header.php";
	?>

	<script src='<?php echo base_url(); ?>fullcalendar/lib/moment.min.js'></script>
	<script src='<?php echo base_url(); ?>fullcalendar/fullcalendar.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>fullcalendar/gcal.js'></script>
	<link rel='stylesheet' href='<?php echo base_url(); ?>fullcalendar/fullcalendar.css' />
	

</head>
	<style type="text/css">
		iframe{
			frameborder : 0px ; 
			border :  0px ;
			cellspacing : 0px; 
			width: 100%;
			height: 100%;
		
		}
		li{
			list-style-type: none;
		}
		ul{
			list-style-type: none;
		}


	</style>



<body>
	<div style="height: 50px ; background-color:#514D50 ; margin:0; padding: 0; ">
		
	</div>
	<br>
	<div class="row">
		<div class="col-md-1">
		
		</div>
		<div class="col-md-7">
			<iframe id="calender" name="calender" src="../calendar"></iframe>
		</div>
		
		<div class="col-md-3" >

			<div id="information" >
				
				<form action="../search/searchCar" class="form-horizontal" target="calender"  method="POST" accept-charset="utf-8" style="align-items:center;">
			
					<b>ประเภทรถที่ต้องการ</b><br>
					<div>
						<ul>
						  <li><input name='carType[]' type='checkbox' value=1> เก๋ง </li>
						  	<?php 
						  		foreach ($Type1 as  $value) {
						  			echo "<ul> <li><input name='carId[]' type='checkbox' value=". $value->getCarId()."> " ;
						  			echo  $value->getPlateLicese()."</li></ul>";
						  		}
						  		
						  	 ?>
						</ul>
					</div>
					<div>
						<ul>
						  <li><input name='carType[]' type='checkbox' value=2> ปิ๊กอัพ <br> </li>
						  	<?php 
						  		foreach ($Type2 as  $value) {
						  			echo "<ul> <li><input name='carId[]' type='checkbox' value=". $value->getCarId()."> " ;
						  			echo  $value->getPlateLicese()."</li></ul>";
						  		}
						  		
						  	 ?>
						</ul>	
					</div>
					<div>
						<ul>
						  <li><input name='carType[]' type='checkbox' value=3> ตุ๊กตุ๊ก <br></li>
						  	<?php 
						  		foreach ($Type3 as  $value) {
						  			echo "<ul> <li><input name='carId[]' type='checkbox' value=". $value->getCarId()."> " ;
						  			echo  $value->getPlateLicese()."</li></ul>";
						  		}
						  		
						  	 ?>
						</ul>
						
					</div>					
					<div>
						<ul>
						  <li><input name='carType[]' type='checkbox' value=4> ซาเล้ง <br></li>
						  	<?php 
						  		foreach ($Type4 as  $value) {
						  			echo "<ul> <li><input name='carId[]' type='checkbox' value=". $value->getCarId()."> " ;
						  			echo  $value->getPlateLicese()."</li></ul>";
						  		}
						  		
						  	 ?>
						</ul>
					</div>	
					<div>
						<ul>
						  <li><input name='carType[]' type='checkbox' value=5> รถตู้ <br></li>
						  	<?php 
						  		foreach ($Type5 as  $value) {
						  			echo "<ul> <li><input name='carId[]' type='checkbox' value=". $value->getCarId()."> " ;
						  			echo  $value->getPlateLicese()."</li></ul>";
						  		}
						  		
						  	 ?>
						</ul>
						
						
					</div>	
						
						
			</div>	
					<br><br><br>

					<button id="searchbut" type="submit" data-target="#calender">ค้นหารถ</button>
				</form>
	

		<br><br>
			
				<button class="btn btn-primary" data-toggle="modal" data-target="#reserve">จองรถ</button>
			

		</div>
	</div>

	<br>

	<form action="add" method="post">
		<div class="modal fade" id="reserve" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">จองรถ</h4>
					</div>
					<div class="modal-body">
						<div id="information">

							<b>เลือกรถ: </b>
							<select name="cars"  id="cartype" onchange="changeDetect()" class="form-control">
								<option>เลือกประเภทรถ</option>
								<option value="1">เก๋ง</option>
								<option value="2">ปิ๊กอัพ</option>
								<option value="3">ตุ๊กตุ๊ก</option>
								<option value="4">ซาเล้ง</option>						
							</select>

							<br>

							<b>วันที่: </b><input type="date" name="date" id="day"  value="เลือกวันที่ปฏิทิน" class="form-control" >

							<input type="hidden" value="2" name="driver" id="driverr">
							<br><br>

							<div class="form-inline">
								<b>เวลา: </b> ตั้งแต่ <input type="time" class="form-control" name="timeS" placeholder="ชช:นน:วว"> 
								ถึง <input type="time" class="form-control" name="timeE" placeholder="ชช:นน:วว">
							</div>
							<br>
							<b>เลือกทะเบียนรถ:</b>
							<select name="plateLicense" id="plate" class="form-control" onchange="driver()">
								<option value='นม 66'>เลือกประเภทรถก่อน</option>
							</select>
							<br>
							<b>สถานที่:</b>
							<textarea class="form-control" name="place"></textarea>
							<br><br>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" >ยืนยันการจอง</button>

					</div>
				</div>
			</div>
		</div>
	</form>




<form class="form-inline">
	<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">ค้นหารถ</h4>
					</div>
					<div class="modal-body">
						<iframe id="listCars" name="listCars" src="#"></iframe>
				
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" >ค้นหารถ</button>

					</div>
				</div>
			</div>
		</div>
		





</body>


</html>