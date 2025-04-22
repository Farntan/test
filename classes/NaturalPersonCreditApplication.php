<?php

namespace classes;

use Exception;

class NaturalPersonCreditApplication extends Model
{
    public NaturalPerson $naturalPerson;
    public CreditProduct $creditProduct;
    /**
     * @var string type of client
     */
    private string $client_type;

    /**
     * @param NaturalPerson $naturalPerson
     * @param CreditProduct $creditProduct
     */
    public function __construct(NaturalPerson $naturalPerson, CreditProduct $creditProduct)
    {
        parent::__construct();
        $this->client_type='физическое лицо';
        $this->naturalPerson = $naturalPerson;
        $this->creditProduct = $creditProduct;

    }

    /**
     * @return bool
     */
    public function save () :bool
    {

        $inn=$this->naturalPerson->inn;
        $surname=$this->naturalPerson->surname;
        $name=$this->naturalPerson->name;
        $middle_name=$this->naturalPerson->middleName;
        $date_birth=$this->naturalPerson->dateBirth;
        $passport_series=$this->naturalPerson->passportSeries;
        $passport_number=$this->naturalPerson->passportNumber;
        $passport_data=$this->naturalPerson->passportData;
        $open=$this->creditProduct->openData;
        $close=$this->creditProduct->closeData;
        $chart_type_id=$this->creditProduct->chart_type;
        $amount=$this->creditProduct->amount;
        $periodCredit=$this->creditProduct->periodCredit;
        try {
            $this->connection->begin_transaction();

            $this->select ("SELECT * FROM `client_type` WHERE name=?",[$this->client_type]);
            $type_client_id=$this->get('object')->id;

            $this->insert ("INSERT INTO `clients`(`client_type_id`) VALUES (?)",[$type_client_id]);
            $client_id=$this->connection->insert_id;
            $this->select ("SELECT * FROM `user` WHERE inn=?",[$inn]);
            $user=$this->get('object');

            if ($user->id) {
                $user_id = $user->id;
            }else{
                $this->insert ("INSERT INTO `user`(`surname`, `name`, `middle_name`, `inn`, `date_birth`, `passport_series`, `passport_number`, `passport_data`) VALUES 
                                                        (?,?,?,?,?,?,?,?)",[$surname,$name,$middle_name,$inn,$date_birth,$passport_series, $passport_number, $passport_data]);
                $user_id=$this->connection->insert_id;
            }
            $this->insert ("INSERT INTO `natural_person`(`client_id`, `user_id`) VALUES (?,?)",[$client_id,$user_id]);
            $this->insert ("INSERT INTO `credit`(`client_id`,`open`, `close`, `chart_type_id`, `amount`,`credit_period`) VALUES (?,?,?,?,?,?)",[$client_id,$open,$close,$chart_type_id,$amount,$periodCredit]);

            $this->connection->commit();

            return true;
        } catch (Exception $e) {

            $this->connection->rollBack();

            return false;

        }


    }

    public static function All () :?object
    {

        $model=new Model(Connection::getInstance());

        try {
            $model->select("SELECT c.id, u.surname,u.name,u.middle_name, cr.open, cr.close, cr.amount, ct.name AS chart_type  FROM `clients` as c INNER JOIN client_type AS cs ON c.client_type_id = cs.id
                                                                       INNER JOIN credit AS cr ON c.id = cr.client_id
                                                                       INNER JOIN natural_person AS np ON c.id = np.client_id
                                                                       INNER JOIN user AS u ON np.user_id = u.id
                                                                       INNER JOIN chart_type AS ct ON cr.chart_type_id = ct.id 
                                                                       ");

            return $model;
        }catch (Exception $e) {
           return null;
        }

    }
    public static function getById (int $id) :?object
    {
        $model=new Model(Connection::getInstance());


        try {
            $model->select("SELECT c.id, u.surname,u.name,u.middle_name, cr.open, cr.close, cr.amount, ct.name AS chart_type  FROM `clients` as c INNER JOIN client_type AS cs ON c.client_type_id = cs.id
                                                                       INNER JOIN credit AS cr ON c.id = cr.client_id
                                                                       INNER JOIN natural_person AS np ON c.id = np.client_id
                                                                       INNER JOIN user AS u ON np.user_id = u.id
                                                                       INNER JOIN chart_type AS ct ON cr.chart_type_id = ct.id 
                                WHERE c.id = ?",[$id]);



            return $model;
        }catch (Exception $e) {


            return null;

        }
    }
}