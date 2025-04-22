<?php

$supervisor_details=include('supervisor_details.php');
$organization_data=include('organization_data.php');

return '
        <h5>Данные:</h5>
       '. $supervisor_details.$organization_data.'
';
