<?php

$button= include('button_send.php');
$surname=include('input_surname.php');
$name=include('input_name.php');
$data_birth=include('input_date_birth.php');

$form= "
<form action='/index.php' method='post'>      
       
        $surname
        $name
        $data_birth
        $button
</form>";

return $form;