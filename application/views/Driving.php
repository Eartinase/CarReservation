<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">

	<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src='<?php echo base_url(); ?>fullcalendar/lib/jquery.min.js'></script>	
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')?>"></script>

	<link rel="icon" href="<?php echo base_url('assets/favicon.ico')?>" sizes="16x16">

	<title>ระบบบริหารจัดการรถยนต์</title>


	<style type="text/css">
	td{
		text-align: center;

	}
	.tablehead{
		font-weight: bold;
	}
	</style>
	
</head>
<body>
	<?php 
	include "NavbarChooser.php";
	?>

	<div  style="margin: 100px;">			
		<table  id="tablee" class="table table-striped table-bordered table-hover" width="100%">
			<thead>
				<tr>
					<td class="tablehead">รหัสการจอง</td>
					<td class="tablehead">ประเภทรถ</td>
					<td class="tablehead">ทะเบียนรถ</td> 
					<td class="tablehead">ผู้จอง</td> 
					<td class="tablehead">สถานที่</td> 
					<td class="tablehead">วันที่เดินทาง</td>
					<td class="tablehead">วันที่กลับ</td>					
					<td style="width:150px"></td>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach($tab->result() as $row){
					//$plate = $row->PlateLicense.replace(/ /g, '+');
					echo "<tr>\n";
					echo "<td>".$row->currentid."</td>\n";
					echo "<td>".$row->CarType."</td>\n";
					echo "<td>".$row->PlateLicense."</td>\n";
					echo "<td>".$row->Name."</td>\n";
					echo "<td>".$row->place."</td>\n";
					echo "<td>".$row->StartDate."</td>\n";
					echo "<td>".$row->EndDate."</td>\n";
					echo "<td><button class='btn btn-success' data-toggle='modal' onclick='changeData(".$row->currentid.")' data-target='#arrive'>กลับมาถึงมหาวิทยาลัย</button>";
					echo "</td>\n";
					echo "</tr>\n";
				} ?>
			</tbody>						
		</table>
	</div>

	<form action="<?php echo base_url();?>Driver/arrival" method="post">
		<div class="modal fade" id="arrive">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">กลับถึงมหาวิทยาลัย</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-3">รหัสการจอง</div>
							<div class="col-md-9">
								<input class="form-control" name="CurrentId" id="reserveid" readonly>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-3">เวลากลับ</div>
							<div class="col-md-9">
								<input type="text" class="form-control datetimepicker" id="name" name="Arrival" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-3">ไมล์รถสิ้นสุด</div>
							<div class="col-md-9">
								<input type="number" class="form-control" name="CarMilesEnd" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
						<button type="submit" class="btn btn-primary">ยืนยัน</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</form>
	
	<script>
	function changeData(license) {		
		document.getElementById("reserveid").setAttribute('value', license);
	}	
	</script>

	<script type="text/javascript">
	$('#name').datetimepicker({
		container:'#arrive',
		autoclose: true,
		format: 'yyyy-mm-dd hh:ii'
	});
	</script> 

</body>
</html>