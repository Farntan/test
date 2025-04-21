<?php

namespace classes;
use classes\controller\IConnection;
use mysqli_sql_exception;

class Connection implements IConnection
{
    private ?object $connection=null;

    private static ?object $_instance = null;

    private function __construct() {

    }

    protected function __clone() {

    }

    /**
     * @return Connection  class for working with MYSQL,Singleton Pattern
     */
    static public function getInstance() :Connection{

        if(is_null(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    /**
     * @param string $host  host name
     * @param string $user  user name
     * @param string $pass  password
     * @param string $db    name database
     * @param integer  $port  port number
     * @param string $charset encoding name
     * @return bool
     */
    public function connect ($host, $user, $pass, $db, $port,$charset) :bool
    {

        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $db = mysqli_connect($host, $user, $pass, $db, $port);
            $db->set_charset($charset);
            $db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
            $this->connection = $db;

            return true;
        } catch (mysqli_sql_exception  $e) {
            return false;




        }
    }

    /**
     * @return bool checking the connection with the database
     */
    public function getStatus () :bool{

        if  (($this->connection) and ($this->connection->ping())) return true;
        return false;
    }

    public function getConnect ()
    {

        if  ($this->connection) return $this->connection;
        Redirect::View('/errorDB/status');
    }

    /**
     * @return void disconnecting from the database
     */

    public function disconnect ()
    {
        if ($this->connection) mysqli_close($this->connection);
    }


}