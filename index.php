<?php
use \MyClass\Autoloader;
use \MyClass\Controler\Router;

require 'Autoloader.php';
autoloader::register();

$router = new Router();
$router->routeRequete();

?>