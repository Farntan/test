<?php
return '
<xsl:stylesheet version = "1.0"
     xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
     
     <xsl:template match="/">
        <label for="FIO" class="form-label">Фамилия Имя Отчество</label>
        <div class="mb-3 input-group" id="FIO">         
          <input type="text" class="form-control me-2" id="surname" value="surname" name="surname" placeholder="Фамилия"  maxlength="50" />
          <input type="text" class="form-control me-2"  id="name" value="name" name="name" placeholder="Имя"  maxlength="50" />
          <input type="text" class="form-control" id="patronymic" value="patronymic" name="patronymic" placeholder="Отчество"  maxlength="50" />
        </div>
        <div class="mb-3">
          <label for="data_birth" class="form-label">Дата рождения</label>
          <input type="date" class="form-control" id="data_birth" name="data_birth" placeholder="Дата рождения" />               
        </div>
        <div class="mb-3">
          <label for="inn" class="form-label">ИНН</label>
          <input type="text" class="form-control"  id="inn" name="inn" placeholder="ИНН"  title="ИНН должен содержать 12 цифр" minlength="12" maxlength="12" pattern="[0-9]{12}"/>
        </div>
        <label for="passport_date" class="form-label">Паспортные данные</label>
        <div class="input-group mb-3" id="passport_date">           
          <input type="text" class="form-control me-2" placeholder="серия XX XX"  name="series" aria-label="серия XX XX" minlength="4" maxlength="5"  />
          <input type="text" class="form-control me-2" placeholder="номер XXXXXX" name="number" aria-label="номер XXXXXX" minlength="6" maxlength="6" pattern="[0-9]{6}" title="Номер паспорта должен содержать 6 цифр"  />
          <input type="date" class="form-control" placeholder="дата выдачи"  name="date_issue" aria-label="дата выдачи" />           
        </div>
        
       
       
       
       
       
       
    <input type="button" value="Print this page" class="d-print-none" onClick="window.print()"/>
    </xsl:template>
    
    
    
     
</xsl:stylesheet>';









