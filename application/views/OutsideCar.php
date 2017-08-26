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


	
	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')?>"></script>
</head>
<body>
	<?php 
	include "NavbarChooser.php";
	?>
	<div class="col-md-7 col-sm-offset-2">
		
<<<<<<< HEAD
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
		                <input id="dateS2" name="dateS"  class="form-control datetimepicker" type="text" autocomplete="off">
		                <span class="help-block"></span>
		            </div>	                    
		        </div>
		        <div class="form-group">
		            <label class="col-md-3 control-label" >วันที่กลับ</label>
		            <div class="col-md-7">
		                <input id="dateE2" name="dateE" class="form-control datetimepicker" type="text" autocomplete="off">
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
		               	<textarea id="place" name="place" placeholder="place" class="form-control"></textarea>
		            <span class="help-block"></span>
		            </div>
		        </div>
				<center><button type="submit"  class="btn btn-primary" >ยืนยัน</button></center>	
=======
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
			<center><button type="submit"  class="btn btn-primary" >ยืนยัน</button></center>	
>>>>>>> 11f28cad94f9fddcf703c658f26046bb3a66f44a
		</form>
	</div>
</body>

<<<<<<< HEAD
	<script>
	 	
	 	$( document ).ready(function() {

					  
			$('.datetimepicker').datetimepicker({
		        autoclose: true,
		        format: "yyyy-mm-dd hh:ii",
		        todayHighlight: true,
		       	orientation: "top auto",
		        todayBtn: true,
		        todayHighlight: true, 
		        
	         });
		});
=======
<script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer>

$( document ).ready(function() {

	$('#dateS').datepicker({ 
		minDate: 0
	});	
});
>>>>>>> 11f28cad94f9fddcf703c658f26046bb3a66f44a

</script>
</html>

