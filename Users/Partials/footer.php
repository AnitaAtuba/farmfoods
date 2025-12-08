
<!--FOOTER -->

<section>
	<div class="row footer pt-3">
		<div class="col-12 mb-5">
			<h3 class="ps-4 pe-3 mb-2 text-success">FarmFoods</h3>
			<p class="footer-para ps-4 pe-3">FarmFoods was born out of the neccessity to eliminate high food cost in the country. In recent years inflation doubled the cost of living and feeding. Traders also contributed their part by doubling or tripking the cost of food farmers sell. FarmFoods eliminates middleman cost, provides job oppurtunities and provides healthy food for the community.</p>
			<div class="col d-flex justify-content-space-around align-items-center ms-4">
				<div class="overlay d-flex justify-content-center align-items-center">
					<i class="fa-brands fa-facebook-f"></i>
				</div>
				<div class="overlay d-flex justify-content-center align-items-center ms-2">
					<i class="fa-brands fa-instagram"></i>
				</div>
				<div class="overlay d-flex justify-content-center align-items-center ms-2">
					<i class="fa-brands fa-twitter"></i>
				</div>
			</div>
		</div>

	<div class="row">
		<div class="col-md-4">
			<ul>
				<h5 class="fw-bold mb-3 text-success">Contact Us</h5>
				<li><i class="fas fa-envelope me-2"></i> FarmFoods@gmail.com</li>
				<li><i class="fas fa-phone me-2"></i> +23490345687</li>
				<li><i class="fas fa-map-marker-alt me-2"></i> 28 Eden street,Lagos </li>
			</ul>
		</div>
	
	
	<div class="col-md-4">
		<ul>
			<h5 class="fw-bold mb-3 text-success">Quick Links</h5>
			<li class="foot-list "> <a href="services.html">Services</a></li>
			<li  class="foot-list"> <a href="contact.html">Contact Us</a></li>
			<li  class="foot-list"> <a href="about.html"> About Us</a></li>
			<li> FAQ</li>
	  </ul>		
	</div>

	<div class="col-md-4 news">
			<h5 class="fw-bold mb-3 text-success">Newsletter</h5>
			<p>Subscribe to our newsletter and get updates on special offers and discounts.</p>
			<div class="input-group">
				<input type="email" class="form-control" placeholder="Enter your email">
				<button class="btn btn-success" type="button">Subscribe</button>
			</div>
		</div>
	</div>

		<hr>
		<div class="col-12 footer-bottom text-center">
			<p>&copy; copyright 2025 All rights Reserved</p>
			<p>Terms & condition  Privacy policy</p>
		</div>
	</div>
</section>	
<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="Assets/jquery.js"></script>


<script>
	$(function(){
	$("#lgabtn").change(function(){
				var lgaid = $(this).val();
				
				$.ajax({
						url:'process/process_filter.php',
						type:'POST',
						data:{lga_id:lgaid},
						success:function(data){
							if(data.code == 1){
								$("#response").empty().append("<p class='alert alert-success'>"+data.msg+"</p>")
							}else{
								$("#response").empty().append("<p class='alert alert-danger'>"+data.msg+"</p>")

							}
						},
						error:function(error){
							console.log(data);
						}
				});
			});
		});
</script>
	</body>
	</html>