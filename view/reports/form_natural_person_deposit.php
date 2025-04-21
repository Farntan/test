<?php

$button= include('./view/reports/layouts/button_send.php');
$natural_person= include('./view/reports/natural_person/natural_person.php');
$product= include('./view/reports/deposit/product.php');

$form= "
<form action='/physicalperson/deposit/store' method='post'>      
       
        $natural_person        
        $product     
        $button
        
        
</form>";

return $form;