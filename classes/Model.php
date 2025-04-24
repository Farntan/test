<?php

namespace classes;

use classes\controller\IConnection;
use DOMDocument;
use DOMException;
use Exception;


class Model
{

    public ?object $connection;
    public ?object $result = null;


    /** Class of working with the database
     *
     */
    public function __construct()
    {

        $config = new Config();
        if (!Connection::getInstance()->connect($config->get('host'),
            $config->get('user'),
            $config->get('password'),
            $config->get('database'),
            $config->get('port'),
            $config->get('charset'))) Redirect::View('/errorDB/status');
        $this->connection = Connection::getInstance()->getConnect();



    }

    /**
     * @param string $sql sql query
     * @param array|null $variables parameters included in sql query
     * @return bool insert parameters in database
     */

    public function insert(string $sql, ?array $variables = []): bool
    {


        try {
            $stmt = $this->connection->prepare($sql);
            if (count($variables)) {
                $stmt->bind_param(str_repeat('s', count($variables)), ...$variables);
            }
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $e) {

            return false;
        }


    }

    /**
     * @param string $sql sql query
     * @param array|null $variables parameters included in sql query
     * @return bool select from in database
     */
    public function select(string $sql, ?array $variables = []): bool
    {
        try {
            $stmt = $this->connection->prepare($sql);
            if (count($variables)) {
                $stmt->bind_param(str_repeat('s', count($variables)), ...$variables);
            }
            $stmt->execute();
            $this->result = $stmt->get_result();

            return true;
        } catch (Exception $e) {

            return false;
        }


    }

    /**
     * @param string $type type of conversion of a query result to a database
     * @return mixed associative|object|array
     */

    public function get(string $type = 'row')
    {
        switch ($type) {
            case 'xml':
                return $this->getXml();
            case 'assoc':
                return $this->result->fetch_assoc();
            case 'object':
                return $this->result->fetch_object();
            default:
                return $this->result->fetch_row();
        }


    }


    /**
     * @throws DOMException
     * @return string return XML as a string
     */
    private function getXml()
    {
        $dom = new DOMDocument("1.0", "utf-8");
        while ($model=$this->get('object')) {
            $root=$dom->createElement('model');
            foreach ($model as $name=>$value) {
                $ch_element=$dom->createElement($name, $value);
                $root->appendChild($ch_element);
            }
            $dom->appendChild($root);
        }

        return $dom->saveXML();


    }
}