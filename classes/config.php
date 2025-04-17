<?php

namespace classes;

class config
{
    private  $config;
    public function __construct()
    {

        $this->config=include "./config/app.php";
    }

    /**
     * @param string $name
     * @return string
     */
    public function get(string $name) :string   {


        if (isset($this->config[$name])) return $this->config[$name];
        trigger_error('config with name ' . $name . ' not found', E_USER_ERROR);
    }

}