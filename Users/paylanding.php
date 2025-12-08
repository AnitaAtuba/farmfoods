<?php 
session_start();
require_once"userguard.php";
require_once"Classes/Buyer.php";
require_once"Classes/Paystack.php";

$buyer = new Buyer;
$pay = new Paystack;

$ref = $_SESSION['ref'];
$orderid = $_SESSION['orderid'];

//consume paystack api to verify the transaction status
$response = $pay->paystack_verify_step2($ref);
    if($response){
            $status = $response->status;
            $message = $response->message;

        
                if($status == true){
                       $pay->update_payment($ref,"paid",json_encode($response)); 
                       $buyer->empty_mycart($_SESSION['buyeronline']);
                }else{
                   $pay->update_payment($ref,"failed",json_encode($response));
                }


                $_SESSION['buyermessage'] = "Payment successfull";
                header("location:user_summary.php");
                exit;
    }else{
        $_SESSION['buyererror'] = "Error Connecting to Paystack";
        header("location:cart.php");
        exit;
    }
 $response = $pay->paystack_verify_step2($ref);   
echo "<pre>";
print_r($response);
echo "</pre>";

?>