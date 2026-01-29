<?php
      namespace App\Core;


      class Controller{

            // Load a view file and pass data to it
            protected function view($name, $data = []){
                  
                  $viewPath = __DIR__ . "/../views/{$name}.php";

                  if (!file_exists($viewPath)) {
                        throw new \Exception("page '{$name}' not found");
                  }

                  // Make array keys available as variables inside the view
                  extract($data);

                  require $viewPath;
            }
            protected function redirect($name){
                  $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                  $path = substr($path, 0, strrpos($path, '/'));
                  header("Location: " . $path . "/{$name}");
                  exit();
            }

      }
