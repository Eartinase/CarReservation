<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<?php
	include 'connect.php';
	?>
	<script src='lib/jquery.min.js'></script>
	<script src='lib/moment.min.js'></script>
	<script src='fullcalendar.js'></script>
	<script type='text/javascript' src='gcal.js'></script>
	<link rel='stylesheet' href='fullcalendar.css' />

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
	<script src='bootstrap/js/bootstrap.js'></script>
	

	<script type='text/javascript'>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			events:[
			<?php 
			$event = " ";
			$selectsql = "select * from currentreservation";
			
			$result = $conn->query($selectsql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {

					$getColor = "SELECT color from cartype ct join cars c on c.CarTypeId = ct.CarTypeId". 
					" join currentreservation cr on cr.PlateLicense =c.PlateLicense".
					" where cr.PlateLicense = '".$row["PlateLicense"]."'";

					$colorResult = $conn->query($getColor);
					while($roww = $colorResult->fetch_assoc()) {
						$color = $roww["color"];
					}
					$event .= "{title: '".$row["PlateLicense"].
					"',\nstart: '".$row["StartDate"].
					"',\nend: '".$row["EndDate"].
					"',\ncolor:'".$color.
					"'},\n";
				}

			}
			echo substr($event, 0, -2);

			?>	

			],

			dayClick: function(date, jsEvent, view) {
				//alert('Clicked on: ' + date.format());
				document.getElementById('day').value = date.format();
				var selectedDay = date.format();
				document.getElementById('date').value = selectedDay;
			},
			header: {
				left: 'title',
				center: '',
				right : 'month,basicWeek,basicDay prev,next'
			},

		});
});
</script>

<script type="text/javascript">
function changeDetect() {
	var typeid = document.getElementById("cartype").value;	
			//alert(typeid);

			var first =	<?php
			$sql = "select c.plateLicense from cars c join cartype ct on c.CarTypeId = ct.CarTypeId where c.cartypeid = 1";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {    	
				echo "\"";
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["plateLicense"]."'>".$row["plateLicense"]."</option>";
				}
				echo "\";\n";
			}
			?>

			var second =	<?php
			$sql = "select c.plateLicense from cars c join cartype ct on c.CarTypeId = ct.CarTypeId where c.cartypeid = 2";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {   		
				echo "\"";
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["plateLicense"]."'>".$row["plateLicense"]."</option>";
				}
				echo "\";\n";
			}
			?>

			var third =	<?php
			$sql = "select c.plateLicense from cars c join cartype ct on c.CarTypeId = ct.CarTypeId where c.cartypeid = 3";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {   		
				echo "\"";
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["plateLicense"]."'>".$row["plateLicense"]."</option>";
				}
				echo "\";\n";
			}
			?>

			var fourth =	<?php
			$sql = "select c.plateLicense from cars c join cartype ct on c.CarTypeId = ct.CarTypeId where c.cartypeid = 4";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {   		
				echo "\"";
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["plateLicense"]."'>".$row["plateLicense"]."</option>";
				}
				echo "\";\n";
			}
			?>

			var plate = document.getElementById("plate");
			if (typeid == 1) {
				plate.innerHTML= first;				
			}else if(typeid == 2){
				plate.innerHTML= second;
			}else if(typeid == 3){
				plate.innerHTML= third;
			}else if(typeid == 4){
				plate.innerHTML= fourth;
			};

		}
		
		</script>


	</head>

	<body style="margin:2%">


		<div class="row">
			<div class="col-md-6">
				<div id='calendar'></div>
			</div>
			<div class="col-md-6" >
				
				<center><h1>รายการรถ</h1></center>
				<?php
				$sql = "SELECT * from cartype";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						echo  $row["CarType"]."<br>";
						echo "&emsp;ทะเบียน<br>";

						$plate = "select plateLicense from cars c join cartype ct where c.CarTypeId = ct.cartypeid && ct.cartype= '".$row["CarType"]."'";
						$resultPlate = $conn->query($plate);
						
						if ($resultPlate->num_rows > 0) {							
							while($row = $resultPlate->fetch_assoc()) {
								echo "&emsp;&emsp;".$row["plateLicense"]."<br>";
							}
							echo "<br>";
						}else{
							echo "&emsp;&emsp;ไม่มีรถประเภทนี้";
						}
					}
				} else {
					echo "0 results";
				}
				?>

				<br><br>
				<center><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">จองรถ</button></center>
			</div>

		</div>

		<br>
		
		

		<form action="reservationResult.php">
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">จองรถ</h4>
						</div>
						<div class="modal-body">
							<div id="information">

								เลือกรถ: 
								<select name="cars"  id="cartype" onchange="changeDetect()" class="form-control">
									<option>เลือกประเภทรถ</option>
									<option value="1">เก๋ง</option>
									<option value="2">ปิ๊กอัพ</option>
									<option value="3">ตุ๊กตุ๊ก</option>
									<option value="4">ซาเล้ง</option>						
								</select>

								<br>

								วันที่: <input type="date" name="date" id="day"  value="เลือกวันที่ปฏิทิน" class="form-control" id="date">
								<!--input type="hidden" value="c" name="date" -->
								<input type="hidden" value="2" name="driver" id="driverr">
								<br><br>

								<div class="form-inline">
									เวลา: ตั้งแต่ <input type="time" class="form-control" name="timeS" placeholder="ชช:นน:วว"> 
									ถึง <input type="time" class="form-control" name="timeE" placeholder="ชช:นน:วว">
								</div>
								<br>
								เลือกทะเบียนรถ:
								<select name="plateLicense" id="plate" class="form-control" onchange="driver()">
									<option>เลือกประเภทรถก่อน</option>
								</select>
								<br>
								สถานที่:
								<textarea class="form-control" name="place"></textarea>
								<br><br>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" >ยืนยันการจอง</button>

						</div>
					</div>
				</div>
			</div>
		</form>
	</body>


	</html>