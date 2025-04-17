<?php

namespace classes;

class Router
{
    public $route;
    public $routes;

    public function __construct()
    {
        $this->routes = include "./routes/web.php";
        $this->uri = $_SERVER['REQUEST_URI'];

    }

    public function getRoute (){

        if (isset($this->routes[$this->uri])) {
            $router=$this->routes[$this->uri];
        }else{
            $uri='/error';
            $router=$this->routes[$uri];
        }


    }



}