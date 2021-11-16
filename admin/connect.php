<?php
	$hostName = "localhost";
	$Username = "root";
	$passWD = "";
	$db_name = "login";
	$conn = new mysqli($hostName, $Username, $passWD, $db_name);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>