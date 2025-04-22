<?php
$max_date=date('Y-m-d', strtotime('-14 years'));

return '
<label for="passport_date" class="form-label">Паспортные данные</label>
<div class="input-group mb-3" id="passport_date">
   
  <input type="text" class="form-control me-2" placeholder="серия XX XX"  name="series" value="'.$application->series.'"
         aria-label="серия XX XX" required minlength="4" maxlength="5" required '.$element_availability.'>
  <input type="text" class="form-control me-2" placeholder="номер XXXXXX"  value="'.$application->number.'"
         name="number" aria-label="номер XXXXXX" required minlength="6" 
         maxlength="6" pattern="[0-9]{6}" title="Номер паспорта должен содержать 6 цифр" required '.$element_availability.'>
  <input type="date" class="form-control" placeholder="дата выдачи"  name="date_issue" value="'.$application->date_issue.'"
         aria-label="дата выдачи" max="' . $max_date . '" required '.$element_availability.'>

  
</div>
';