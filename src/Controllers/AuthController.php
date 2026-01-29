<?php
      //==================================================================================
      // handle user authentication: login and logout requests from frontend
      //==================================================================================


      namespace App\Controllers;
      use App\Core\Database;
      use App\Models\User;
      use App\Core\Controller;
      use App\Services\AuthService;
      use PDO;
      require_once __DIR__ . '/../../config/config.php';

      class AuthController extends Controller{
            public function __construct(){
                  $this->conn = (new Database())->connect();
            }
            public function login(){
                  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $user = $_POST['username'];
                        $password = $_POST['password'];

                        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
                        $stmt = $this->conn->prepare($query);
                        $stmt->bindParam(':username', $user);
                        $stmt->execute();
                        $user = $stmt->fetchObject();

                        if($user && password_verify($password, $user->password)){
                              $auth = new AuthService();
                              $auth->login($user->id);
                              $this->redirect("home");
                              exit();
                        }
                        $this->view("login", ['error' => 'Invalid username or password']);
                        return;
                  }
                  $this->view("login");
            }
            public function logout(){
                  $auth = new AuthService();
                  $auth->logout($_SESSION['user_id'] ?? null);
                  header("Location:" . BASE_URL . "/");
                  exit();
            }
      }
?>