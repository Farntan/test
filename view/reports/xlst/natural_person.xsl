<?xml version="1.0" ?>
<xsl:stylesheet version = "1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output indent="yes" method="html" />


    <xsl:template  match="/items/item/user">
        <label for="FIO" class="form-label">Фамилия Имя Отчество</label>
        <div class="mb-3 input-group" id="FIO">
            <input type="text" class="form-control me-2" name="surname" required="required"  placeholder="Фамилия"  maxlength="50">
                <xsl:attribute name="value">
                    <xsl:value-of select="surname"/>
                </xsl:attribute>

            </input>
            <input type="text" class="form-control me-2"  name="name"  required="required" placeholder="Имя"  maxlength="50" >
                <xsl:attribute name="value">
                    <xsl:value-of select="name"/>
                </xsl:attribute>

            </input>
            <input type="text" class="form-control" name="middle_name" required="required" placeholder="Отчество"  maxlength="50">
                <xsl:attribute name="value">
                    <xsl:value-of select="middle_name"/>
                </xsl:attribute>

            </input>
        </div>
        <div class="mb-3">
            <label for="data_birth" class="form-label">Дата рождения</label>
            <input type="date" class="form-control" name="date_birth" required="required"  placeholder="Дата рождения">
                <xsl:attribute name="value">
                    <xsl:value-of select="date_birth"/>
                </xsl:attribute>

            </input>
        </div>
        <div class="mb-3">
            <label for="inn" class="form-label">ИНН</label>
            <input type="text" class="form-control"  id="inn" name="inn" placeholder="ИНН" required="required"   title="ИНН должен содержать 12 цифр" minlength="12" maxlength="12" pattern="[0-9]{12}">
                <xsl:attribute name="value">
                    <xsl:value-of select="inn"/>
                </xsl:attribute>

            </input>
        </div>
        <label for="passport_date" class="form-label">Паспортные данные</label>
        <div class="input-group mb-3" id="passport_date">
            <input type="text" class="form-control me-2" placeholder="серия XX XX" name="passport_series" required="required" aria-label="серия XX XX" minlength="4" maxlength="5">
                <xsl:attribute name="value">
                    <xsl:value-of select="passport_series"/>
                </xsl:attribute>

            </input>
            <input type="text" class="form-control me-2" placeholder="номер XXXXXX"  name="passport_number" required="required" aria-label="номер XXXXXX" minlength="6" maxlength="6" pattern="[0-9]{6}" title="Номер паспорта должен содержать 6 цифр">
                <xsl:attribute name="value">
                    <xsl:value-of select="passport_number"/>
                </xsl:attribute>
            </input>
            <input type="date" class="form-control" placeholder="дата выдачи"  name="passport_data" required="required" aria-label="дата выдачи">
                <xsl:attribute name="value">
                    <xsl:value-of select="passport_data"/>
                </xsl:attribute>

            </input>
        </div>
    </xsl:template>





</xsl:stylesheet>