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
<body>
	<?php 
	include "NavbarChooser.php";
	?>		
	<br>
	<div class="container">
		
	
		<div class="row">
		<div class="col-md-5">
			<form class="form-horizontal" id="formRequest"  action="#" method="get" accept-charset="utf-8">
				<center><legend>คำร้องขอจ้างเหมารถจากภายนอก</legend></center>
				<div class="form-group" >
					<label for="cartype" class="col-md-3 control-label" >ประเภทรถ </label>
					<div class="col-md-9" >
						<select name="cartype" required id="cartype" onchange="reccommend()" class="form-control">
							<option value="">เลือกประเภทรถ</option>
							<option value="1">แท็กซี่</option>
							<option value="3">รถตู้</option>					
						</select>
					</div>	
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">วันที่เดินทาง</label>
					<div class="col-md-4">
						<input id="dateS" name="dateS"  class="form-control datetimepicker" onchange="reccommend()" type="text" autocomplete="off" required>
					</div>
					<label class="col-md-1 control-label" >ถึง</label>
					<div class="col-md-4">
						<input id="dateE" name="dateE" class="form-control datetimepicker" onchange="reccommend()"  type="text" autocomplete="off" required>
						<span class="help-block"></span>
					</div>	                    
				</div>
				
				
				
				<div class="form-group" id='telEditG'>
					<label class="col-md-3 control-label" >เบอร์ติดต่อ</label>
					<div class="col-md-9 ">
						<input id="tel" name="tel" maxlength="10" name="tel" class="form-control" type="tel" autocomplete="off" required>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">สถานที่</label>
					<div class="col-md-9">
						<textarea id="place" name="place" placeholder="สถานที่" class="form-control" required></textarea>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">เหตุผล</label>
					<div>
						<label  class="radio-inline col-md-4 " style='margin: 0'><input  type="radio" id="radio1" value="ไม่มีรถว่าง" name="reason" > ไม่มีรถในระบบที่ว่าง</label>
	  					<label class="radio-inline col-md-4" style='margin: 0' ><input   type="radio" id="radio2" value="0" name="reason" > เหตุผลอื่นๆ  </label>
	  					<br><br>
	  					
					</div><div id="reasonDiv"  class="collapse col-md-9 col-md-offset-3" ><textarea id="reason" name="reasonText" placeholder="กรุณาใส่เหตุผล" class="form-control" required></textarea></div>
					
				</div>
				
				<div  class="col-md-2 col-md-offset-10"><button type="button" onclick="ajax_sendAsk()" class="btn btn-primary" >ยืนยัน</button></div>
			
			</form>

			
			<div class="reccommendCars" >
			
					<p> รถแนะนำในระบบที่สามารถจองได้ </p>
					<table id="rec" class="table table-bordered" >
						<thead>
							<tr>
								<th>ประเภท</th>
								<th>ทะเบียน</th>
								<th>วันทีไป</th>
								<th>วันที่กลับ</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							 <tr>
							 	<td colspan = "5"><center>ไม่มีข้อมูล</center></td>
							 </tr>
						</tbody>
					</table>
			
			</div>
		</div>

		</div>
</div>
	

</body>

<script>

	function ajax_sendAsk(){		
		$.ajax({
			url: '<?php echo base_url('Reserve/sendRequest'); ?>',
			type: "POST",
			data: $('#formRequest').serialize(),
			datatype: 'json',
			success: function (doc) {
				alert(doc);              
			},error: function (err) {
				alert(err.Message);
			}
		});
	}

	function reccommend(){
		var cartypeId = $('#cartype').val();
		var startDate = $('#dateS').val();
		var startEnd = $('#dateE').val();
		if(!(cartypeId == "" || startDate == "" || startEnd == "")){
			$.ajax({
		        url: '<?php echo base_url('Search/reccommendCars'); ?>',
		        type: "POST",
		        data: $('#formRequest').serialize(),
		        datatype: 'json',
		        success: function (doc) {
		        	data =JSON.parse(doc);
		        	$("#rec").find("tr:gt(0)").remove();
		        	if(data.length > 0 ){	
		        	for(var i = 0 ; i < data.length ; i++){
						$("#rec").append('<tr><td>'+data[i].carType+'</td><td>'+data[i].plateL+'</td><td>'+data[i].start+'</td><td>'+data[i].end+'</td><td><button class="btn" value="'+data[i].carId+'" onclick="showModelRes('+data[i].plateL+')" type="button">จองรถ</button></td></tr>');
						$('#radio1').attr('disabled',true);
						$('#radio2').prop("checked",true);
						$('#reasonDiv').collapse('show');
		        	 	}
		        	}else{
		        		$("#rec").append('<tr><td colspan = "4"><center>ไม่มีข้อมูล<center></td></tr>');
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

	$('#radio1').click(function(){
		$('#reasonDiv').collapse('hide');
	});		
	
	$('#radio2').click(function(){
		$('#reasonDiv').collapse('show');
	});		
	
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

