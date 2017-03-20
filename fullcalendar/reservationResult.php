<html>
<head>
	<meta charset="utf-8">
	<?php
		include 'connect.php';
	?>
	<title></title>
	<script type="text/javascript">
	function result() {
		document.getElementById('display').innerHTML = 	<?php
		
		$PlateLicense = $_GET["plateLicense"];
		$DriverId = $_GET["driver"];
		$EmployeeCode="1234";
		$StartDate= $_GET["date"]." ".$_GET["timeS"].":00";
		$EndDate=$_GET["date"]." ".	$_GET["timeE"].":00";
		$Place=$_GET["place"];


		$sql = "INSERT INTO `currentreservation` (`CurrentId`, `PlateLicense`, `DriverId`, `EmployeeCode`, `StartDate`, `EndDate`, `Place`)". 
		"VALUES (NULL, '". $PlateLicense."','". $DriverId."', '".$EmployeeCode."', '". $StartDate."', '". $EndDate . "', '".$Place."');";

		if ($conn->query($sql) === TRUE) {
			echo "\"New record created successfully\"";
		} else {
			echo "\"Error: " . $sql . "<br>" . $conn->error."\"";
		}
		
		//echo "'<b>".$StartDate."</b>'";
		?>;	

	}
	</script>
	
</head>
<body onload="result()">
	<div id="display"></div>
		

</body>
</html>