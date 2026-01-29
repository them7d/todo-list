<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/config.php';
//session_start();
//define('APP_RUNNING', true);
//
//$page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

//if ($page === 'logout') {
//    session_unset();
//    session_destroy();
//    header("Location: index");
//    exit();
//}

//if ($page && file_exists('./src/views/'.$page . '.php') && $page !== 'index') {
//    require './src/views/' . $page . '.php';
//    exit();
//}
// require __DIR__ . './src/Core/Database.php';
use App\Core\Router;
$router = new Router();
$router->dispatch();

?>