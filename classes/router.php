<?php

namespace classes;

use controller\ErrorController;
use controller\HomeController;

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

    public function hasRoute () :bool {

        if (isset($this->routes[$this->uri])) {
            return true;
        }else{
            return false;
        }


    }

    public function getRoute () :array {


        if ($this->uri==='/') {
            return $this->routes['/home'];
        }
        if ($this->hasRoute()) {
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
        var_dump($route);
        return $route['controller'];

    }
    public function getControllerMethodName ()
    {
        $route=$this->getRoute();

        return $route['method'];
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
    public function getControllerMethod ()
    {
        $controller=$this->getController();

        $method=$this->getControllerMethodName();

        if (($method) and ($this->hasRoute())) return $controller->$method();
        if (!$method) {
            $newController=new ErrorController($this);
            $newController->setContent('Данная функция не реализована');
            $newController->getView();
        }

        $newController=new ErrorController($this);
        $newController->setContent('Данная страница отсутствует');
        $newController->getView();





    }


}