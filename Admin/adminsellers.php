
<?php 
require_once"Partials/header.php";
require_once"adminguard.php";


$sellers =$admin->fetch_all_sellers();
// echo"<pre>";
// print_r($sellers);
// echo"</pre>";
?>

  <body>
    <!-- CONTAINER-->
    <div class="container-fluid">

      <div class="row mt-3">
        <!--SELLERS COL-->
<section>
  <div class="col box">
    <div class="p-1">
      <p class=""><a href="#">Sellers</a></p>
    </div>
    <div class="boxchild" style="overflow-x:auto;">
  <?php 
			if(isset($_SESSION['adminerror'])){
				echo "<p class='alert alert-danger'>".$_SESSION['adminerror']."</p>";
				unset($_SESSION['adminerror']);
			}

				if(isset($_SESSION['adminsuccess'])){
				echo "<p class='alert alert-success'>".$_SESSION['adminsuccess']."</p>";
				unset($_SESSION['adminsuccess']);
			}	
	?>
      <table class="table table-dark">
						<tr>
							<th>S/N</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Role</th>
							<th>Phone</th>
							<th>State</th>
							<th>LGA</th>
							<th>Action</th>
						</tr>
						<tbody>
						<?php 
						if(empty($sellers)){
								echo"<tr><td colspan='5'>No sellers has been added yet!</td></tr>";
						}else{
							$sn = 1;
							foreach($sellers as $seller){
						?>
						<tr>
							<td><?php echo $sn ;?></td>
							<td><?php echo $seller['user_fname'];?></td>
							<td><?php echo $seller["user_lname"];?></td>
							<td><?php echo $seller['role'];?></td>
							<td><?php echo $seller['user_phone'];?></td>
							<td><?php echo $seller['state_name'];?></td>
							<td><?php echo $seller['lga_name'];?></td>
							
							<?php 
									if($seller['user_status'] === 'active'){
							?>
          					<td> <a href="process/disable_user.php?id=<?php echo $seller['user_id'] ?>" class="btn btn-danger" onclick="return confirm('Do you really want to disable this Farmer?')">Disable Farmer</a></td>
							<?php }else{?>
          					<td> <a href="process/enable_user.php?id=<?php echo $seller['user_id'] ?>" class="btn btn-success" onclick="return confirm('Do you really want to restore this Farmer?')">Enable Farmer</a></td>
						   <?php } ?>								
						</tr>

						<?php 
							$sn++;
							}
						}
						?>	
						</tbody>		  
						</table>
    </div>
  </div>
</section>
       

      
      </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
  </body>
</html>
