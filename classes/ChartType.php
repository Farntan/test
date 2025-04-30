<?php

namespace classes;

use Exception;

class ChartType
{

    public static function All () :?object
    {
        $model=new Model(Connection::getInstance());
        try {
            $model->select("SELECT `id`,`name`  FROM `chart_type`");
            return $model;
        }catch (Exception $e) {
            return null;
        }

    }
}