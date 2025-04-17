<?php

namespace controller;

use classes\Controller;
use classes\Router;

class ErrorController extends Controller
{

    public function getView (){

        require_once('./view/header.php');


        $nameCurrentUri=$this->router->getRoute()['name'];
        $title=$nameCurrentUri;
        $content='<h3>An error has occurred on the website, please contact the administration!</h3>';


        require_once('./view/body.php');

        require_once('./view/footer.php');


    }



}