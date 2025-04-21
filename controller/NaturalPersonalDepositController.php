<?php

namespace controller;

use classes\Controller;
use classes\CreditProduct;
use classes\DepositProduct;
use classes\NaturalPerson;
use classes\Redirect;
use classes\Request;


class NaturalPersonalDepositController extends Controller
{
    public function create () {

        $this->content= include('./view/reports/form_natural_person_deposit.php');
        $this->getView();
    }

    public function store () {
        $request=new Request();
        $naturalPerson=new NaturalPerson(   $request->all['surname'],$request->all['name'],$request->all['patronymic'],$request->all['inn'],
                                            $request->all['data_birth'],$request->all['series'],$request->all['number'],$request->all['date_issue']);
        $creditProduct=new DepositProduct(   $request->all['date_open'],$request->all['date_close'],$request->all['periodDeposit'],$request->all['capitalization_frequency']);
        $naturalPersonCreditApplication=new NaturalPersonDepositApplication($naturalPerson,$creditProduct);

        if ($naturalPersonCreditApplication->save())  Redirect::View('/physicalperson/deposit/index');

        Redirect::View('/errorDB');

    }



}