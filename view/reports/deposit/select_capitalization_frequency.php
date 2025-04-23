
<?php

$selected_text = $application->сapitalization_type;
$select_array = ['в конце срока', 'ежемесячно'];
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

<label for="capitalization_frequency" class="form-label">График платежей</label>
<select class="form-select" name="capitalization_frequency" id="capitalization_frequency" aria-label="Default select example" ' . $element_availability . '>
  <option ' . $main_selected . ' disabled>Выберите периодичность капитализации</option>
  ' . $option_list . '
 
</select>

';
