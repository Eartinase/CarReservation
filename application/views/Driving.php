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
					echo "<td><button class='btn btn-success' data-toggle='modal' data-target='#arrive'>กลับมาถึงมหาวิทยาลัย</button>";
					echo "</td>\n";
					echo "</tr>\n";
				} ?>
			</tbody>						
		</table>
	</div>



	<div class="modal fade" id="arrive">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					<p>One fine body&hellip;</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

</body>
</html>