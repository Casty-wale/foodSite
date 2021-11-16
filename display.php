<?php

  
?>
<!-- Today's Orders -->
<div class="modal" id="Today_display">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Today's Order</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <?php
                $today = date("Y-m-d");
                $sql2 = "SELECT `order`.`id`, `order`.`date`, `firstname`, `lastname`, `email`, `food` FROM `order` LEFT JOIN `users` ON `users`.`id` = `order`.`user_id` LEFT JOIN `dish` ON `dish`.`id` = `order`.`food_id` WHERE `user_id` = ".$user['id']." AND `date` = '".$today."'";
                $result2 = mysqli_query($conn, $sql2);
                $queryResult = mysqli_num_rows($result2);?>
                <table id = "example" class="cell-border compact stripe">
                  <thead>
                      <th>Name</th>
                      <th>Food</th>
                      <th>Date</th>
                  </thead>
                  <tbody>
                  <?php
                      if($queryResult > 0){
                          while($DeOrders = mysqli_fetch_array($result2)){
                              echo "
                              <tr>
                                  <td>".$DeOrders['firstname']." ".$DeOrders['lastname']."</td>
                                  <td>".$DeOrders['food']."</td>
                                  <td>".$DeOrders['date']."</td>
                              </tr>";
                          }
                      }
                      else{
                          echo "No orders Today.";
                      }
                  ?>
                  </tbody>
                </table>
            </div>
            <div class="modal-footer">
        <?php $timing = date("His");
        
            if($timing < 100000){ ?>
                <form method="POST" action="order.php">
                    <button type="submit" class="btn btn-danger btn-flat pull-left" name = "delete"><i class="fa fa-close"></i> Delete Order</button>
                </form>
            <?php } ?>
              <button type="button" class="btn btn-secondary btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Full Order Result -->
<div class="modal" id="Full_display">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Previous Orders</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <?php
                $sql2 = "SELECT `order`.`id`, `order`.`date`, `firstname`, `lastname`, `email`, `food` FROM `order` LEFT JOIN `users` ON `users`.`id` = `order`.`user_id` LEFT JOIN `dish` ON `dish`.`id` = `order`.`food_id` WHERE `user_id` = ".$user['id'];
                $result2 = mysqli_query($conn, $sql2);
                $queryResult = mysqli_num_rows($result2);
                ?>
                <table id = "myexample" class="cell-border compact stripe">
                  <thead>
                      <th>Name</th>
                      <th>Food</th>
                      <th>Date</th>
                  </thead>
                  <tbody>
                  <?php
                      if($queryResult > 0){
                          while($DeOrders = mysqli_fetch_array($result2)){
                              echo "
                              <tr>
                                  <td>".$DeOrders['firstname']." ".$DeOrders['lastname']."</td>
                                  <td>".$DeOrders['food']."</td>
                                  <td>".$DeOrders['date']."</td>
                              </tr>";
                          }
                      }
                      else{
                          echo "You have no orders.";
                      }
                  ?>
                  </tbody>
                </table>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready( function () {
      $('#example').DataTable({
        'processing': false,
        'searching'   : false,
        'bPaginate' : false,
        'bInfo' : false,
        'order'       :[[2, "desc"]]
      });
  } );
  $(document).ready( function () {
      $('#myexample').DataTable({
        'processing': false,
        'searching'   : false,
        'bPaginate' : false,
        'bInfo' : false,
        'order'       :[[2, "desc"]]
      });
  } );

</script>