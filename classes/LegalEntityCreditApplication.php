<?php

namespace classes;

use Exception;

class LegalEntityCreditApplication
{
    public LegalEntity $legalPerson;
    public CreditProduct $creditProduct;
    /**
     * @var string type of client
     */
    private string $client_type;

    /**
     * @param NaturalPerson $naturalPerson
     * @param CreditProduct $creditProduct
     */
    public function __construct(LegalEntity $legalPerson, CreditProduct $creditProduct)
    {
        $this->client_type='юридическое лицо';
        $this->legalPerson = $legalPerson;
        $this->creditProduct = $creditProduct;

    }

    /**
     * @return bool
     */
    public function save () :bool
    {
        $model=new Model(Connection::getInstance());
        $inn=$this->legalPerson->inn;
        $surname=$this->legalPerson->surname;
        $name=$this->legalPerson->name;
        $middle_name=$this->legalPerson->middleName;
        $address_organization=$this->legalPerson->address_organization;
        $name_organization=$this->legalPerson->name_organization;
        $ogrn=$this->legalPerson->ogrn;
        $inn_organization=$this->legalPerson->inn_organization;
        $kpp=$this->legalPerson->kpp;
        $open=$this->creditProduct->openData;
        $close=$this->creditProduct->closeData;
        $chart_type_id=$this->creditProduct->chart_type;
        $amount=$this->creditProduct->amount;
        $periodCredit=$this->creditProduct->periodCredit;
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
            $model->insert ("INSERT INTO `credit`(`client_id`,`open`, `close`, `chart_type_id`, `amount`,`credit_period`) VALUES (?,?,?,?,?,?)",[$client_id,$open,$close,$chart_type_id,$amount,$periodCredit]);

            $model->connection->commit();

            return true;
        } catch (Exception $e) {

            $model->connection->rollBack();

            return false;

        }


    }




}