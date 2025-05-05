<xsl:stylesheet version = "1.0"
     xmlns:xsl="http://www.w3.org/1999/XSL/Transform">






     <xsl:include href="/view/reports/xlst/chart_types.xsl"/>
     <xsl:include href="/view/reports/xlst/button_edit.xsl"/>
     <xsl:include href="/view/reports/xlst/natural_person.xsl"/>
     <xsl:include href="/view/reports/xlst/credit.xsl"/>

     <xsl:template match="model">
          <xsl:apply-templates select="items/item/user"/>
          <xsl:apply-templates select="items/item/credit"/>
          <xsl:apply-templates select="chart_types"/>

          <xsl:apply-templates select="items/item/clients"/>
          <button type="button" class="btn btn-secondary d-print-none ms-2" onClick="window.print()">Печать</button>
     </xsl:template>




   
     
</xsl:stylesheet>