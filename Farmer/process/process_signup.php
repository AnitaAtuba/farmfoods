<?php
    session_start();
    require_once"../Classes/utility.php";
    require_once"../Classes/Farmer.php";
    $farmer = new Farmer;
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
if(isset($_POST['btn'])){
        $fname = sanitize($_POST['firstname']);
        $lname = sanitize($_POST['lastname']);
        $email = sanitize($_POST['email']);
        $pass1 = sanitize($_POST['pass1']);
        $pass2 = sanitize($_POST['pass2']);
        $user = $_POST['radio']? $_POST['radio']:"";

        
            if($user == "buyer"){
                header("location:../../User/login.php");
                exit;
            }

            if(empty($fname) || empty($lname) || empty($email) || empty($pass1) || empty($user)){
                $_SESSION['farmerror'] = "All fields are required.";
                header("location:../signup.php");
                exit;
                
            }else if($pass1 != $pass2){
                    $_SESSION['farmerror'] = "Your passwords do not match!";
                    header("location:../signup.php");
                    exit;
            }else if($farmer->check_email_exist($email) == true){
                    $_SESSION['farmerror'] = "The email already exist";
                    header("location:../signup.php");
                    exit;
            }else{
                $data = $farmer->insert_farmer($fname,$lname,$email,$pass1,$user);
                if($data){
                    $_SESSION['farmeronline'] = $data;
                    $_SESSION['farmmessage'] = "Kindly update your profile.";
                    header("location:../profile.php");
                    exit;
                }else{
                    $_SESSION['farmerror'] = "Registration failed, something went wrong.";
                    header("loaction:../signup.php");
                }
            }


}else{
    header("location:../index.php");
    exit;
}

?>