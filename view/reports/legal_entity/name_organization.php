<?php
return '
    <label for="name_organization" class="form-label">Имя организации</label>
    <div class="mb-3 input-group" id="name_organization"> 

          <input type="text" class="form-control me-2" value="'.$application->name_organization.'" name="name_organization" placeholder="Имя организации" required maxlength="50" '.$element_availability.'>
    </div>
    ';
