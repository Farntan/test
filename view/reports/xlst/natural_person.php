<?php
return '
<xsl:stylesheet version = "1.0"
     xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
 <xsl:output indent="yes" method="html" />
     <xsl:template match="/model">
         
        <xsl:apply-templates select="/model/user" />
        <xsl:apply-templates select="/model/credit" />
        
        
    </xsl:template>
    
     <xsl:template match="/model/user">
        <label for="FIO" class="form-label">Фамилия Имя Отчество</label>
        <div class="mb-3 input-group" id="FIO">         
          <input type="text" class="form-control me-2" id="surname" required="required"  placeholder="Фамилия"  maxlength="50">
               <xsl:attribute name="value">
                    <xsl:value-of select="surname"/>
               </xsl:attribute>   
               <xsl:attribute name="name">
                    <xsl:value-of select="name()"/>
               </xsl:attribute>                    
          </input>
          <input type="text" class="form-control me-2"  id="name"  required="required" placeholder="Имя"  maxlength="50" >  
               <xsl:attribute name="value">
                    <xsl:value-of select="name"/>
               </xsl:attribute>  
               <xsl:attribute name="name">
                    <xsl:value-of select="name()"/>
               </xsl:attribute>             
          </input>
          <input type="text" class="form-control" id="patronymic" required="required" placeholder="Отчество"  maxlength="50">
               <xsl:attribute name="value">
                        <xsl:value-of select="middle_name"/>
               </xsl:attribute>  
               <xsl:attribute name="name">
                    <xsl:value-of select="name()"/>
               </xsl:attribute>      
           </input>
        </div>
        <div class="mb-3">
          <label for="data_birth" class="form-label">Дата рождения</label>
          <input type="date" class="form-control" id="data_birth" required="required"  placeholder="Дата рождения"> 
                <xsl:attribute name="value">
                        <xsl:value-of select="date_birth"/>
                </xsl:attribute>  
                <xsl:attribute name="name">
                    <xsl:value-of select="name()"/>
                </xsl:attribute>   
           </input>               
        </div>
        <div class="mb-3">
          <label for="inn" class="form-label">ИНН</label>
          <input type="text" class="form-control"  id="inn" placeholder="ИНН" required="required"   title="ИНН должен содержать 12 цифр" minlength="12" maxlength="12" pattern="[0-9]{12}">
                <xsl:attribute name="value">
                        <xsl:value-of select="inn"/>
                </xsl:attribute>  
                <xsl:attribute name="name">
                    <xsl:value-of select="name()"/>
                </xsl:attribute>  
           </input>
        </div>
        <label for="passport_date" class="form-label">Паспортные данные</label>
        <div class="input-group mb-3" id="passport_date">           
          <input type="text" class="form-control me-2" placeholder="серия XX XX" required="required" aria-label="серия XX XX" minlength="4" maxlength="5">
                <xsl:attribute name="value">
                        <xsl:value-of select="passport_series"/>
                </xsl:attribute>  
                <xsl:attribute name="name">
                    <xsl:value-of select="name()"/>
                </xsl:attribute>  
           </input>
          <input type="text" class="form-control me-2" placeholder="номер XXXXXX"  required="required" aria-label="номер XXXXXX" minlength="6" maxlength="6" pattern="[0-9]{6}" title="Номер паспорта должен содержать 6 цифр">
                <xsl:attribute name="value">
                        <xsl:value-of select="passport_number"/>
                </xsl:attribute>  
                <xsl:attribute name="name">
                    <xsl:value-of select="name()"/>
                </xsl:attribute>  
           </input>
          <input type="date" class="form-control" placeholder="дата выдачи"  name="passport_data" required="required" aria-label="дата выдачи">   
                <xsl:attribute name="value">
                        <xsl:value-of select="passport_data"/>
                </xsl:attribute>  
                <xsl:attribute name="name">
                    <xsl:value-of select="passport_data"/>
                </xsl:attribute>
           </input>        
        </div>    
             
        <button type="button" class="btn btn-secondary d-print-none" onClick="window.print()">Печать</button>
        </xsl:template>
    
     <xsl:template match="/model/credit">
     
     </xsl:template>
     
     <xsl:template match="/model/client">
     
     </xsl:template>
     
      <xsl:template match="/model/chart_type">
     
     </xsl:template>
    
    
   
     
</xsl:stylesheet>';









