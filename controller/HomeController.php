<?php

namespace controller;

use classes\Controller;

class HomeController extends Controller
{

    public function getView (){

        require_once('./view/header.php');

        $routes=$this->router->routes;
        $list='<ul>';
        foreach ($routes  as $uri =>$route) {

            $name=$route['name'];
            $list.="<li><a href='$uri' target='_blank'>$name</a></li>";
        }
        $list.='</ul>';
        $content=$list;

        require_once('./view/body.php');

        require_once('./view/footer.php');


    }



}