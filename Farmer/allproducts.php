
<?php 
session_start();
require_once"userguard.php";

require_once"classes/Farmer.php";
$farmer = new Farmer;
$deets = $farmer->fetch_farmer_details($_SESSION['farmeronline']);
$products=$farmer->fetch_farmer_product($_SESSION['farmeronline']);

// echo"<pre>";
// print_r($products);
// echo"</pre>";

require_once"partials/header.php";
require_once"partials/dash.php";

$category = $farmer->fetch_category();
$product = $farmer->fetch_all_product();


?>

<div class="container-fluid mb-5">

							<!-- MID ROW-->
			 	<div class="row">
				<div class="col mid my-4">
		<?php 
			if(isset($_SESSION['farmerror'])){
				echo "<p class='alert alert-danger'>".$_SESSION['farmerror']."</p>";
				unset($_SESSION['farmerror']);
			}

				if(isset($_SESSION['farmmessage'])){
				echo "<p class='alert alert-success'>".$_SESSION['farmmessage']."</p>";
				unset($_SESSION['farmmessage']);
			}

			
	?>
				</div>
			</div>
		<div class="row bg-white p-2">
			<div class="col-12 ">
					<h3 class="text-success">All Products</h3>
			</div>
				
			<div class="col col-sm-10 offset-sm-1" style="overflow-x:auto">
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Price</th>
						<th>Image</th>
						<th>Category</th>
						<th>Date Added</th>
						<th>Action</th>
					</tr>
							
						<?php 
						if(empty($products)){
								echo"<tr><td colspan='8'>No Products available yet!</td></tr>";
						}else{
						$counter= 1; foreach($products as $pd){ ?>
					<tr>
							<td><?php echo $counter++; ?></td>
							<td><?php echo $pd['product_name']?></td>
							<td>&#8358;<?php echo number_format($pd['prod_price'],2)?></td>
							<td><img src="assets/uploads/<?php echo $pd['product_image']?>" width="100" class="rounded"></td>
							<td><?php echo $pd['category_name']?></td>
							<td><?php echo $pd['formatted_date']?></td>
							<td>
							
								<!-- Button trigger modal -->
						<a name="edit" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $pd['prod_id'] ?>">
								Edit product
						</a>
								<!-- Modal -->
								<div class="modal fade" id="editModal<?php echo $pd['prod_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="editModalLabel<?php echo $pd['prod_id'] ?>"> Edit Product</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
											<form action="process/process_edit.php" method="post">
												<input type="hidden" name="prod_id" value="<?php echo $pd['prod_id']?>">
												<div class="mb-3">
													<label for="category" class="">Update Category: </label>
														<select name="category" id="category" class="form-select" >
														<option value=''>Select Category</option>
														<?php 
															foreach($category as $cat){
																?>
															 <option value="<?php echo $cat["category_id"]?>"	
															 <?php if($cat['category_id'] == $pd['category_id']) echo 'selected'?>>
																<?php echo $cat['category_name']?>
															</option> 
														<?php
															}
														?>
														</select>
												</div>
												<div class="mb-3">
													<select name="product" id="product" class="form-select" value="<?php echo $pd['product_name']?>">
													<option value="">Select Products</option>
													<?php 
														foreach($product as $p){
															?>
														<option value="<?php echo $p["prod_id"]?>" 
														<?php if($p['prod_id'] == $pd['prod_id']) echo 'selected'?>>
															<?php echo $p["product_name"]?>
														</option>
													<?php
														}
													?>
													</select>
												</div>
												<div class="mb-3">
													<label for="price" class="">Update Price: </label>
													<input type="text" name="price" id="price" class="form-control" value="<?php echo $pd['prod_price']?>">
												</div>
												
												<div class="mb-5">
													<label for="detail" class="">Update Product Description:</label>
													<textarea name="detail" id="detail" class="form-control"><?php echo $pd["product_detail"]?></textarea>
												</div>
											<div class="row">
												<div class="col">
													<button type="submit" name="editbtn" class="btn col-12 text-white" style="background-color:green">Update Product</button>
												</div>
											</div>
									</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									</div>
									</div>
								</div>
								</div>
							</td>
					</tr>
					<?php }} ?>
				</table>
			</div>
		</div>

 </div>

		
		<script src="Assets/jquery.js"></script>
    <script>
    $(function(){
		

		        $('#category').change(function(){
        var categoryid = $(this).val();
              // alert(categoryid);
			if(category){
				$('#product').load("process/process_products.php",{category:categoryid},function(data,status,xhr){
					if(status == "error"){
						$('#procuct').html('<option value="">Error loading Products</option>')
							console.log(status)
					}
				});

			}else{
				$('#product').html('<option value="">Select Products</option>')
			}  
        });

    });
</script>
<?php require_once"partials/footer.php";?>