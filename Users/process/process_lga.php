<?php 
session_start();
require_once"../Classes/Buyer.php";


$buyer = new Buyer;
$stat = $buyer->fetch_states();
 $local= $buyer->fetch_lga();



    if(isset($_POST['state'])){
        $state_id= $_POST['state'];
        $lga =$buyer->fetch_lga_state($state_id);
        if($lga){
            foreach($lga as $lg){
            echo'<option value="'.$lg['lga_id'].'">'.$lg['lga_name'].'</option>';
            }
            }else{
        echo "<option>No LGA Found</option>";
         }
    }


// echo"<pre>";
// print_r($state_id);
// echo"</pre>";

// value='$lg[state_id]'

?>