<?php

namespace classes\controller;

interface IController
{
    public function getView ();
    public function setContent (string $string );
}
