<?php
    include ('connect.php');

    session_start();


    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'admin.php';
	}
    
  
    if(isset($_POST['send'])){ 
        $countNum = $_POST['num'];
        $number = $_POST['number'];
        $seenOrder = array();

        $today = date("Y-m-d");
        // $ordersNow = "SELECT `order`.`id`, `order`.`date`, `firstname`, `lastname`, `email`, `food` FROM `order` LEFT JOIN `users` ON `users`.`id` = `order`.`user_id` LEFT JOIN `dish` ON `dish`.`id` = `order`.`food_id` WHERE `date` = '".$today."'";
        $ordersNow = "SELECT firstName, substring(`firstname`,1,3) AS FNAME, lastname, substring(`lastname`,1,3) AS LNAME, food, substring(`food`,1,5) AS FOOD FROM `order` LEFT JOIN `users` ON `users`.`id` = `order`.`user_id` LEFT JOIN `dish` ON `dish`.`id` = `order`.`food_id` WHERE `date` = '".$today."'";
        $result5 = mysqli_query($conn, $ordersNow);
        $queryResult2 = mysqli_num_rows($result5);
        $take = array();
        
            if($queryResult2 > 0){
                while($DeOrders = mysqli_fetch_assoc($result5)){
                    array_push($take, [
                        "fn" => $DeOrders['FNAME']." ".$DeOrders['LNAME'],
                        "food" => $DeOrders['FOOD']]);
                }
            }
            else{
                $take[] = "You have no orders.";
            }

        for($i = 0; $i< $countNum; $i++){

            $seenOrder[] = $take[$i]['fn'].": ".$take[$i]['food'];
            
            // print_r($seenOrder);
        }

        // echo "<br><br><br>";

        // print_r($seenOrder);
        $key = ""; //Input the key for the API.
        $to = $number; //The number entered by the sender.
        $msg = implode("%0a", $seenOrder); //this portion contains the message to be sent, in this case from the database.

        // echo $msg;

        $sender_id = ""; //the name to show when the sms is sent.

        $url = "https://apps.mnotify.net/smsapi?key=$key&to=$to&msg=$msg&sender_id=$sender_id"; //the url for the API.
        
        $response = file_get_contents($url);
        $response = 1000;

        if ($response = 1000){
            $_SESSION['success'] = "SMS sent successfully.";
        }
        else{
            $_SESSION['error'] = "SMS not sent successfully.";
        }

        header('location:'.$return);
    }

?>
