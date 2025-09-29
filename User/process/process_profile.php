<?php 
session_start();

require_once"../userguard.php";
require_once"../Classes/Buyer.php";
require_once"../Classes/utility.php";



// echo"<pre>";
// print_r($_POST);
// echo"</pre>";

// echo"<pre>";
// print_r($_FILES);
// echo"</pre>";

    if(isset($_POST['subbtn'])){

            $userid = $_SESSION['buyeronline'];
            $dob =  $_POST['dob'];
            $phone =sanitize( $_POST['phone']);
            $state = $_POST['state'];
            $addr1 =sanitize( $_POST['address1']);
            $addr2 =sanitize( $_POST['address2']);
            $lga = $_POST['lga'];

            $filename = $_FILES['picture']['name'];
            $tmp = $_FILES['picture']['tmp_name'];
            $size = $_FILES['picture']['size'];
            $error = $_FILES['picture']['error'];
            
            if(empty($phone) || empty($addr1) || empty($state) || empty($lga)){

             $_SESSION['buyererror'] = "All fields are required";
                    header("location:../profile.php");
                    exit;              
            }
             
            if(empty(trim($filename))){ 
                 $_SESSION['buyererror'] = "Please upload an image";
                header("location:../profile.php");
                exit; 
            }

            if($error > 0){
                  $_SESSION['buyererror'] = "File could not be uploaded";
                header("location:../profile.php");
                exit; 
            }
                        
            if($size > (1024*1024*10)){
                  $_SESSION['buyererror'] = "File size cannot be greater than '10mb'";
                header("location:../profile.php");
                exit; 
            }

            $extension = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
            $allowed = ['jpg','jpeg','png','gif'];
            if(!in_array($extension,$allowed)){

                     $_SESSION['buyererror'] = "Extension not allowed 'jpg,jpeg,png,gif' are allowed";
                header("location:../profile.php");
                exit; 
            }
           
        $dp_name = "Bf"."_".time()."_".$filename;
        $res = move_uploaded_file($tmp,"../assets/uploads/$dp_name");
            
          if($res){
                $farmer =  new Buyer;
                $profile= $farmer->update_profile($dob,$phone,$lga,$state,$addr1,$addr2,$dp_name,$userid);
                
                    if($profile){
                            $_SESSION['buyermessage'] = "Account Successfully updated";
                            header("location:../profile.php");
                             exit; 
                          }else{
                                $_SESSION['buyererror'] = "Unable to update profile try again";
                                header("location:../profile.php");
                                exit;
                            } 

           }else{
                $_SESSION['buyererror'] = "Unable to upload picture";
                 header("location:../profile.php");
                 exit;
           }  
    

  
    }else{
            $_SESSION['buyererror'] = "Kindly update your profile";
            header("location:../profile.php");
            exit;
}
        
?>