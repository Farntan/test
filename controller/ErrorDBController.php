<?php

namespace controller;

use classes\Connection;
use classes\Config;
use classes\Controller;


class ErrorDBController extends Controller
{

    /**
     * @return void creates a frontend with the status of working with the database
     */
    public function status () :void
    {
        $config = new Config();

        $connection=Connection::getInstance();
        $connection->connect($config->get('host'),
            $config->get('user'),
            $config->get('password'),
            $config->get('database'),
            $config->get('port'),
            $config->get('charset'));


        if ($connection->getStatus()) {
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