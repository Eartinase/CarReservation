<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>	
	<?php 
		include "header.php";
	?>
	
</head>
<body style="margin:2%">

	<!--<form action="/searchCar" method="POST" accept-charset="utf-8">
		วันที่ไป: <input type="date" name="startDate" id="startDate"  value="เลือกวันที่ปฏิทิน" class="form-control" >
		เวลาที่ไป: ตั้งแต่ <input type="time" class="form-control" name="startTime" placeholder="ชช:นน:วว">
		วันที่กลับ: <input type="date" name="endDate" id="endDate"  value="เลือกวันที่ปฏิทิน" class="form-control" > 
		เวลาถึง <input type="time" class="form-control" name="endTime" placeholder="ชช:นน:วว" >
		<input name='carType[]' type='checkbox' value=1> เก๋ง
		<input name='carType[]' type='checkbox' value=2> ปิ๊กอัพ
		<input name='carType[]' type='checkbox' value=3> ตุ๊กตุ๊ก
		<input name='carType[]' type='checkbox' value=4> ซาเล้ง
		<input name='carType[]' type='checkbox' value=5> มอเตอร์ไซค์
		<button type="submit" class="btn btn-primary" >ค้นหา</button>
	</form>-->

	<?php 
		if(isset($searchCar))	
		{
			echo "<table class='table'>";
			if($searchCar == "" & $Reserve == ""){
				echo "	ไม่พบรถทีว่าง";
			}else{
		
				foreach ($searchCar as $value) 
				{   
					echo "<tr>";
						echo "<td>".$value->getCarId() ."</td>"; 
						echo "<td>".$value->getPlateLicese() ."</td>";
						echo "<td>".$value -> getCarType() ."</td>";
						echo "";
					echo "<tr>";						
			
				}
			}

				
				
				foreach ($reserveCarOb as $value1) 
				{
					$carId = $value1->getCarId();
					echo "<tr>";
						echo "<td>". $carId ."</td>";
						echo "<td>".$value1->getPlateLicese() ."</td>";
						echo "<td>".$value1 -> getCarType() ."</td>";
					

						foreach ($Reserve as $value2)
						 {
							if($carId == $value2->getCarId())
							{
								echo "<td>". $value2->getStartDate();
								echo $value2->getEndDate()."</td>";
							}
						}
					echo "</tr>";	
				}
			echo "</table>";
		
		}
	 ?>
	
	
</body>
</html>