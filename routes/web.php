<?php
return [

    '/home'=>[
        'name'=>'Home',
        'controller'=>'HomeController'
    ],

    '/test1'=>[
        'name'=>'Test №1',
        'controller'=>'Test1Controller'
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