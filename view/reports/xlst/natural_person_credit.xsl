<xsl:stylesheet version = "1.0"
     xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




     <xsl:include href="/view/reports/xlst/natural_person.xsl"/>
     <xsl:include href="/view/reports/xlst/credit.xsl"/>
     <xsl:include href="/view/reports/xlst/button_edit.xsl"/>
     <xsl:template match="model">
          <xsl:apply-templates select="/model/user"/>
          <xsl:apply-templates select="/model/credit"/>
          <xsl:apply-templates select="/model/clients"/>
     </xsl:template>




   
     
</xsl:stylesheet>