<xsl:stylesheet version = "1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output indent="yes" method="html" />


    <xsl:template  match="chart_types">
        <xsl:variable name="chart_type_name" select="../items/item/chart_type/chart_type"/>



        <label class="form-label" for="chart_type">
             График платежей
        </label>

        <select class="form-select" id='chart_type' name='chart_type' aria-label="График платежей">


            <option disabled="disabled">

                    <xsl:if test="$chart_type_name=''">
                        <xsl:attribute name="selected">
                        </xsl:attribute>
                    </xsl:if>

                Выберите график платежей
            </option>
            <xsl:for-each select="item">
                <xsl:choose>
                    <xsl:when test="$chart_type_name=chart_type/name">
                        <option selected="selected">
                            <xsl:value-of select="chart_type/name"/>
                        </option>
                    </xsl:when>
                    <xsl:otherwise>
                        <option>
                            <xsl:value-of select="chart_type/name"/>
                        </option>
                    </xsl:otherwise>

                </xsl:choose>



            </xsl:for-each>


        </select>

    </xsl:template>


</xsl:stylesheet>









