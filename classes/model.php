<?php

namespace classes;
use mysqli;
use mysqli_sql_exception;
use classes\Connect;


class Model
{
    public object $connection;
    public object $result;
    public function __construct()
    {
        $this->connection=Connect::getInstance()->getConnect();
    }

    public function insert ($sql) {
        /*$stmt = $db->prepare("INSERT INTO users (email, password) VALUES (?,?)");
        $stmt->bind_param("ss", $email, $password_hash);
        $stmt->execute();*/

    }

    public function select (string $sql, array $variables, string $typeVariables) {

        $stmt = $this->connection->prepare("$sql");
        if ($variables and $typeVariables) $stmt->bind_param($typeVariables, implode(',', $variables));
        $stmt->execute();
        $this->result=$stmt->get_result();

    }


}