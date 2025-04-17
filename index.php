<?php
require __DIR__ . '/vendor/autoload.php';
use classes\Router;


$router=new Router();
$controllerName=$router->getController();
$class="controller\\".$controllerName;



if (class_exists($class)) {
    $controller=new $class($router);
} else {
    $controller=new \ErrorController($router);
}
$content='Welcome!';
$controller->setContent($content);
$controller->getView('');






