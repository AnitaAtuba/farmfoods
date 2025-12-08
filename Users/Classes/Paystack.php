<?php 
   require_once"Db.php";
class Paystack extends Db
{
    private $conn;

    public function __construct(){
        $this->conn = $this->connect();
    }

    public function paystack_verify_step2($payref){
        $url = "https://api.paystack.co/transaction/verify/$payref";

        $headers = [
                        'Content-Type:application/json',
                        "Authorization:Bearer sk_test_e23e48c9b68966654f76681e4d10afa8883d33a3"
                    ];

                     //Step1 : initialize
                    $curlobj = curl_init($url);
                    
                    // Step2 : set options
                    curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false); 


                       //Step 3
                    $apirsp = curl_exec($curlobj);

                    //Step 4 & 5
                        if($apirsp){
                                curl_close($curlobj);
                                return json_decode($apirsp); 
                        }else{
                                $r = curl_error($curlobj);
                                // echo $r;
                                $_SESSION['buyererror'] = $r;
                                return false;
                        }
    }


    public function paystack_initialize_step1($email,$amount,$payref){
       
        $url = "https://api.paystack.co/transaction/initialize";
              $fields = [
                        'email' => $email,
                        'amount' => $amount * 100,
                        'reference' => $payref,
                        'callback_url' => "http://localhost/FarmFoods/User/paylanding.php"
                    ];
            $headers = [
                        'Content-Type:application/json',
                        "Authorization:Bearer sk_test_e23e48c9b68966654f76681e4d10afa8883d33a3"
                    ];

                    //Step1 : initialize
                    $curlobj = curl_init($url);
                    
                    // Step2 : set options
                    curl_setopt($curlobj, CURLOPT_CUSTOMREQUEST, 'POST');
                    curl_setopt($curlobj, CURLOPT_POSTFIELDS, json_encode($fields));
                    curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false); 
                    //Step 3
                    $apirsp = curl_exec($curlobj);

                    //Step 4 & 5
                        if($apirsp){
                                curl_close($curlobj);
                                return json_decode($apirsp); 
                        }else{
                                $r = curl_error($curlobj);
                                $_SESSION['buyererror'] = $r;
                                return false;
                        }
    }


           public function update_payment($ref,$status,$response){
            try{
                    $sql = "UPDATE payment SET pay_status=?, pay_data=? WHERE  pay_refernum=?";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([$status,$response,$ref]);
                    return true;
            }catch(PDOException $e){
                    // echo $e->getMessage(); 
                    return false;
            }
    }
}



?>