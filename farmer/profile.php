<?php 
session_start();
require_once"userguard.php";
require_once"Classes/Farmer.php";

$farmer = new Farmer;
$deets = $farmer->fetch_farmer_details($_SESSION['farmeronline']);

$states=$farmer->fetch_states();
// $lga= $farmer->fetch_lga();
// echo"<pre>";
// print_r($deets);
// echo"</pre>";
require_once"Partials/header.php";
require_once"Partials/dash.php";

?>

		<div class="container-fluid ">
				



													<!-- FIRST ROW-->
			 	<div class="row mt-3">
				<div class="col mid">
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
			</div>
			<div class="row mt-3">
					
				</div>		
               </div>

<section>
		

	<div class="row mb-3 p-3">
	<div class="col me-auto acct p-2 border border-subtle mb-2">
			<div class="col d-flex justify-content-center align-items-center">
				<img  src="<?php echo $deets['user_dp'] !=null? "assets/uploads/".$deets['user_dp']:'assets/images/placeholder1.png'?>" width="250" height="200" class="bg-secondary rounded-5">
			</div>

			<div class="col mt-3 border border-subtle p-2">
				<i class="fa-solid fa-user"></i>
				<h6><strong>Name :</strong><?php echo $deets['user_fname']." ".$deets['user_lname'] ?></h6>
			<p><strong>Email :</strong><?php echo $deets['user_email'] ?></p>
		</div>

			<div class="mt-3 border border-subtle p-2">
				<i class="fa-solid fa-truck"></i>
				<h6 ><strong>Shipping Address 1:</strong></h6>
			<span class="mb-2"><?php echo $deets['user_addr1']?></span>
			<div class="my-2">
				<h6 ><strong>Shipping Address 2:</strong></h6>
			<span><?php echo $deets['user_addr2']?></span>
			</div>
		</div>
			<div class="border border-subtle mt-3 p-2"><i class="fa-solid fa-phone"></i>
				<h6 class="mb-2"><strong>Phone Number :</strong></h6>
			<span><?php echo $deets['user_phone'] ?> </span>
			</div>
			
		</div>
		<!-- PROFILE UPDATE FORM -->
		<div class="col border border-subtle acct me-auto">
						<form id="profileform" action="process/process_profile.php" method="post" enctype="multipart/form-data">
					 <div class="col mt-4" id="signup">	
						<div id="response"> </div>
				<div class="col-12 mb-2">
					<label for="picture" class="form-label">Profile Picture:</label>
					<input type="file" class="form-control "  name="picture" id="picture">
				  </div>
				  <div class="col-12 mb-2">
					<label for="number" class="form-label">	Phone:</label>
					<input type="number" class="form-control"  name="phone" placeholder="+234..." id="number">
				  </div>
				    <div class="col-12 mb-2">
					<label for="dob" class="form-label">	Date Of Birth:</label>
					<input type="date" class="form-control"  name="dob" placeholder="+234..." id="number">
				  </div>
				  <div class="col-12 mb-2">
					<label for="addr" class="form-label">Address 1:</label>
					<input type="text" class="form-control"  name="address1" id="addr" placeholder="234 Eko St">
				  </div>
				  <div class="col-12 mb-2">
					<label for="addr2" class="form-label">Address 2:</label>
					<input type="text" class="form-control" name="address2" id="addr2" placeholder="optional">
				  </div>
				 <div class="row mb-4">
					 <div class="col">
					<label for="state" class="form-label">State :</label>
					<select name="state" id="state" class="form-control">
						<option value="">Select State</option>
							<?php foreach($states as $state){?>
						<option value="<?php echo $state['state_id'] ?>"><?php echo $state['state_name']?></option>
							<?php }?>
					</select>
				  </div>
				<div class="col">
					<label for="lga" class="form-label">LGA :</label>
					<select name="lga" id="lga" class="form-control">
						<option value="">Select LGA</option>
							
					<!--<?php foreach($lga as $lg){?>
						<option value="<?php echo $lg['lga_id']?>"><?php echo $lg['lga_name']?></option>
						<?php }?> -->
					</select>
				  </div>
				 </div>

				
	
				  <div class="col-10 offset-1 mb-2">
					<button name="subbtn" id="subbtn" class="btn btn-success col-12">Submit</button>
					<!-- <input name="subbtn" id="subbtn" class="btn btn-success col-12" value="Submit"> -->
				  </div>
				</form>
		</div>
		</div>


</section>
</div>
<?php 
	require_once"Partials/footer.php";
?>
<script src="assets/jquery.js"></script>
<script>
    $(function(){
		

		        $('#state').change(function(){
        var stateid = $(this).val();

			if(stateid){
				$('#lga').load("process/process_lga.php",{state:stateid},function(data,status,xhr){
					if(status == "error"){
						$('#lga').html('<option value="">Error loading LGA</option>')
							console.log(status)
					}
				});

			}else{
				$('#lga').html('<option value="">Select LGA</option>')
			}  
        });

    });
</script>