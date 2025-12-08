
<?php 
session_start();
require_once"adminguard.php";
require_once"classes/Admin.php";


$admin = new Admin;
$deets = $admin->fetch_admin_details($_SESSION['adminonline']);
// echo "</pre>";
// print_r($deets);
// echo"</pre>";
?>

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
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cascadia+Mono:ital,wght@0,200..700;1,200..700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/fontawesome/fontawesome/css/all.min.css">
	<title>FarmFoods | Admin</title>
<style>
		*{
			padding:0px;
			margin:0px;
			box-sizing: border-box;
		}
		
		body{
		margin:auto;
		font-size: 0.9em;
		padding: 3px;
		background-color: #6ca568 ;
		font-family: "Cascadia Mono", arial ,sans-serif;
		width: 90%;
	}
	/* div{
		border:2px solid #ffffff;
	} */
	p{
		font-size:1.2em;
		
	}
	p a{
		text-decoration: none;
		color: #e4e8e6;
		font-weight: bolder;
		font-size:1.3em;
	}
	p a:hover{
		font-size: 1.5em;
		color: #ffffff;
		text-decoration:underline;
	}
	span a{
		/* text-decoration: none; */
	}
		
	table{
		width:90%;
		
	}
	
	table thead,  td{
	color:#ffffff;
	letter-spacing: 1px;
	}
	
	.btn{
		box-shadow: 0px 3px 3px 0px #00000022;
	}
	
		/* div{
			border: 1px solid black;
		} */
	.adm {
		padding: 10px;
	}	
	.box{
 		background: linear-gradient(
          rgba(255, 255, 255, 0.1),
          rgba(255, 255, 255, 0.1)
        );
        backdrop-filter: blur(10px);
        border-radius: 5px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0px 3px 3px rgba(255, 255, 255, 0.1);
		margin: auto;

	}	
	
	.boxchild{
		background-color: #212529;
		border-radius: 5px;
		padding: 3px;
		margin-bottom: 20px;
		
	}
	@media only screen and (max-width: 768px){
		body{
			width: 95%;
		}
		button{
			
			font-size: 0.5em;
		}	
	button{
		font-size: 0.8em;
	}
	table thead,  td{
	color:#ffffff;
	letter-spacing: 1px;
	font-size: 1em;
	}

	p{
		font-size:1.4em;
	}

	}

</style>
</head>
   		<!-- NAVBAR -->
					<section>
						<div class="col">	
							<nav class="navbar navbar-expand-lg bg-body-light">
							  <div class="container-fluid">
								<a class="navbar-brand text-white"  href="#">FarmFoods</a>
								<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								  <span class="navbar-toggler-icon"></span>
								</button>
								<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
								  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
									<li class="nav-item">
									  <a class="nav-link text-white" aria-current="page" href="../farmer/index.php">Home</a>
									</li>
									<li class="nav-item">
									  <a class="nav-link text-white" href="../Farmer/contact.php">Contact Page</a>
									</li>
									<li class="nav-item">
									  <a class="nav-link text-white" href="../Farmer/about.php">About Us</a>
									</li>
								
								  </ul>
								</div> -->
							  </div>
							</nav>
						  </div>
					</section>


		<!--DASHBOARD-->
  <div class="row head mt-3">	
				<div class="col-sm-6 col-md-6 mb-1 ">
					<a class=" btn btn-success align-items-center" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"> <i class="fa-solid fa-bars text-white"></i>
			Admin <?php echo $deets['admin_username'];?>
			</a>
			<div class="offcanvas offcanvas-start  text-bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title" id="offcanvasExampleLabel">FarmFoods Admin</h5>
				<button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
					<div class="col  text-white pt-4 bg-dark" >
						<h4>Welcome Back, <?php echo $deets['admin_username'];?></h4>
				</div>
								<div class="col-sm">
									<p><a href="admindashboard.php" class="link-underline link-underline-opacity-0 text-white"> <i class="fa-solid fa-bars text-white"></i> Dashboard</a></p>
								</div>
								<div class="col-sm">
									<p><a href="adminsellers.php" class="link-underline link-underline-opacity-0 text-white"><i class="fa-solid fa-users text-white"></i> Sellers</a></p>
								</div>
									<div class="col-sm">
									<p><a href="admincustomer.php" class="link-underline link-underline-opacity-0 text-white"><i class="fa-solid fa-users text-white"></i> Buyers</a></p>
								</div>
                                <div class="col-sm">
									<p><a href="adminproduct.php" class="link-underline link-underline-opacity-0 text-white"> <i class="fa-solid fa-basket-shopping text-white"></i> Products</a></p>
								</div>
						
								<div class="col-sm">
									<p><a href="adminorder.php" class="link-underline link-underline-opacity-0 text-white"> <i class="fa-solid fa-bars text-white"></i> Orders</a></p>
								</div>	
								
								<div class="col-sm">
									<p><a href="adminlogin.php" class="link-underline link-underline-opacity-0 text-white"> <i class="fa-solid fa-right-from-bracket text-white"></i> Log out</a></p>
								</div>	
			</div>
			</div>
		</div>
</div>
