<?php
require __DIR__ . '/vendor/autoload.php';
use classes\Router;

var_dump($_GET);
var_dump($_POST);
var_dump($_REQUEST);

$router=new Router();
$controller=$router->getController();
// ** Sets the content if no other data is set in the page controller*/
$content='Welcome!';
$controller->setContent($content);
//**end*/
$controller->getView();






