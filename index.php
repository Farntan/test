<?php
require __DIR__ . '/vendor/autoload.php';
use classes\Router;
use classes\Client;
use classes\Connection;
use classes\config;


$client=new Client();

$config = new config();

$model=Connection::getInstance();
$model->connect($config->get('host'),
                $config->get('user'),
                $config->get('password'),
                $config->get('database'),
                $config->get('port'),
                $config->get('charset'));
$router=new Router();
$controller=$router->getControllerMethod();







