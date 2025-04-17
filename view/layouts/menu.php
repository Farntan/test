<?php

use classes\Router;

$router = new Router();
$routes = $this->router->routes;
$nameCurrentUri=$this->router->getRoute()['name'];
$list = '';
foreach ($routes as $uri => $route) {

    $name = $route['name'];
    $disabled='active';
    if ($name===$nameCurrentUri) $disabled='disabled';

    if ($name != 'Error') $list .= " <li class='nav-item'>
<li><a class='nav-link $disabled' href='$uri' target='_blank' >$name</a></li>
 </li>";
}

return '
<nav class="navbar navbar-expand-lg navbar-light bg-light text-center">
  
    
    
      <ul class="navbar-nav">
        ' . $list . '
      </ul>
  
</nav>';