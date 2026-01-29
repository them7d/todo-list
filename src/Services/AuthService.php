<?php
      namespace App\Services;
      use App\Core\Database;
      use App\Models\User;
      $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
      $dotenv->load();
      
      class AuthService{

            private $conn;
            private $key;

            public function __construct(){
                  $this->conn = (new Database())->connect();
                  $this->key = $_ENV['KEY'];
            }

            public function login($userId){
                  
                  // generate random token
                  $token = bin2hex(random_bytes(32));
                  $iv = random_bytes(16);

                  $encrypted_token = openssl_encrypt($token, 'AES-256-CBC', $this->key, 0, $iv);
                  $encrypted_token = base64_encode($encrypted_token . "::" . base64_encode($iv));

                  $user = new User($userId);
                  $user->updateToken($userId, $encrypted_token, base64_encode($iv));

                  setcookie("auth_token", $encrypted_token, time() + (86400 * 30), "/");
            }

            public function logout($userId){

                  setcookie("auth_token", "", time() - 3600, "/");

                  $user = new User();
                  $user->updateToken($userId, null, null);
            }
      }
?>