<?php

    include 'session.php';
    require_once 'connect.php';

    $today = date("Y-m-d");
    
    

    if(isset($_POST['submit']))
    {

        if(!isset($_POST['order'])){
            $_SESSION['error'] = "Please select your order for today.";
        }
        else{
            $order = $_POST['order'];
            $userId = $user['id'];

            $food = "SELECT * FROM `dish` WHERE `food` = '".$order."'";
            $result = mysqli_query($conn, $food);
            $row = mysqli_fetch_array($result);
            $orderId = $row['id'];

            $sql = "INSERT INTO `order`(`date`, `food_id`, `user_id`) VALUES (now(),'$orderId','$userId')";
            $ordered = mysqli_query($conn, $sql);
            $_SESSION['success'] = "Your order was submitted successfully.";
            header("Location: home.php?seen=1");
		    exit();
            
        }
    }
    else if(isset($_POST['delete']))
    {
      $today = date("Y-m-d");
      $varify = "SELECT `order`.`id`, `order`.`date`, `firstname`, `lastname`, `email`, `food` FROM `order` LEFT JOIN `users` ON `users`.`id` = `order`.`user_id` LEFT JOIN `dish` ON `dish`.`id` = `order`.`food_id` WHERE `user_id` = ".$user['id']." AND `date` = '".$today."'";
      $result6 = mysqli_query($conn, $varify);
      $queryResult = mysqli_num_rows($result6);
      if($queryResult > 0){
        $sql5 = "DELETE FROM `order` WHERE `user_id` = ".$user['id']." AND `date` = '".$today."'";
        $Corder = mysqli_query($conn, $sql5);
        $_SESSION['success'] = "Order deleted successfully";
       
      }
    }

    header('location: home.php');
?>