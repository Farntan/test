<?php

namespace classes;
use classes\controller\IConnection;
use mysqli;
use mysqli_sql_exception;
use classes\Redirect;
class Connection implements IConnection
{
    private object $connection;

    private static ?object $_instance = null;

    private function __construct() {

    }

    protected function __clone() {

    }

    static public function getInstance() :Connection{

        if(is_null(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    public function connect ($host, $user, $pass, $db, $port,$charset)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {

            $db = new mysqli($host, $user, $pass, $db, $port);
            $db->set_charset($charset);
            $db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
            $this->connection = $db;

        } catch (mysqli_sql_exception $e) {

            Redirect::View('/errorDB');



        }
    }
    public function getStatus () {
        return $this->connection->ping();
    }

    public function getConnect () :object
    {
        return $this->connection;
    }


}