<?php

namespace classes;
use classes\controller\IController;


class Controller implements IController
{

    protected Router $router;
    protected string $content;

    public function __construct(Router $router)
        {
            $this->router=$router;
        }

    public function getView()
    {
        $routes=$this->router->routes;
        $content=$this->content;
        require_once('./view/header.php');

        $nameCurrentUri=$this->router->getRoute()['name'];
        $title=$nameCurrentUri;

        require_once('./view/body.php');

        require_once('./view/footer.php');
    }
    public function setContent($content)
    {
        $this->content=$content;
    }


}