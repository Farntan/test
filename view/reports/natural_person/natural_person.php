<?php

$data_birth=include('input_date_birth.php');
$inn=include('input_inn.php');
$passport_date=include('input_passport_data.php');
$full_name=include('full_name.php');

$inn_data_birth="
<div class='row'>
    <div class='col-6'>
        $inn
    </div>
    <div class='col-6'>
        $data_birth
    </div>
</div>

";

$data_client=$full_name.$inn_data_birth.$passport_date;

return "
<h5  class='form-label'>Данные клиента:</h5>
<div>$data_client</div>";