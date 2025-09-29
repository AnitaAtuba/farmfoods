<?php 
session_start();
require_once"classes/Farmer.php";


	$farmer= new Farmer;
	$deets = $farmer->fetch_farmer_details($_SESSION['farmeronline']);


require_once"partials/header.php";
require_once"partials/dash.php";

?>

		<div class="container-fluid">
							
			
							<!--MID ROW-->
			 	<div class="row mt-3">
				<div class="col mid"></div>
			</div>
		
			<!--ABOUT  BODY -->
		
<section>
	<div class="row mb-5 bg-white my-5">
		<div class="col-sm-12 mt-4">
			<p class="text-success fs-3">About Us</p>
		</div>
		<div class="col-sm-12 col-md-6">
			<img src="assets/images/farmer1.jpg" class="img-fluid"  alt="farm man">
		</div>
		<div class="col-sm-12 col-md-6 about-parent mt-4">
			<div class="about-box ">
				<h3 class="about-head text-success mb-4">WANT FRESH FARM FOODS? FarmFoods CONNECTS YOU TO THE BEST FARMERS ACROSS THE COUNTRY.</h3>
			</div>
			<div class="about-box">
				<p class="about-txt p-4">FarmFoods was born out of the neccessity to eliminte high food cost in the country. In recent years inflation doubled the cost of living and feeding. Traders also contributed their part by doubling or tripking the cost of food farmers sell. FarmFoods eliminates middleman cost, provides job oppurtunities and provides healthy food for the community.</p>
			</div>
</div>
</div>
</section>
	</div>	
	</body>			
<?php 
		require_once "partials/footer.php";
?>