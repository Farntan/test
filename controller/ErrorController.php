<?php

namespace controller;

use classes\Controller;


class ErrorController extends Controller
{

    public function setContent($content)
    {
        $this->content='<h3>An error has occurred on the website, please contact the administration!</h3>';
    }


}