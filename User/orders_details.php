<?php 
session_start();
require_once"userguard.php";
require_once"classes/Buyer.php";

	$buyer= new Buyer;
	$deets = $buyer->fetch_buyer_details($_SESSION['buyeronline']);


require_once"partials/header.php";
require_once"partials/dash.php";



if(isset($_POST['order_id'])){
    $detail_id= $_POST['order_id'];
 
}

$total_orders = $buyer->total_orders($_SESSION['buyeronline']);
$ord= $buyer->total_orders_details($detail_id);



// echo"<pre>";
// print_r($ord);
// echo"</pre>";
// die();
?>
			<div class="container ">
		 <div class="">
				 	 <div class="row bg-white my-5">	
				 				<div class="col my-3">
				 					<h2 class="text-success">Orders Details</h2>
				 				</div>
                                

				<section>
					<div class="row my-3">
				
		<div class="col-md-10 offset-md-1" style="overflow-x:auto">
			<table class="table table-striped table-bordered table-hover">
				<thead >
					<th> # </th>
					<th>Farmer</th>
					<th>Name</th>
					<th>Product</th>
					<th>Image</th>
					<th>State</th>
					<th>LGA</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Status</th>
					<th>Total Amount</th>
					<th>Date</th>
				</thead>
				<tbody>
					
		
						
					<?php 
					if($ord){
						$count=1; 
						foreach($ord as $or){
						
						?>
						<tr class="text-center">
							<td><?php echo $count++;?></td>
								<td><img src="../farmer/assets/uploads/<?php echo $or['farmer_dp']?>" alt="" class="rounded" width="100" height="100"></td>
								<td><?php echo $or['farmer_fname']." ".$or['farmer_lname'] ?></td>
								<td><?php echo $or['product_name'] ?></td>
								<td><img src="../farmer/assets/uploads/<?php echo $or['product_image']?>" class="rounded" alt="" width="100" height="100"></td>
								<td><?php echo $or['farmer_state'] ?></td>
								<td><?php echo $or['farmer_lga_name'] ?></td>
								<td>&#8358;<?php echo number_format($or['prod_price'],2) ?></td>
								<td><?php echo $or['detail_quantity'] ?></td>
								<td><span class="">
					<?php if($or['pay_status']=='pending'){
						echo "<span class='badge bg-warning p-2'>".$or['pay_status']."</span>";
					}else{
						echo "<span class='badge bg-success p-2'>".$or['pay_status']."</span>";
					}?>
				</span></td>
				<td><?php echo number_format($or['order_totalamt'],2) ?></td>
				<td><?php echo $or['formatted_date'] ?></td>
							</tr>
							<?php }?>
				<?php }else{?>
					<td colspan="10" rowspan="5">No orders available yet.</td>
			    <?php }?>
					 </tr>		
		</table>
	</div>
</section>
</div>
</div>

<?php 
require_once"partials/footer.php";
?>