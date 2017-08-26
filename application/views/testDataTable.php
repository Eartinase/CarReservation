<!DOCTYPE html>
<html>
<head>
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	

	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>

	<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
</head>
<body>
	<div  style="margin: 100px;">			
		<table  id="table" class="table table-striped table-bordered table-hover" width="100%">
			<thead>
				<tr>
					<td style="text-align: center;" >Car ID</td>
					<td style="text-align: center;" >ประเภทรถ</td> 
					<td style="text-align: center;" >ทะเบียนรถ</td> 
					<td style="text-align: center;" >วันที่เดินทาง</td>
					<td style="text-align: center;" >วันที่กลับ</td>
					<td>สถานที่</td>
					<td style="text-align: center;" style="width:1000px">สถานะ</td>
					<td style="width:150px" ></td>
				</tr>
			</thead>
			<tbody>
				
			</tbody>							
		</table>
	</div>
</body>
</html>

<script type="text/javascript">
var table;
	$(document).ready(function() {
		
	    //datatables
	    table = $('#table').DataTable({ 
	       "processing": true,
	       "ajax": {
	        	"url" : "<?php echo base_url(); ?>Reserve/ajax_reservelist",
	        	"type" : "POST"
	        },
	        //Set column definition initialisation properties.
	    });

	    //set input/textarea/select event when change value, remove class error and remove text help block 
	});

</script>