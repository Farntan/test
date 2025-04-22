<?php
return '
<div class="mb-3">
  <label for="patronymic" class="form-label">Имя</label>
  <input type="text" class="form-control" id="patronymic" name="patronymic" value="'.$application->patronymic.'"
        placeholder="отчество" required maxlength="50" '.$element_availability.'>
</div>
';