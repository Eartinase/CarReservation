<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<?php 
	include "Header.php";
	?>
	
</head>
<body>

	<?php 
	include "NavbarChooser.php";
	?>
	
	<div  class="container" style="margin-top: 50px;">	
		<center>
			<h3>เพิ่มรถ</h3>
		</center>
		<form action="<?php echo base_url(); ?>AddCar/Add" method="post">
			<div class="row">
				<div class="col-md-6">
					ทะเบียน: <input type="text" name="plateLicense" class="form-control" required> 
				</div>
				<div class="col-md-6">
					สี: <input type="text" name="color" class="form-control" required>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					ประเภทรถ: 
					<select name="carType" class="form-control">
						<option>- -</option>
						<option value="1">เก๋ง</option>
						<option value="2">กระบะ</option>
						<option value="3">ตู้</option>
						<option value="4">ไมโครบัส</option>
					</select>
				</div>				
				<div class="col-md-6">
					วันที่จดทะเบียน:
					<input type="date" name="RegisterDate" class="form-control">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					ราคา:
					<input type="number" name="price" class="form-control">
				</div>				
				<div class="col-md-6">
					ยี่ห้อ:
					<input type="text" name="brand" class="form-control"> 
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					แบบ/รุ่น: 
					<input type="text" name="generation" class="form-control">
				</div>				
				<div class="col-md-6">
					หมายเลขเครื่อง: 
					<input type="text" name="serial" class="form-control">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					ปีที่ซื้อ:
					<input type="number" name="PurchaseYear" class="form-control">
				</div>				
				<div class="col-md-6">
					ขนาด (จำนวนที่นั่ง): 
					<input type="text" name="seat" class="form-control">
				</div>
			</div>
			 <br>
			<div class="row">
				<div class="col-md-6">
					หมายเลขครุภัณฑ์: 
					<input type="text" name="itemLabel" class="form-control">
				</div>				
				<div class="col-md-6">
					พนักงานขับรถ: 
					<select class="form-control">
						<option></option>
					</select> 
				</div>
			</div>	
			<br>
			<div class="row">
				<div class="col-md-6">
					เชื้อเพลิง: 
					<input type="text" name="Fuel" class="form-control">
				</div>
				<div class="col-md-6">
					หน่วยงานเจ้าของ:
					<select>
						<option></option>
					</select> 					
				</div>				
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					หมายเหตุ:
				<textarea class="form-control"></textarea>
				</div>				
			</div>
			<br>
			
			<center><button type="submit" class="btn btn-primary" >ยืนยัน</button></center>
			
			<br>
			
			<!--
			ทะเบียน: <input type="text" name="plateLicense" class="form-control" required> <br>
			หมายเลขเครื่อง: <input type="text" name="serial" class="form-control" required> <br>
			ประเภทรถ: <select name ="carType" class="form-control" required>
				<?php 
				echo $cartype ;
					//echo var_dump($rslt);
				?>
			</select><br>
			จำนวนที่นั่ง: <input type="number" class="form-control" name="seat" required> <br>
			คนขับ: <select name = "driver" class="form-control">
				<option> -- </option>
				<?php 
				echo $driver ;			
				?>
			</select>
			<br>	
			<center><button type="submit" class="btn btn-primary" >เพิ่มรถ</button></center>
		-->
		</form>
	</div>
</body>
</html>