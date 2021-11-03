<?php

	include 'connect.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['pwd'];
		
        $sql = "SELECT * FROM `users` WHERE email = '$email'";

        $query = $conn->query($sql);

		if($query->num_rows < 1){
			header('location: index.html?error=Wrong_Email');
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				header('location: home.php');
			}
			else{
				header('location: index.html?error=Wrong_Password');
			}
		}

    }

?>