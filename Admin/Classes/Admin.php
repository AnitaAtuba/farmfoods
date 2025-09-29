
<?php 
 
    require_once"Db.php";

    class Admin extends Db
    {
        private $conn;
        public function __construct(){
            $this->conn =$this->connect();
        }


            public function admin_login($username,$password){
            try{
                $sql = "SELECT * FROM admin WHERE admin_username=?";
                
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$username]);
                $record = $stmt->fetch(PDO::FETCH_ASSOC);

                if($record){
                        $stored_pass = $record['admin_pwd'];
                        $check = password_verify($password,$stored_pass);

                            if($check == true){
                                $adminid = $record['admin_id'];
                                return $adminid;
                            }else{
                                $_SESSION['adminerror'] = "Invalid Password";
                                return false;
                            }
                }else{
                    $_SESSION['adminerror'] = "Invalid Email Address";
                        return false;
                }
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
   }


             public function insert_admin($username,$email,$pass){
                 try{
                $sql = "INSERT INTO admin SET admin_username=?,admin_email=?,admin_pwd=?";
                $stmt = $this->conn->prepare($sql);
                $hashed = password_hash($pass, PASSWORD_DEFAULT);
                $stmt->execute([$username,$email,$hashed]);
                $adminid =$this->conn->LastInsertId();
                return $adminid;
        }catch(PDOException $e){
                //$e->getMessage(); die();
                return false;
        }
   }


    public function check_email_exist($email){
         try{
                $sql = "SELECT * FROM admin WHERE admin_email=?";
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
            public function fetch_admin_details($admin_id){
               try{
                     $sql = "SELECT * FROM admin WHERE admin_id=?";
                    $stmt =$this->conn->prepare($sql);
                    $stmt->execute([$admin_id]);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                             return $data;
               }catch(PDOException $e){
                    // $e->getMessage();
                    return false;
               }
                
            }

             public function fetch_some_sellers(){
               try{
              $sql = "SELECT * FROM user JOIN state ON user_stateid=state_id JOIN local_govt ON user_lga=lga_id WHERE role IN('farmer') ORDER BY user_fname ASC LIMIT 6";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
               }catch(PDOException $e){
                // $e->getMessage();
                return false;
               }
            }

            public function fetch_all_sellers(){
               try{
              $sql = "SELECT * FROM user JOIN state ON user_stateid=state_id JOIN local_govt ON user_lga=lga_id WHERE role IN('farmer') ORDER BY user_fname ASC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
               }catch(PDOException $e){
                // $e->getMessage();
                return false;
               }
            }

            
            public function fetch_some_customers(){
            try{
                 $sql = "SELECT * FROM user JOIN state ON user_stateid=state_id JOIN local_govt ON user_lga=lga_id WHERE role IN('buyer') ORDER BY user_fname ASC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
               }catch(PDOException $e){
                // $e->getMessage();
                return false;
               }
            }

            public function fetch_all_customers(){
            try{
                 $sql = "SELECT * FROM user JOIN state ON user_stateid=state_id JOIN local_govt ON user_lga=lga_id WHERE role IN('buyer') ORDER BY user_fname ASC LIMIT 6";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
               }catch(PDOException $e){
                // $e->getMessage();
                return false;
               }
            }

        public function fetch_some_products(){
            try{ 
                $sql="SELECT * FROM product JOIN user ON product_userid=user_id JOIN category ON prod_categoryid = category_id  ORDER BY RAND() LIMIT 6";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
               }catch(PDOException $e){
                // $e->getMessage();
                return false;
               }
            }

             public function fetch_all_products(){
            try{
                $sql = "SELECT * FROM product JOIN user ON product_userid=user_id JOIN category ON prod_categoryid = category_id JOIN state ON user_stateid=state_id JOIN local_govt ON user_lga=lga_id  ORDER BY date_uploaded DESC LIMIT 6"; 
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
               }catch(PDOException $e){
                // $e->getMessage();
                return false;
               }
            }



         public function fetch_all_orders(){
            try{
                $sql = "SELECT buyer.*, o.*, p.*,pay.*,st.*,lg.*,od.*
                FROM user AS buyer
                JOIN orders o ON buyer.user_id = o.order_userid
                JOIN order_details od ON od.detail_orderid = o.order_id
                JOIN product p ON od.detail_productid = p.prod_id
                JOIN user AS seller ON p.product_userid = seller.user_id
                JOIN payment pay ON pay.pay_orderid = o.order_id
                JOIN state st ON st.state_id=buyer.user_stateid
                JOIN local_govt lg ON lg.lga_id=buyer.user_lga

                WHERE buyer.role = 'buyer';
                ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
               }catch(PDOException $e){
                // $e->getMessage();
                return false;
               }
            }

        public function delete_product($id){
                try{
            $sql = "DELETE FROM product WHERE prod_id=?";
            $stmt = $this->conn->prepare($sql);
           $data= $stmt->execute([$id]);
            return $data;
                }catch(PDOException $e){
                      $_SESSION['adminerror']= $e->getMessage();
                    //   die;

                }
           }

            public function disable_user($id){
                try{
            $sql = "UPDATE user SET user_status='disabled' WHERE user_id=?";
            $stmt = $this->conn->prepare($sql);
           $data= $stmt->execute([$id]);
            return $data;
                }catch(PDOException $e){
                      $_SESSION['adminerror']= $e->getMessage();
                    //   die;

                }
            } 


             
            public function enable_user($id){
                try{
            $sql = "UPDATE user SET user_status='active' WHERE user_id=? ";
            $stmt = $this->conn->prepare($sql);
           $data= $stmt->execute([$id]);
            return $data;
                }catch(PDOException $e){
                      $_SESSION['adminerror']= $e->getMessage();
                    //   die;

                }
            } 
                        


            public function logout_admin(){
                unset($_SESSION['adminonline']);
                unset($_SESSION);
                session_destroy();
            }


    }

?>