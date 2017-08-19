<!DOCTYPE html>
<html>
<head>
	<?php 
	include "Header.php";
	?>
	<script src='<?php echo base_url(); ?>fullcalendar/lib/moment.min.js'></script>
	<script src='<?php echo base_url(); ?>fullcalendar/fullcalendar.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>fullcalendar/gcal.js'></script>
	<link rel='stylesheet' href='<?php echo base_url(); ?>fullcalendar/fullcalendar.css' />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='<?php echo base_url(); ?>application/views/css/hr.css' />
</head>
<body>
	<?php 
			if (isset($this->session->userdata['logged_in'])) {
				$username = ($this->session->userdata['logged_in']['username']);
				$employeeCode = ($this->session->userdata['logged_in']['employeeCode']);
				$name = ($this->session->userdata['logged_in']['name']);
				$department = ($this->session->userdata['logged_in']['department']);
				$role = ($this->session->userdata['logged_in']['role']);
				include "NavbarUserLogged_in.php";
			}else{
				include "NavbarHome.php";
			}	

		?>
	<div class="col-md-7 col-sm-offset-2">
			
	<center>
		<h3>คำร้องขอจ้างเหมารถจากภายนอก</h3>
	</center>
		<form class="form-horizontal"  action="#" method="get" accept-charset="utf-8">
		
				<div class="form-group">
					<label for="cartype" class="col-md-2 control-label">ประเภทรถ </label>
					<div class="col-md-10">
						<select name="cars" required id="cartype" onchange="changeType()" class="form-control">
							<option value="">เลือกประเภทรถ</option>
							<option value="1">เก๋ง</option>
							<option value="2">กระบะ</option>
							<option value="3">ตู้</option>
							<option value="4">ไมโครบัส</option>						
						</select>
					</div>	
				</div>
				<div class="form-group">
					<label for="dateS" class="col-md-2 control-label">วันที่เดินทาง </label>
						<div class="col-md-4">
							<input type="date"  required name="dateS" id="dateS"  value="เลือกวันที่ปฏิทิน" class="form-control" >
						</div>	
					<label for="timeS"  class="col-md-2 control-label">เวลาออกรถ </label>
						<div class="col-md-4">
							<input type="time" required class="form-control" id="timeS" name="timeS" placeholder="ชช:นน:วว"> 
						</div>	
				</div>	

				<div class="form-group">
					<label for="dateE" class="col-md-2 control-label">วันที่กลับ </label>
						<div class="col-md-4">
							<input type="date" required name="dateE" id="dateE"  value="เลือกวันที่ปฏิทิน" class="form-control" >
						</div>	
					<label for="timeS" class="col-md-2 control-label">เวลาถึง </label>
						<div class="col-md-4">
							<input type="time" required class="form-control" id="timeS" name="timeE"> 
				</div>	
				</div>	
				<div class="form-group">			
					<label for="dateE" class="col-md-2 control-label">สถานที่ </label>
					<div class="col-md-10">
						<input class="form-control" name="place" required >
					</div>	
				</div>	
				<button type="submit"  class="btn btn-primary" >ยืนยัน</button>	
		</form>
		</div>
</body>

	<script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer>
	 	
	 	$( document ).ready(function() {

			$('#dateS').datepicker({ 
				minDate: 0
			});	
		});

	</script>
</html>

