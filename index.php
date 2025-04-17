<?php
require __DIR__ . '/vendor/autoload.php';
use classes\Router;
use controller\Test1Controller;

$router=new Router();
$controller=new Test1Controller($router);
$controller->getView();






