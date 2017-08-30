<!DOCTYPE html>
<html>
<head>
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	

	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>

	<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')?>"></script>
</head>
</head>
<body>
						
	<form action="<?php echo base_url(); ?>Search/reccommendCars" method="post" id="formEdit" class="form-horizontal">
							<div class="form-group">
								<label class="col-md-3 control-label">วันที่เดินทาง</label>
								<div class="col-md-8">
									<input id="dateS2" name="dateS"  class="form-control datetimepicker" type="text" autocomplete="off">
									<span class="help-block"></span>
								</div>	                    
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" >วันที่กลับ</label>
								<div class="col-md-8">
									<input id="dateE2" name="dateE" class="form-control datetimepicker" type="text" autocomplete="off">
									<span class="help-block"></span>
								</div>
							</div>
							
						<input type="submit" value="submit">
					</form>
				
<script>

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
