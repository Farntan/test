<?php


return '
<label for="deposit_period" class="form-label">Срок (в месяцах)</label>
<div class="input-group mb-3" id="deposit_period">
   
    <input type="number" class="form-control me-2" placeholder="cрок (в месяцах)"  step="1" value="'.$application->deposit_period.'" '.$element_availability.'
        name="deposit_period" aria-label="дата открытия" min="0" required >
    
  
</div>
';


