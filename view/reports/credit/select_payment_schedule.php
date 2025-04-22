<?php

$selected_text = $application->chart_type;
$select_array = ['аннуитетный', 'дифференцированный'];
$main_selected = 'selected';
$option_list = '';
foreach ($select_array as $key => $value) {
    $selected = '';
    $index=$key+1;
    if ($value === $selected_text) {
        $selected = 'selected';
        $main_selected = '';
    }

    $option_list .= '<option ' . $selected . ' value="' . $index . '" >' . $value . '</option>';
}


return '

<label for="payment_schedule" class="form-label">График платежей</label>
<select class="form-select" name="payment_schedule" id="payment_schedule" aria-label="Default select example" ' . $element_availability . '>
  <option ' . $main_selected . ' disabled>Выберите график платежей</option>
  ' . $option_list . '
 
</select>
';