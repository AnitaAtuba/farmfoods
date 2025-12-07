<?php 
 session_start();
    require_once"../Classes/utility.php";
    require_once"../Classes/Buyer.php";
    $buyer = new Buyer;

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

if(isset($_POST['btn'])){
        $email = sanitize($_POST['email']);
        $pass = sanitize($_POST['password']);
        $user = $_POST['radio']? $_POST['radio']:"";

         if($user == "farmer"){
                header("location:../../Farmer/login.php");
                exit;
            }


                if(empty($email) || empty($pass) ||  empty($user) ){
                    $_SESSION['buyererror']= "All fields are required.";
                    header("location:../login.php");
                    exit;
                }

                $data = $buyer->buyer_login($email,$pass,$user);

                     if($data){
                            $isDisabled = $buyer->check_user_status($data);
                            if($isDisabled){
                                $_SESSION['buyererror']= "Your account has been disabled, contact support for more information";
                                header("location:../login.php");
                            exit;
                        }
                   }   

                   
                if($data){
                        $_SESSION['buyeronline'] = $data;
                        header("location:../market.php");
                        exit;
                }else{
                    $_SESSION['buyererror'] = "Something went wrong try again";
                    header("location:../login.php");
                    exit;
                }

}else{
    $_SESSION['buyererror'] = "Please login";
    header("location:../login.php");
    exit;
}


?>