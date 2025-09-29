
<?php 
session_start();
require_once"userguard.php";
require_once"classes/Farmer.php";
$farmer = new Farmer;
$deets = $farmer->fetch_farmer_details($_SESSION['farmeronline']);



require_once"partials/header.php";
require_once"partials/dash.php";
$category = $farmer->fetch_category();
$products = $farmer->fetch_all_product();

// echo"<pre>";
// print_r($products);
// echo"</pre>";

?>
    <!-- CONTAINER-->
    <div class="container-fluid">

      <div class="row mt-3">
        <!--SELLERS COL-->
        <div class="col-md-10 box offset-md-1 border border-subtle rounded">
              <div class="row my-4">
          <div class="col">
            <h3 class="text-success">Add Products</h3>
          </div>
          <div class="col" align="right">
               <a href="allproducts.php" role="btn" class="btn btn-dark col-md-6 col-sm-12">View All Products</a>
           </div>
              </div>
          <div class="row">
            <div class="col">
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
          <div class="mb-5 p-4 border border-subtle bg-white">
<form action="process/process_product.php" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                         <label for="category" class="">Product Category: </label>
                           <select name="category" id="category" class="form-select">
                          <option value="">Select Category</option>
                          <?php 
                              foreach($category as $cat){
                                ?>
                             <option value="<?php echo $cat["category_id"]?>"><?php echo $cat["category_name"]?></option>
                         <?php
                              }
                          ?>

                        </select>
                    </div>
                       <div class="mb-3">
                       <label for="product" class="">Product Name: </label>
                         <select name="product" id="product" class="form-select">
                          <option value="">Select Products</option>
                          <?php 
                              foreach($products as $pd){
                                ?>
                             <option value="<?php echo $pd["prod_id"]?>"><?php echo $pd["product_name"]?></option>
                         <?php
                              }
                          ?>
                          </select>
                    </div>
                     <div class="mb-3">
                        <label for="price" class="">Product Price: </label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="">Product image: </label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                     <div class="mb-3">
                        <label for="detail" class="">Product Description:</label>
                        <textarea name="detail" id="detail" class="form-control"></textarea>
                    </div>
                   <div class="row">
                       <div class="col">
                         <button name="addbtn"  class="btn btn-success col-5 text-white">Add New Product</button>
                       </div>
                       
                   </div>
</form>
            </div>

        </div>
      </div>
    </div>

    <?php require_once "partials/footer.php";?>
<script src="Assets/jquery.js"></script>
    <script>
    $(function(){
		

		        $('#category').change(function(){
        var categoryid = $(this).val();
              // alert(categoryid);
			if(categoryid){
				$('#product').load("process/process_products.php",{category:categoryid},function(data,status,xhr){
					if(status == "error"){
						$('#procuct').html('<option value="">Error loading Products</option>')
							console.log(status)
					}
				});

			}else{
				$('#product').html('<option value="">Select Products</option>')
			}  
        });

    });
</script>
