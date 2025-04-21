<?php

return '
<div class="mb-3">
  <label for="inn" class="form-label">ИНН</label>
  <input type="text" class="form-control" id="inn" name="inn" placeholder="ИНН" required maxlength=12" title="ИНН должен содержать 12 цифр" minlength="12" pattern="[0-9]{12}">
</div>
';
