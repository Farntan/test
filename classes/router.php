<?php

namespace classes;

use controller\ErrorController;

class Router
{

    public array $routes;
    /**
     * @var mixed
     */
    private $uri;

    public function __construct()
    {
        $this->routes = include "./routes/web.php";
        $this->uri = $_SERVER['REQUEST_URI'];

    }

    public function getRoute () :array {

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
    public function getControllerName () :string
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