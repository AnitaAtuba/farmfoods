
<?php 
require_once"Partials/header.php";
require_once"adminguard.php";


$products = $admin->fetch_all_products();
// echo"<pre>";
// print_r($products);
// echo"</pre>";

?>

  <body>
    <!-- CONTAINER-->
    <div class="container-fluid">

      <div class="row mt-3">
        <!--SELLERS COL-->
   
        <div class="col box" style="overflow-x:auto;">
          <div>
            <p class="adm"><a href="admindashboard.php">Product</a></p>
          </div>
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
          <div class="boxchild" style="overflow-x:auto;">
           
            <table class="table table-dark">
						       <tr>
                       <th scope="col">#</th>
                       <th scope="col">Name</th>
                       <th scope="col">Price</th>
                       <th scope="col">Category</th>
                       <th scope="col">Date</th>
                       <th scope="col">Seller</th>
                       <th scope="col">State</th>
                       <th scope="col">LGA</th>
                       <th scope="col">Phone</th>
                       <th scope="col">Action</th>
                   </tr>		  
                   <tbody>	
					<?php 
					if(empty($products)){
							echo"<tr><td colspan='6'>No Products available yet!</td></tr>";
					}else{
						$sn = 1;
						foreach($products as $product){
					?>
					<tr>
						<td><?php echo $sn ;?></td>
						<td><?php echo $product['product_name'];?></td>
						<td>&#8358;<?php echo number_format( $product['prod_price'],2);?></td>
						<td><?php echo $product["category_name"];?></td>
						<td><?php echo $product['date_uploaded'];?></td>
						<td><?php echo $product['user_fname']." ".$product['user_lname'];?></td>
						<td><?php echo $product['state_name']?></td>
						<td><?php echo $product['lga_name']?></td>
						<td><?php echo $product['user_phone']?></td>
            <td> <a href="deleteproduct.php?id=<?php echo $product['prod_id'] ?>"  onclick="return confirm('Do you really want to delete this product?')" class="btn btn-warning">Remove Product</a> </td>
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
      </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
  </body>
</html>
