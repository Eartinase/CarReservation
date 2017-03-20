<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "carreservation";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8");
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	// モンクット王(ou)工(kou)科(ka)大(dai)学(gaku)トンブリ－校(kou)