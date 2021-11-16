<?php
    include 'session.php';

    function confirmation($nowdate){
        $today = date("Y-m-d");
        $count = 0;
        foreach($nowdate as $key){
            if($key == $today){
                $count++;
            }
        }
        return $count;
    }

    $userdate = array();
    $nowdate = array();
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food Menu</title>

    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--Stylesheet-->
    <link rel="stylesheet" href="css/home_style2112.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.2/datatables.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.2/datatables.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="menu">
        <div class="heading">
            <h1><?php echo "Hello ".$user['firstname']." " .$user['lastname']?></h1>
            <h3>&mdash; TODAY'S MENU &mdash; </h3>
            <div class = "log">
                <a href="logout.php"><i class='bx bx-log-out-circle'></i><span>logout</span></a>
            </div>
            
            <!--<div class = "send"> <i class='bx bx-send'></i> 
            <a href="#display" data-toggle="modal"><i class='bx bx-show'></i><span>Display Orders</span></a>
            </div>-->
        </div>
        
        <div class = "menu_date">
            <img src="images/download.png" alt="GhanaDotCom">
            <p id = "date"><?php echo date("d/F/Y");?></p>
            <hr class = "at_top">
            <marquee>What are we eating today....!</marquee>
            <hr class = "at_buttom">
        </div>
        
        <?php 
        
            if(isset($_SESSION['error'])){
                echo "
                    <div class='alert alert-danger text-center mt20' id = 'show'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <p>".$_SESSION['error']."</p> 
                    </div>
                ";
                unset($_SESSION['error']);
            }
        ?>
        <?php
            if(isset($_SESSION['success'])){
                echo "
                    <div class='alert alert-success alert-dismissible' id = 'show'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-check'></i> Success!</h4>
                    ".$_SESSION['success']."
                    </div>
                ";
                unset($_SESSION['success']);
                // $hide = 1;
            }

		?>

        <?php
            $sql1 = "SELECT * FROM `order` WHERE `user_id` = ".$user['id'];
            $result1 = mysqli_query($conn, $sql1);
            while ($check = mysqli_fetch_assoc($result1)){
                array_push($userdate, $check['date']);
            }
    
            $nowdate = $userdate; 
            $count = confirmation($nowdate);
    
            if($count >= 1){ ?>
                    <h3 style = "text-align:center; margin: 20px; margin-bottom:40px">You have already placed an order today.<h3>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <div class="text-center">
                            <a href="#Today_display" data-toggle="modal" class="btn btn-flat btn-primary mr-3 mb-3 ch_today"><i class='bx bx-show'></i><span>Check Today's Order</span></a>
                            <a href="#Full_display" data-toggle="modal" class="btn btn-flat btn-primary mr-3 mb-3 ch_previous"><i class='bx bxs-file-find' ></i><span>Check Previous Order</span></a>
                        </div>
                    </div>
                    <!-- <button class="btn btn-primary" type="submit" name = "submit">Check Today's Order</button> -->
                    <!-- <button class="btn btn-primary" type="submit" name = "submit">Check Previous Order</button> -->
    <?php   }else{

                if (!isset($_GET['seen'])){ ?>
                    <form action = "order.php" method= "POST">
                        <?php
                            include 'connect.php';
                            $sql = "SELECT * FROM `dish`";
                            $Data = mysqli_query($conn, $sql);
                            $Datano = mysqli_num_rows($Data);
                            $count = 1;
                            
                                if($Datano>0){
                                    while($food = mysqli_fetch_array($Data)){
                                        echo"<tr>
                                        <td><div class='food-items'>
                                            <div class='details'>
                                                <div class='form-check'>
                                                        <input class='form-check-input' type='radio' name='order' id='exampleRadios".+$count."' value = '".$food['food']."'>
                                                        <label class='form-check-label' for='exampleRadios".+$count."'>
                                                            ".$food['food'].
                                                        "</label>
                                                    </div>
                                            </div>
                                        </div>
                                        </td>
                                        </tr>";
                                        $count++;
                                    }
                                }
                                else{
                                    echo"No Food Today";
                                }
                            
                        ?>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name = "submit">Submit Order</button>
                        </div>
                    </form>

                <?php } 
            
            }?>

        <?php include 'display.php'; ?>
    </div>

</body>
</html>