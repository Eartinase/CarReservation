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
<h1 align="center">
	ข้อมูลการขับรถย้อนหลัง
</h1><hr>
	
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
					<td class="tablehead">หมายเหตุ</td>
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
					echo "<td style='text-align: left'>";
						if($Trans[$value['StatusId']] == null){
							
						}else{
							foreach ($Trans[$value['StatusId']] as  $t) {
								echo $t['TransactionName'] ." : ";
								echo $t['Note']."<br>";
							}
						}
					echo "</td>";
					echo "</td>\n";
					echo "</tr>\n";
				} 
				?>
			</tbody>						
		</table>
	</div>	

	<p style="color:red">* หากต้องการแก้ไขข้อมูลกรุณาติดต่อเจ้าหน้าที่</p>
	
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