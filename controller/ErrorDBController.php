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


        if ($connect->getStatus()) {
            $this->setContent('<h3 class="text-success">Есть соединение</h3>');
            $this->getView();
        }

        $this->setContent('<h3 class="text-warning">Нет соединения</h3>
                                    <p class="fw-bold">Действия:</p>
                                    <ol> 
                                        <li>Проверте настройки базы данных - config/app.php</li>
                                        <li>Используете дамп базы данных в корне проекта</li>
                                    
                                    </ol>
                                    


                                ');
        $this->getView();

    }






}