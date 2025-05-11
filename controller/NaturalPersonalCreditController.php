<?php

namespace controller;


use classes\ChartType;
use classes\Controller;
use classes\CreditProduct;
use classes\NaturalPerson;
use classes\NaturalPersonCreditApplication;
use classes\Redirect;
use classes\Request;
use classes\XLST;
use classes\XML;


class NaturalPersonalCreditController extends Controller
{

    /** creates a frontend with a list of all loan applications from individuals
     * @return void
     */
    public function index () {

        $applications=NaturalPersonCreditApplication::All();

        $this->content= include ('./view/applications/natural_person/credit/table.php');

       // $xlst=new XLST($applications->get('xmlTree'),include ('./view/reports/xlst/natural_person.php'));

       // $this->content=$xlst->transform();

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
        $naturalPersonCreditApplication_id=$request->all['id'];
        $application=NaturalPersonCreditApplication::getById($naturalPersonCreditApplication_id)->get('xmlTree');

        $chartType=ChartType::All()->get('xmlTree','chart_types');
        $mergeDom=Xml::Merge($application,$chartType);

       // $mergeDom->save('merge.xml');
        $xlst= file_get_contents('./view/reports/xlst/natural_person_credit.xsl');

        $trans_xlst=new XLST($mergeDom,$xlst);
        $NT_view=$trans_xlst->transform();

        $this->content=$NT_view;

        $this->getView();
    }

    public function edit () {
        $request=new Request();
        $NaturalPersonCreditApplication_id=$request->all['id'];
        var_dump($NaturalPersonCreditApplication_id);
       /* $application=NaturalPersonCreditApplication::getById($NaturalPersonCreditApplication_id)->get('xmlTree');
        $xlst= file_get_contents('./view/reports/xlst/natural_person_credit.xsl');

        $trans_xlst=new XLST($application,$xlst);
        $NT_view=$trans_xlst->transform();

        $this->content=$NT_view;

        $this->getView();*/
    }

    /** saving a new loan application from an individual
     * @return void
     */
    public function store () {
        $request=new Request();
        $naturalPerson=new NaturalPerson(   $request->all['surname'],$request->all['name'],$request->all['patronymic'],$request->all['inn'],
                                            $request->all['data_birth'],$request->all['series'],$request->all['number'],$request->all['date_issue']);
        $creditProduct=new CreditProduct(   $request->all['data_open'],$request->all['data_open'],$request->all['deposit_amount'],$request->all['credit_period'],$request->all['payment_schedule']);
        $naturalPersonCreditApplication=new NaturalPersonCreditApplication($naturalPerson,$creditProduct);

        if ($naturalPersonCreditApplication->save())  Redirect::View('/physicalperson/credit/index');

        Redirect::View('/errorDB');

    }








}