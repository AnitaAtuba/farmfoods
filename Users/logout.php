<?php 
session_start();
require_once"Classes/Buyer.php";
$buyer = new Buyer;
$buyer->logout_buyer();
// echo"hello";
header("location:index.php");
exit;

?>


