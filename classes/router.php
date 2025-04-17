<?php

namespace classes;

use controller\ErrorController;

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

        if ($this->uri==='/') {
            return $this->routes['/home'];
        }
        if (isset($this->routes[$this->uri])) {
            $route=$this->routes[$this->uri];


        }else{
            $uri='/error';

            $route=$this->routes[$uri];

        }

        return $route;

    }
    public function getControllerName ()
    {
        $route=$this->getRoute();

        return $route['controller'];

    }

    public function getController () :Controller
    {
        $controllerName=$this->getControllerName();
        $class="controller\\".$controllerName;
        if (class_exists($class)) {
            $controller=new $class($this);
        } else {
            $controller=new ErrorController($this);
        }
        return $controller;

    }



}