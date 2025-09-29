
<section>
	<div class="row mt-3 mid2">																			
		<div class="col dash-name mb-1 ">
		<a class=" btn btn-success align-items-center" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><i class="fa-solid fa-bars text-white"></i> FarmFoods</a>
		<div class="offcanvas offcanvas-start text-bg-light" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
		  <div class="offcanvas-header">
			<h5 class="offcanvas-title text-success fs-4" id="offcanvasExampleLabel">FarmFoods</h5>
			<button type="button" class="btn-close bg-success " data-bs-dismiss="offcanvas" aria-label="Close"></button>
		  </div>
		  <div class="offcanvas-body">
				  <div class="col my-4 " >
					<h4 class="text-success">Welcome back, <?php echo ucfirst($deets['user_fname'])." ".ucfirst($deets['user_lname']);?>
             </h4>
			</div>
							<div class="dashboard">
							<div class="col mb-2">
									<p class="col border border-subtle p-2 rounded"><a href="profile.php" class="link-underline link-underline-opacity-0 text-success"><i class="fa-solid fa-user"></i> Profile</a></p>
							</div>
							<div class="col mb-2">
								<p class="col border border-subtle p-2 rounded"><a href="dashboard.php" class="link-underline link-underline-opacity-0 text-success"><i class="fa-solid fa-bars "></i> Dashboard</a></p>
							</div>
							<div class="col mb-2">
								<p class="col border border-subtle p-2 rounded"><a href="addproduct.php" class="link-underline link-underline-opacity-0 text-success"><i class="fa-solid fa-basket-shopping "></i> Add product</a></p>
							</div>
							<div class="col mb-2">
								<p class="col border border-subtle p-2 rounded"><a href="allproducts.php" class="link-underline link-underline-opacity-0 text-success"><i class="fa-solid fa-basket-shopping "></i> All product</a></p>
							</div>
							<div class="col mb-2">
								<p class="col border border-subtle p-2 rounded"><a href="orders.php" class="link-underline link-underline-opacity-0 text-success"><i class="fa-solid fa-rectangle-list "></i> Orders</a></p>
							</div>

				
							<div class="col mb-2">
								<p class="col border border-subtle p-2 rounded"><a href="logout.php" class="link-underline link-underline-opacity-0 text-danger"><i class="fa-solid fa-right-from-bracket text-danger"></i> Log out</a></p>
							</div>
																																						
		  </div>
		</div>
			</div>
		


</section>


