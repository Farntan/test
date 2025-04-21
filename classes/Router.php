<?php

namespace classes;

use controller\ErrorController;


class Router
{

    public array $routes;
    /**
     * @var mixed
     */

    private string $fullUri;

    private string $uri;
    private ?string $query;

    /**
     * creates a class based on the configuration file routes/web.php and the current URI
     */
    public function __construct()
    {
        $this->routes = include "./routes/web.php";
        $this->fullUri = $_SERVER['REQUEST_URI'];

        $this->uri = parse_url ($this->fullUri)['path'];
        $this->query = parse_url ($this->fullUri)['query'];
    }

    /**
     * @return string current URI
     */
    public function getUri () :string {
       return $this->uri;
    }

    /**
     * @param string $uri checked for availability URI in Routes
     * @return bool
     */
    public function hasRoute (string $uri) :bool {


        if (isset($this->routes[$uri])) {
            return true;
        }else{
            return false;
        }


    }

    /**
     * @param string $uri URI which we are looking for Route
     * @return array  get Route by URI
     */
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

    /**
     * @return array get current route
     */
    public function getRoute () :array {

        return $this->getRouteByUri($this->uri);


    }

    /**
     * @return string  get controller name for current route
     */
    public function getControllerName () :string
    {
        $route=$this->getRoute();

        return $route['controller'];

    }

    /**
     * @return  string controller method name for current route
     */
    public function getControllerMethodName () :string
    {
        $route=$this->getRoute();

        return $route['method'];
    }

    /**
     * @return Controller get Controller for current route
     */
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

    /** executes the method for current route
     * @return void
     */
    public function makeControllerMethod ()
    {
        $controller=$this->getController();
        $method=$this->getControllerMethodName();

        if (($method) and ($this->hasRoute($this->uri)) and method_exists($controller,$method)) return $controller->$method();
        $ErrorController=new ErrorController($this);
        return $ErrorController->index();


    }




}