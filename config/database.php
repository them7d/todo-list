<?php
      /**
            this class for connect to data base
            @return PDO Object connection
      */ 
      
      require_once 'config/config.php';
      class Database{

            private $host = DB_HOST;
            private $user = DB_USER;
            private $password = DB_PASSWORD;
            private $name = DB_NAME;

            public $conn

            public function connect(){
                  $this->conn = null;
                  try{

                        $this->conn = new PDO($host, $user, $password, $name);

                  }catch(PDOExpection $e){
                        echo $e->getMessage();
                  }
                  return $this->conn
            }
      }
?>