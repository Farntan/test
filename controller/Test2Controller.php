<?php

namespace controller;

use classes\Controller;
use classes\Router;

class Test2Controller extends Controller
{

    public function setContent($content)
    {
        $this->content='Page for - '.$this->router->getRoute()['name'];
    }



}