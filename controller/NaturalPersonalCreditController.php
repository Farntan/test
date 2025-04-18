<?php

namespace controller;

use classes\Controller;


class NaturalPersonalCreditController extends Controller
{
    public function create () {

        $this->content= include('./view/reports/form_natural_person_credit.php');
        $this->getView();
    }

    public function store () {

        $clintType=$this->router->determineTypeClient();


        var_dump($this->router->determineTypeClient());

    }



    public function setContent($content) :void
    {

        $this->content= include('./view/reports/form_natural_person_credit.php');

    }



}