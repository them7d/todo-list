<?php

namespace App\Core;

use App\Controllers\AuthController;
use App\Controllers\ErrorController;
use App\Controllers\HomeController;
use App\Controllers\RegisterController;
use App\Controllers\TaskController;

class Router{

   public function dispatch(){

      $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

      $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
      if (strpos($uri, $scriptDir) === 0) {
         $uri = substr($uri, strlen($scriptDir));
      }

      $uri = explode('/', trim($uri, '/'));
      $uri = $uri[count($uri) - 1];

      switch ($uri) {
         case 'home':
         case '':
         case 'index':
            $controller = new HomeController();
            $controller->index();
            break;

         case 'login':
            $controller = new AuthController();
            $controller->login();
            break;

         case 'register':
            $controller = new RegisterController();
            $controller->index();
            break;

         case 'logout':
            $controller = new AuthController();
            $controller->logout();
            break;

         case 'getTasks':
            $controller = new TaskController();
            $controller->getAll();
            break;
         
         case 'insert':
            $controller = new TaskController();
            $controller->insertTask();
            break;

         case 'delete':
            $controller = new TaskController();
            $controller->deleteTask();
            break;

         case 'update':
            $controller = new TaskController();
            $controller->updateTask();
            break;

         default:
            $controller = new ErrorController();
            $controller->notFound();
      }
   }
}
