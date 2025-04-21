<?php

namespace classes;



class Config
{

    private  $config;
    /**
     * class with project configuration properties
     */
    public function __construct()
    {
        $this->config=include "./config/app.php";
    }

    /**
     * @param string $name name of the property in the configuration file
     * @return string getting a property from a configuration file
     */
    public function get(string $name) :string   {

        if (isset($this->config[$name])) return $this->config[$name];

        trigger_error('config with name ' . $name . ' not found', E_USER_ERROR);
    }

}