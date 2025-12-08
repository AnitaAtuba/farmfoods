<?php 
session_start();
require_once"../Classes/Admin.php";
require_once"../Classes/utility.php";




    if(isset($_POST['btn'])){

        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['pass']);


    if(empty($username)|| empty($password)){
            $_SESSION['adminerror']= "Please fill your credentials";
            header("location:../adminlogin.php");
            exit;
    }
   
          $admin = new Admin;
          $data = $admin->admin_login($username,$password);  



                if($data){
                    $_SESSION['adminonline']= $data;
                    header("location:../admindashboard.php");
                    exit;

            // echo "<pre>";
            // print_r($_POST);    
            // echo "</pre>";
            // die();

                }else{
                    $_SESSION['adminerror'] = "Invalid details,Login again";
                     header("location:../adminlogin.php");
                    exit;
                }


    }else{
        $_SESSION['adminonline'] = "Please Login";
        header("location:../adminlogin.php");
        exit;
    }


?>