<?php

namespace controller;

use classes\Controller;
use classes\DepositProduct;
use classes\NaturalPerson;
use classes\NaturalPersonDepositApplication;
use classes\Redirect;
use classes\Request;


class NaturalPersonalDepositController extends Controller
{

    /** creates a frontend with a list of all deposit applications from individuals
     * @return void
     */
    public function index () {

        $applications=NaturalPersonDepositApplication::All();
        $this->content= include ('./view/applications/natural_person/deposit/list.php');
        $this->getView();

    }



    /** creates a frontend for creating a new deposits application from an individual
     * @return void
     */
    public function create () {

        $this->content= include('./view/reports/form_natural_person_deposit.php');
        $this->getView();
    }

    /** saving a new deposits application from an individual
     * @return void
     */

    public function store () {

        $request=new Request();

        $naturalPerson=new NaturalPerson(   $request->all['surname'],$request->all['name'],$request->all['patronymic'],$request->all['inn'],
                                            $request->all['data_birth'],$request->all['series'],$request->all['number'],$request->all['date_issue']);
        $depositProduct=new DepositProduct(   $request->all['date_open'],$request->all['date_close'],$request->all['deposit_period'],$request->all['deposit_bet'], $request->all['capitalization_frequency']);

        $naturalPersonCreditApplication=new NaturalPersonDepositApplication($naturalPerson,$depositProduct);

        if ($naturalPersonCreditApplication->save())  Redirect::View('/physicalperson/deposit/index');

        Redirect::View('/errorDB');

    }

    public function show () {
        $request=new Request();
        $NaturalPersonDepositApplication_id=$request->all['id'];
        //TODO create a form with payment schedules
    //    var_dump(NaturalPersonDepositApplication::getById($NaturalPersonDepositApplication_id)->get('object'));
    }





}