<?php 

session_start();
require_once"../userguard.php";
require_once"../classes/Farmer.php";
require_once"../Classes/utility.php";
 $farmer =  new Farmer;

//    die("hi");      



if(isset($_POST['editbtn'])){

            $prod_id = $_POST['prod_id'];
            $userid = $_SESSION['farmeronline'];
            $product_id =  sanitize($_POST['product']);
            $data = $farmer->fetch_product_by_id($product_id);
            $name = $data['product_name'];
            $price =sanitize( $_POST['price']);
            $category =sanitize( $_POST['category']);
            $detail =sanitize( $_POST['detail']);
            

            
            if(empty($name) || empty($price) || empty($category) || empty($detail)){
             
             $_SESSION['farmerror'] = "All fields are required";
                    header("location:../allproducts.php");
                    exit;              
            }



                $res= $farmer->edit_product($name,$price,$category,$detail,$userid,$prod_id);

                
                    if($res){
                            $_SESSION['farmmessage'] = "Product: $name has been Updated successfully";
                               header("location:../allproducts.php");
                             exit; 
                          }else{
                                $_SESSION['farmerror'] = "Unable to update product: $name try again";
                                header("location:../allproducts.php");
                                exit;
                            } 


}
?>