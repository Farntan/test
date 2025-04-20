<?php

use classes\Router;

$router = new Router();

$nameCurrentUri=$this->router->getRoute()['name'];
$routes_natural_person = [

    '/physicalperson/credit/create'=>[
        'name'=>'Заявка на кредит (физическое лицо)',
        'controller'=>'NaturalPersonalCreditController',
        'method'=>'create',

    ],
     '/physicalperson/credit/index'=>[
    'name'=>'Список заявок на кредит',
    'controller'=>'NaturalPersonalCreditController',
    'method'=>'index'
],

];
$list='';
foreach ($routes_natural_person as $uri => $route) {

    $name = $route['name'];
    $disabled='';
    if ($name===$nameCurrentUri) $disabled='disabled ';

    $list .= " <li class='dropdown-item'>
<a class='dropdown-item $disabled text-uppercase' href='$uri' target='_blank' >$name</a>
 </li>";
}


$persons_menu='<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Физический лица
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
            '.$list.'
            
          </ul>
</li>
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Юридические лица
          </a>          
</li>
';
if ($this->router->getUri()==='/home') $homeDisabled = 'disabled'; else $homeDisabled = 'active';
$home='
        <li class="nav-item">
          <a class="nav-link '.$homeDisabled.'"  href="/home">'.$this->router->getRouteByUri('/home')['name'].'</a>
        </li>
';
if ($this->router->getUri()==='/errorDB/status') $homeDisabled = 'disabled'; else $homeDisabled = 'active';
$db_status='
        <li class="nav-item">
          <a class="nav-link '.$homeDisabled.'"  href="/errorDB/status">'.$this->router->getRouteByUri('/errorDB/status')['name'].'</a>
        </li>
';

return '
<nav class="navbar navbar-expand-lg navbar-light bg-light text-center">
        <ul class="navbar-nav navbar-nav-scroll">

            '.$home.'
    
            <ul class="navbar-nav">
        
                ' . $persons_menu.  '
       
            </ul>
            
             '.$db_status.'
      </ul>
      
      
      
  
</nav>';