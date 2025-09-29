<?php 
session_start();
require_once"userguard.php";
require_once"classes/Buyer.php";
$buyer= new Buyer;

// foreach($orderid as $id){
//     $order =$id['order_id'];
// }




if(isset($_POST['order_id'])){
    $detail_id= $_POST['order_id'];

    $order_id= $buyer->fetch_detail($detail_id);  
}



?>