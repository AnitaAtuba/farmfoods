<?php 
session_start();
require_once"userguard.php";
require_once"classes/Farmer.php";

	$farmer= new Farmer;
	$deets = $farmer->fetch_farmer_details($_SESSION['farmeronline']);


require_once"partials/header.php";
require_once"partials/dash.php";
$total_orders = $farmer->total_orders($_SESSION['farmeronline']);
$order_detail= $farmer->orders_details($_SESSION['farmeronline']);

// echo"<pre>";
// print_r($order_detail);
// echo"</pre>";
?>

			<div class="container ">
					<!-- NAVBAR-->
																								<!-- DIVIDE-->
				 </div> 
				  	<div class="row">
				<div class="col mid my-4"></div>
			</div>
																										<!--CONTAINER -->
				 <div class="container mb-5">
				 	 <div class="row bg-white p-2">	
				 				<div class="">
				 					<p class="text-success fs-2">Orders</p>
				 				</div>
			
									

<section>
	<div class="row">
		<div class="col-sm-10 offset-sm-1" style="overflow-x:auto">
			<table class="table table-striped table-bordered table-hover">
				<thead >
					<th> # </th>
					<th>Name</th>
					<th>Customer</th>
					<th>Product</th>
					<th>Image</th>
					<th>Address</th>
					<th>Amount</th>
					<th>Quantity</th>
					<th>Order date</th>
				</thead>
				<tbody>
					<tr>
						
	<?php if($order_detail){?>
		<?php $count=1; foreach($order_detail as $ord){?>
							<tr>
								<td><?php echo $count++;?></td>
								<td><?php echo $ord['user_fname']." ".$ord['user_lname'] ?></td>
								<td><img src="../User/assets/uploads/<?php echo $ord['user_dp']?>" alt="" width="100%" height="50" class="rounded"></td>
								<td><?php echo $ord['product_name'] ?></td>
								<td><img src="assets/uploads/<?php echo $ord['product_image']?>" alt="" width="100%" height="50" class="rounded"></td>
								<td><?php echo $ord['user_addr1'] ?></td>
								<td><?php echo $ord['prod_price'] ?></td>
								<td><?php echo $ord['detail_quantity'] ?></td>
								<td><?php echo $ord['formatted_order_date'] ?></td>
								<td><span class="">
					<?php if($ord['pay_status']=='pending'){
						echo "<span class='badge bg-warning p-2'>".$ord['pay_status']."</span>";
					}else{
						echo "<span class='badge bg-success p-2'>".$ord['pay_status']."</span>";
					}?>
				</span></td>
							</tr>
							<?php }?>
				<?php }else{?>
					<td colspan="10" rowspan="5">No orders available yet.</td>
			<?php }?>

					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
</section>
</div>
</div>

<?php 
require_once"partials/footer.php";
?>