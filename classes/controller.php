<?php

namespace classes;

class Controller
{

    private Router $router;

    public function __construct(Router $route)
        {
            $this->router=$route;
        }


}