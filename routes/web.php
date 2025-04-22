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
        'name'=>'Список заявок на кредит (в виде таблицы)',
        'controller'=>'NaturalPersonalCreditController',
        'method'=>'index'
    ],
    '/physicalperson/credit/show'=>[
        'name'=>'Просмотр заявки на кредит',
        'controller'=>'NaturalPersonalCreditController',
        'method'=>'show'
    ],
    '/physicalperson/deposit/create'=>[
        'name'=>'Заявка на депозит (физическое лицо)',
        'controller'=>'NaturalPersonalDepositController',
        'method'=>'create'
    ],
    '/physicalperson/deposit/index'=>[
        'name'=>'Список заявок на депозит (в виде списка)',
        'controller'=>'NaturalPersonalDepositController',
        'method'=>'index'
    ],
    '/physicalperson/deposit/store'=>[
        'name'=>'Создание продукта',
        'controller'=>'NaturalPersonalDepositController',
        'method'=>'store'
    ],
    '/physicalperson/deposit/show'=>[
        'name'=>'Просмотр заявки на депозит',
        'controller'=>'NaturalPersonalDepositController',
        'method'=>'show'
    ],
    '/legal_entity/credit/create'=>[
        'name'=>'Заявка на кредит (юридическое лицо)',
        'controller'=>'LegalEntityCreditController',
        'method'=>'create'
    ],
    '/legal_entity/credit/store'=>[
        'name'=>'Создание продукта',
        'controller'=>'LegalEntityCreditController',
        'method'=>'store'
    ],
    '/legal_entity/credit/index'=>[
            'name'=>'Список заявок на депозит (в виде таблицы)',
            'controller'=>'LegalEntityCreditController',
            'method'=>'index'
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