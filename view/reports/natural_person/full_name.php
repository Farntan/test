<?php
return '
<label for="FIO" class="form-label">Фамилия Имя Отчество</label>
<div class="mb-3 input-group" id="FIO"> 

  <input type="text" class="form-control me-2" id="surname" name="surname" placeholder="Фамилия" required maxlength="50">
  <input type="text" class="form-control me-2" id="name" name="name" placeholder="Имя" required maxlength="50">
  <input type="text" class="form-control" id="patronymic" name="patronymic" placeholder="отчество" required maxlength="50">
</div>



';