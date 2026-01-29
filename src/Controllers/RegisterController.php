<?php
      namespace App\Controllers;
      use App\Core\Controller;
      use App\Models\User;

      class RegisterController extends Controller{

            public function index(){

                  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $confirm_password = $_POST['confirm_password'];

                        if($password !== $confirm_password){
                              $this->view("register", ['error' => 'Passwords do not match']);
                              return;
                        }
                        
                        $user = new User();
                        $foundedUser = $user->findUserByUsername($username);

                        if(!empty($foundedUser)){
                              $this->view("register", ['error' => 'Username already taken']);
                              return;
                        }
                        
                        $user->createUser($username, $email, $password);

                        $this->view("login", ['success' => 'Registration successful. Please log in.']);

                        exit();
                  }

                  $this->view("register");
            }

      }
?>