<?php
$full_name=include ('./view/reports/natural_person/full_name.php');
$inn=include ('./view/reports/natural_person/input_inn.php');

return '
    <h6>Руководителя</h6>
        '.$full_name.$inn.'

';