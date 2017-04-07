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

	
	<script type='text/javascript'>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			eventLimit: true, 
			editable: true,
			navLinks: true,

			events: [

			<?php
			
			$info = "";

				foreach ($result as $q) :
					$info .= "{title: '".$q["plateLicense"].
					"',\nstart: '".$q["StartDate"].
					"',\nend: '".$q["EndDate"].	
					"',\ncolor: '".$q["color"].
					"'},\n";
				endforeach; 
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
				right : 'today month,basicWeek,basicDay prev,next listWeek'
			},

		});
	});
	</script>




</head>

<body style="margin:2%">
	<div class="row">
		<div class="col-md-6">
			<div id='calendar'></div>
		</div>
		<div class="col-md-6" >

			<center><h1>รายการรถ</h1></center>

			<?php
			echo $carList;
			//echo var_dump($carList);
			?>

			<br><br>
			<center>
				<button class="btn btn-primary" data-toggle="modal" data-target="#reserve">จองรถ</button>
				<button class="btn btn-primary" data-toggle="modal" data-target="#search">ค้นหารถ</button>
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
						<div id="information">
							<b>วันที่ต้องการเดินทาง</b><br>
							ตั้งแต่: <input type="date" class="form-control"> ถึงวันที่: <input type="date" class="form-control">
<br><br>
							<b>เลือกช่วงเวลาเดินทาง</b><br>
							ตั้งแต่: <input type="time" class="form-control"> ถึง <input type="time" class="form-control">
							<br><br>

							<b>ประเภทรถที่ต้องการ</b><br>
							<input type="checkbox"> เก๋ง <br>
							<input type="checkbox"> กระบะ <br>
							<input type="checkbox"> ตุ๊กตุ๊ก <br>
							<input type="checkbox"> รถบัส <br>
							<br><br>

							<b>เส้นทาง</b><br>
							<input type="radio"> กรุงเทพและปริมณฑล <br>
							<input type="radio"> ต่างจังหวัด<br>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" >ค้นหารถ</button>

					</div>
				</div>
			</div>
		</div>
		</form>



</body>


</html>