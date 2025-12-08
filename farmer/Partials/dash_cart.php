<?php 
        // require_once"header.php";
        require_once"classes/Farmer.php";

?>
<section>
	<div class="row head mt-3">																			
		<div class="col-3 dash-name mb-1 ">
		<a class=" btn btn-success align-items-center" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><i class="fa-solid fa-bars text-white "></i> FarmFoods</a>
		<div class="offcanvas offcanvas-start  text-bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
		  <div class="offcanvas-header">
			<h5 class="offcanvas-title" id="offcanvasExampleLabel">FarmFoods</h5>
			<button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		  </div>
		  <div class="offcanvas-body">
				  <div class="col  text-white pt-4 mb-3" >
					<h4>Welcome back, <?php echo ucfirst($deets['user_fname'])." ".ucfirst($deets['user_lname']);?>
      </h4>
			</div>
							<div class="col-sm">
								<p><a href="profile.php" class="link-underline link-underline-opacity-0 text-white"><i class="fa-solid fa-user text-white"></i> Profile</a></p>
							</div>
								<div class="col-sm">
								<p><a href="dashboard.php" class="link-underline link-underline-opacity-0 text-white"><i class="fa-solid fa-bars text-white"></i> Dashboard</a></p>
							</div>
						<div class="col-sm mb-2">
			  <a class=" mb-2 text-white col-7 dropdown-toggle fs-4" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-basket-shopping text-white"></i> Products</a>
			  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="allproducts.php" class="link-underline link-underline-opacity-0"><i class="fa-solid fa-basket-shopping text-success"></i> All Product</a></li>
		
				<li><a class="dropdown-item" href="addproduct.php" class="link-underline link-underline-opacity-0"><i class="fa-solid fa-basket-shopping text-success"></i> Add product</a></li>
		
		
			  </ul>
			</div>


			<div class="col">
								<p><a href="orders.php" class="link-underline link-underline-opacity-0 text-white"><i class="fa-solid fa-bars text-white"></i> Orders</a></p>
				</div>
					 
							<div class="col-sm">
								<p><a href="logout.php" class="link-underline link-underline-opacity-0 text-white"><i class="fa-solid fa-right-from-bracket text-white"></i> Log out</a></p>
							</div>
																																						
					</div>
					</div>
						</div>
		
													<!--SEARCH BAR-->
<div class="col-6"  id="">
	<form class="d-flex align-items-center" role="search">
			<input class="form-control me-2" type="search" placeholder="FarmFoods products" aria-label="Search "/>
			<button class=" d-flex justify-content-center align-items-center btn btn-outline-success col-4" type="submit">Search</button>
		</form>
</div>
		
													<!--CART-->	
<div class="col-3 p-1">
				<div class="cart d-flex justify-content-center align-items-center ">
					<button class="btn btn-success  cart-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-cart-shopping text-white" id="cart"></i> Cart</button>
		
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		  <div class="offcanvas-header">
			<h5 class="offcanvas-title" id="offcanvasRightLabel"> <i class="fa-solid fa-cart-shopping text-success"> </i> FarmFoods Cart</h5>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		  </div>
		  <div class="offcanvas-body" >
		  <div class="row d-flex align-items-center justify-content-center mb-2">
				<div class="col-sm-4">Items</div>
				<div class="col-sm-3">Name</div>
				<div class="col-sm-2">Qty</div>
				<div class="col-sm-3">Subtotal</div>
			</div>
		   
			<div class="row border  border-bottom-secondary">
				<div class="col-sm-4">
					<img src="images/mango.jpg" class="img-fluid" alt="mango" >
				</div>
				<div class="col-sm-3 mt-2 mb-2">
						<p>Mango</p>
					   <span>Lagos</span>
					</div>
					<div class="col-sm-2 d-flex align-items-center justify-content-center">
		  <select class="btn btn-light dropdown-toggle "  aria-expanded="false">
			  <option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
		  </select>
		</div>
				<div class="col-sm-3 d-flex align-items-center justify-content-center">
					<p>&#8358 2,000</p>
				</div>
			</div>
		
		
			  <div class="row border  border-bottom-secondary">
				<div class="col-sm-4">
					<img src="images/tomatoes.jpg" class="img-fluid" alt="mango" >
				</div>
				<div class="col-sm-3 mt-2 mb-2">
						<p>Tomatoes</p>
					   <span>Kano</span>
					</div>
			 <div class=" col-sm-2 d-flex align-items-center justify-content-center">
		  <select class=" btn btn-light dropdown-toggle"  aria-expanded="false">
			  <option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
		  </select>
		</div>
				<div class="col-sm-3 d-flex align-items-center justify-content-center">
					<p>&#8358 6,700</p>
				</div>
			</div>
		
		
		
			  <div class="row border  border-bottom-secondary">
				<div class="col-sm-4  d-flex align-items-center justify-content-center">
					<img src="images/plantain.jpg" class="img-fluid" alt="mango" >
				</div>
				<div class="col-sm-3 mt-2 mb-2">
						<p>Plantain</p>
					   <span>Gombe</span>
					</div>
			  <div class=" col-sm-2  d-flex align-items-center justify-content-center ">
		  <select class=" btn btn-light dropdown-toggle"  aria-expanded="false">
				<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
		  </select>
		</div>
				<div class="col-sm-3 d-flex align-items-center justify-content-center">
					<p>&#8358 4,000</p>
				</div>
			</div>
		
		
			  <div class="row border  border-bottom-secondary">
				<div class="col-sm-4">
					<img src="images/casava.jpg" class="img-fluid" alt="mango" >
				</div>
				<div class="col-sm-3 mt-2 mb-2">
						<p>Cassava</p>
					   <span>Akwa ibom</span>
					</div>
			 <div class=" col-sm-2  d-flex align-items-center justify-content-center ">
		  <select class=" btn btn-light dropdown-toggle"  aria-expanded="false">
			   <option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
		  </select>
		</div>
				<div class="col-sm-3 d-flex align-items-center justify-content-center">
					<p>&#8358 2,500</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 d-flex gn-items-center  justify-content-center">
					<p>Summary</p>
				</div>
				<div class="col-sm-6 d-flex gn-items-center  justify-content-center">
					<p>Total</p>
				</div>
			</div>
			<div class="row">
				<div class="col col-sm-6"></div>
				<div class="col col-sm-6"></div>
			</div>
		  </div>
		</div>
				</div>
			</div>
		  </div>
</section>