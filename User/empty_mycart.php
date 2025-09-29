<?php 
session_start();
require_once"userguard.php";
require_once"classes/Buyer.php";

$buyer = new Buyer;
$buyer->empty_mycart($_SESSION['buyeronline']);
$_SESSION['buyermessage'] = "Your cart is now empty.";
header("location:cart.php");
exit;

?>