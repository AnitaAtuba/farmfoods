<?php 
            require_once"config.php";

        class Db 
        {
           private $dbhost = DB_HOST;
           private $dbname = DB_NAME;
           private $dbuser = DB_USER;
           private $dbpass = DB_PASS;

           protected function connect(){
            $dsn="mysql:host=$this->dbhost;dbname=$this->dbname";
            $option = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
            try{
                    $connection = new PDO($dsn,$this->dbuser,$this->dbpass,$option);
                        return $connection;
            }catch(PDOException $e){
                    $e->getMessage();
                    //return false();
            }
           }

        }

?>