<?php
require_once '../config/dev.php';
require '../config/Autoloader.php'; // avant ../
require '../vendor/autoload.php'; // avant ../
\App\config\Autoloader::register();

session_start();
$router = new \App\config\Router();
$router->run();
