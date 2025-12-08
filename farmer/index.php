<?php 
	session_start();
	require_once"Classes/Farmer.php";

	$farmer= new Farmer;

	$farmeronline = isset($_SESSION['farmeronline'])? $_SESSION['farmeronline']:"";

	$deets = $farmer->fetch_farmer_details($farmeronline);
	require_once"Partials/header.php";

	$products =$farmer->fetch_some_product();
	$farmers= $farmer->fetch_farmers();
	
	

// echo"<pre>";
// print_r($products);
// echo"</pre>";
?>
										<!--HOME -->

<section>
	<div class="row mt-5">
		<div class="col mb-5">
			<p class="hero-head mb-3 d-flex justify-content-center align-items-center fs-4"><a href="#home">FarmFoods</a></p>
			<p class="hero-txt d-flex justify-content-center align-items-center">get fresh foods directly from the farm...</p>
		</div>
	</div>

	<div class="row hero">
		<div class="col-12 d-flex justify-content-center align-items-center">
			<img src="assets/images/food_rbg3.png" class="img-1" alt="farm foods">
				<img src="assets/images/home1-rbg.png" class="img-fluid img-2">
					<img src="assets/images/food_rbg2.png" class="img-3 " alt="farm foods">
		</div>
		</div>


<div class="row">
	<div class="col" align="">
			<a href="signup.php" type="button" class="home-btn py-2 text-center col-8 offset-2">Join FarmFoods</a>
		</div>
		</div>
</div>
</section>
</div>
<br>
<br>
<br>
<br>
				
		

				<!--FEATURED PRODUCTS -->
			
<div class="container-fluid mt-3">
					<!-- ROW -->
<section>
<div class="row mb-4">
<div class="col">
	<h2 class=" mb-3 ft-prdt">Our featured products</h2>
</div>
</div>

<div class="row mb-3">
<?php  foreach($products as $product){?>
	
		<div class="col-md-4 mb-3">
                    <div class="card h-100 product_card">
                        <img src="assets/uploads/<?php echo $product['product_image'] ?>" class="card-img-top" alt="image"  height="280">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo ucfirst($product['product_name'])?></h5>
                            <p class="card-text"><?php echo $product['category_name'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">   
				<p class="h6 text-success">&#8358;<?php echo number_format($product['prod_price'],2) ?></p>

				<!-- <button class="btn btn-success ft-btn" name="indexbtn" > View Product</button> -->
                            </div>
                        </div>
                    </div>
                </div>
	
	<?php } ?>
</div>		

</section>
</div>

			<br>
			<br>
			<br>
	   					
			<!-- TOP FARMERS -->
<section>
<div class="container-fluid">
<div class="row">
	<div class="col-12">
		<p class="ft-prdt">top farmers</p>
	</div>
	<div class="col-12">
		<p class="tf-para">FarmFoods celebrates farmers who excel at what they do providing good,fresh farm foods.</p>
	</div>
</div>

<div class="row">
	<?php foreach($farmers as $fm){?>
			<div class="col-md-4 mb-3">
                    <div class="card h-100 product_card">
                        <img src="assets/uploads/<?php echo $fm['user_dp']?>" class="card-img-top" alt="image"  height="280">
                        <div class="card-body">
                            <h5 class="card-title">Farmer Name: <?php echo $fm['user_fname']." ".$fm['user_lname'] ?></h5>
                            <p class="card-text">State: <?php echo $fm['state_name']?></p>
                        </div>
                    </div>
                </div>
<?php }?>
</div>
</section>
<br>
<br>
<br>
<br>
															
							<!--TOP SELLING FARM FOODS -->
              <div class="row ps-3 pe-3">
				<div class="col-sm-12">
						<p class="ft-prdt tsp ms-3">top selling products</p>
					</div>
<section>
<div class="row mb-3">
<?php  foreach($products as $product){?>
	<div class="col-md-4 mb-3">
                    <div class="card h-100 product_card">
                        <img src="assets/uploads/<?php echo $product['product_image']?>" class="card-img-top" alt="image"  height="280">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['category_name'] ?></h5>
                            <p class="card-text"><?php echo ucfirst($product['product_name']) ?></p>
                            <div class="d-flex justify-content-between align-items-center">   
				<p class="h6 text-success">&#8358;<?php echo number_format($product['prod_price'],2) ?></p>

				<!-- <button class="btn btn-success ft-btn" name="indexbtn" > View Product</button> -->
                            </div>
                        </div>
                    </div>
                </div>
	

	<?php } ?>
</div>
</section>

										<br>
										<br>
										<br>
										<br>
<?php require_once"Partials/footer.php"?>										

												
	
