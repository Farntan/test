<?php
$max_date=date('Y-m-d', strtotime('-14 years'));

return '
<label for="passport_date" class="form-label">Паспортные данные</label>
<div class="input-group mb-3" id="passport_date">
   
  <input type="text" class="form-control me-2" placeholder="серия XX XX"  name="series" aria-label="серия XX XX" required min="4" max="5" required>
  <input type="text" class="form-control me-2" placeholder="номер XXXXXX"  name="number" aria-label="номер XXXXXX" required min="6" max="6" required>
  <input type="date" class="form-control" placeholder="дата выдачи"  name="date_issue" aria-label="дата выдачи" max="' . $max_date . '" required >

  
</div>
';