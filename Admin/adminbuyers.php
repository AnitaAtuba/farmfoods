
<?php 
require_once"Partials/header.php";
require_once"adminguard.php";


$buyers =$admin->fetch_all_customers();
// echo"<pre>";
// print_r($buyers);
// echo"</pre>";
?>

  <body>
    <!-- CONTAINER-->
    <div class="container-fluid">
  

      <div class="row mt-3">
        <!--SELLERS COL-->
<section>
  <div class="col-md-10 box">
    <div>
      <p class="adm"><a href="#">Buyers</a></p>
    </div>
    <div class="boxchild" style="overflow-x:auto;">
      <table class="table table-dark">
       
       <tr>
							<th>S/N</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Account</th>
							<th>phone</th>
							<th>State</th>
							<th>LGA</th>
							<th>Action</th>
						</tr>
						<tbody>
						<?php 
						if(empty($buyers)){
								echo"<tr><td colspan='5'>No sellers has been added yet!</td></tr>";
						}else{
							$sn = 1;
							foreach($buyers as $buyer){
						?>
						<tr>
							<td><?php echo $sn ;?></td>
							<td><?php echo $buyer['user_fname'];?></td>
							<td><?php echo $buyer["user_lname"];?></td>
							<td><?php echo $buyer['role'];?></td>
							<td><?php echo $buyer['user_phone'];?></td>
							<td><?php echo $buyer['state_name'];?></td>
							<td><?php echo $buyer['lga_name'];?></td>

              							<?php 
									if($buyer['user_status'] === 'active'){
							?>
          					<td> <a href="process/disable_user.php?id=<?php echo $buyer['user_id'] ?>" class="btn btn-danger" onclick="return confirm('Do you really want to disable this Farmer?')">Disable Buyer</a></td>
							<?php }else{?>
          					<td> <a href="process/enable_user.php?id=<?php echo $buyer['user_id'] ?>" class="btn btn-success" onclick="return confirm('Do you really want to restore this Farmer?')">Enable Buyer</a></td>
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
