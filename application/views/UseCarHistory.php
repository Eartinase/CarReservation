<!DOCTYPE html>
<html>
<head>
	<title>ระบบบริหารจัดการรถยนต์</title>
	<meta charset="utf-8">
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
	td{
		text-align: center;
	}
	body{
		font-family: 'Prompt', sans-serif;
	}
	.head{
		font-weight: bold;
	}
</style>
<body  ">
	
	<?php 
	include "NavbarChooser.php";
	?>
	<div  class = "container" id='boxCal'>
	<h1 align="center">ประวัติการใช้งาน</h1>	<hr>
		<table  id="table" class="table table-striped table-bordered table-hover" width="100%">
			<thead>
				<tr>
					<td class="head">ทะเบียนรถ</td>
					<td class="head">ประเภทรถ</td> 
					<td class="head">ทะเบียนรถ</td> 
					<td class="head">วันที่เดินทาง</td>
					<td class="head">วันที่กลับ</td>
					<td class="head">สถานที่</td>					
				</tr>
			</thead>
			<tbody>
				
			</tbody>							
		</table>
	</div>	

	
</body>

<script type="text/javascript">

	var dateToday = new Date();
	var table;
	$(document).ready(function() {		
	    //datatables
	    table = $('#table').DataTable({ 
	    	"bPaginate":true,
	       	"processing": true, //Feature control the processing indicator.
	        // Load data for the table's content from an Ajax source
	        "ajax": {
	        	"url" : "<?php echo base_url(); ?>Reserve/ajax_UseCar",
	        	"type" : "POST"
	        },
	        //Set column definition initialisation properties. 
	    });

	    $('.datetimepicker').datetimepicker({
	    	container:'#modal_form',
	    	autoclose: true,
	    	format: "yyyy-mm-dd hh:ii",
	    	todayHighlight: true,
	    	orientation: "top auto",
	    	todayBtn: true,
	    	todayHighlight: true,  
	    });	    	
	});

</script>

</html>