<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<?php 
	include "Header.php";
	?>
	
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
				<?php 
				$dis = "";
				if($incar){
					$dis = "disabled";
				}
				foreach($tab->result() as $row){
					//$plate = $row->PlateLicense.replace(/ /g, '+');
					echo "<tr>\n";
					echo "<td>".$row->currentid."</td>\n";
					echo "<td>".$row->CarType."</td>\n";
					echo "<td>".$row->PlateLicense."</td>\n";
					echo "<td>".$row->Name."</td>\n";
					echo "<td>".$row->place."</td>\n";
					echo "<td>".$row->StartDate."</td>\n";
					echo "<td>".$row->EndDate."</td>\n";
					echo "<td><button ".$dis." class='btn btn-success' data-toggle='modal' onclick='changeData(".$row->currentid.")' data-target='#confirm'>ยืนยัน</button>";
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
								<input type="time" class="form-control" name="Departure" required>
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
	
<script>
	function changeData(license) {
		//document.getElementById("lic").value = license;
		document.getElementById("lic").setAttribute('value', license);
	}
</script>
	


</body>
</html>