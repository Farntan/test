<?php

namespace classes;
use mysqli;
use mysqli_sql_exception;
class Connect
{
    private $connect;

    private static $_instance = null;

    private function __construct() {

    }

    protected function __clone() {

    }

    static public function getInstance() {

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
            $this->connect = $db;
        } catch (mysqli_sql_exception $e) {
            $domain = $_SERVER['HTTP_HOST'];
            $url = 'https://' . $domain . '/errorDB';
            $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if ($url != $actual_link) {

                header('Location: https://' . $domain . '/errorDB');
                exit();
            };


        }
    }
    public function getStatus () {
        return $this->connect->ping();
    }


}