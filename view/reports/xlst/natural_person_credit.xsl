<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


    <xsl:include href="/view/reports/xlst/natural_person.xsl"/>
    <xsl:include href="/view/reports/xlst/credit.xsl"/>
    <xsl:include href="/view/reports/xlst/button_edit.xsl"/>
    <xsl:include href="/view/reports/xlst/chart_types.xsl"/>




    <xsl:template match="models">
        <xsl:variable name="chart_type_name" select="items/item/chart_type/chart_type"/>

        <xsl:apply-templates select="items/item/user"/>
        <xsl:apply-templates select="items/item/credit"/>

        <xsl:apply-templates select="chart_types"/>
        <xsl:apply-templates select="items/item/clients"/>
    </xsl:template>

</xsl:stylesheet>