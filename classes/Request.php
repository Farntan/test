<?php

namespace classes;

class Request
{
    public array $all;
    public function __construct()
    {
        $this->all=$_REQUEST;
    }



}