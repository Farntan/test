<?php

namespace classes;
use classes\controller\IController;


class Controller implements IController
{

    protected Router $router;

    /**
     * @var string frontend content
     */
    protected string $content;

    /**
     * @param Router $router creating a controller based on a router
     */

    public function __construct(Router $router)
        {
            $this->router=$router;
        }

    /**
     * @return void get a frontend based on a router
     */
    public function getView() :void
    {
        $routes=$this->router->routes;
        $content=$this->content;
        require_once('./view/header.php');

        $nameCurrentUri=$this->router->getRoute()['name'];
        $title=$nameCurrentUri;

        require_once('./view/body.php');
        require_once('./view/footer.php');
        exit();
    }

    /**
     * @param string|null $string frontend content
     * @return void set the frontend content
     */
    public function setContent(string $string=null) :void
    {
        $this->content=$string;
    }

    public function getViewFromXLSTPatton(string $xml, string $xlst) :void
    {


    }

}