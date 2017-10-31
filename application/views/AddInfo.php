<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
	<?php
	include "Header.php";
	?>  
	<title>ระบบบริหารจัดการรถยนต์</title>
</head>

<body>
	<?php 
	include "NavbarChooser.php";
	?>
<div align="center"><br>
<h1>กรุณาใส่ข้อมูล</h1><br>
<h4 style="color:red">***คุณไม่สามารถกลับมาแก้ข้อมูลได้อีก กรุณาตรวจสอบข้อมูลให้ถูกต้องก่อนกดยืนยัน***</h4>
</div>
<br>
	<form action="<?php echo base_url(); ?>OutsideCarCon/AddData" method="post">
		<input type="text" name="hireId" style="display:none" value="<?php echo $id ?>">
		<div class="row">
			<div class="col-md-offset-2 col-md-3">ทะเบียนรถ</div>
			<div class="col-md-5">
				<input type="text" name="plate" class="form-control" required>
			</div>
			<div class="col-md-2"></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-offset-2 col-md-3">ค่าใช้จ่าย</div>
			<div class="col-md-5">
				<input type="text" name="cost" class="form-control" required>
			</div>
			<div class="col-md-2"></div>
		</div>
		<br>
		<div class="row" align="center">
			<div class="checkbox">
				<label><input type="checkbox" onclick="check()">ข้าพเจ้าขอยืนยันว่าข้อมูลที่กรอกเป็นความจริงทุกประการ</label>
			</div>
		</div>

		<div class="row" align="center">
			<button class="btn btn-success disabled" type="submit" id="confirm" disabled>ยืนยัน</button>
		</div>

	</form>
	<script type="text/javascript">
		function check() {
			document.getElementById('confirm').classList.toggle('disabled');

			if(document.getElementById('confirm').disabled = true){
				document.getElementById('confirm').disabled = false;				
			}else if(document.getElementById('confirm').disabled = false){
				document.getElementById('confirm').disabled = true;			
			}
		}
	</script>
</body>
</html>

