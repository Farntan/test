<?php

namespace controller;


use classes\Controller;
use classes\CreditProduct;
use classes\NaturalPerson;
use classes\NaturalPersonCreditApplication;
use classes\Redirect;
use classes\Request;



class NaturalPersonalCreditController extends Controller
{


    public function index () {

        $applications=NaturalPersonCreditApplication::All();
        $this->content= include ('./view/applications/natural_person/credit/list.php');
        $this->getView();

    }
    public function create () {

        $this->content= include('./view/reports/form_natural_person_credit.php');
        $this->getView();
    }

    public function store () {
        $request=new Request();
        $naturalPerson=new NaturalPerson(   $request->all['surname'],$request->all['name'],$request->all['patronymic'],$request->all['inn'],
                                            $request->all['data_birth'],$request->all['series'],$request->all['number'],$request->all['date_issue']);
        $creditProduct=new CreditProduct(   $request->all['date_open'],$request->all['date_close'],$request->all['deposit_amount'],$request->all['credit_period'],$request->all['payment_schedule']);
        $naturalPersonCreditApplication=new NaturalPersonCreditApplication($naturalPerson,$creditProduct);

        if ($naturalPersonCreditApplication->save())  Redirect::View('/physicalperson/credit/index');

        Redirect::View('/errorDB');

    }








}