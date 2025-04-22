<?php

namespace controller;

use classes\Controller;

class HomeController extends Controller
{
    /** creates the frontend of the home page
     * @return void
     */
    public function index () {
        $string= include('./view/home/home.php');
        $this->setContent($string);
        $this->getView();
    }





}