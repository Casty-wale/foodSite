<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Menu For Lanuch</title>

    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--Stylesheet-->
    <link rel="stylesheet" href="home_style71.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.2/datatables.min.css"/> -->

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/r-2.2.9/sc-2.0.5/sp-1.4.0/datatables.min.css"/> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.2/datatables.min.js"></script>
    <script src="popper.js"></script>
    <script src="bootstrap.min.js"></script>
    <!------------------------------------------------------------------------------------------------>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/r-2.2.9/sc-2.0.5/sp-1.4.0/datatables.min.js"></script> -->

    <!------------------------------------------------------------------------------------------------>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/r-2.2.9/sc-2.0.5/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/r-2.2.9/sc-2.0.5/datatables.min.js"></script>


</head>
<!--<div class = "send"> <i class='bx bx-send'></i> 
<a href="#display" data-toggle="modal"><i class='bx bx-show'></i><span>Display Orders</span></a>
</div>-->
<body>
    <div class="menu">
        <div class="heading">
            <h3>&mdash; Orders For Today &mdash; </h3>
            <div class = "log">
                <a href="logout.php"><i class='bx bx-log-out-circle'></i><span>logout</span></a>
            </div>
        </div>
        
        <div class = "menu_date">
            <img src="download.png" alt="GhanaDotCom">
            <p id = "date"><?php echo date("d/F/Y");?></p>
            <hr>
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
        <diV class = "container mb-3">
            <table id = "example" class="table table-striped table-border" style = "width: 100%">
            <thead>
                <th>Name</th>
                <th>Food</th>
            </thead>
            <tbody>
                <?php
                    require_once 'connect.php';

                    $today = date("Y-m-d");
                    $sql1 = "SELECT `order`.`id`, `order`.`date`, `firstname`, `lastname`, `email`, `food`, `time` FROM `order` LEFT JOIN `users` ON `users`.`id` = `order`.`user_id` LEFT JOIN `dish` ON `dish`.`id` = `order`.`food_id` WHERE `date` = '".$today."'";
                    $result1 = mysqli_query($conn, $sql1);
                    $queryResult = mysqli_num_rows($result1);
                    $count = 1;
                    if($queryResult > 0){
                        while ($check = mysqli_fetch_assoc($result1)){
                            echo "
                            <tr>
                                <td>".$check['firstname']." ".$check['lastname']."</td>
                                <td>".$check['food']."</td>
                            </tr>";
                            $count++;
                        }    
                    }
                    ?>
                </tbody>
                <tfooter>
                <th>Name</th>
                <th>Food</th>
            </tfooter>
            </table>
        </div>

    <form method = "POST" action = "view.php">
        <div class="d-grid gap-2 col-6 mx-auto">
            <div class="text-center">
                <a href="#sending" data-toggle="modal" class="btn btn-flat btn-primary mr-3 mb-3 send"><i class='bx bx-send'></i><span>Sender Order</span></a>
                <button type = "submit" name = "today" value = "today" class="btn btn-flat btn-primary mr-3 mb-3 today"><i class='bx bx-show'></i><span>Today's Orders</span></button>
                <button type = "submit" name = "previous"  value = "previous" class="btn btn-flat btn-primary mr-3 mb-3 pre"><i class='bx bxs-file-find' ></i><span>Previous Orders</span></button>
            </div>
        </div>
    </form>
</div>
<?php include 'send.php'; ?>

<script>
  $(document).ready( function () {
      $('#example').DataTable({
        // 'processing': false,
        // 'searching'   : false,
        // 'order'       :[[2, "desc"]],
        'responsive' : true,
        dom: 'Bfrtip',
        buttons: [
        'copy', 'excel', 'pdf', 'print'
    ]
      });
  } );

</script>
</body>
</html>