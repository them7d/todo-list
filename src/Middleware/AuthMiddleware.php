<?php
      namespace App\Middleware;
      use App\Services\AuthService;
      require_once __DIR__ . '/../config/config.php';
      
      class AuthMiddleWare{

            public static function handle(){
                  $auth = new AuthService();
                  $user = $auth->user();
                  if(!$user){
                        header("Location:" . BASE_URL . "/login");
                        exit();
                  }
                  return $user;
            }
      }
?>