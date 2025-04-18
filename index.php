<?php
require __DIR__ . '/vendor/autoload.php';
use classes\Router;
use classes\Model;
use classes\config;


$config = new config();

$model=Model::getInstance();
$model->connect($config->get('host'),
                $config->get('user'),
                $config->get('password'),
                $config->get('database'),
                $config->get('port'),
                $config->get('charset'));
$router=new Router();
$controller=$router->getController();
// ** Sets the content if no other data is set in the page controller*/
$content='Welcome!';
$controller->setContent($content);
//**end*/
$controller->getView();






