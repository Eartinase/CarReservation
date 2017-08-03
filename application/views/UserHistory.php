<html>
<head>
	<meta charset="utf-8">
	<title></title>
	
	<?php 
	include "Header.php";
	?>
	<script src='<?php echo base_url(); ?>fullcalendar/lib/moment.min.js'></script>
	<script src='<?php echo base_url(); ?>fullcalendar/fullcalendar.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>fullcalendar/gcal.js'></script>
	<link rel='stylesheet' href='<?php echo base_url(); ?>fullcalendar/fullcalendar.css' />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='<?php echo base_url(); ?>application/views/css/hr.css' />
	
</head>

<body class="container" style="background-color:#fafafa">
	<?php 
		if (isset($this->session->userdata['logged_in'])) {
			$username = ($this->session->userdata['logged_in']['username']);
			$employeeCode = ($this->session->userdata['logged_in']['employeeCode']);
			$name = ($this->session->userdata['logged_in']['name']);
			$department = ($this->session->userdata['logged_in']['department']);
			$role = ($this->session->userdata['logged_in']['role']);
			include "navbarUserLogged_in.php";
		}else{
			include "navbarUserLogged_in.php";
		}	

	?>

		<?php if($currentReserve != null) { ?>
			<div class="table-responsive">
				<table class="table table-hover">
						<tr>
						    <th style="text-align: center;" >Car ID</th>
						    <th style="text-align: center;" >ทะเบียนรถ</th> 
						    <th style="text-align: center;" >วันที่เดินทาง</th>
						    <th style="text-align: center;" >วันที่กลับ</th>
						    <th>สถานที่</th>
						    <th style="text-align: center;" >สถานะ</th>
						    <th > </th>
						    <th > </th>

						 </tr>
						<?php  foreach ($currentReserve as $value) { ?>
							<tr>			
								<td style="text-align: center;" > <?php	echo $value->getCarId();		?> </td>
								<td style="text-align: center;"> <?php	echo $value->getPlateLicese();	?> </td>
								<td style="text-align: center;"> <?php	echo $value->getStartDate();	?> </td>
								<td style="text-align: center;"> <?php	echo $value->getEndDate();		?> </td>
								<td> <?php	echo $value->getPlace();		?> </td>
								<td class="success" style="text-align: center;" > Active </td>
								<td style="text-align: center;" ><a href="#" >edit</a> </td>
								<td style="text-align: center;" ><a href="#" >delete</a> </td>
							</tr>		
							<?php } ?>

				</table>
			</div>

		<?php }else{ ?>
			<div>
				ไม่พบประวัติการจอง
			</div>
		<?php } ?>
	

		

	
	



</body>
</html>