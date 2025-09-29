<?php 
session_start();
require_once"userguard.php";
require_once"classes/Buyer.php";
$buyer= new Buyer;
$cart = $buyer->get_my_cart($_SESSION['buyeronline']);
foreach($cart as $ca){
    $name =$ca['product_name'];
}


// echo"<pre>";
// print_r($_POST);
// echo"</pre>";
// die();

if(isset($_POST['deletebtn'])){
    $product_id= $_POST['prod_id'];

        $buyer->empty_cart($product_id);

        $_SESSION['buyermessage'] = ucFirst($name)." has been removed from cart";
        header("location:cart.php");
        exit;
   
}else{
        $_SESSION['buyererror'] = "Sorry could not delete product";
        header("location:cart.php");
        exit;
}



?>