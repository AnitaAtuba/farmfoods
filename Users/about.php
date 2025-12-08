<?php 
session_start();
// require_once"userguard.php";
require_once"Classes/buyer.php";


	$buyer= new Buyer;
	$deets = $buyer->fetch_buyer_details($_SESSION['buyeronline']);


require_once"Partials/header.php";
require_once"Partials/dash.php";

?>
<body>
		<div class="container-fluid">
							
			
							<!--MID ROW-->
			 	<div class="row mt-3">
				<div class="col mid"></div>
			</div>
		
			<!--ABOUT  BODY -->
		
<section>
	<div class="row box mb-5">
		<div class="col-sm-12 mt-4">
			<h4>About Us</h4>
		</div>
		<div class="col-sm-12 col-md-7">
			<img src="Assets/images/farmer1.jpg" class="img-fluid"  alt="farm man">
		</div>
		<div class="col-sm-12 col-md-5 about-parent mt-4">
			<div class="about-box">
				<h5 class="about-head text-success">WANT FRESH FARM FOOD? BUYFARM CONNECTS YOU TO THE BEST buyerS ACROSS THE COUNTRY.</h5>
			</div>
			<div class="about-box">
				<span class="about-txt">BuyFarm was born out of the neccessity to eliminate high food cost in the country. In recent years inflation doubled the cost of living and feeding. Traders also contributed their part by doubling or tripking the cost of food buyers sell. BuyFarm eliminates middleman cost, provides job oppurtunities and provides healthy food for the community.</span>
			</div>
		</div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
</div>
</section>
	</div>	
	</body>			
<?php 
		require_once "Partials/footer.php";
?>