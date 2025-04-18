<?php
$min_date= date('Y-m-d', strtotime('-120 years'));
$max_date=date('Y-m-d', strtotime('-18 years'));

return '
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Фамилия</label>
  <input type="date" class="form-control" id="exampleFormControlInput1" name="data_birth" min="'.$min_date.'" max="'.$max_date.'" placeholder="Дата рождения" required >
</div>
';