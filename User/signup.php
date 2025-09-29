<?php 
session_start();
require_once"partials/header.php"?>
	<title>BuyFarm | sign up</title>
<style>

		 .container{
					width:50%;
				}

			.btn{
		box-shadow: 0px 8px 8px rgba(0,0,0,0.2);
		}
		

		h5{
			font-weight: bold;
			}

		form{
			background: linear-gradient(rgba(255,255,255,0.8), rgba(255,255,255,0.8));
			backdrop-filter: blur(10px);
			border-radius: 5px;
			border:1px solid rgba(255,255,255,0.5);
			box-shadow: 0px 3px 3px rgba(255,255,255,0.5);
			}

		.button {
			box-shadow: 0px 3px 3px 0px #00000055;
			}

		.button:hover{
			border: 2px solid #7EAE49;
			background-color: #7EAE49;
			
			}

		span {
			font-size: 12px;
			color: #444444;
			}

		span a{
				color: #157347;
				font-size: 12px;
				text-decoration: none;
				}

		.agree{
			font-size: 12px;
		}

		/* {
			border:1px solid black;
		} */



		@media only screen and (max-width: 768px){
		 .container{
				width:80%;
				}

				
		}
</style>
</head>
<body>
						<!--CONTAINER -->
<div class="container-fluid ">
		<div class="row" id="signup">
									<!--NAVBAR-->
					<div class="col" id="login">	

		  				</div>
					</div>
       		</div>


		<div class="container">
<section>
<div class="row  mt-2">
					
		<!--FORM -->
<form class=" mt-4" action="process/process_signup.php" method="post" >
<div class="row">
    <div class="col border border-subtle rounded">
<h5 class="p-4 text-success">Create your BuyFarm profile</h5>
</div>
<?php 
			if(isset($_SESSION['buyererror'])){
				echo "<p class='alert alert-danger'>".$_SESSION['buyererror']."</p>";
				unset($_SESSION['buyererror']);
			}

      	if(isset($_SESSION['buyermessage'])){
				echo "<p class='alert alert-success'>".$_SESSION['buyermessage']."</p>";
				unset($_SESSION['buyermessage']);
			}
			
	?>
</div>

<div class="row">
<div class="col-md-10 offset-md-1 mb-3" >
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
<input type="password" class="form-control" id="pass" name="pass1" required>
</div>
<div class="col-sm-6 mb-3">
<label for="pwd" class="form-label">Confirm Password:</label>
<input type="password" class="form-control" id="pass" name="pass2">
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
  id="radios2"
  value="buyer"
/>
<label class="form-check-label" for="radios2"> Buyer </label>
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
 <span>Not a Buyer? sell on<a href="../farmer/signup.php"> FarmFoods</a></span>
</div>
</form>
		</div>
</section>
				<hr>
				<br>
				<br>
					</div>

		
			</div>
<?php require_once"partials/footer.php";?>