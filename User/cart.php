<?php 
session_start();
require_once"userguard.php";
require_once"classes/buyer.php";
$buyer = new Buyer;
$deets = $buyer->fetch_buyer_details($_SESSION['buyeronline']);
$cart = $buyer->get_my_cart($_SESSION['buyeronline']);
require_once"partials/header.php";
require_once"partials/dash.php";

// echo"<pre>";
// print_r($cart);
// echo"</pre>";

?>
<div class="container-fluid">
<div style="overflow-x:auto">
<?php if(!empty($cart)){ ?>
  <table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Product Details</th>
        <th>Price & Quantity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $subtotal = 0;
      foreach($cart as $ca){
        $amount = $ca['prod_price'];
        $qty = $ca['qty'];
        $totalamt = ($qty == 0) ? $amount : ($amount * $qty);
        $subtotal += $totalamt;
    ?>
      <tr>
        <td>
          <img src="../Farmer/Assets/uploads/<?php echo $ca['product_image']; ?>" 
               alt="" width="150"  height="150" class="rounded">
        </td>
        <td>
          <div class="mt-3">
            <span class="border">
              <img src="../Farmer/Assets/uploads/<?php echo $ca["user_dp"]?>" 
                   width="50" height="50" class="rounded-5" alt="">
            </span>
            <span class="badge bg-success p-2 mt-2">
              <?php echo $ca['user_fname']." ".$ca['user_lname']?>
            </span>
            <span class="badge border text-success p-2 mt-2"><?php echo $ca['state_name']?></span>
            <span class="badge border text-success p-2 mt-2"><?php echo $ca['lga_name']?></span>
            <span class="badge border text-dark p-2 mt-2"><?php echo $ca['category_name']; ?></span>
          </div>
          <hr>
          <p class="fs-6 text-success"><strong>Product Name:</strong> <?php echo $ca['product_name'] ?> </p>
        </td>
        <td>
          <p class="price text-success"><strong>Price:</strong> &#8358;<?php echo number_format($ca['prod_price'],2); ?></p>
          <p class="price text-success"><strong>Total:</strong> &#8358;<?php echo number_format($totalamt,2); ?></p>
          <div>
            <span class="text-success">Quantity:</span>
            <select name="qty" class="btn me-3 border">
              <option value="<?php echo $ca['qty'] ?>"><?php echo $ca['qty'] ?></option>
            </select>
          </div>
        </td>
        <td class="col-sm-4 col-md-2">
          <form action="delete_product.php" method="post" class="my-4">
            <input type="hidden" name="prod_id" value="<?php echo $ca['prod_id'];?>">
            <button name="deletebtn" class="btn btn-warning" onclick="return confirm('Do you want to delete item from cart?')">
              <i class="fa-solid fa-trash"></i> Delete
            </button>
          </form>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>

  <!-- SUBTOTAL -->
  <div class="bg-white">
    <p class="text-center fs-3">
      <strong>Sub Total: &#8358; <?php echo number_format($subtotal,2)?> </strong>
    </p>
    <a href="Payment.php" class="btn btn-success col-10 offset-1">
      <i class="fa-solid fa-cart-shopping"></i> Checkout
    </a>
  </div>
<?php } else { ?>
  <p class="alert alert-info">Your cart is empty, add a product and continue shopping.</p>
<?php } ?>
</div>
</div>
<?php 
require_once "partials/footer.php";?>