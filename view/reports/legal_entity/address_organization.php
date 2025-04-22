<?php
return '
    <label for="address_organization" class="form-label">Адрес организации</label>
    <div class="mb-3 input-group" id="address_organization"> 

          <input type="text" class="form-control me-2" value="'.$application->address_organization.'" name="address_organization" 
                placeholder="Адрес организации" required maxlength="50" '.$element_availability.'>
    </div>
    ';