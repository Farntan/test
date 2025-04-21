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

    public function getUri () :string {

       return $this->uri;


    }
    public function hasRoute ($uri) :bool {

        if (isset($this->routes[$uri])) {
            return true;
        }else{
            return false;
        }


    }

    public function getRouteByUri (string $uri) :array {

        switch ($uri) {
            case '/':
            case '':
                return $this->routes['/home'];
            case $this->hasRoute($uri):
                return  $this->routes[$uri];
            default:
                return $this->routes['/error'];

        }

    }

    public function getRoute () :array {

        return $this->getRouteByUri($this->uri);


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
            Redirect::View('/error');
            $controller=new ErrorController($this);
        }
        return $controller;

    }
    public function makeControllerMethod ()
    {
        $controller=$this->getController();

        $method=$this->getControllerMethodName();

        if (($method) and ($this->hasRoute($this->uri)) and method_exists($controller,$method)) return $controller->$method();
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