<?php 
    session_start();
	// require_once"partials/header.php";
	 require_once"classes/Admin.php";

// $deets = $admin->admin_login($_SESSION['adminonline']);
// echo "</pre>";
// print_r($deets);
// echo"</pre>";


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="BuyFarm, Buy fresh foods from your farmers">
	<meta name="keyword" content="food,farm,agriculture,yields,shop,meals"/>
	<meta name="robots" content="index, follow"/>
	<meta name="author" content="Anita oseze Atuba"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cascadia+Mono:ital,wght@0,200..700;1,200..700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/fontawesome/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<title>BuyFarm | login</title>

<style>
		*{
		   padding:0px;
			margin:0px;
			box-sizing: border-box;
		}

		body{
		margin:auto;
		font-size: 1em;
		padding: 3px;
		background-color: #dddddd;
		font-family: "Cascadia Mono", arial ,sans-serif;
		width: 90%;
	}

		h2{
			/* color:#7EAE49; */
			font-weight:bold;
		}
		label{
			/* color:#7EAE49; */
			font-weight:bold;
		}

		.container{
					width:50%;
				  }

		button:hover{
				border: 2px solid #7EAE49;
				background-color: #7EAE49;
				color:#ffffff;
					}

		form{
			background: linear-gradient(#ffffff11,#ffffff11);
			backdrop-filter: blur(10px);
			border-radius: 5px;
			border:1px solid #eeeeee;
			box-shadow: 0px 3px 3px #6ca56803;
			}

		.btn {
			color:#157347;
			border-radius:10px;
			height:50px;
			font-weight: bold;
			font-size: 1.1em;
			border: 1px solid #157347;
			box-shadow: 0px 8px 8px 0px #00000022;
			}

		.button:hover{
			border: 2px solid #7EAE49;
			background-color: #7EAE49;
			color:#ffffff;
			font-size: 1.1em;
			box-shadow: 0px 3px 3px 0px #00000022;
			}

		.agree{
			font-size: 12px;
			  }

		
	/* div{
	border:1px solid black;
	} */

		@media only screen and (max-width: 768px){
			.container{
				width: 90%;
				}
			}
</style>

</head>
<body> 

									<!--CONTAINER -->
<div class="container" >
<section>
<div class="row mt-5">

		<!--FORM -->
<form action="process/process_login.php" method="post">
<div class="my-4">
<h2 class="mb-3 text-success text-center">FarmFoods Admin Login</h2>
	<?php 
			if(isset($_SESSION['adminerror'])){
				echo "<p class='alert alert-danger'>".$_SESSION['adminerror']."</p>";
				unset($_SESSION['adminerror']);
			}
			if(isset($_SESSION['adminmessage'])){
				echo "<p class='alert alert-danger'>".$_SESSION['adminmessage']."</p>";
				unset($_SESSION['adminmessage']);
			}
			
	?>

<div class="row mb-2">
<div class="col-12">
<label for="username" class="col-form-label text-success">Username: </label>
</div>
<div class="col">
<input type="text" class="form-control text-success" id="username" name="username" >
</div>
</div>

<div class="row mb-2">
<div class="col-12">
<label for="pass" class="form-label text-success">Password: </label>
</div>
<div class="col">
<input type="text" class="form-control text-success" id="pass" name="pass" >
</div>
</div>
<button type="submit" name="btn" class="button col-12 btn mb-4">Sign in</button>
</div>
</form>
</div>
</section>

<hr>
<br>
<br>

</div>
</body>
</html>