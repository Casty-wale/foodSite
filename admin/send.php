<?php

    if(isset($_GET['return'])){
        $return = $_GET['return'];
        
    }
    else{
        $return = 'test.php';
    }
?>

<!-- Sending Order as SMS -->

<div class="modal" id="sending">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Orders For Today</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form method = "POST" action = "sent.php">
                <div class="input-group mb-3">
                    <input type="text" name="number" class="form-control" placeholder="Recipient's Number eg: (02041....)" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                </div>
                <?php
                    include ('connect.php');
                    $today = date("Y-m-d");
                    $sql2 = "SELECT `order`.`id`, `order`.`date`, `firstname`, `lastname`, `email`, `food` FROM `order` LEFT JOIN `users` ON `users`.`id` = `order`.`user_id` LEFT JOIN `dish` ON `dish`.`id` = `order`.`food_id` WHERE `date` = '".$today."'";
                    $result2 = mysqli_query($conn, $sql2);
                    $queryResult = mysqli_num_rows($result2);
                    $take = array();
                    ?>
                    <table id = "example" class="table table-striped table-border" style = "width: 100%">
                    <thead>
                        <th>Name</th>
                        <th>Food</th>
                    </thead>
                    <tbody>
                    <?php
                        $mon = 0;
                        if($queryResult > 0){
                            while($DeOrders = mysqli_fetch_assoc($result2)){
                                array_push($take, [
                                    "fn" => $DeOrders['firstname']." ".$DeOrders['lastname'],
                                    "food" => $DeOrders['food']]
                                    );
                                echo "
                                <tr>
                                    <td>".$DeOrders['firstname']." ".$DeOrders['lastname']."</td>
                                    <td>".$DeOrders['food']."</td>
                                </tr>";
                                $mon++;
                            }
                        }
                        else{
                            echo "You have no orders.";
                        }
                    ?>
                    </tbody>
                    </table>
                    <input type = "hidden" name = "num" value = "<?php echo $mon;?>"/>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-flat pull-left" name = "send"><i class="bx bx-send"></i> Send</button>
                        <button type="button" class="btn btn-secondary btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
