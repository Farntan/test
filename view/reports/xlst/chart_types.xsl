<xsl:stylesheet version = "1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output indent="yes" method="html" />


    <xsl:template  match="chart_types">
        <label class="form-label" for="chart_type">
             График платежей
        </label>
        <select class="form-select"  id='chart_type' name='chart_type' aria-label="График платежей">

            <option  selected="selected" disabled="disabled">Выберите график платежей</option>
            <xsl:for-each select=".">
                <option>
                    <xsl:value-of select="name"/>
                </option>
            </xsl:for-each>


        </select>

    </xsl:template>


</xsl:stylesheet>









