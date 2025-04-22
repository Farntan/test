<?php

namespace classes;

use Exception;

class LegalEntityCreditApplication extends Model
{
    public LegalEntity $legalPerson;
    public CreditProduct $creditProduct;
    /**
     * @var string type of client
     */
    private string $client_type;

    /**
     * @param LegalEntity $legalPerson
     * @param CreditProduct $creditProduct
     */
    public function __construct(LegalEntity $legalPerson, CreditProduct $creditProduct)
    {
        parent::__construct();
        $this->client_type='юридическое лицо';
        $this->legalPerson = $legalPerson;
        $this->creditProduct = $creditProduct;

    }

    /**
     * @return bool
     */
    public function save () :bool
    {

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
            $this->connection->begin_transaction();

            $this->select ("SELECT * FROM `client_type` WHERE name=?",[$this->client_type]);
            $type_client_id=$this->get('object')->id;

            $this->insert ("INSERT INTO `clients`(`client_type_id`) VALUES (?)",[$type_client_id]);
            $client_id=$this->connection->insert_id;
            $this->select ("SELECT * FROM `head_company` WHERE inn=?",[$inn]);
            $head_company=$this->get('object');

            if ($head_company->id) {
                $head_company_id = $head_company->id;
            }else{
                $this->insert ("INSERT INTO `head_company`(`surname`, `name`, `middle_name`, `inn`) VALUES 
                                                        (?,?,?,?)",[$surname,$name,$middle_name,$inn ]);
                $head_company_id=$this->connection->insert_id;
            }
            var_dump($client_id,$head_company_id,$name_organization,$address_organization,$ogrn,
                $inn_organization, $kpp);
            $this->insert ("INSERT INTO `legal_entities`(`client_id`, `head_company_id`, `name`, `address`, `ogrn`,
                             `inn`, `kpp`) VALUES (?,?,?,?,?,?,?)",[$client_id,$head_company_id,$name_organization,$address_organization,$ogrn,
                                                            $inn_organization, $kpp ]);
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
            $model->select("SELECT c.id, hc.surname,hc.name,hc.middle_name, cr.open, cr.close, cr.amount, cr.credit_period, ct.name AS chart_type  FROM `clients` as c INNER JOIN client_type AS cs ON c.client_type_id = cs.id
                                                                       INNER JOIN credit AS cr ON c.id = cr.client_id
                                                                       INNER JOIN legal_entities AS le ON c.id = le.client_id
                                                                       INNER JOIN head_company AS hc ON le.head_company_id = hc.id
                                                                       INNER JOIN chart_type AS ct ON cr.chart_type_id = ct.id 
                                                                       ");

            return $model;
        }catch (Exception $e) {
            return null;
        }

    }




}