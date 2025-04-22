<?php
$element_availability='disabled';
$natural_person= include('./view/reports/natural_person/natural_person.php');
$product= include('./view/reports/deposit/product.php');





return $natural_person.$product;