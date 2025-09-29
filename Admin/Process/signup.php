<?php
    session_start();
    require_once"../Classes/utility.php";
    require_once"../Classes/admin.php";
    $admin = new Admin;

 echo "<pre>";
    print_r($_POST);
    echo "</pre>";
        //  die();
   

if(isset($_POST['btn'])){
        $username = sanitize($_POST['username']);
        $email = sanitize($_POST['email']);
        $pass = sanitize($_POST['pass']);
   
            if(empty($username) || empty($email) || empty($pass)){
                $_SESSION['adminerror'] = "All fields are required.";
                header("location:../adminsignup.php");
                exit;
                
            }else if($admin->check_email_exist($email) == true){
                    $_SESSION['adminerror'] = "The email already exist";
                    header("location:../adminsignup.php");
                    exit;
            }else{
                $data = $admin->insert_admin($username,$email,$pass);
                    if($data){
                        $_SESSION['adminonline'] = $data;
                        $_SESSION['adminmessage'] = "Admin kindly login";
                        header("location:../adminlogin.php");
                        exit;
                    }else{
                        $_SESSION['adminerror'] = "Registration failed, something went wrong try again.";
                        header("loaction:../adminsignup.php");
                    }
            }


}else{
    header("location:../adminsignup.php");
    exit;
}

?>