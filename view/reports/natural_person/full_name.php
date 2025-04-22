<?php
return '
<label for="FIO" class="form-label">Фамилия Имя Отчество</label>
<div class="mb-3 input-group" id="FIO"> 

  <input type="text" class="form-control me-2" value="'.$application->surname.'" id="surname" name="surname" placeholder="Фамилия" required maxlength="50" '.$element_availability.'>
  <input type="text" class="form-control me-2" value="'.$application->name.'" id="name" name="name" placeholder="Имя" required maxlength="50" '.$element_availability.'>
  <input type="text" class="form-control" value="'.$application->middle_name.'" id="patronymic" name="patronymic" placeholder="Отчество" required maxlength="50" '.$element_availability.'>
</div>



';