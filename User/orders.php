<?php 
session_start();
require_once"userguard.php";
require_once"Classes/Buyer.php";

	$buyer= new Buyer;
	$deets = $buyer->fetch_buyer_details($_SESSION['buyeronline']);


require_once"Partials/header.php";
require_once"Partials/dash.php";
$total_orders = $buyer->total_orders($_SESSION['buyeronline']);
// $order_details= $buyer-> total_orders_details($_SESSION['buyeronline']);

// echo"<pre>";
// print_r($total_orders);
// echo"</pre>";
// ?>
<body>
			<div class="container ">
					<!-- NAVBAR-->
				
																										<!--CONTAINER -->
				 <div class="">
				 	 <div class="row bg-white my-5">	
				 				<div class="col my-2">
				 					<p class="text-success fs-1">Orders</p>
				 				</div>

		<section>
			<div class="row">
				<div class="col-md-10 offset-md-1" style="overflow-x:auto">
			<table class="table table-striped table-bordered">
				<thead >
					<th> S/N </th>
					<th>Amount</th>
					<th>Order_date</th>
					<th>Action</th>
					
				</thead>
				<tbody>
						
					<?php if($total_orders){?>
						
						<?php
						$status="";
						 $count=1; 
						foreach($total_orders as $ord){?>
																		
								<tr>
								<td><?php echo $count++;?></td>
								<td>&#8358;<?php echo number_format($ord['order_totalamt'],2) ?></td>
								<td><?php echo $ord['formatted_date'] ?></td>
								<td>
									<form action="orders_details.php" method="post">
										<input type="hidden" name="order_id" value="<?php echo $ord['order_id']?>">
									<button class="btn btn-warning">View Details</button>
								</form>
								</td>
							</tr>
							<?php }?>
				<?php }else{?>
					<td colspan="12">No orders available yet.</td>
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