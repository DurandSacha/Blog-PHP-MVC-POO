<?php
require '../config/dev.php';
require '../config/Autoloader.php';
require '../public/vendor/autoload.php';
\App\config\Autoloader::register();

session_start();
$router = new \App\config\Router();
$router->run();
