<?php

namespace classes;
use classes\controller\IConnection;
use Exception;
use mysqli;
use mysqli_sql_exception;

class Connection implements IConnection
{
    private ?object $connection=null;

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

    public function connect ($host, $user, $pass, $db, $port,$charset) :bool
    {

        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $db = @mysqli_connect($host, $user, $pass, $db, $port);
            $db->set_charset($charset);
            $db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
            $this->connection = $db;
            var_dump($this->connection);
            return true;
        } catch (mysqli_sql_exception  $e) {
            return false;




        }
    }
    public function getStatus () :bool{

        if  (($this->connection) and ($this->connection->ping())) return true;
        return false;
    }

    public function getConnect () :object
    {
        if  ($this->connection) return $this->connection;
        return Redirect::View('/errorDB/status');
    }

    public function disconnect ()
    {
        mysqli_close($this->connection);
    }


}