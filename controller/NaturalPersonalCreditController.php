<?php

namespace controller;

use classes\Controller;


class NaturalPersonalCreditController extends Controller
{

    public function setContent($content)
    {

        $this->content=include ('./view/reports/natural_person/form_credit.php');

    }



}