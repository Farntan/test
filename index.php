<?php
require __DIR__ . '/vendor/autoload.php';
use classes\Router;
use classes\Client;

$client=new Client();

$router=new Router();
$controller=$router->getControllerMethod();







