<?php

	include 'connect.php';

	if(isset($_POST['logup'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		
        $password = password_hash($pwd, PASSWORD_DEFAULT);

		$sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`) VALUES ('$fname','$lname','$email','$password')";
		
        // $query = $conn->query($sql);

		if($conn->query($sql)){
			$_SESSION['success'] = 'Registration successful';
		}
		else{
			$_SESSION['error'] = 'Registration filled';
		}

    }

	header('location: index.php');
?>