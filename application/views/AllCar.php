<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<?php 
	include "Header.php";
	?>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
	<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
	
	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')?>"></script>
	<link rel="icon" href="<?php echo base_url('assets/favicon.ico')?>" sizes="16x16">
	<style type="text/css">
	td{
		text-align: center;
	}
	.head{
		font-weight: bold;
	}

	.toolbar {
    	float: left;
	}
	#boxCal{
		max-width: 95%;
	}
</style>
</head>
<body >

	<?php 
	include "NavbarChooser.php";
	?>
	<div class="container-fluid" id='boxCal'>
	<h1 align="center">รายการรถ</h1>
	<hr>
	


			
		<table id="table" class="table table-striped table-bordered table-hover" width="100%">
			<thead>
				<tr>
					<td class="head">ทะเบียนรถ</td>					
					<td class="head">ประเภทรถ</td> 					
					<td class="head">ยี่ห้อ รุ่น</td>
					<td class="head">หมายเลขเครื่อง</td>
					<td class="head">จำนวนที่นั่ง</td>
					<td class="head">รหัสครุภัณฑ์</td>					
					<td class="head">เชื้อเพลิง</td>
					<td class="head">หน่วยงาน</td>
					<td class="head">หมายเหตุ</td>
					<td class="head"></td>
				</tr>
			</thead>
			<tbody>
				
			</tbody>							
		</table>

	</div>

	<script type="text/javascript">
		function reload_table(){
			table.ajax.reload(null,false); //reload datatable ajax 
		}

		var dateToday = new Date();
		var table;
		$(document).ready(function() {		
	    	//datatables
	    	table = $('#table').DataTable({ 
	    		"dom": '<"toolbar">frtip',
	    		"bPaginate":true,
	       		"processing": true, //Feature control the processing indicator.
	        	// Load data for the table's content from an Ajax source
	        	"ajax": {
	        		"url" : "<?php echo base_url(); ?>ManageCar/ajax_carlist",
	        		"type" : "POST"
	        	}
	    });
	    	  $("div.toolbar").html('<a href="<?php echo base_url() ?>ManageCar/AddCar"><button style="width: 150px" class="btn btn-info">เพิ่มรถ <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></a>');
	    });

	</script>
</body>
</html>