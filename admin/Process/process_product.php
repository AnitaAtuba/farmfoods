<?php 
    session_start();
    require_once"../Classes/Admin.php";
    require_once"../Classes/utility.php";

    if(isset($_POST['btn'])){
                $name = sanitize($_POST['name']);
                $price = sanitize($_POST['price']);
                $detail = sanitize($_POST['detail']);
                $status = sanitize($_POST['status']);
                

                // echo"<pre>"; print_r($_FILES); echo"</pre>";
                         // if(!isset($_FILES['cover'])){
                        // $_SESSION['adminerror']= "Please select an image and try again!";
                        // header("location:../addproduct.php");
                        // exit;
                        // }
                                        
                        // $filename = $_FILES['image']['name'];
                        // $tmp_name = $_FILES['image']['tmp_name'];
                        // $error = $_FILES['image']['error'];
                        // $size = $_FILES['image']['size'];

                if(empty($name) || empty($price) || empty($detail) || empty($status)){
                          $_SESSION['adminerror'] = "All fields are required.";
                          header("location:../addproduct.php");
                           exit;
                         }
                         

                        // if($error > 0){
                        //     $_SESSION['adminerror']= "Please select an image and try again!";
                        //     header("location:../addproduct.php");
                        //     exit;
                        // }
                    
                        // if($size > (1024*1024*2)){
                        //     $_SESSION['adminerror']= "File too big, try again!";
                        //     header("location:../addproduct.php");
                        //     exit;
                        // }

                        // $format = ["jpg","png","jpeg"];
                        // $ext = explode('.', $filename);
                        // $extension = strtolower(end($ext));

                        // if(!in_array($extension,$format)){
                        //     $_SESSION['adminerror'] ="File extension not supported";
                        //     header("location:../addproduct.php");
                        //     exit;
                             
                        // }

                        // $uniquefilename = "image_".uniqid()."_".time().".$extension";
                        // $upload = move_uploaded_file($tmp_name,"../uploads/$uniquefilename");
                          
                         $admin = new Admin;
                         $upload = $admin->insert_product($name,$price,$uniquefilename,$status);
                         
                        if($upload){
                            $_SESSION['adminsuccess'] = "Your product $name has been succesfully added";
                            header("location:../adminproduct.php");
                            exit;
                        }else{
                              $_SESSION['adminerror']= "Failed to upload file, please try again.";
                            header("location:../addproduct.php");
                            exit;
                        }
    
    }else{
        $_SESSION['adminerror']="Please complete the form.";
        header("location:../addproduct.php");
        exit;
    }

?>