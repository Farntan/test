<?php

return '
<div class="mb-3">
  <label for="surname" class="form-label">Фамилия</label>
  <input type="text" class="form-control" id="surname" name="surname" value="'.$application->surname.'"
        placeholder="Фамилия" required maxlength="50" '.$element_availability.'>
</div>
';