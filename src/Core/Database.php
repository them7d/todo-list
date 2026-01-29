<?php
      /**
            this class for connect to data base
            @return PDO Object connection
      */ 

      namespace App\Core;
      use PDO;
      require_once __DIR__ . '/../../config/config.php';

      class Database{

            private $dns = DB_DNS;
            private $user = DB_USER;
            private $password = DB_PASSWORD;

            public $conn;

            public function connect(){
                  $this->conn = null;
                  try{

                        $this->conn = new PDO($this->dns, $this->user, $this->password);

                  }catch(PDOExpection $e){
                        echo $e->getMessage();
                  }
                  return $this->conn;
            }
      }
?>