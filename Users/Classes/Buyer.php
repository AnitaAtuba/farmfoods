<?php 

require_once"Db.php";

class Buyer extends Db
{
    private $conn;
    public function __construct(){
        $this->conn = $this->connect();
    }

    public function fetch_buyer_details($buyerid){
        try{
                $sql = "SELECT user_fname,user_lname,role='buyer',user_email,user_addr1,user_addr2,user_dp,user_dob,user_phone FROM user  WHERE user_id=?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$buyerid]);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                return $data;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
    }


    public function check_email_exist($email){
         try{
                $sql = "SELECT * FROM user WHERE user_email=?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$email]);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($data){
                        return true;
                    }else{
                        return false;
                    }
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
    }

   public function insert_buyer($fname,$lname,$email,$pass1,$user){
                 try{
                $sql = "INSERT INTO user SET user_fname=?,user_lname=?,user_email=?,user_pass=?,role=?";
                $stmt = $this->conn->prepare($sql);
                $hashed = password_hash($pass1, PASSWORD_DEFAULT);
                $stmt->execute([$fname,$lname,$email,$hashed,$user]);
                $guestid =$this->conn->LastInsertId();
                return $guestid;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
   }

   public function buyer_login($email,$password,$user){
            try{
                $sql = "SELECT * FROM user WHERE user_email=? AND role=?";
                
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$email,$user]);
                $record = $stmt->fetch(PDO::FETCH_ASSOC);

                if($record){
                        $stored_pass = $record['user_pass'];
                        $check = password_verify($password,$stored_pass);

                            if($check == true){
                                $guestid = $record['user_id'];
                                return $guestid;
                            }else{
                                $_SESSION['buyererror'] = "Invalid Password";
                                return false;
                            }
                }else{
                    $_SESSION['buyererror'] = "Invalid Email Address";
                        return false;
                }
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
   }

  


    public function fetch_states(){
                 try{
                $sql = "SELECT * FROM state";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $states=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $states;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
   }

       public function fetch_lga(){
                 try{
                $sql = "SELECT * FROM local_govt ORDER BY lga_name ASC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $lga=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $lga;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
   }

          public function fetch_category(){
                 try{
                $sql = "SELECT * FROM category ORDER BY category_name ASC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $cat=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $cat;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
   }

          public function fetch_lga_state($id){
                 try{
                $sql = "SELECT lga_id,lga_name FROM local_govt WHERE state_id=?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $stateid=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $stateid;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
   }

       public function update_profile($dob,$phone,$lga,$state,$addr1,$addr2,$dp_name,$userid){
         try{
                $sql = "UPDATE `user` SET user_dob=?,user_phone=?,user_lga=?,user_stateid=?,user_addr1=?,user_addr2=?,user_dp=? WHERE user_id=?";
                $stmt = $this->conn->prepare($sql);
               $res= $stmt->execute([$dob,$phone,$lga,$state,$addr1,$addr2,$dp_name,$userid]);
                return $res;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
         }
       }


               public function fetch_all_product(){
         try{
                $sql = "SELECT * FROM product JOIN user ON product_userid=user_id JOIN category ON prod_categoryid = category_id ORDER BY product_name ASC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $res;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
         }
       }


        public function fetch_some_product(){
         try{
                $sql = "SELECT * FROM product JOIN user ON user_id=product_userid JOIN category ON prod_categoryid = category_id ORDER BY RAND() LIMIT 6 ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $res;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
         }
       }


               public function fetch_farmers(){
        try{
                $sql = "SELECT * FROM user JOIN state ON  user_stateid=state_id WHERE role IN('farmer')  LIMIT 4";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
    }

                public function total_orders_number($id){
                 try{
                $sql = "SELECT * FROM orders JOIN user ON order_userid=user_id WHERE order_userid=? ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $data= $stmt->rowCount();
                return $data;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
            }

              public function fetch_detail($id){
                 try{
                $sql = "SELECT *
                        FROM orders
                        JOIN order_details ON orders.order_id = order_details.detail_orderid
                        JOIN product ON order_details.detail_productid = product.prod_id
                        WHERE order_details.detail_orderid =?  ORDER BY orders.order_date DESC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
            }

            
              public function total_orders($id){
                 try{
                $sql = "SELECT *,DATE_FORMAT(order_date, '%d-%m-%Y') AS formatted_date
                        FROM orders
                        JOIN user ON order_userid=user_id
                        WHERE orders.order_userid = ? ORDER BY orders.order_date DESC;";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
            }

         public function total_orders_details($id){
                 try{
                         $sql = " SELECT
                        buyer.user_id AS buyer_id,
                        buyer.user_fname AS buyer_fname,
                        buyer.user_lname AS buyer_lname,
                        buyer.user_phone AS buyer_phone,
                        orders.order_id,
                        orders.order_date,
                        orders.order_totalamt,
                        order_details.detail_productid,
                        order_details.detail_quantity,
                        order_details.detail_amount,
                        product.product_name,
                        product.prod_price,
                        product.product_image,
                        category.category_id,
                        category.category_name,
                        DATE_FORMAT(order_date, '%d-%m-%Y') AS formatted_date,
                        farmer_state.state_id AS farmer_state_id,
                        farmer_state.state_name AS farmer_state,
                        farmer.user_id AS farmer_id,
                        farmer_lga.lga_id AS farmer_lga_id,
                        farmer_lga.lga_name AS farmer_lga_name,
                        farmer.user_fname AS farmer_fname,
                        farmer.user_lname AS farmer_lname,
                        farmer.user_phone AS farmer_phone,
                        farmer.user_dp AS farmer_dp,
                        pay.pay_id,
                        pay.pay_totalamt,
                        pay.pay_status
                        FROM orders
                        JOIN user AS buyer ON orders.order_userid = buyer.user_id
                        JOIN order_details ON order_details.detail_orderid = orders.order_id
                        JOIN product ON order_details.detail_productid = product.prod_id
                        JOIN user AS farmer ON product.product_userid = farmer.user_id
                        JOIN category ON product.prod_categoryid = category.category_id
                        JOIN state AS farmer_state ON farmer.user_stateid = farmer_state.state_id
                        JOIN local_govt AS farmer_lga ON farmer.user_lga = farmer_lga.lga_id
                        JOIN payment AS pay ON pay.pay_orderid=orders.order_id
                        WHERE order_details.detail_orderid =? ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
            }





public function filter_search($search) {
    try {
        $sql = "SELECT * FROM product 
                JOIN category ON prod_categoryid = category_id
                JOIN user ON product_userid = user_id
                WHERE product_name LIKE ?
                ORDER BY product_name ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["%{$search}%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

public function filter_category($category) {
    try {
        $sql = "SELECT * FROM product 
                JOIN category ON prod_categoryid = category_id
                JOIN user ON product_userid = user_id
                WHERE prod_categoryid = ?
                ORDER BY product_name ASC";
                
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$category]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}


public function filter_lga($lga) {
    try {
        $sql = "SELECT * FROM product 
                JOIN category ON prod_categoryid = category_id
                JOIN user ON product_userid = user_id
                JOIN local_govt ON user_lga = lga_id
                WHERE user_lga = ?
                ORDER BY product_name ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$lga]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}



        public function filter_by_lga($lga_id) {
    try {
        $sql = "SELECT * 
                FROM product 
                JOIN user ON product_userid = user_id 
                JOIN category ON prod_categoryid = category_id 
                JOIN local_govt ON user_lga=lga_id
                WHERE user_lga= ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$lga_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
         // $e->getMessage();
        return false;
    }
}



                 public function search_productid($id){
               try{
                $sql="SELECT  * FROM product  JOIN user ON product_userid = user_id JOIN category ON prod_categoryid = category_id 
                JOIN state on user_stateid=state_id JOIN local_govt ON user_lga=lga_id  WHERE prod_id =? LIMIT 1 ";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$id]); 
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                 return $result;
               }catch(PDOException $e){
                        // $e->getMessage(); die;
                        return false;
               }
         }
        
         public function fetch_product_lga($lga){
               try{
                $sql="SELECT * FROM user WHERE user_lga =? AND role = 'farmer'";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$lga]); 
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                 return $result;
               }catch(PDOException $e){
                        // $e->getMessage(); die;
                        return false;
               }           
        }
       

              public function check_product($product_id,$user_id){
               try{
                $sql="SELECT * FROM cart WHERE cart_product_id=? AND cart_user_id=?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$product_id,$user_id]); 
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                 return $result;
               }catch(PDOException $e){
                        // $e->getMessage(); die;
                        return false;
               } 
        }
       
         public function add_to_cart($product_id,$user_id,$quantity){
               try{
                $sql="INSERT INTO cart(cart_product_id,cart_user_id,qty) VALUES (?,?,?)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$product_id,$user_id,$quantity]);
                 return true;
               }catch(PDOException $e){
                        // $e->getMessage(); die;
                        return false;
               } 
        }

         public function get_my_cart($user_id){
            try{
                    $sql = "SELECT * FROM cart JOIN product ON cart_product_id=prod_id JOIN category ON category_id=prod_categoryid JOIN user ON product_userid = user_id 
                JOIN state on user_stateid=state_id JOIN local_govt ON user_lga=lga_id WHERE cart_user_id =?";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([$user_id]);
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $records;
            }catch(PDOException $e){
                    //echo $e->getMessage(); die();
                    return false;
            }
           }

         public function empty_cart($product_id){
            try{
                $sql = "DELETE FROM cart WHERE cart_product_id=?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$product_id]);
                return true;
            }catch(PDOException $e){
                 //echo $e->getMessage(); die();
                 return false;
            }
           }


           public function create_order($user_id){
            try{
               $carts = $this->get_my_cart($user_id);
        //        $deets =$this->fetch_buyer_details($buyerid);
               $sql = "INSERT INTO orders(order_userid,order_totalamt) VALUES (?,?)";
               $stmt1 = $this->conn->prepare($sql);
               $stmt1->execute([$user_id,0]);
               $orderid = $this->conn->LastInsertId(); 
               $total = 0;
                    foreach($carts as $c){
                       
                        $prod_id = $c['cart_product_id'];
                        $amount = $c['prod_price'];
                        $qty = $c['qty'];
                                if($qty == 0){
                                  $total= ($total + $amount);       
                                }else{
                                  $total= ($total + $amount) * $qty;       
                                }
                       

                        // $finalTotal =($total * $qty);
                        $sql2 = "INSERT INTO order_details(detail_orderid,detail_productid,detail_amount,detail_quantity) VALUES (?,?,?,?)";
                        $stmt2 = $this->conn->prepare($sql2);
                        $stmt2->execute([$orderid,$prod_id,$total,$qty]);
                    }
                    
                    $sql3 = "UPDATE orders SET order_totalamt=? WHERE order_id=?";
                    $stmt3 = $this->conn->prepare($sql3);
                    $stmt3->execute([$total,$orderid]);
                //     $_SESSION['buyeronline'] = $orderid;

                    return $orderid; 
            }catch(PDOException $e){
                $_SESSION['buyererror'] = $e->getMessage(); die();
                    return false;
            }
           }

        public function empty_mycart($user_id){
            $sql = "DELETE  FROM cart WHERE cart_user_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$user_id]);
           }

         public function get_order($orderid){
                try{
                        $sql = "SELECT * FROM orders WHERE order_id=?";
                        $stmt =$this->conn->prepare($sql);
                        $stmt->execute([$orderid]);
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            return $result;
                }catch(PDOException $e){
                        // echo $e->getMessage();
                        return false;
                }
            }

              public function insert_payment($userid,$orderid,$payref){
                      $deets = $this->get_order($orderid);
                      $amt = 0;
                    if($deets){
                     $amt = $deets['order_totalamt'];
                       }

                try{
                        $sql = "INSERT INTO payment(pay_userid,pay_totalamt,pay_orderid,pay_refernum) VALUES(?,?,?,?)";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->execute([$userid,$amt,$orderid,$payref]);
                        $payid = $this->conn->LastInsertId();
                        return $payid;
                }catch(PDOException $e){
                        echo $e->getMessage();
                        return false;
                }
            }


                        public function my_transactions($userid){
                try{
                        $sql = "SELECT *,DATE_FORMAT(order_date, '%d-%m-%Y') AS formatted_date FROM payment JOIN orders ON pay_orderid=order_id JOIN user ON order_userid=user_id WHERE pay_userid=? ORDER BY pay_date DESC";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->execute([$userid]);
                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        return $data;
                }catch(PDOException $e){
                     // echo $e->getMessage();
                        return false;
                }
            }

             public function check_user_status($id){
                try{
            $sql = "SELECT * FROM  user where user_status='disabled' AND  user_id=?";
            $stmt = $this->conn->prepare($sql);
           $stmt->execute([$id]);
           $data=$stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
                }catch(PDOException $e){
                //        $e->getMessage(); die();
                          return false;

                }
           }



        public function logout_buyer(){
                unset($_SESSION['buyeronline']);
                unset($_SESSION);
                session_destroy();
            }

        }

?>