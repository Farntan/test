<?php

namespace classlibrary;

class Config
{

    public function get ($name)
    {
        $config=include "./config/app.php";

        return $config[$name];
    }

}