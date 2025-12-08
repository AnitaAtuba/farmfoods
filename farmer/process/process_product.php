<?php 
session_start();
require_once"../userguard.php";
require_once"../classes/Farmer.php";
require_once"../Classes/utility.php";
$farmer = new Farmer;




// echo"<pre>";
// print_r($_FILES);
// echo"</pre>";

//  echo"<pre>";
// print_r($name);
// echo"</pre>";
// die;

if(isset($_POST['addbtn'])){

            $userid = $_SESSION['farmeronline'];
            $product_id =  sanitize($_POST['product']);
            $price =sanitize( $_POST['price']);
            $category =sanitize( $_POST['category']);
            $detail =sanitize( $_POST['detail']);
            $data = $farmer->fetch_product_by_id($product_id);
            $name = $data['product_name'];

 


            $filename = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $error = $_FILES['image']['error'];
            
            if(empty($name) || empty($price) || empty($category) || empty($detail)){
             $_SESSION['farmerror'] = "All fields are required";
                    header("location:../addproduct.php");
                    exit;              
            }
             
            if(empty(trim($filename))){ 
                 $_SESSION['farmerror'] = "Please upload product image";
                header("location:../profile.php");
                exit; 
            }

            if($error > 0){
                  $_SESSION['farmerror'] = "Product image could not be uploaded";
                header("location:../addproduct.php");
                exit; 
            }
                        
            if($size > (1024*1024*20)){
                  $_SESSION['farmerror'] = "Product image size cannot be greater than '20mb'";
                header("location:../addproduct.php");
                exit; 
            }

            $extension = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
            $allowed = ['jpg','jpeg','png','gif'];
            if(!in_array($extension,$allowed)){

                     $_SESSION['farmerror'] = "Extension not allowed 'jpg,jpeg,png,gif' are allowed";
                header("location:../addproduct.php");
                exit; 
            }
           
        $dp_name = "pd"."_".time()."_".$filename;
        $res = move_uploaded_file($tmp,"../assets/uploads/$dp_name");
            
          if($res){
                $farmer =  new Farmer;
                $product= $farmer->add_product($name,$price,$dp_name,$category,$detail,$userid);

                
                    if($product){
                            $_SESSION['farmmessage'] = "Your Product $name was added successfully";
                            header("location:../addproduct.php");
                             exit; 
                          }else{
                                $_SESSION['farmerror'] = "Unable to add product try again";
                                header("location:../addproduct.php");
                                exit;
                            } 

           }else{
                $_SESSION['farmerror'] = "Could not to upload picture try again";
                 header("location:../addproduct.php");
                 exit;
           }  
    }else{
             $_SESSION['farmerror'] = "Kindly add a product ";
            header("location:../addproduct.php");
            exit;
}





  all_product.php      
?>