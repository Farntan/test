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

        switch ($this->uri) {
            case '/':
                return $this->routes['/home'];
            case $this->hasRoute():
                return  $this->routes[$this->uri];
            default:
                return $this->routes['/error'];

        }

    }
    public function getControllerName () :string
    {
        $route=$this->getRoute();

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

        if (($method) and ($this->hasRoute()) and method_exists($controller,$method)) return $controller->$method();
        if (!$method) {
            $newController=new ErrorController($this);
            $newController->setContent('Данная функция не реализована');
            $newController->getView();
        }

        $newController=new ErrorController($this);
        $newController->setContent('Данная страница отсутствует');
        $newController->getView();


    }

    public function determineTypeClient() :string
    {

        $uri = $this->uri;
        $physical_person='physicalperson';
        $legal_entity='legalentity';
        if (strpos($uri, $physical_person)) {
            return $physical_person;
        }
        if (strpos($uri, $legal_entity)) {
            return $legal_entity;
        }
        return 'no_name';
    }


}