<?php
use classlibrary\Config;
$config=new Config();

$name=$config->get('name');
$author=$config->get('author');
echo ' <div class="text-center"><h1 class="mt-2">'.$name.' by '.$author.'</h1></div>';
echo ' <div class="text-center"><span class="mt-2">'.date("F j, Y, g:i a").'</span></div>';