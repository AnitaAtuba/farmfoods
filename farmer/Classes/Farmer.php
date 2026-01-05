<?php 
require_once"Db.php";

class Farmer extends Db
{
    private $conn;
    public function __construct(){
        $this->conn = $this->connect();
    }

    public function fetch_farmer_details($farmerid){
        try{
                $sql = "SELECT user_fname,user_lname,role='farmer',user_email,user_addr1,user_addr2,user_dp,user_dob,user_phone FROM user  WHERE user_id=? ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$farmerid]);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                return $data;
        }catch(PDOException $e){
                // $e->getMessage(); die();
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
                 die($e->getMessage());
                return false;
        }
    }

   public function insert_farmer($fname,$lname,$email,$pass1,$user){
                 try{
                $sql = "INSERT INTO user SET user_fname=?,user_lname=?,user_email=?,user_pass=?,role=?";
                $stmt = $this->conn->prepare($sql);
                $hashed = password_hash($pass1, PASSWORD_DEFAULT);
                $stmt->execute([$fname,$lname,$email,$hashed,$user]);
                $guestid = $this->conn->LastInsertId();
                return $guestid;
        }catch(PDOException $e){
                die($e->getMessage());
                return false;
        }
   }

   public function farmer_login($email,$password,$user){
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
                                $_SESSION['farmerror'] = "Invalid Password";
                                return false;
                            }
                }else{
                    $_SESSION['farmerror'] = "Invalid Email Address";
                        return false;
                }
        }catch(PDOException $e){
                               die($e->getMessage());

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
                               die($e->getMessage());

                return false;
        }
   }

       public function fetch_lga(){
                 try{
                $sql = "SELECT * FROM local_govt";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $lga=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $lga;
        }catch(PDOException $e){
                               die($e->getMessage());

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
                               die($e->getMessage());

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
                               die($e->getMessage());
                return false;
         }
       }
    
              public function add_product($name,$price,$image,$category,$detail,$userid){
         try{
                $sql = "INSERT INTO product (product_name,prod_price,product_image,prod_categoryid,product_detail,product_userid) VALUES (?,?,?,?,?,?)";
                $stmt = $this->conn->prepare($sql);
               $res= $stmt->execute([$name,$price,$image,$category,$detail,$userid]);
               var_dump($res);
                die();

                return $res;
        }catch(PDOException $e){
                die($e->getMessage());
                return false;
         }
       }

           public function edit_product($name,$price,$category,$detail,$userid,$prod_id){
         try{
                $sql = "UPDATE `product` SET product_name=?,prod_price=?,prod_categoryid=?,product_detail=?,product_userid=? WHERE prod_id=?";
                $stmt = $this->conn->prepare($sql);
               $res= $stmt->execute([$name,$price,$category,$detail,$userid,$prod_id]);
                return $res;
        }catch(PDOException $e){
                // $e->getMessage(); die();
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
                               die($e->getMessage());

                return false;
        }
   }

                   public function fetch_product_category($id){
                 try{
                $sql = "SELECT * FROM product WHERE prod_categoryid= ? ORDER BY prod_categoryid ASC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $cat=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $cat;
        }catch(PDOException $e){
                               die($e->getMessage());

                return false;
        }
   }


        
           public function fetch_farmer_product($userid){
         try{
                $sql = "SELECT product.*, category.*, 
               DATE_FORMAT(date_uploaded, '%d-%m-%Y') AS formatted_date
        FROM product 
        JOIN category ON prod_categoryid = category_id 
        WHERE product_userid = ? 
        ORDER BY date_uploaded DESC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$userid]);
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $res;
        }catch(PDOException $e){
                               die($e->getMessage());

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
                               die($e->getMessage());

                return false;
         }
       }


       public function fetch_all_product(){
         try{
                $sql = "SELECT * FROM product JOIN category ON prod_categoryid = category_id ORDER BY product_name ASC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $res;
        }catch(PDOException $e){
                               die($e->getMessage());

                return false;
         }
       }


       public function fetch_product_by_id($id) {
    try {
        $sql = "SELECT * FROM product WHERE prod_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
                               die($e->getMessage());

        return false;
    }
}




        public function fetch_farmers(){
        try{
                $sql = "SELECT * FROM user JOIN state ON  user_stateid=state_id WHERE role IN('farmer') ORDER BY state_name ASC LIMIT 4 ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }catch(PDOException $e){
                               die($e->getMessage());

                return false;
        }
    }

         public function logout_farmer(){
                unset($_SESSION['farmeronline']);
                unset($_SESSION);
                session_destroy();
            }

    
            public function total_customers($id){
                 try{
                        $sql = "SELECT COUNT(DISTINCT buyer.user_id) AS total_customers
                FROM orders o
                JOIN user AS buyer ON o.order_userid = buyer.user_id
                JOIN order_details od ON od.detail_orderid = o.order_id
                JOIN product p ON od.detail_productid = p.prod_id
                JOIN user AS seller ON p.product_userid = seller.user_id
                WHERE seller.user_id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $data= $stmt->fetch(PDO::FETCH_ASSOC);
                return $data['total_customers'];
        }catch(PDOException $e){
                               die($e->getMessage());

                return false;
        }
            }

            public function total_orders($id){
                 try{
                $sql = "SELECT COUNT(DISTINCT order_id) AS total_orders
                FROM orders
                JOIN order_details ON order_id = detail_orderid
                JOIN product ON detail_productid = prod_id
                JOIN user ON order_userid = user_id
                WHERE product_userid = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $data= $stmt->fetch(PDO::FETCH_ASSOC);
                return $data['total_orders'];
        }catch(PDOException $e){
                               die($e->getMessage());

                return false;
        }
            }
             
        public function total_products($id){
                 try{
                $sql = "SELECT * FROM product WHERE product_userid=? ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $data= $stmt->rowCount();
                return $data;
        }catch(PDOException $e){
                               die($e->getMessage());

                return false;
        }
            }

            public function new_products($id){
         try{
                $sql = "SELECT * FROM user JOIN product ON product_userid=user_id JOIN category ON prod_categoryid = category_id WHERE product_userid=? ORDER BY prod_id DESC LIMIT 5";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }catch(PDOException $e){
                               die($e->getMessage());

                return false;
        }
            }

            public function all_orders($id){
          try{
                $sql = "SELECT o.*, od.*, p.*, buyer.*, s.*,pay.*
                FROM orders o
                JOIN order_details od ON od.detail_orderid = o.order_id
                JOIN product p ON od.detail_productid = p.prod_id
                JOIN user buyer ON o.order_userid = buyer.user_id
                JOIN state s ON buyer.user_stateid = s.state_id
                JOIN payment pay ON pay.pay_orderid = o.order_id
                WHERE p.product_userid = ?
                ORDER BY o.order_date DESC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }catch(PDOException $e){
                               die($e->getMessage());

                return false;
        }
            }

             public function orders_details($id){
          try{
                $sql = "SELECT order_details.*, 
       orders.*, 
       product.*, 
       user.*, 
       payment.*, 
       DATE_FORMAT(order_date, '%d-%m-%Y') AS formatted_order_date
        FROM order_details
        JOIN orders   ON order_id = detail_orderid
        JOIN product  ON detail_productid = prod_id
        JOIN user     ON order_userid = user_id
        JOIN payment  ON pay_orderid = order_id
        WHERE product_userid = ?
        ORDER BY order_date DESC";   
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }catch(PDOException $e){
                               die($e->getMessage());

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


}
?>