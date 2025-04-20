<?php

namespace classes;

use classes\controller\IConnection;
use Exception;
use mysqli;
use mysqli_sql_exception;
use classes\Connection;


class Model
{
    public object $connection;
    public ?object $result = null;

    public function __construct(IConnection $connection)
    {
        $this->connection = $connection->getConnect();

    }

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
            Redirect::View('/errorDB');
            return false;
        }


    }

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
            var_dump($e);
            Redirect::View('/errorDB');
            return false;
        }


    }

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