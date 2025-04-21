<?php

namespace controller;

use classes\Controller;

class HomeController extends Controller
{
    /**
     * @return void creates the frontend of the home page
     */
    public function index () {
        $string= include('./view/home/home.php');
        $this->setContent($string);
        $this->getView();
    }





}