<?php


return '
<label for="deposit_amount" class="form-label">Сумма</label>
<div class="input-group mb-3" id="deposit_amount">
    <span class="input-group-text">₽</span>
    <input type="number" class="form-control" placeholder="сумма" value="'.$application->deposit_amount.'"
            name="deposit_amount" aria-label="сумма" min="0" required '.$element_availability.'>
    
    <span class="input-group-text">рублей</span>
</div>
';


