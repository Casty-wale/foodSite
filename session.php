<?php
	require_once 'connect.php';
	session_start();

	if(isset($_SESSION['users'])){
		$sql = "SELECT * FROM `users` WHERE id = '".$_SESSION['users']."'";
		$query = $conn->query($sql);
		$user = $query->fetch_assoc();
	}
	else{
		header('location: index.php');
		exit();
	}

?>