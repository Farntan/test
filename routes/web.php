<?php
return [

    '/home'=>[
        'name'=>'Заявки',
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
    '/test2'=>[
        'name'=>'Test №2',
        'controller'=>'Test2Controller'
    ],
    '/test3'=>[
        'name'=>'Test №3',
        'controller'=>'Test3Controller'
    ],
    '/test4'=>[
        'name'=>'Test №4',
        'controller'=>'Test4Controller'
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
        'name'=>'DBStatus',
        'controller'=>'ErrorDBController',
        'method'=>'status'
    ],

];