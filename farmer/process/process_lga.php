<?php 
session_start();
require_once"../Classes/Farmer.php";

$farmer = new Farmer;
$stat = $farmer->fetch_states();
 $local= $farmer->fetch_lga();



    if(isset($_POST['state'])){
        $state_id= $_POST['state'];
        $lga =$farmer->fetch_lga_state($state_id);
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