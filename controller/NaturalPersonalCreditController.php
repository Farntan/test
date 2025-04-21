<?php

namespace controller;

use classes\Connection;
use classes\Controller;
use classes\CreditProduct;
use classes\Model;
use classes\NaturalPerson;
use classes\NaturalPersonCreditApplication;
use classes\Redirect;
use classes\Request;
use classes\Router;
use Exception;


class NaturalPersonalCreditController extends Controller
{
    public string $client_type;

    public function index () {
        $model=new Model(Connection::getInstance());
        try {
            $type_client = $model->select("SELECT u.surname,u.name,u.middle_name, cr.open, cr.close, cr.amount, ct.name AS chart_type  FROM `clients` as c INNER JOIN client_type AS cs ON c.client_type_id = cs.id
                                                                       INNER JOIN credit AS cr ON c.id = cr.client_id
                                                                       INNER JOIN natural_person AS np ON c.id = np.client_id
                                                                       INNER JOIN user AS u ON np.user_id = u.id
                                                                       INNER JOIN chart_type AS ct ON cr.chart_type_id = ct.id 
                                                                       ");
            $applications=$model;




        }catch (Exception $e) {

            var_dump($model);
            Redirect::View('/errorDB');

        }
        Connection::getInstance()->disconnect();

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
        $creditProduct=new CreditProduct(   $request->all['date_open'],$request->all['date_close'],$request->all['deposit_amount'],$request->all['payment_schedule']);
        $naturalPersonCreditApplication=new NaturalPersonCreditApplication($naturalPerson,$creditProduct);

        if ($naturalPersonCreditApplication->save())  Redirect::View('/physicalperson/credit/index');

        Redirect::View('/errorDB');

    }








}