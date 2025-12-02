
<?php 
require_once"Partials/header.php";
require_once"adminguard.php";


$orders = $admin->fetch_all_orders();

// echo"<pre>";
// print_r($orders);
// echo"</pre>";

?>

    <!-- CONTAINER-->
    <div class="container-fluid">


      <div class="row mt-3">
        <!--SELLERS COL-->
        <div class="col-md-10 box">
          <div>
            <p class="adm"><a href="addmincustomer.html">Orders</a></p>
          </div>
          <div class="boxchild" style="overflow-x:auto;">
            <table class="table table-dark">
              
                   <tr>
                       <th scope="col">#</th>
                       <th scope="col">Customer Name</th>
                       <th scope="col"> Product</th>
                       <th scope="col">Phone</th>
                       <th scope="col">Status</th>
                       <th scope="col">Price</th>
                       <th scope="col">Quantity</th>
                       <th scope="col">Total</th>
                       <th scope="col">State</th>
                       <th scope="col">LGA</th>
                       <th scope="col">Address</th>
                   </tr>
               				  
                   <tbody>
                         <?php 
          if(empty($orders)){
                echo"<tr><td colspan='6'>No Products available yet!</td></tr>";
          }else{
              $sn = 1;
              foreach($orders as $order){
                // $order['order_status']?$order['order_status']:"";
          ?>
          <tr>
            <td><?php echo $sn ;?></td>
            <td><?php echo $order['user_fname']." ".$order['user_lname'];?></td>
            <td><?php echo $order['product_name'];?></td>
            <td><?php echo $order["user_phone"];?></td>
            <td><span class="">
					<?php if($order['pay_status']=='pending'){
						echo "<span class='badge bg-warning p-2'>".$order['pay_status']."</span>";
					}else{
						echo "<span class='badge bg-success p-2'>".$order['pay_status']."</span>";
					}?>
				</span></td>
            <td>&#8358;<?php echo number_format($order['prod_price'],2)?></td>
            <td><?php echo $order['detail_quantity']?></td>
            <td>&#8358;<?php echo number_format($order['order_totalamt'],2)?></td>
            <td><?php echo $order['state_name'];?></td>
            <td><?php echo $order['lga_name'];?></td>
            <td><?php echo nl2br($order['user_addr1'].'.'."\n".$order['user_addr2']);?></td>
          </tr>
          <?php 
            $sn++;
             }
          }
          ?>
                   </tbody>				  
                   </table>
        </div>
        </div>
      </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
  </body>
</html>
