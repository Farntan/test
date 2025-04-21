<?php

namespace controller;

use classes\Controller;


class ErrorController extends Controller
{
    /**
     * @return null creates a frontend with the response that the page does not exist
     */
    public function index ()
    {
        $this->setContent('Страница отсутствует');
        $this->getView();
    }



}