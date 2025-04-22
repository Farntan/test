<?php
$min_date= date('Y-m-d', strtotime('-120 years'));
$max_date=date('Y-m-d', strtotime('-18 years'));

return '
<div class="mb-3">
  <label for="data_birth" class="form-label">Дата рождения</label>
  <input type="date" class="form-control" value="'.$application->data_birth.'" id="data_birth" name="data_birth" min="'.$min_date.'" max="'.$max_date.'" 
        placeholder="Дата рождения" required '.$element_availability.'>
</div>
';