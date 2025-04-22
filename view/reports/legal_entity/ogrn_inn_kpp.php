<?php
return '
<div class="row">
    <div class="col-4">
             <label for="ogrn" class="form-label">ОГРН</label>
             <div class="input-group" id="ogrn">
                <input type="text" class="form-control" placeholder="номер ОГРН"  value="'.$application->ogrn.'"
                        name="ogrn" aria-label="номер ОГРН" required minlength="13" 
                        maxlength="13" pattern="[0-9]{13}" title="Номер ОГРН должен содержать 13 цифр" required '.$element_availability.'>
             </div>
     </div>
             
    <div class="col-4">
             <label for="inn_organization" class="form-label">ИНН</label>
             <div class="input-group" id="inn_organization">
                <input type="text" class="form-control" placeholder="номер ИНН"  value="'.$application->ogrn.'"
                        name="inn_organization" aria-label="номер ИНН" required minlength="10" 
                        maxlength="10" pattern="[0-9]{10}" title="Номер ИНН должен содержать 10 цифр" required '.$element_availability.'>
             </div>
    </div>
    <div class="col-4">
            <label for="kpp" class="form-label">КПП</label>
                 <div class="input-group" id="kpp">
                    <input type="text" class="form-control" placeholder="номер КПП"  value="'.$application->ogrn.'"
                            name="kpp" aria-label="номер КПП" required minlength="9" 
                            maxlength="9" pattern="[0-9]{9}" title="Номер КПП должен содержать 9 цифр" required '.$element_availability.'>
                 </div>
    </div>
             
             
             
             
    
    

</div>';


