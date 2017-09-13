<!DOCTYPE html>
<html>
<head>


	<?php 
	include "Header.php";
	?>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
	<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')?>"></script>
	<link rel="icon" href="<?php echo base_url('assets/favicon.ico')?>" sizes="16x16">
</head>
<style type="text/css">
	body{
		 font-family: 'Prompt', sans-serif;
	}
</style>
<body>
	<?php 
	include "NavbarChooser.php";
	?>		
	<br>
	<div  >
		<div>
		<div class="col-md-4 col-md-offset-1">
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
				
				<div  class="col-md-2 col-md-offset-10"><button type="submit" id="sendFrom" class="btn btn-primary" >ยืนยัน</button></div>
			
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
		<div class="col-md-6" style="margin-left: 50px">
			<div>
			<h3>ประวัติคคำร้องขอใช้รถภายนอก</h3>			
			<table  id="table" class="table table-striped table-bordered table-hover" width="100%">
				<thead>
					<tr>
						<td>ประเภทรถ</td> 
						<td>วันที่เดินทาง</td>
						<td>วันที่กลับ</td>
						<td>สถานที่</td>
						<td>เบอร์โทร</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					
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
			url: '<?php echo base_url('OutsideCarCon/sendRequest'); ?>',
			type: "POST",
			data: $('#formRequest').serialize(),
			datatype: 'json',
			success: function (doc) {
				alert(doc);  
				$('#formRequest').trigger("reset");
				$('#reasonDiv').collapse('hide');
				reload_table();            
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
	
	var table;
	$( document ).ready(function(){

		$("#sendFrom").submit(function(e) {
			e.preventDefault();
			ajax_sendAsk();

		});

		table = $('#table').DataTable({ 
			"lengthChange": false,
			"bFilter" : false,
	    	"bPaginate":true,
	       	"processing": true, //Feature control the processing indicator.
	        // Load data for the table's content from an Ajax source
	        "ajax": {
	        	"url" : "<?php echo base_url(); ?>OutsideCarCon/ajax_list_OutsideCar",
	        	"type" : "POST"
	        },

	        //Set column definition initialisation properties.   

	    });


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

