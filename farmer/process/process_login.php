<?php 
 session_start();
    require_once"../Classes/utility.php";
    require_once"../Classes/Farmer.php";
    $farmer = new Farmer;

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

if(isset($_POST['btn'])){
        $email = sanitize($_POST['email']);
        $pass = sanitize($_POST['password']);
        $user = $_POST['radio']? $_POST['radio']:"";

                if(empty($email) || empty($pass) ||  empty($user) ){
                    $_SESSION['farmerror']= "All fields are required.";
                    header("location:../login.php");
                    exit;
                }
                
               
                $data = $farmer->farmer_login($email,$pass,$user);
                
                 if($data){
                    $isDisabled = $farmer->check_user_status($data);
                    if($isDisabled){
                        $_SESSION['farmerror']= "Your account has been disabled, contact support for more information";
                        header("location:../login.php");
                    exit;
                }
              }


                if($data){
                    $_SESSION['farmeronline'] = $data;
                    header("location:../dashboard.php");
                    exit;
                }else{
                    $_SESSION['farmerror'] = "Something went wrong try again";
                    header("location:../login.php");
                }

}else{
    $_SESSION['farmerror'] = "Please login";
    header("location:../login.php");
    exit;
}


?>