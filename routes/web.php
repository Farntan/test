<?php
return [

    '/home'=>[
        'name'=>'Доступные заявки',
        'controller'=>'HomeController',
        'method'=>'index'
    ],

    '/physicalperson/credit/create'=>[
        'name'=>'Заявка на кредит (физическое лицо)',
        'controller'=>'NaturalPersonalCreditController',
        'method'=>'create'
    ],
    '/physicalperson/credit/store'=>[
        'name'=>'Создание продукта',
        'controller'=>'NaturalPersonalCreditController',
        'method'=>'store'
    ],
    '/physicalperson/credit/index'=>[
        'name'=>'Список заявок на кредит',
        'controller'=>'NaturalPersonalCreditController',
        'method'=>'index'
    ],
    '/physicalperson/credit/show'=>[
        'name'=>'Данные заявки',
        'controller'=>'NaturalPersonalCreditController',
        'method'=>'show'
    ],
    '/physicalperson/deposit/create'=>[
        'name'=>'Заявка на вклад (физическое лицо)',
        'controller'=>'NaturalPersonalDepositController',
        'method'=>'create'
    ],
    '/error'=>[
        'name'=>'Error',
        'controller'=>'ErrorController',
        'method'=>'index'
    ],
    '/errorDB'=>[
        'name'=>'ErrorDB',
        'controller'=>'ErrorDBController',
        'method'=>'index'
    ],
    '/errorDB/status'=>[
        'name'=>'Статус базы данных',
        'controller'=>'ErrorDBController',
        'method'=>'status'
    ],

];