<?php

namespace controller;


use classes\Controller;
use classes\CreditProduct;
use classes\LegalEntity;
use classes\LegalEntityCreditApplication;
use classes\NaturalPerson;
use classes\NaturalPersonCreditApplication;
use classes\Redirect;
use classes\Request;



class LegalEntityCreditController extends Controller
{

    /** creates a frontend with a list of all loan applications from individuals
     * @return void
     */
    public function index () {

        $applications=NaturalPersonCreditApplication::All();
        $this->content= include ('./view/applications/natural_person/credit/table.php');
        $this->getView();

    }

    /** creates a frontend for creating a new loan application from an legal entity
     * @return void
     */
    public function create () {

        $this->content= include('./view/reports/form_legal_entity_credit.php');
        $this->getView();
    }


    /** saving a new loan application from an legal entity
     * @return void
     */
    public function store () {
        $request=new Request();
        var_dump($request); exit;

        $legalEntity=new LegalEntity(       $request->all['surname'],$request->all['name'],$request->all['patronymic'],
                                            $request->all['inn'],
                                            $request->all['address_organization'],$request->all['name_organization'],
                                            $request->all['ogrn'],$request->all['inn_organization'],
                                            $request->all['kpp']);
        $creditProduct=new CreditProduct(   $request->all['date_open'],$request->all['date_close'],
                                            $request->all['deposit_amount'],$request->all['credit_period'],
                                            $request->all['payment_schedule']);
        $naturalPersonCreditApplication=new LegalEntityCreditApplication($legalEntity,$creditProduct);

        if ($naturalPersonCreditApplication->save())  Redirect::View('/legal_entity/credit/index');

        Redirect::View('/errorDB');

    }








}