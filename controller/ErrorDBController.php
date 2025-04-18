<?php

namespace controller;
use classes\Model;
use classes\config;
use classes\Controller;


class ErrorDBController extends Controller
{
    public function status () :void
    {
        $config = new config();

        $model=Model::getInstance();
        $model->connect($config->get('host'),
            $config->get('user'),
            $config->get('password'),
            $config->get('database'),
            $config->get('port'),
            $config->get('charset'));
        var_dump($model->getStatus());
        if ($model->getStatus()) {
            $this->setContent('<h3 class="text-success">Есть соединение</h3>');
            $this->getView();
        }

        $this->setContent('<h3 class="text-warning">Нет соединения</h3>');
        $this->getView();

    }






}