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
            $route=$this->routes[$this->uri];
        }else{
            $uri='/error';
            $route=$this->routes[$uri];
        }
        return $route;

    }
    public function getController ()
    {
        $route=$this->getRoute();

        return $route['controller'];

    }



}