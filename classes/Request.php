<?php

namespace classes;

class Request
{
    public array $all;

    /**
     * class based on a request to the server

     */
    public function __construct()
    {
        $this->all=$_REQUEST;
    }



}