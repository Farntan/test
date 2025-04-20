<?php

namespace controller;

use classes\Connection;
use classes\Controller;
use classes\Model;
use classes\Redirect;
use classes\Request;
use classes\Router;
use Exception;


class NaturalPersonalCreditController extends Controller
{
    public string $client_type;
    public function __construct(Router $router)
    {
        $this->client_type='физическое лицо';
        parent::__construct($router);
    }

    public function index () {
        $model=new Model(Connection::getInstance());
        try {
            $type_client = $model->select("SELECT * FROM `clients` as c INNER JOIN client_type AS cs ON c.client_type_id = cs.id
                                                                       INNER JOIN credit AS cr ON c.id = cr.client_id
                                                                       INNER JOIN natural_person AS np ON c.id = np.client_id
                                                                       INNER JOIN user AS u ON np.user_id = u.id
                                                                       ");

            $applications=$model->get('object');



        }catch (Exception $e) {

            var_dump($model);
            Redirect::View('/errorDB');

        }
        Connection::getInstance()->disconnect();




    }
    public function create () {

        $this->content= include('./view/reports/form_natural_person_credit.php');
        $this->getView();
    }

    public function store () {
        $request=new Request();

        $model=new Model(Connection::getInstance());

        $inn=$request->all['inn'];
        $surname=$request->all['surname'];
        $name=$request->all['name'];
        $middle_name=$request->all['patronymic'];
        $date_birth=$request->all['data_birth'];
        $passport_series=$request->all['series'];
        $passport_number=$request->all['number'];
        $passport_data=$request->all['date_issue'];
        $open=$request->all['date_open'];
        $close=$request->all['date_close'];
        $chart_type_id=$request->all['payment_schedule'];
        $amount=$request->all['deposit_amount'];
        try {
            $model->connection->begin_transaction();

            $type_client=$model->select ("SELECT * FROM `client_type` WHERE name=?",[$this->client_type]);
            $type_client_id=$model->get('object')->id;

            $client=$model->insert ("INSERT INTO `clients`(`client_type_id`) VALUES (?)",[$type_client_id]);
            $client_id=$model->connection->insert_id;
            var_dump($client_id);
            $model->select ("SELECT * FROM `user` WHERE inn=?",[$inn]);
            $user=$model->get('object');

            if ($user->id) {
                $user_id = $user->id;
            }else{
                $result=$model->insert ("INSERT INTO `user`(`surname`, `name`, `middle_name`, `inn`, `date_birth`, `passport_series`, `passport_number`, `passport_data`) VALUES 
                                                        (?,?,?,?,?,?,?,?)",[$surname,$name,$middle_name,$inn,$date_birth,$passport_series, $passport_number, $passport_data]);
                $user_id=$model->connection->insert_id;
            }
            $client=$model->insert ("INSERT INTO `natural_person`(`client_id`, `user_id`) VALUES (?,?)",[$client_id,$user_id]);
            $credit=$model->insert ("INSERT INTO `credit`(`client_id`,`open`, `close`, `chart_type_id`, `amount`) VALUES (?,?,?,?,?)",[$client_id,$open,$close,$chart_type_id,$amount]);


            $model->connection->commit();
        } catch (Exception $e) {
            $model->connection->rollBack();
            Redirect::View('/errorDB');

        }
        Connection::getInstance()->disconnect();


    }








}