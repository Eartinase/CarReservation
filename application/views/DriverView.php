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

	<div  class="container" style="margin-top: 50px">
	<div>			
		<table  id="table" class="table table-striped table-bordered table-hover" width="100%">
			<thead>
				<tr>
					<td class="tablehead">ประเภทรถ</td>
					<td class="tablehead">ทะเบียนรถ</td>
					<td class="tablehead">สถานที่</td> 
					<td class="tablehead">วันที่เดินทาง</td> 
					<td class="tablehead">วันที่กลับ</td> 
					<td class="tablehead">เลขไมล์เริ่มต้น</td>
					<td class="tablehead">เลขไมล์สิ้นสุด</td>					
					<td style="width:150px"></td>
				</tr>
			</thead>
			
			<tbody>
				<?php 
				foreach($Reserve as $value){
					//$plate = $row->PlateLicense.replace(/ /g, '+');
					echo "<tr>\n";
					echo "<td>".$value['CarType']."</td>\n";
					echo "<td>".$value['plateLicense']."</td>\n";
					echo "<td>".$value['Place']."</td>\n";
					echo "<td>".$value['Departure']."</td>\n";
					echo "<td>".$value['Arrival']."</td>\n";
					echo "<td>".$value['CarMilesStart']."</td>\n";
					echo "<td>".$value['CarMilesEnd']."</td>\n";
					echo "<td>";
					
					echo "</td>";
					echo "</td>\n";
					echo "</tr>\n";
				} 
				?>
			</tbody>						
		</table>
	</div>	

	<form action="<?php echo base_url();?>Driver/departure" method="post">
		<div class="modal fade" id="confirm">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">ว</span>
						</button>
						<center>
							<h3 class="modal-title">ยืนยันการออกรถ</h3>
						</center>						
					</div>
					<div class="modal-body" style="margin:2%">
						<div class="row">
							<div class="col-md-3">
								รหัสการจอง:
							</div>
							<div class="col-md-9">
								<input type="text" readonly class="form-control" id="lic" name="CurrentId" required value="">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-3">
								พนักงานขับรถ:
							</div>
							<div class="col-md-9">
								<input type="text" disabled class="form-control" value="<?php echo $name ?>" >
								<input type="text" name="driverId" class="form-control" value="<?php echo $employeeCode ?>" style="display:none">
							</div>
						</div>
						<br>	
						<div class="row">
							<div class="col-md-3">
								<p>เวลาออกรถ: </p>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control datetimepicker" id="departTime" name="Departure" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-3">
								<p>เลขไมล์:</p>
							</div>
							<div class="col-md-9">
								<input type="number" class="form-control" name="CarMilesStart" required>
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
	</div>
	
<script>
	function changeData(license) {
		//document.getElementById("lic").value = license;
		document.getElementById("lic").setAttribute('value', license);
	}

	$('#departTime').datetimepicker({
		container:'#confirm',
		autoclose: true,
		format: 'yyyy-mm-dd hh:ii'
	});

	$(document).ready(function() {		
	    //datatables
	    table = $('#table').DataTable({ 
	    	"bPaginate":true,
	       	"processing": true
	        //Set column definition initialisation properties. 
	    });
	})

</script>
	


</body>
</html>