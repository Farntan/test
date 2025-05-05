<?php

namespace classes;


use DOMDocument;
use DOMException;
use Exception;


class Model
{

    public ?object $connection;
    public ?object $result = null;

    public static function getClassName () {
        return get_class();
    }


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
     * @return mixed associative|object|array|DOMDocument
     */

    public function get(string $type = 'row',$className='items')
    {
        switch ($type) {
            case 'xmlTree':
                return $this->getXMLTree($className);
            case 'arrayTree':
                return $this->getArrayTree();
            case 'xml':
                return $this->getXml($className);
            case 'assoc':
                return $this->result->fetch_assoc();
            case 'object':
                return $this->result->fetch_object();
            default:
                return $this->result->fetch_row();
        }


    }


    /**
     * @return DOMDocument|null return XML as a string
     */
    private function getXml(string $className='items') :?DOMDocument
    {
        try {

            $dom = new DOMDocument("1.0", "utf-8");
            $root=$dom->createElement('model');
            while ($model=$this->get('object')) {
                var_dump($className);
                $element=$dom->createElement($className);
                foreach ($model as $name=>$value) {
                    $ch_element=$dom->createElement($name, $value);
                    $element->appendChild($ch_element);
                }
                $root->appendChild($element);
            }

            $dom->appendChild($root);
            return $dom;

        } catch (DOMException $DOMException) {
            echo $DOMException;
            return null;
        }



    }

    private function getFieldsTableMap()  :?array
    {
        $fields=$this->result->fetch_fields();
        $fieldsTableMap=[];
        foreach ($fields as $field) {

            $fieldsTableMap[$field->name]=$field->orgtable;
        }
        return   $fieldsTableMap;

    }


    private function getArrayTree() :?array
    {
        if ($this->result) {
            $fieldsTableMap=$this->getFieldsTableMap();
            $entry=[];

            while ($row=$this->get('assoc')) {

                foreach ($row as $filedName=>$value) {
                    $tableName=$fieldsTableMap[$filedName];
                    if (isset($entry[$tableName])){
                        $entry[$tableName]=[];
                    }
                    $entry[$tableName][$filedName]=$value;
                }

            }
            return $entry;
        }
        return null;
    }


    private function getXMLTree(string $className='items') :?DOMDocument
    {

        if ($this->result) {
            $fieldsTableMap=$this->getFieldsTableMap();
            try {
                $dom = new DOMDocument("1.0", "utf-8");
                $root=$dom->createElement($className);
                while ($row=$this->get('assoc')) {

                    $item=$dom->createElement('item');
                    foreach ($row as $filedName=>$value) {
                        $tableName=$fieldsTableMap[$filedName];

                        if ($item->getElementsByTagName($tableName)->length===0) {

                            $tableNode=$dom->createElement($tableName);
                        }else{
                            $tableNode=$item->getElementsByTagName($tableName)[0];

                        }
                        $child=$dom->createElement($filedName,$value);
                        $tableNode->appendChild($child);
                        $item->appendChild($tableNode);

                    }

                    $root->appendChild($item);

                }

                $dom->appendChild($root);


                return $dom;


            } catch (DOMException $DOMException) {
                echo $DOMException;
                return null;
            }

        }
        return null;
    }
}