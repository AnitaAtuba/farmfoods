<?php 
session_start();

// require_once"userguard.php";
require_once"Classes/Buyer.php";

$buyer = new Buyer;
$deets = $buyer->fetch_buyer_details($_SESSION['buyeronline']);

require_once"Partials/header.php";
require_once"Partials/dash.php";


?>
	<title>BuyFarm | contact</title>

<body>
		<div class="container-fluid">
																																	<!---NAVBAR-->
			<div class="row mt-4">
				<div class="col mid">	
					<!-- NAVBAR -->
										
		  				</div>
			
													
			<!--CONTACT BODY -->
<section>
	<div class="container box my-5">
		<div class="row mid2">
			<div class="col-md-6 mb-4">
				<img src="assets/images/customer2-rbg.png" class="img-fluid" alt="customer care" class=" rounded">
			</div>
			<div class="col-md-6 border border-subtle">
				
							<!--FORM -->
				<form class="mt-3" action="#" method="post" >
					<div>
					<h4 class="text-success">CONTACT US</h4>
					<!-- <p class="txt"> Get in touch with our team to learn more about BuyFarm</p> -->
				</div>
		<div class="row">
				 <div class="col-md-6 mb-2" >
					<label for="first-name" class="form-label text-success">First Name :</label>
						<input type="text" class="form-control border border-subtle" id="">
		  </div>		
					   <div class="col-md-6 mb-2">
					<label for="last-name" class="form-label  text-success">Last Name :</label>
				<input type="text" class="form-control border border-subtle" id="">
		  </div>	
		</div>		

  <div class="col-12 mb-2">
<label for="email" class="form-label text-success">Email :</label>
<input type="email" class="form-control border border-subtle" id="email" required>
</div>

<div class="col-12 mb-2">
<label for="addr" class="form-label text-success">State :</label>
<input type="text" class="form-control border border-subtle" id="addr" placeholder="Eden state">
</div>
  <div class="mb-4">
	  <span class="txt mt-2 text-success">Tell us why you're contacting BuyFarm...</span>
	  <textarea class="rounded form-control">
	  </textarea>
  </div>
<div class="col-9 mb-2 ">
<button  class=" button btn btn-success col-11 ">Submit</button>
</div>
</form>
			</div>
		</div>
	</div>
</section>
																<!--FOOTER -->

</div>
</div>
<?php 
require_once"Partials/footer.php";
?>