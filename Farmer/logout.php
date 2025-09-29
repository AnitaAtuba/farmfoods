<?php 
session_start();
require_once"classes/Farmer.php";
$farmer = new Farmer;
$farmer->logout_farmer();
// echo"hello";
header("location:index.php");
exit;

?>


