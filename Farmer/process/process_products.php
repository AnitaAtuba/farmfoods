<?php 
session_start();

require_once"../Classes/Farmer.php";

$farmer = new Farmer;
// $cate = $farmer->fetch_category();
//  $allProducts= $farmer->fetch_all_product();


 
    if(isset($_POST['category'])){
         echo"<pre>";
    print_r($_POST['category']);
    echo"</pre>";
    // die();
        $category= $_POST['category'];
  
        $category =$farmer->fetch_product_category($category);
   
        if($category){
            foreach($category as $ct){
            echo'<option value="'.$ct['prod_id'].'">'.$ct['product_name'].'</option>';
            }
            }else{
        echo "<option>No Products found  2</option>";
         }
    }



// value='$lg[state_id]'





?>