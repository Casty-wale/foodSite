<?php

	include 'connect.php';
	session_start();

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['pwd'];
		
        $sql = "SELECT * FROM `users` WHERE email = '$email'";

        $query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Wrong input';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				// $_SESSION['users'] = $row['id'];
				$_SESSION['admin'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Wrong Password';
			}
		}

    }
	
	header('location: index.php');
?>