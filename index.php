<?php
require __DIR__ . '/vendor/autoload.php';
use classes\Router;
use controller\Test1Controller;
use controller\HomeController;

$router=new Router();
$controllerName=$router->getController();


if (class_exists($controllerName)) {
    $controller=new $controllerName($router);
} else {
    trigger_error('class ' . $controllerName . ' not found', E_USER_ERROR);
}

$controller=new $controllerName($router);
$controller=new Test1Controller($router);
$controller->getView();






