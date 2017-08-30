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
					<td>รหัสการจอง</td>
					<td>ประเภทรถ</td>
					<td>ทะเบียนรถ</td> 
					<td>ผู้จอง</td> 
					<td>สถานที่</td> 
					<td>วันที่เดินทาง</td>
					<td>วันที่กลับ</td>					
					<td style="width:150px"></td>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach($tab->result() as $row){
					echo "<tr>";
					echo "<td>".$row->currentid."</td>";
					echo "<td>".$row->CarType."</td>";
					echo "<td>".$row->PlateLicense."</td>";
					echo "<td>".$row->Name."</td>";
					echo "<td>".$row->place."</td>";
					echo "<td>".$row->StartDate."</td>";
					echo "<td>".$row->EndDate."</td>";
					echo "<td><button class='btn btn-success' data-toggle='modal' data-target='#confirm' name='".$row->currentid."''>ยืนยัน</button></td>";
					echo "</tr>";
				} ?>
			</tbody>						
		</table>
	</div>	


	<div class="modal fade" id="confirm">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">ว</span>
					</button>
					<center>
						<h3 class="modal-title">ยืนยันการออกรถ</h4>
					</center>
					
				</div>
				<div class="modal-body" style="margin:2%">
					<div class="row">
						<div class="col-md-3">
							<p>เวลาออกรถ: </p>
						</div>
						<div class="col-md-9">
							<input type="time" class="form-control">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-3">
							<p>เลขไมล์:</p>
						</div>
						<div class="col-md-9">
							<input type="number" class="form-control">
						</div>
					</div>					
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
					<button type="button" class="btn btn-primary">ยืนยัน</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	

		</body>

	</body>
	</html>