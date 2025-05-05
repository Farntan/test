<xsl:stylesheet version = "1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output indent="yes" method="html" />


    <xsl:template  match="/items/item/clients">
        <a class="btn btn-secondary d-print-none" tabindex="-1" role="button" aria-disabled="true">
            <xsl:attribute name="href">
                <xsl:value-of select="concat('/physicalperson/credit/edit?id=',id)"/>
            </xsl:attribute>
            <xsl:text>Редактировать</xsl:text>
        </a>

    </xsl:template>


</xsl:stylesheet>