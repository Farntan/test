<?php

namespace controller;

use classes\Controller;


class Test4Controller extends Controller
{

    public function setContent($content)
    {
        $this->content='Page for - '.$this->router->getRoute()['name'];
    }



}