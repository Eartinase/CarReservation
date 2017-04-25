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
			if($searchCar == "" & $Reserve == ""){
				echo "	ไม่พบรถทีว่าง";
			}else{
		
				foreach ($searchCar as $value) 
				{
					
						echo $value->getCarId() ; 
						echo $value->getPlateLicese() ;
						echo $value -> getCarType() ."<br>";
						
			
				}
			}
				echo "-------------------------";

				//foreach ($reserveCarOb as $value) {
					
						//echo $value ->getCarId() ; 
						//echo $value->getPlateLicese() ;
						//echo $value -> getCarType() ;
				//		foreach ($Reserve[$value->getCarId()] as $value) {
				//			echo $value -> getStartDate();
				//		}

				//}
				foreach ($Reserve as $key => $value) {
						echo $key;
						print_r($value);
				}
			

		}
	 ?>
	
	
</body>
</html>