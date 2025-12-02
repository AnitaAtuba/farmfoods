<?php 
session_start();
require_once"userguard.php";
require_once"Classes/Farmer.php";

	$farmer= new Farmer;
	$deets = $farmer->fetch_farmer_details($_SESSION['farmeronline']);



require_once"Partials/header.php";
require_once"Partials/dash.php";
// $states=$farmer->fetch_states();
$total_cust = $farmer->total_customers($_SESSION['farmeronline']);
$total_orders = $farmer->total_orders($_SESSION['farmeronline']);
$new_prod = $farmer->new_products($_SESSION['farmeronline']);
$orders= $farmer->all_orders($_SESSION['farmeronline']);
$total_products = $farmer->total_products($_SESSION['farmeronline']);


// echo"<pre>";
// print_r($total_cust);
// echo"</pre>";
?>


									<!-- CONTAINER-->
		<div class="container-fluid ">

		<!--MID ROW-->
	<div class="row">
	<div class="col mid m-2"></div>
</div>
</div>
		<div class="container-fluid">
<section>
<div class="row mt-3 mb-4">
<div class="col-sm-4" align="center">	
				<div class="col-sm-12 shadow col-md-10 product_card border border-subtle  py-2">
					<i class="fa-solid fa-users fs-3">  </i>
					<div>	
					<p class="text-success">Total customers</p>
				</div>
				<div >
					<?php if($total_cust){?>
						<p><?php echo $total_cust?></p>
						<?php }else{?>
							<span>No customer available.</span>
							<?php }?>
				</div>
					</div>
</div>
<div class="col-sm-4" align="center">	
	<div class="col-sm-12 shadow col-md-10 py-2 product_card border border-subtle">	
			<i class="fa-solid fa-people-carry-box fs-3"></i>
						<div >	
							<p class="text-success">Total Orders</p>
							</div>
								<div>
									<?php if($total_orders){?>
									<p><?php echo $total_orders?></p>
									<?php }else{?>
										<span>No orders available.</span>
									<?php }?>
								</div>
						</div>
                   </div>

<div class="col-sm-4 " align="center">	
	<div class="col-sm-12 shadow col-md-10 product_card py-2 m-1 border border-subtle">	
			<i class="fa-solid fa-solid fa-box fs-3"> </i>
						<div>	
							<p class="text-success">Total Products</p>
							</div>
								<?php if($total_products){?>
									<p><?php echo $total_products?></p>
									<?php }else{?>
										<span>No orders available yet.</span>
								<?php }?>
						</div>
					</div>
					</div>
					


					<!--NEW ADDED PRODUCTS-->

			<div class="row ">
					<div class="">
							<div class="col total p-2">
								<p class="text-success fs-5">New Added Products</p>
							<div >
						<table class="table table-striped table-bordered table-hover shadow">
						<thead>
						<tr>
						<th>#</th>
						<th>product name</th>
						<th>price</th>
						<th>category</th>
						<th>Date</th>
						</tr>
						</thead>
						<tbody>
						<?php $count=1; foreach($new_prod as $pd){ ?>

						<tr>
						<td><?php echo $count++; ?></td>
						<td><?php echo $pd['product_name']?></td>
						<td>&#8358;<?php  echo number_format($pd['prod_price'],2)?></td>
						<td><?php echo $pd['category_name']?></td>
						<td><?php echo $pd['date_uploaded']?></td>

						</tr>

						<?php }?>
						</tbody>
						</table>
						</div>
						</div>
						</div>
			</div>
	
</section>
				<!--ORDERS  -->
					<section>
						<div class="row mb-5 "  >
							<div class="col-sm-12 total p-3 mt-4 " style="overflow-x:auto">
								<i class="fa-solid fa-list pb-3">Order List</i>
								<table class="col-sm-12 table table-striped table-bordered shadow">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Customer Name</th>
				<th scope="col">Address</th>
				<th scope="col">product</th>
				<th scope="col">Phone</th>
				<th scope="col">status</th>
				
			</tr>
			</thead>
			<tbody>

<?php if($orders){?>
<?php $count=1; foreach($orders as $ord){?>
			<tr>
				<th><?php echo $count++;?></th>
				<td><?php echo $ord['user_fname']." ".$ord['user_lname'] ?></td>
				<td><?php echo $ord['user_addr1'] ?></td>
				<td><?php echo $ord['product_name'] ?></td>
				<td><?php echo $ord['user_phone'] ?></td>
				<!-- <td><?php echo $ord['user_email'] ?></td> -->
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

			</tbody>
		</table>
</div>
</div>
</section>
</div>

</div>
<?php 
require_once"Partials/footer.php";
?>