<?php

namespace controller;

use classes\Controller;


class ErrorController extends Controller
{
    public function index ()
    {

        $this->setContent('Страница отсутствует');

    }



}