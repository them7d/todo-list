<?php
      namespace App\Models;
      use App\Core\Database;
      use PDO;
      
      class User{
            private $conn;

            public function __construct(){
                  $this->conn = (new Database())->connect();
            }

            public function createUser($username, $email, $password){

                  $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
                  
                  $stmt = $this->conn->prepare($query);

                  $username = htmlspecialchars(strip_tags($username));
                  $email = htmlspecialchars(strip_tags($email));
                  $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
                  if($email != null){
                        $stmt->bindValue(':email', null, PDO::PARAM_NULL);
                  }else{
                        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                  }
                  $stmt->bindValue(':password', $hashed_password, PDO::PARAM_STR);

                  if($stmt->execute()){
                        return true;
                  }
                  return false;
            }
            
            public function updateToken($userId, $token, $iv){

                  $query = "UPDATE users SET token = :token, iv = :iv WHERE id = :id";

                  $stmt = $this->conn->prepare($query);

                  $stmt->bindParam(":token", $token);
                  $stmt->bindParam(":iv", $iv);
                  $stmt->bindParam(":id", $userId);

                  if($stmt->execute()){
                        return true;
                  }
                  return false;
            }

            public function findUserByUsername($username){

                  $query = "SELECT * FROM users WHERE username = :username LIMIT 1";

                  $stmt = $this->conn->prepare($query);

                  $stmt->bindParam(":username", $username);

                  $stmt->execute();

                  return $stmt->fetchObject();
            }
            
      }
?>