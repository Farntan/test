<?php
use classes\config;

$config=new config();

$name=$config->get('name');
$author=$config->get('author');

$header="<!doctype html>
<html lang='ru'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
     <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

    <title>$name</title>
    
  </head> 
    
</html>";

echo $header;