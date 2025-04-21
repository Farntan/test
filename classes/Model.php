<?php

namespace classes;

use classes\controller\IConnection;
use Exception;


class Model
{
    public object $connection;
    public ?object $result = null;

    /** Class of working with the database
     * @param IConnection $connection class for connecting to a database
     */
    public function __construct(IConnection $connection)
    {
        $this->connection = $connection->getConnect();
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
            case 'assoc':
                return $this->result->fetch_assoc();
            case 'object':
                return $this->result->fetch_object();
            default:
                return $this->result->fetch_row();
        }


    }
}