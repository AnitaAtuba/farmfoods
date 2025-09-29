
<?php 
require_once"partials/header.php";
require_once"adminguard.php";


$sellers =$admin->fetch_some_sellers();
$buyers =$admin->fetch_some_customers();
$orders = $admin->fetch_all_orders();
$products = $admin->fetch_some_products();



// echo"<pre>";
// print_r($orders);
// echo"</pre>";
$deets = $admin->fetch_admin_details($_SESSION['adminonline']);

?>


				<!-- CONTAINER-->
<div class="container-fluid">
		<div class="row">
			<div class="col">
					<?php 
			if(isset($_SESSION['adminerror'])){
				echo "<p class='alert alert-danger'>".$_SESSION['adminerror']."</p>";
				unset($_SESSION['adminerror']);
			}

				if(isset($_SESSION['adminsuccess'])){
				echo "<p class='alert alert-success'>".$_SESSION['adminsuccess']."</p>";
				unset($_SESSION['adminsuccess']);
			}
			?>
			</div>
		</div>		
		
		
			<!--SELLERS-->  		
<div class="row  mt-3">     
<div class="col-md-10 offset-md-2 box mb-4">
						<div>
							<p class=""><a href="adminsellers.php">Sellers</a></p>
							<span ><a href="adminsellers.php " class="btn btn-success btn-sm mb-2">See All Sellers</a></span>
						</div>
						<div class="boxchild">
						<table class="table table-dark">
						<tr>
							<th>S/N</th>
							<th>FullName</th>
							<th>Account</th>
							<th>phone</th>
							<th>State</th>
							<th>LGA</th>
						</tr>
						<tbody>
						<?php 
						if(empty($sellers)){
								echo"<tr><td colspan='5'>No sellers has been added yet!</td></tr>";
						}else{
							$sn = 1;
							foreach($sellers as $seller){
						?>
						<tr>
							<td><?php echo $sn ;?></td>
							<td><?php echo $seller['user_fname'].' '.$seller['user_lname'];?></td>
							<td><?php echo $seller['role'];?></td>
							<td><?php echo $seller['user_phone'];?></td>
							<td><?php echo $seller['state_name'];?></td>
							<td><?php echo $seller['lga_name'];?></td>
						</tr>
						<?php 
							$sn++;
							}
						}
						?>			  
						</table>
							</div>
						</div>
	
        <!--CUSTOMERS-->
<div class="col-md-10 offset-md-2 box mb-4">
				<div>
							<p class=""><a href="adminbuyers.php">Buyers</a></p>
							<span ><a href="adminbuyers.php " class="btn btn-success btn-sm mb-2">See All Buyers</a></span>
						</div>
						<div class="boxchild">
						<table class="table table-dark">
						<tr>
							<th>S/N</th>
							<th>FullName</th>
							<th>Account</th>
							<th>phone</th>
							<th>State</th>
							<th>LGA</th>
						</tr>
						<tbody>
						<?php 
						if(empty($buyers)){
								echo"<tr><td colspan='5'>No sellers has been added yet!</td></tr>";
						}else{
							$sn = 1;
							foreach($buyers as $buyer){
						?>
						<tr>
							<td><?php echo $sn ;?></td>
							<td><?php echo $buyer['user_fname'].' '.$buyer['user_lname'];?></td>
							<td><?php echo $buyer['role'];?></td>
							<td><?php echo $buyer['user_phone'];?></td>
							<td><?php echo $buyer['state_name'];?></td>
							<td><?php echo $buyer['lga_name'];?></td>
						</tr>
						<?php 
							$sn++;
							}
						}
						?>			  
						</table>
					</div>
					</div>
                   </div> 
					<br>
					<br>
				
 <!--PRODUCTS-->
<div class="row">
<div class="col-md-10 offset-md-2 box mb-4">
					<div>
						<p class=""><a href="adminproduct.php">Products</a></p>
						<span ><a href="adminproduct.php" class="btn btn-success btn-sm mb-2">See All Proucts</a></span>
					</div>
					<div class="boxchild">
						<table class="table table-dark">
						       <tr>
                       <th scope="col">#</th>
                       <th scope="col">Name</th>
                       <th scope="col">Price</th>
                       <th scope="col">Category</th>
                       <th scope="col">Date</th>
                       <th scope="col">Seller</th>
                   </tr>		  
                   <tbody>	
					<?php 
					if(empty($products)){
							echo"<tr><td colspan='6'>No Products available yet!</td></tr>";
					}else{
						$sn = 1;
						foreach($products as $product){
					?>
					<tr>
						<td><?php echo $sn ;?></td>
						<td><?php echo $product['product_name'];?></td>
						<td>&#8358;<?php echo number_format( $product['prod_price'],2);?></td>
						<td><?php echo $product["category_name"];?></td>
						<td><?php echo $product['date_uploaded'];?></td>
						<td><?php echo $product['user_fname']." ".$product['user_lname'];?></td>
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

	<!--ORDERS COL-->
<div class="col-md-10 offset-md-2 box mb-4">
					<div>
						<p class=""><a href="adminorder.php">Orders</a></p>
						<span ><a href="adminorder.php" class="btn btn-success btn-sm mb-2">See All Orders</a></span>
						</div>
					<div class="boxchild">
						<table class="table table-dark">
					 <tr>
                       <th scope="col">#</th>
                       <th scope="col">Customer Name</th>
                       <th scope="col">Order Name</th>
                       <th scope="col">Order State</th>
                       <th scope="col">Order City</th>
                       <th scope="col">Order Status</th>
                   </tr>	  
                   <tbody>
					<?php 
					if(empty($orders)){
							echo"<tr><td colspan='6'>No Products available yet!</td></tr>";
					}else{
						$sn = 1;
						foreach($orders as $order){
							
					?>
					 <tr>
            <td><?php echo $sn ;?></td>
            <td><?php echo $order['user_fname']." ".$order['user_lname'];?></td>
            <td><?php echo $order['product_name'];?></td>
            <td><?php echo $order["user_phone"];?></td>
            <td><?php echo number_format($order['order_totalamt'],2)?></td>
            <td><?php echo $order['user_addr1'];?></td>
          </tr>
					<?php 
						$sn++;
						}
					}
					?>
                   </tbody>	
					</tbody>				  
				    </table>
					</div>
				</div>
</div>
				
</div>
<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
