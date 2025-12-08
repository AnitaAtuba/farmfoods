<?php 
session_start();
require_once"../adminguard.php";
require_once"../classes/Admin.php";

$admin = new Admin;

$id = isset($_GET['id'])? $_GET['id'] :0;

// echo "<pre>";
// print_r($id);
// echo "</pre>";
// die();

if($id == 0){
    $_SESSION['adminerror'] ="Could not disable user";
    header("location:../admindashboard.php");
    exit;
}else{
    $response = $admin->disable_user($id);
    $_SESSION['adminsuccess'] ="User successfully disabled";
    header("location:../admindashboard.php");
    exit;
}

?>