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

    /** creates a frontend with a list of all loan applications from individuals
     * @return void
     */
    public function index () {

        $applications=NaturalPersonCreditApplication::All();
        $this->content= include ('./view/applications/natural_person/credit/list.php');
        $this->getView();

    }

    /** creates a frontend for creating a new loan application from an individual
     * @return void
     */
    public function create () {

        $this->content= include('./view/reports/form_natural_person_credit.php');
        $this->getView();
    }

    /** returns the frontend with the data of the individual's loan application
     * @return void
     */

    public function show () {
        $request=new Request();
        $NaturalPersonCreditApplication_id=$request->all['id'];

        var_dump(NaturalPersonCreditApplication::getById($NaturalPersonCreditApplication_id)->get());
    }

    /** saving a new loan application from an individual
     * @return void
     */
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