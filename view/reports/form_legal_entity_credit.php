<?php

$button= include('./view/reports/layouts/button_send.php');
$legal_entity= include('./view/reports/legal_entity/legal_entity.php');
$product= include('./view/reports/credit/product.php');

$form= "
<form action='/legal_entity/credit/store' method='post'>      
       $legal_entity
       $product
       $button
        
</form>";

return $form;