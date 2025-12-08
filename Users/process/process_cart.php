<?php 
session_start();
require_once"../userguard.php";
require_once"../Classes/Buyer.php";
$buyer= new Buyer;

echo"<pre>";
print_r($_POST);
echo"</pre>";
// die();

if(isset($_POST['cartbtn'])){
    $product_id= $_POST['prod_id'];
    $user_id= $_SESSION['buyeronline'];
    $product_name=$_POST['product_name'];
    $quantity = $_POST['qty'];

    if($quantity < 1){
        $_SESSION['buyererror'] = "Select a quantity and add to cart.";
        header("location:../market.php");
        exit;
    }

    $check = $buyer->check_product($product_id,$user_id);
    if($check){
        $_SESSION['buyererror'] = "$product_name already in cart";
        header("location:../market.php");
    exit;
    }else{
        $res = $buyer->add_to_cart($product_id,$user_id,$quantity);
        $_SESSION['buyermessage'] ="$product_name added to cart";
    }

    header("location:../cart.php");
    exit;

    // $check = $buyer->check_item($product_id,$user_id)
}else{
        $_SESSION['buyererror'] = "Select a product and add to cart.";
        header("location:../market.php");
        exit;
}



?>