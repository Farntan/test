<?php

namespace classes;

use Couchbase\View;

class Redirect
{
    public static function View (string $name)
    {
        $domain = $_SERVER['HTTP_HOST'];
        $url = 'https://' . $domain . $name;
        $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if ($url != $actual_link) {
            header("Location:".$url);
            exit();
        };

    }


}