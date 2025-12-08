<?php 
if(!isset($_SESSION['farmeronline'])){
    $_SESSION['farmermessage']= "You must be logged in";
    header("location:index.php");
    exit;
}


?>