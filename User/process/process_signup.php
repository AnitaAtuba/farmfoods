<?php
    session_start();
    require_once"../Classes/utility.php";
    require_once"../Classes/Buyer.php";
    $buyer = new Buyer;
    
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

                 if($user == "farmer"){
                header("location:../../farmer/signup.php");
                exit;
            }

// require_once"../../Farmer/process/process_signup.php";
            if(empty($fname) || empty($lname) || empty($email) || empty($pass1) || empty($user)){
                $_SESSION['buyererror'] = "All fields are required.";
                header("location:../signup.php");
                exit;
                
            }else if($pass1 != $pass2){
                    $_SESSION['buyererror'] = "Your passwords do not match!";
                    header("location:../signup.php");
                    exit;
            }else if($buyer->check_email_exist($email) == true){
                    $_SESSION['buyererror'] = "The email already exist";
                    header("location:../signup.php");
                    exit;
            }else{
                $data = $buyer->insert_buyer($fname,$lname,$email,$pass1,$user);
                if($data){
                    $_SESSION['buyeronline'] = $data;
                    $_SESSION['buyermessage'] = "Kindly update your profile.";
                    header("location:../profile.php");
                    exit;
                }else{
                    $_SESSION['buyererror'] = "Registration failed, something went wrong.";
                    header("loaction:../signup.php");
                    exit;
                }
            }


}else{
    $_SESSION['buyererror'] = "Please sign up!!.";
    header("location:../index.php");
    exit;
}

?>