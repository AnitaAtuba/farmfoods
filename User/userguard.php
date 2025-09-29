<?php 
if(!isset($_SESSION['buyeronline'])){
    $_SESSION['buyermessage']= "You must be logged in";
    header("location:index.php");
    exit;
}


?>