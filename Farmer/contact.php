<?php 
session_start();

require_once"classes/Farmer.php";

$farmer = new Farmer;
$deets = $farmer->fetch_farmer_details($_SESSION['farmeronline']);

require_once"partials/header.php";
require_once"partials/dash.php";


?>
		<div class="container-fluid">
																																	<!---NAVBAR-->
			<div class="row mt-4">
				<div class="col mid">	
					<!-- NAVBAR -->
										
		  				</div>
			
													
			<!--CONTACT BODY -->
<section>
	<div class="container box my-5">
		<div class="row">
			<div class="col-md-6 mb-4 bg-white">
				<img src="assets/images/customer2-rbg.png" class="img-fluid" alt="customer care" class=" rounded">
			</div>
			<div class="col-md-6 border border-subtle bg-white">
				
							<!--FORM -->
				<form class="mt-3" action="#" method="post" >
					<div>
					<h4 class="text-success">CONTACT US</h4>
					<!-- <p class="txt"> Get in touch with our team to learn more about FarmFoods</p> -->
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
	  <span class="txt mt-2 text-success">Tell us why you're contacting FarmFoods...</span>
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
require_once"partials/footer.php";
?>