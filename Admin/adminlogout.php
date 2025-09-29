<?php 
session_start();
require_once"classes/Admin.php";
$admin = new Admin;
$admin->logout_admin();
header("location:adminlogin.php");
exit;




?>