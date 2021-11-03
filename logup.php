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
			header('location: index.html?success=Registration_successful');
		}
		else{
			header('location: index.html?error=Registration_filled');
		}

    }
?>