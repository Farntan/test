<?php

namespace classes;

use Exception;

class NaturalPersonCreditApplication
{
    public NaturalPerson $naturalPerson;
    public CreditProduct $creditProduct;
    private string $client_type;

    public function __construct(NaturalPerson $naturalPerson, CreditProduct $creditProduct)
    {
        $this->client_type='физическое лицо';
        $this->naturalPerson = $naturalPerson;
        $this->creditProduct = $creditProduct;
    }

    public function save () :bool
    {
       
        $model=new Model(Connection::getInstance());

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
        try {
            $model->connection->begin_transaction();

            $model->select ("SELECT * FROM `client_type` WHERE name=?",[$this->client_type]);
            $type_client_id=$model->get('object')->id;

            $model->insert ("INSERT INTO `clients`(`client_type_id`) VALUES (?)",[$type_client_id]);
            $client_id=$model->connection->insert_id;
            $model->select ("SELECT * FROM `user` WHERE inn=?",[$inn]);
            $user=$model->get('object');

            if ($user->id) {
                $user_id = $user->id;
            }else{
                $model->insert ("INSERT INTO `user`(`surname`, `name`, `middle_name`, `inn`, `date_birth`, `passport_series`, `passport_number`, `passport_data`) VALUES 
                                                        (?,?,?,?,?,?,?,?)",[$surname,$name,$middle_name,$inn,$date_birth,$passport_series, $passport_number, $passport_data]);
                $user_id=$model->connection->insert_id;
            }
            $model->insert ("INSERT INTO `natural_person`(`client_id`, `user_id`) VALUES (?,?)",[$client_id,$user_id]);
            $model->insert ("INSERT INTO `credit`(`client_id`,`open`, `close`, `chart_type_id`, `amount`) VALUES (?,?,?,?,?)",[$client_id,$open,$close,$chart_type_id,$amount]);

            $model->connection->commit();
            return true;
        } catch (Exception $e) {
            var_dump($e);
            $model->connection->rollBack();
           return false;

        }
        Connection::getInstance()->disconnect();

    }
}