<?php

namespace controller;

use classes\Controller;


class NaturalPersonalDepositController extends Controller
{
    public function create () {

        $this->content= include('./view/reports/form_natural_person_deposit.php');
        $this->getView();
    }




}