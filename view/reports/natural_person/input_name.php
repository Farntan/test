<?php

return '
<div class="mb-3">
  <label for="name" class="form-label">Имя</label>
  <input type="text" class="form-control" value="'.$application->name.'" id="name" name="name" placeholder="Имя" required maxlength="50" '.$element_availability.'>
</div>
';