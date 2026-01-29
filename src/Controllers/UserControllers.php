<?php
      namespace App\Controllers;

      use App\Models\User;

      class UserControllers{
            public function register($userName, $email, $password){
                  return (new User())->register($userName, $email, $password);
            }
            public function getUser($id){
                  $userName = $_POST["name"];
                  return (new User())->getUser($id);
            }
            public function updateToken($userId, $token, $iv){
                  return (new User())->updateToken($userId, $token, $iv);
            }
            public function createUser($username, $email, $password){
                  if(!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["password"])){
                        return false;
                  }
                  if($_SERVER['REQUEST_METHOD'] === 'POST'){
                        // receving data from form and passing to model
                        $username = trim($_POST["name"]);
                        $email = trim($_POST["email"]);
                        $password = trim($_POST["password"]);

                        $user = new User();
                        $user->findByUsername($username);
                  }
            }
      }
?>