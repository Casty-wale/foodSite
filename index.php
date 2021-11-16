<?php

  	session_start();
	  
	if(isset($_SESSION['users'])){
		header('location: home.php');
	}
	
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Login System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body>
        <?php
            if(isset($_SESSION['error'])){
                echo "
                    <div class='alert_error'>
                    <button type='button' class='close'>&times;</button>
                        <p>".$_SESSION['error']."</p> 
                    </div>
                ";
                unset($_SESSION['error']);
            }
        ?>
        <?php
            if(isset($_SESSION['success'])){
                echo "
                    <div class='alert_success'>
                        <button type='button' class='close'>&times;</button>
                        <h4><i class='icon fa fa-check'></i> Success!</h4>
                    ".$_SESSION['success']."
                    </div>
                ";
                unset($_SESSION['success']);
            }

        ?>
        <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="logup.php" method="POST">
                <h1 style = "margin-bottom: 30px">Create Account</h1>
                <input type="text" name="fname" placeholder="First Name" />
                <input type="text" name="lname" placeholder="Last Name" />
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="pwd" placeholder="Password" />
                <button style = "margin-top: 30px" name="logup" >Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login.php" method="POST">
                <h1 style = "margin-bottom: 30px">Sign in</h1>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="pwd" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button style = "margin-bottom: 30px" name="login" >Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="images/p05tcfr.png" alt="food">
                    <h1>Hi Baddie</h1>
                    <p>Connect with us by signing in.</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello There</h1>
                    <p>Please enter your personal details to register with us.</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="js/js.js"></script>

</html>