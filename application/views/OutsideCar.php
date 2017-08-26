<!DOCTYPE html>
<html>
<head>
	<?php 
	include "Header.php";
	?>
	<script src='<?php echo base_url(); ?>fullcalendar/lib/moment.min.js'></script>
	<script src='<?php echo base_url(); ?>fullcalendar/fullcalendar.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>fullcalendar/gcal.js'></script>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='<?php echo base_url(); ?>application/views/css/hr.css' />
	
	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')?>"></script>
</head>
<body style="margin-left:2%; margin-right:2%">
	<?php 
	include "NavbarChooser.php";
	?>		

	<center>
		<h3>คำร้องขอจ้างเหมารถจากภายนอก</h3>
	</center>
	<form class="form-horizontal"  action="#" method="get" accept-charset="utf-8">

		<div class="form-group">
			<label for="cartype" class="col-md-3 control-label">ประเภทรถ </label>
			<div class="col-md-7">
				<select name="cars" required id="cartype" onchange="changeType()" class="form-control">
					<option value="">เลือกประเภทรถ</option>
					<option value="5">แท็กซี่</option>
					<option value="6">รถตู้</option>					
				</select>
			</div>	
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">วันที่เดินทาง</label>
			<div class="col-md-7">
				<input id="dateS2" name="dateS"  class="form-control datetimepicker" type="text" autocomplete="off" required>				
				<span class="help-block"></span>
			</div>	                    
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" >วันที่กลับ</label>
			<div class="col-md-7">
				<input id="dateE2" name="dateE" class="form-control datetimepicker" type="text" autocomplete="off" required>
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group" id='telEditG'>
			<label class="col-md-3 control-label" >เบอร์ติดต่อ</label>
			<div class="col-md-7 ">
				<input id="telEdit" name="telEdit" class="form-control" type="text" autocomplete="off" required>
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">สถานที่</label>
			<div class="col-md-7">
				<textarea id="place" name="place" placeholder="สถานที่" class="form-control" required></textarea>
				<span class="help-block"></span>
			</div>
		</div>
		<center><button type="submit"  class="btn btn-primary" >ยืนยัน</button></center>	
	</form>

</body>

<script>

$( document ).ready(function() {
	$('.datetimepicker').datetimepicker({
		autoclose: true,
		format: "yyyy-mm-dd hh:ii",
		todayHighlight: true,
		orientation: "top auto",
		todayBtn: true,
		todayHighlight: true,
		startDate: new Date()
	});

});

</script>

</html>

