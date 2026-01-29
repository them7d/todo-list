<?php
      namespace App\Controllers;
      use App\Core\Controller;
      use App\Core\Database;
      use App\Models\Task;
      use PDO;

      class TaskController extends Controller{

            public function getAll(){
                  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $task = new Task();
                        echo json_encode($task->getAll());
                        exit();
                  }
                  $this->view('404');
            }

            public function insertTask(){
                  if($_SERVER['REQUEST_METHOD'] == 'POST'){

                        $sub = $_POST['sub'];
                        $cas = $_POST['cas'];

                        $task = new Task();
                        $task->createTask($sub, $cas);

                  }
            }
            public function deleteTask(){
                  if($_SERVER['REQUEST_METHOD'] == 'POST'){

                        $id = $_POST['id'];
                        $task = new Task();
                        $task->deleteTask($id);

                  }
            }
            public function updateTask(){
                  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        
                        $id = $_POST['id'];
                        $sub = $_POST['sub'];
                        $cas = $_POST['case'];

                        $task = new Task();
                        $task->updateTask($id, $sub, $cas);
                  }
            }
      }
?>