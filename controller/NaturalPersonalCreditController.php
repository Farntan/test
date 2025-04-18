<?php

namespace controller;

use classes\Controller;


class NaturalPersonalCreditController extends Controller
{
    public function create () {

        $this->content= include('./view/reports/form_natural_person_credit.php');
        $this->getView();
    }



    public function setContent($content)
    {

        $this->content= include('./view/reports/form_natural_person_credit.php');

    }



}