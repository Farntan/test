<?php

namespace controller;

use classes\Controller;


class ErrorController extends Controller
{
    /**
     * @return void creates a frontend with the response that the page does not exist
     */
    public function index () :void
    {
        $this->setContent('Страница отсутствует');
        $this->getView();
    }



}