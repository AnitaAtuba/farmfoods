<?php 
session_start();
require_once"userguard.php";
require_once"Classes/Buyer.php";
require_once"Classes/Paystack.php";
$pay = new Paystack;
$buyer = new Buyer;
$cart= $buyer->get_my_cart($_SESSION['buyeronline']);

//ONLY THOSE WHO HAVE THINGS IN THEIR CART CAN GET HERE .

echo"<pre>";
print_r($cart);
echo"</pre>";

if(empty($cart)){
    $_SESSION['buyermessage'] = "Please add item to cart";
    header("location:cart.php");
    exit;
}
 
$orderid = $buyer->create_order($_SESSION['buyeronline']);

//TRANSFER THE CONTENT OF CARTS TABLE INTO ORDER TABLE AND ORDER DETAILS TABLE. 'DONE'

//WE WILL GENERATE A PAYMENT REF NO AND INSERT INTO PAYMENT TABLE, STATUS WILL BE PENDING.
if($orderid){
    $_SESSION['orderid'] = $orderid;
    $payref = uniqid("BYFM"); //WE KEEP THIS IS SESSION
    $_SESSION['ref'] = $payref;
    $userid = $_SESSION['buyeronline'];



    $res = $buyer->insert_payment($userid,$orderid,$payref); //WE WILL CREATE THIS METHOD

    if($res){
                
              //fetch all the things we need like amount, email
                        $deets = $buyer->fetch_buyer_details($userid);
                        $order_deets= $buyer->get_order($orderid);

                        // echo"<pre>";
                        // print_r($order_deets);
                        // echo"</pre>";
                        // die(); 

                        //we will send payment request to paystack

                        $email = $deets['user_email'];

                        $amount = $order_deets['order_totalamt'];
                        $payresponse = $pay->paystack_initialize_step1($email,$amount,$payref);

                // $pay->paystack_initialize_step1($email,$amount,$payref);
                                        if($payresponse){
                                                
                                            if($payresponse->status == true){
                                                $auth_url = $payresponse->data->authorization_url;
                                                header("location:$auth_url");
                                                exit;
                                            }else{
                                                $issue = $payresponse->message;
                                                $_SESSION['buyererror'] = $issue;
                                                header("location:cart.php");
                                                exit;
                                            }
                                            // echo "<pre>";
                                            // print_r($payresponse);
                                            // echo"</pre>";

                        
                        }else{ //we recovered false from method
                            $_SESSION['buyererror'] = "Error conecting to paystack";
                                header("location:cart.php");
                                exit;
                              }
                              
                }else{
            $_SESSION['buyererror'] = "Transaction was not initiliazed.";
            header("location:cart.php");
            exit;
                }


        
}else{
    $_SESSION['buyererror'] = "Order was not created please try again.";
    header("location:cart.php");
    exit;
}
//WHEN WE CONNECT TO PAYSTACK - GIVE IT THE AMOUNT,REF, EMAIL.
//WE WILL RECEIVE RESPONSE FROM PAYSTACK.




// echo "<pre>";
// print_r($]);
// echo "</pre>";

?>