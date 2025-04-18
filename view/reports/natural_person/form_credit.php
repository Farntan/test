<?php

$button= include('button_send.php');
$natural_person=include('natural_person.php');

$product=include('./view/reports/credit/product.php');

$form= "
<form action='/index.php' method='post'>      
       
        $natural_person
        
        $product
        
        
        
        $button
        
        
</form>";

return $form;