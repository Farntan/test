<?php

use classes\Router;
use classes\Connect;
$router = new Router();

$nameCurrentUri=$this->router->getRoute()['name'];
$routes = [
    '/home'=>[
        'name'=>'Заявки',
        'controller'=>'HomeController',
        'method'=>'index'
    ],
    '/physicalperson/credit/create'=>[
        'name'=>'Заявка на кредит (физическое лицо)',
        'controller'=>'NaturalPersonalCreditController',
        'method'=>'create'
    ],
    '/errorDB/status'=>[
        'name'=>'Статус базы данных',
        'controller'=>'ErrorDBController',
        'method'=>'status'
    ],

];
foreach ($routes as $uri => $route) {

    $name = $route['name'];
    $disabled='active';
    if ($name===$nameCurrentUri) $disabled='disabled';

    if ($name != 'Error') $list .= " <li class='nav-item'>
<li><a class='nav-link $disabled text-uppercase' href='$uri' target='_blank' >$name</a></li>
 </li>";
}





return '
<nav class="navbar navbar-expand-lg navbar-light bg-light text-center">
  
    
    
      <ul class="navbar-nav">
        ' . $list.  '
       
      </ul>
      
      
      
  
</nav>';