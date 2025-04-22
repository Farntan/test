<?php
$name_organization= include('name_organization.php');
$address_organization= include('address_organization.php');
$ogrn_inn_kpp= include('ogrn_inn_kpp.php');

return '
    <h6>Организации:</h6>
        '.$name_organization. '
        '.$address_organization. '
        '.$ogrn_inn_kpp. '
';