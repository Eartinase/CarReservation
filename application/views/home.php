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
		#listCars{
			frameborder : 0 ; 
			border :  0 ;
			cellspacing : 0; 
			width: 100%;
			height: 400px;
		}

		#searchbut{
			margin:0px;
			padding: 0px;
			border: 0px;
			height: 40px;
			width: 100%;
			background-color: #514D50;
		}

	</style>


	<script type='text/javascript'>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				eventLimit: true, 
				editable: true,
				navLinks: true,

				events: [

				<?php
				
					$info = "";

						foreach ($Reservation as $value)
						{
							$info .= "{title: '".$value->getPlateLicese().
							"',\nstart: '".$value->getStartDate().
							"',\nend: '".$value->getEndDate().	
							"',\ncolor: '".$value->getColor().
							"'},\n";
						}; 
					echo substr($info, 0, -2);
				?>
				],


				dayClick: function(date, jsEvent, view) {
					//alert('Clicked on: ' + date.format());
					//document.getElementById('day').value = date.format();
					var selectedDay = date.format();
					document.getElementById('day').value = selectedDay;
				},
				header: {
					left: 'title',
					center: '',
					right : 'today month,agendaWeek,agendaDay prev,next listWeek'
				},

			});

			
		});


		

	</script>






<body>
	<div style="height: 50px ; background-color:#514D50 ; margin:0; padding: 0; ">
		
	</div>
	<br>
	<div class="row">
		<div class="col-md-1">
		
		</div>
		<div class="col-md-7">
			<div id='calendar'></div>
		</div>
		
		<div class="col-md-3" >
			
			<div id="information" style="background-color:#FFD4D9;">
				
				<form action="../search/searchCar" class="form-horizontal" target="listCars"  method="POST" accept-charset="utf-8" style="align-items:center;">
				<br>
				<b>วันที่ต้องการเดินทาง</b><br><br>
					<div class="form-group">
						<div class="col-sm-3 col-sm-offset-1">วันที่ไป :</div>
						<div class="col-sm-7">
							<input type="date" name="startDate" id="startDate" class="form-control input-sm">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 col-sm-offset-1">เวลาไป :</div>
						<div class="col-sm-7">
							<input type="time" name="startTime" class="form-control input-sm" step="300">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-3 col-sm-offset-1">วันที่กลับ :</div>
						<div class="col-sm-7">
							<input type="date" name="endDate" id="endDate"  class="form-control input-sm">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 col-sm-offset-1">เวลากลับ :</div>
						<div class="col-sm-7">
							<input type="time"  name="endTime" class="form-control input-sm" value="00:00:PM">
						</div>
					</div>
					<div class="col-sm-10 col-sm-offset-1">
						
					
					<b>ประเภทรถที่ต้องการ</b><br>
						<input name='carType[]' type='checkbox' value=1> เก๋ง
						<input name='carType[]' type='checkbox' value=2> ปิ๊กอัพ
						<input name='carType[]' type='checkbox' value=3> ตุ๊กตุ๊ก 
						<input name='carType[]' type='checkbox' value=4> ซาเล้ง
						<input name='carType[]' type='checkbox' value=5> รถตู้
					</div>	
					<br><br><br>

					<button id="searchbut" type="submit" data-toggle="modal" data-target="#search">ค้นหารถ</button>
				</form>
			</div>
		

		    <!-- -------- list รายการรถ-------- -->

			<center><h1>รายการรถ</h1></center>
			

			<br><br>
			<center>
				<button class="btn btn-primary" data-toggle="modal" data-target="#reserve">จองรถ</button>
				
			</center>

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