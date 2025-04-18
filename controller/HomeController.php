<?php

namespace controller;

use classes\Controller;

class HomeController extends Controller
{
    public function index () {
        $string= include('./view/home/home.php');
        $this->setContent($string);
        $this->getView();
    }





}