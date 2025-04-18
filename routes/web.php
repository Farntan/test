<?php
return [

    '/home'=>[
        'name'=>'Home',
        'controller'=>'HomeController'
    ],

    '/physicalperson/credit'=>[
        'name'=>'Заявка на кредит (физическое лицо)',
        'controller'=>'NaturalPersonalCreditController',
        'method'=>'getView'
    ],
    '/physicalperson/credit/create'=>[
        'name'=>'Создание продукта',
        'controller'=>'NaturalPersonalCreditController',
        'method'=>'create'
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
        'controller'=>'ErrorController'
    ],

];