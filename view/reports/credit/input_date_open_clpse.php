<?php
$min_date=date('Y-m-d');

return '
<label for="date_open" class="form-label">Дата открытия/закрытия</label>
<div class="input-group mb-3" id="date_open">
   
    <input type="date" class="form-control me-2" placeholder="дата открытия"  name="date_open" aria-label="дата открытия" min="' . $min_date . '" required >
    <input type="date" class="form-control" placeholder="дата закрытия"  name="date_close" aria-label="дата закрытия" min="' . $min_date . '" required >

  
</div>
';
