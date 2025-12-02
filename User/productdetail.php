
<?php 
session_start();
require_once"userguard.php";
require_once"classes/Buyer.php";
$buyer = new Buyer;
$deets = $buyer->fetch_buyer_details($_SESSION['buyeronline']);
$products = $buyer->fetch_all_product();

  $id = isset($_GET['id']) ? $_GET['id']:"";
  $product =$buyer->search_productid($id);


// echo"<pre>";
// print_r($product);
// echo"</pre>";
require_once"partials/header.php";
require_once"partials/dash.php";


?>

    <!-- CONTAINER-->
    <div class="container-fluid bg-white my-5">
     <div class="row  my-4">

          <div class="col">
            <h3 class="text-success">Product Detail</h3>
              </div>

            <div class="col">
                	<?php 
			if(isset($_SESSION['buyererror'])){
				echo "<p class='alert alert-danger'>".$_SESSION['buyererror']."</p>";
				unset($_SESSION['buyererror']);
			}

				if(isset($_SESSION['buyermessage'])){
				echo "<p class='alert alert-success'>".$_SESSION['buyermessage']."</p>";
				unset($_SESSION['buyermessage']);
			}

			
	?>
            </div>
          </div>
    


       <?php if($product){?> 
       <div class="row mb-5">
         <div class="col-md-6 bg-white">
             <img src="../Farmer/Assets/uploads/<?php echo $product["product_image"] ?>" alt="image" width="100%" height="450"  style="background-color:white">
         </div>
        <div class="col-md-6 pt-3 bg-white">
          <div> <span class="border border-"><img src="../Farmer/Assets/uploads/<?php echo $product["user_dp"]?>" width="60" height="60" class="rounded-5" alt=""></span>
          <span class="badge bg-dark p-2"><?php echo $product['user_fname']." ".$product['user_lname']?></span>
          <span class="badge bg-success p-2"><?php echo $product['state_name']?></span>
          <span class="badge bg-success p-2"><?php echo $product['lga_name']?></span>
        </div>
        <hr/>
          <div>
             <p class="text-success"><strong>Product Name:</strong> <?php echo $product["product_name"] ?>  </p>
          </div>
          <hr>

            <div>
              <p class="text-success"><strong>Select Quantity :</strong></p>
             <form action="process/process_cart.php" method="post">
            
              <select name="qty" id="" class="btn border border-subtle mb-2">
                              <option value="">Quantity</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                            </select>
              <input type="hidden" name="product_name" value="<?php echo $product['product_name']?>">
              <input type="hidden" name="prod_id" value="<?php echo $product['prod_id']?>">
              <button class="btn btn-success ft-btn col-10 offset-md-1 shadow 2" name="cartbtn"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                </form>
            </div> 
            <div class="accordion accordion-flush border border-subtle my-3 rounded" id="accordionFlushExample">
              <div class="accordion-item">
                <h2 class="accordion-header text-success" id="flush-headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                   Description
                  </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">Product Description: <?php echo $product["product_detail"] ?> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>

     <?php 
      }else{
        echo"<P class='alert alert-info'>Your cart is empty,add a product and continue shopping.</p>";
      }
      
      ?> 
      </table>
    </div>


    
    <?php 
    require_once "partials/footer.php";
    ?>