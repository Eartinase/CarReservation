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
	<link rel="icon" href="<?php echo base_url('assets/favicon.ico')?>" sizes="16x16">
</head>
<body style="margin-left:2%; margin-right:2%">
	<?php 
	include "NavbarChooser.php";
	?>		

	<center>
		<h3>คำร้องขอจ้างเหมารถจากภายนอก</h3>
	</center>
	<div class="container">
		
		<div>
		
		<form class="form-horizontal" id="form"  action="#" method="get" accept-charset="utf-8">

			<div class="form-group">
				<label for="cartype" class="col-md-3 control-label">ประเภทรถ </label>
				<div class="col-md-7">
					<select name="cartype" required id="cartype" onchange="reccommend()" class="form-control">
						<option value="">เลือกประเภทรถ</option>
						<option value="1">แท็กซี่</option>
						<option value="3">รถตู้</option>					
					</select>
				</div>	
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">วันที่เดินทาง</label>
				<div class="col-md-7">
					<input id="dateS" name="dateS"  class="form-control datetimepicker" onchange="reccommend()" type="text" autocomplete="off" required>
				</div>	                    
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" >วันที่กลับ</label>
				<div class="col-md-7">
					<input id="dateE" name="dateE" class="form-control datetimepicker" onchange="reccommend()"  type="text" autocomplete="off" required>
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

		</div>
		<div class="reccommendCars container" style="width: 70%">
		<div class = "rec" >
			<table id="rec" class="table" >
				<thead>
					<tr>
						<th>ประเภท</th>
						<th>ทะเบียน</th>
						<th>วันทีไป</th>
						<th>วันที่กลับ</th>
				</thead>
				<tbody>
				
				</tbody>
			</table>
		</div>



	

</body>

<script>
	function reccommend(){
		var cartypeId = $('#cartype').val();
		var startDate = $('#dateS').val();
		var startEnd = $('#dateE').val();
		if(!(cartypeId == "" || startDate == "" || startEnd == "")){
			$.ajax({
		        url: '<?php echo base_url('Search/reccommendCars'); ?>',
		        type: "POST",
		        data: $('#form').serialize(),
		        datatype: 'json',
		        success: function (doc) {
		        	data =JSON.parse(doc);
		        	$("#rec").find("tr:gt(0)").remove();
		        	if(data.length > 0 ){
		        	
		        		
		        		for(var i = 0 ; i < data.length ; i++){
						$("#rec").append('<tr><td>'+data[i].carType+'</td><td>'+data[i].plateL+'</td><td>'+data[i].start+'</td><td>'+data[i].end+'</td><td><button class="btn" value="'+data[i].carId+'" onclick="showModelRes('+data[i].plateL+')" type="button">จองรถ</button></td></tr>');
						
		        	 }
		        	}	
		        	

		        	
			    },error: function (err) {
		            alert('Error in fetching data');
		        }
		    });
		}
	

	}

	function showModelRes(carID, pl ){
		alert(carID);
	}

	$( document ).ready(function(){
		$('.datetimepicker').datetimepicker({
			autoclose: true,
			format: "yyyy-mm-dd hh:ii",
			todayHighlight: true,

			todayBtn: true,
			todayHighlight: true,
			startDate: new Date()
		});

	});

</script>

</html>

