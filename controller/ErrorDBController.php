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
            $this->setContent('Есть соединение');
            $this->getView();
        }

        $this->setContent('Нет соединения');
        $this->getView();

    }






}