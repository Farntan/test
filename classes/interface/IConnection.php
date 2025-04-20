<?php

namespace classes\controller;

interface IConnection
{


    public function connect ($host, $user, $pass, $db, $port,$charset);

}