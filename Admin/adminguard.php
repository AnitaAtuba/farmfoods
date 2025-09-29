<?php 
if(!isset($_SESSION['adminonline'])){
    $_SESSION['adminmessage']= "You must be logged in";
    header("location:adminlogin.php");
    exit;
}


?>