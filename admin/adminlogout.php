<?php 
session_start();
require_once"Classes/Admin.php";
$admin = new Admin;
$admin->logout_admin();
header("location:adminlogin.php");
exit;




?>