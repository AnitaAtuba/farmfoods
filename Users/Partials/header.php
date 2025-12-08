
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="FarmFoods, Buy fresh foods from your farmers">
	<meta name="keyword" content="food,farm,agriculture,yields,shop,meals"/>
	<meta name="robots" content="index, follow"/>
	<meta name="author" content="Anita oseze Atuba"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="stylesheet" type="text/css" href="Assets/Css/styles.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" type="text/css" href="Assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/fontawesome/fontawesome/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Cascadia+Mono:ital,wght@0,200..700;1,200..700&display=swap" rel="stylesheet">

	<title>FarmFoods</title>
<style>	
	body{
			background-color: #EAF4D3;
			font-family: "Cascadia Mono", monospace,arial ,sans-serif;
		}
</style>
</head>
<body>
		<div class="container-fluid ">
			<div class="row">
				<!-- NAVBAR -->
					<section>
						<div class="">	
							<nav class="navbar navbar-expand-lg bg-body-light">
							  <div class="container-fluid">
								<a class="navbar-brand"  href="index.php">FarmFoods</a>
								<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								  <span class="navbar-toggler-icon"></span>
								</button>
								<?php 

							if(isset($_SESSION['buyeronline'])){
								?>
								<div class="collapse navbar-collapse" id="navbarSupportedContent">
								  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
									<li class="nav-item">
									  <a class="nav-link " aria-current="page" href="index.php">Home</a>
									</li>
									<li class="nav-item">
									  <a class="nav-link" href="about.php">About</a>
									</li>
									<li class="nav-item">
									  <a class="nav-link " href="contact.php">Contact</a>
									</li>
								  </ul>

								<div class='me-4'>
									<!-- <a href="profile.php" class="btn btn-subtle "><i class="fa-solid fa-bars text-success"></i> Dashboard<a> -->
								<a href="market.php" class="btn text-success"><i class="fa-solid fa-basket-shopping text-success"></i> Market<a>
								
								</div>
							<div class=''>
								<a href="profile.php" class="btn text-success"><i class="fa-solid fa-user text-success"></i> Profile<a>
										<img  src="Assets/uploads/<?php echo $deets['user_dp']!=null ? $deets['user_dp']:'Assets/images/placeholder1.png';?>"  alt="Profile"
								class="rounded-circle me-2"
								width="50"
								height="50">
								<span class="d-md-inline text-success fs-5">Hi,<?php echo $deets['user_fname'] ;?></span>
									</div>
								  
								<?php }
								else{?>
								<div class="collapse navbar-collapse" id="navbarSupportedContent">
								  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
									<li class="nav-item">
									  <a class="nav-link " aria-current="page" href="User/index.php">Home</a>
									</li>
									<li class="nav-item">
									  <a class="nav-link" href="signup.php">Sign up</a>
									</li>
									<li class="nav-item">
									  <a class="nav-link " href="login.php">Log in</a>
									</li>
									<li class="nav-item dropdown">
									  <a class="nav-link dropdown-toggle ms-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										Services
									  </a>
									  <ul class="dropdown-menu">
										<li><a class="dropdown-item" href="about.php">About us</a></li>
										<li><hr class="dropdown-divider"></li>
										<li><a class="dropdown-item" href="contact.php">Contact us</a></li>
									  </ul>
								  </ul>

								<div>
								<?php }?>
								</div>
							  </div>
							</nav>
						  </div>
					</section>





				