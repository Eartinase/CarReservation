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
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<style type="text/css">
	iframe{
		frameborder : 0px ; 
		border :  0px ;
		cellspacing : 0px; 
		width: 100%;
		height: 100%;
		
	}

	input checkbox

	li{
			list-style-type: none;

	}

	ul{
			list-style-type: none;

	}

	.checkbox {
	    padding-left: 20px; }
	.checkbox label {
	    display: inline-block;
	    position: relative;
	    padding-left: 5px; }
	.checkbox label::before {
	    content: "";
	    display: inline-block;
	    position: absolute;
	    width: 15px;
	    height: 15px;
	    left: 0;
	    margin-left: -20px;
	    border: 1px solid #cccccc;
	    border-radius: 3px;
	    background-color: #fff;
	    -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
	    -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
	    transition: border 0.15s ease-in-out, color 0.15s ease-in-out; }
	.checkbox label::after {
	    display: inline-block;
	    position: absolute;
	    width: 14px;
	    height: 14px;
	    left: 0;
	    top: 0;
	    margin-left: -20px;
	    padding-left: 3px;
	    padding-top: 1px;
	    font-size: 11px;
	    color: #555555; }
	.checkbox input[type="checkbox"] {
	    opacity: 0; }
	.checkbox input[type="checkbox"]:focus + label::before {
	    outline: thin dotted;
	    outline: 5px auto -webkit-focus-ring-color;
	    outline-offset: -2px; }
	.checkbox input[type="checkbox"]:checked + label::after {
	    font-family: 'FontAwesome';
	    content: "\f00c"; }
	.checkbox input[type="checkbox"]:disabled + label {
	    opacity: 0.65; }
	.checkbox input[type="checkbox"]:disabled + label::before {
	    background-color: #eeeeee;
	    cursor: not-allowed; }
	.checkbox.checkbox-circle label::before {
	    border-radius: 50%; }
	.checkbox.checkbox-inline {
	    margin-top: 0; }


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
			
					<h4>รายการรถ</h4><br>
					<div id="divCarList1" >
						<ul>
						 
						  	<li>
						  		<div class="checkbox">
						  			<input  id="listCar1" name='carType[]' type='checkbox' value=1>
						  			<label for="listCar1"> เก๋ง </label>
						  		</div> 

						  	</li>
						 
						  	<?php 
						  		foreach ($Type1 as  $value) {
						  			echo "<ul><li><div class='checkbox'>";
						  			echo "<input name='carId[]' id='listC". $value->getCarId()."' type='checkbox' value=". $value->getCarId()."> " ;
						  			echo  "<label for='listC". $value->getCarId()."'>".$value->getPlateLicese()."</label></div></li></ul>";
						  		}
						  		
						  	 ?>
						</ul>
					</div>
					<div id="divCarList2">
						<ul>
						  <li>
						  	<div class="checkbox">
						  			<input id="listCar2" name='carType[]' type='checkbox' value=2>
						  			<label for="listCar2"> ปิ๊กอัพ  </label>
						  	</div> 
						  </li>
						  	<?php 
						  		foreach ($Type2 as  $value) {
						  			echo "<ul><li><div class='checkbox'>";
						  			echo "<input name='carId[]' id='listC". $value->getCarId()."' type='checkbox' value=". $value->getCarId()."> " ;
						  			echo  "<label for='listC". $value->getCarId()."'>".$value->getPlateLicese()."</label></div></li></ul>";
						  		}
						  		
						  	 ?>
						</ul>	
					</div>
					<div id="divCarList3">
						<ul>
						  <li>
						  	<div class="checkbox">
						  			<input id="listCar3"  name='carType[]' type='checkbox' value=3>
						  			<label for="listCar3"> ตุ๊กตุ๊ก </label>
						  	</div> 
						
						  </li>
						  	<?php 
						  		foreach ($Type3 as  $value) {
						  			echo "<ul><li><div class='checkbox'>";
						  			echo "<input name='carId[]' id='listC". $value->getCarId()."' type='checkbox' value=". $value->getCarId()."> " ;
						  			echo  "<label for='listC". $value->getCarId()."'>".$value->getPlateLicese()."</label></div></li></ul>";
						  		}
						  		
						  	 ?>
						</ul>
						
					</div>					
					<div id="divCarList4">
						<ul>
						  <li>
							  <div class="checkbox">
							  		<input id="listCar4" name='carType[]' type='checkbox' value=4> 
							  		<label for="listCar4"> ซาเล้ง </label>
							  </div> 
						  
						  </li>
						  	<?php 
						  		foreach ($Type4 as  $value) {
						  			echo "<ul><li><div class='checkbox'>";
						  			echo "<input name='carId[]' id='listC". $value->getCarId()."' type='checkbox' value=". $value->getCarId()."> " ;
						  			echo  "<label for='listC". $value->getCarId()."'>".$value->getPlateLicese()."</label></div></li></ul>";
						  		}
						  		
						  	 ?>
						</ul>
					</div>	
					<div id="divCarList5">
						<ul>
						  <li>
						    <div class="checkbox">
							  	<input id="listCar5" name='carType[]' type='checkbox' value=5>
							  	<label for="listCar5"> รถตู้ </label>
							 </div> 
						    
						  </li>
						  	<?php 
						  			echo "<ul><li><div class='checkbox'>";
						  			echo "<input name='carId[]' id='listC". $value->getCarId()."' type='checkbox' value=". $value->getCarId()."> " ;
						  			echo  "<label for='listC". $value->getCarId()."'>".$value->getPlateLicese()."</label></div></li></ul>";
						  		
						  	 ?>
						</ul>
						
						
					</div>	
						
						
			</div>	
					<br>

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