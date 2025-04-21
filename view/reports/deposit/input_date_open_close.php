<?php
$min_date=date('Y-m-d');

return '

<div class="row">
<div class="col-6">
 <label for="date_open" class="form-label">Дата открытия</label>
<div class="input-group mb-3" id="date_open">
      
        <input type="date" class="form-control me-2" placeholder="дата открытия"  name="date_open" aria-label="дата открытия" min="' . $min_date . '" required >
     </div>  
</div>
<div class="col-6">
<label for="date_close" class="form-label">Дата закрытия</label>
  <div class="input-group mb-3" id="date_open"> 
       
        <input type="date" class="form-control" placeholder="дата закрытия"  name="date_close" aria-label="дата закрытия" min="' . $min_date . '" required > 
    </div>
</div>   
     
</div>

';
