<?php

namespace controller;
use classes\Model;
use classes\Connection;
use classes\config;
use classes\Controller;


class ErrorDBController extends Controller
{
    public function status () :void
    {
        $config = new config();

        $connect=Connection::getInstance();
        $connect->connect($config->get('host'),
            $config->get('user'),
            $config->get('password'),
            $config->get('database'),
            $config->get('port'),
            $config->get('charset'));

        $model=new Model();
        $model->select('SELECT * FROM chart_type WHERE id >0',[],'');

        var_dump($model->result->fetch_assoc());
        while ($row = $model->result->fetch_assoc()) {
            var_dump($row);
        }
        if ($connect->getStatus()) {
            $this->setContent('<h3 class="text-success">Есть соединение</h3>');
            $this->getView();
        }

        $this->setContent('<h3 class="text-warning">Нет соединения</h3>');
        $this->getView();

    }






}