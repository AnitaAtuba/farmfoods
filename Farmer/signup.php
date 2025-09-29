<?php 
session_start();
require_once"partials/header.php"?>

			<!--CONTAINER -->
<div class="container-fluid bg-white">
		<div class="row" id="signup">
									<!--NAVBAR-->
					<div class="col" id="login">	

		  				</div>
					</div>
       	     	</div>

<section>
<div class="container-fluid">
  
   <div class="row mt-2">
					
		<!--FORM -->
		<div class="col-md-8 offset-md-2 form border border-subtle rounded bg-white">
	<form class=" mt-4" action="process/process_signup.php" method="post" >
			<div>	
		<div>
		<h5 class="p-4 text-success">Create your BuyFarm profile</h5>
		</div>
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

		<div class="row">
		<div class="col-md-6 col-sm-12 mb-3" >
		<label for="firstname" class="form-label">First Name:</label>
		<input type="text" class="form-control" id="firstname" name="firstname" required>
		</div>	

		<div class="col-md-6 col-sm-12 mb-3">
		<label for="lastname" class="form-label">Last Name:</label>
		<input type="text" class="form-control" id="lastname" name="lastname" required>
		</div>	
		</div>
			
		<div class="row">
		<div class="col-sm-12 mb-3">
		<label for="email" class="form-label">Email:</label>
		<input type="email" class="form-control" id="email" name="email" required>
		</div>

		<div class="col-sm-6 mb-3">
		<label for="pwd" class="form-label">Password:</label>
		<input type="password" class="form-control" id="pass1" name="pass1" required>
		</div>
		<div class="col-sm-6 mb-3">
		<label for="pwd" class="form-label">Confirm Password:</label>
		<input type="password" class="form-control" id="pass2" name="pass2">
		</div>

		</div>

		<fieldset class="row mb-3">
		<legend class="col-form-label col-sm-3">Account:</legend>
		<div class="col-sm-8">
		<div class="form-check">
		<input
		class="form-check-input border border-success"
		type="radio"
		name="radio"
		id="radios1"
		value="farmer"
		/>
		<label class="form-check-label" for="radios1"> Farmer </label>
		</div>


			</div>
			</fieldset>
			<div class="form-check mb-2">
			<input class="form-check-input bg-success" type="checkbox" id="checkbox">
			<label class="form-check-label agree" for="checkbox">
			i agree with Terms and Conditions and Privacy Policy
			</label>
			</div>
			<div class="col-10 mb-2 offset-1">
			<button name="btn" class="button btn btn-success col-12 ">Sign up</button>
			</div>
			<div class="col-auto mb-3">
			<span>Want to buy FarmFoods sign up ? <a href="../User/signup.php">click me to Sign up</a></span>
			</div>
	
		</form>
		</div>
		</div>
		</div>
</section>
				<hr>
				<br>
				<br>
					</div>

		
			</div>
<?php require_once"partials/footer.php";?>