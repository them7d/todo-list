<?php
      namespace App\Models;
      use App\Core\Database;
      use PDO;

      class Task{
            private $conn;

            public function __construct(){
                  $this->conn = (new Database())->connect();
            }
            
            public function createTask($sub, $cas){

                  $query = "INSERT INTO tasks (sub, `case`) VALUES (:sub, :case)";
                  
                  $stmt = $this->conn->prepare($query);

                  $sub = htmlspecialchars(strip_tags($sub));

                  $stmt->bindValue(':sub', $sub, PDO::PARAM_STR);
                  $stmt->bindValue(':case', $cas , PDO::PARAM_INT);

                  if($stmt->execute()){
                        return true;
                  }
                  return false;
            }

            public function getAll(){

                  $query = "SELECT * FROM tasks ORDER BY created_at DESC";

                  $stmt = $this->conn->prepare($query);
                  $stmt->execute();
                  try {
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                  } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                  }
                  return  $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            public function deleteTask($id){

                  $query = "DELETE FROM tasks WHERE id = :id";

                  $stmt = $this->conn->prepare($query);
                  $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                  if($stmt->execute()){
                        return true;
                  }
                  return false;
            }

            public function updateTask($id, $sub, $cas){

                  $query = "UPDATE tasks SET sub = :sub, `case` = :case WHERE id = :id";

                  $stmt = $this->conn->prepare($query);

                  $sub = htmlspecialchars(strip_tags($sub));

                  $stmt->bindValue(':sub', $sub, PDO::PARAM_STR);
                  $stmt->bindValue(':case', $cas , PDO::PARAM_INT);
                  $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                  if($stmt->execute()){
                        return true;
                  }
                  return false;
            }
      }
?>