<!DOCTYPE html>
<html>
<head>
	<?php 
	include "Header.php";
	?>
	
</head>
<body>
	<?php 
	include "NavbarChooser.php";   
	?>
	<div class="container">
		<center>
			<h3>แก้ไขรถ</h3>
		</center>
		<form action="<?php echo base_url(); ?>ManageCar/EditOrDel" method="post">
			<div class="row">
				<div class="col-md-6">
					ทะเบียน: 
					<input type="text" name="plateLicense"  class="form-control" value="<?php echo $plateLicense ?>" required> 
				</div>
				<div class="col-md-6">
					สี: 
					<input type="text" name="color" class="form-control" value="<?php echo $color ?>" required>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					ประเภทรถ: 
					<select name="carType" class="form-control" required>
						<option>- -</option>
						<option value="1">เก๋ง</option>
						<option value="2">กระบะ</option>
						<option value="3">ตู้</option>
						<option value="4">ไมโครบัส</option>
					</select>
				</div>				
				<div class="col-md-6" >
					วันที่จดทะเบียน:
					<input type="date" name="RegisterDate" class="form-control" value="<?php echo $registerDate ?>">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					ราคา:
					<input type="number" name="price" class="form-control"  value="<?php echo $price ?>" required>
				</div>				
				<div class="col-md-6">
					ยี่ห้อ:
					<input type="text" name="brand" class="form-control"  value="<?php echo $brand ?>" required> 
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					แบบ/รุ่น: 
					<input type="text" name="generation" class="form-control" value="<?php echo $generation ?>" required>
				</div>				
				<div class="col-md-6">
					หมายเลขเครื่อง: 
					<input type="text" name="serial" class="form-control" value="<?php echo $serial ?>" required>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					ปีที่ซื้อ:
					<input type="number" name="PurchaseYear" class="form-control" value="<?php echo $purchaseYear ?>" required>
				</div>				
				<div class="col-md-6">
					ขนาด (จำนวนที่นั่ง): 
					<input type="text" name="seat" class="form-control" value="<?php echo $seat ?>" required>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					หมายเลขครุภัณฑ์: 
					<input type="text" name="itemLabel" class="form-control" value="<?php echo $itemLabel ?>">
				</div>				
				<div class="col-md-6">
					พนักงานขับรถ: 
					<select class="form-control" name="driverId" id="driverOption" required>
						<option> - - </option>
						<?php 						
						echo $driverOption;
						?>
					</select> 					
				</div>
			</div>	
			<br>
			<div class="row">
				<div class="col-md-6">
					เชื้อเพลิง: 
					<input type="text" name="Fuel" class="form-control" value="<?php echo $fuel ?>">
				</div>
				<div class="col-md-6">
					หน่วยงานเจ้าของ:
					<select value="<?php echo $depId  ?>" class="form-control" name="depId" >
						<option selected disabled hidden> - - </option>
						<?php 						
						echo $depOption;
						?>
					</select> 					
				</div>				
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					หมายเหตุ:
					<textarea class="form-control" name="description"><?php echo $description ?></textarea>
				</div>				
			</div>
			<br>
			
			<center>
				<input type="text" name="carId" hidden value="<?php echo $carId?>">

				<button type="submit" class="btn btn-primary" name="confirm">ยืนยัน</button>
				<button class="btn btn-danger" onclick="confirmDel()" name="del">ลบรถ</button>
			</center>

		</form>
		<br>
	</div>
	<script type="text/javascript">
		function confirmDel() {
			if(confirm("คุณต้องการลบรถคันนี้หรือไม่?")){

			}
		}
		
	</script>
</body>
</html>