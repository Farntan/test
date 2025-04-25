<?php
 return '
<xsl:stylesheet version = "1.0"
     xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
       <xsl:template match="/">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Дата открытия</th>
                    <th scope="col">Дата закрытие</th>
                    <th scope="col">График платежей</th>
                    <th scope="col">Сумма</th>
                    <th scope="col">Просмотр</th>
    
                </tr>
           </thead>
       <xsl:for-each select="model">
            <tr>
                    <th scope="row">$i</th>
                    <td>    <xsl:value-of select="surname"/>
                            <xsl:value-of select="name"/>
                            <xsl:value-of select="middle_name"/>
                    </td>
                    <td><xsl:value-of select="open"/></td>
                    <td><xsl:value-of select="close"/></td>
                    <td><xsl:value-of select="chart_type"/></td>
                    <td><xsl:value-of select="amount"/></td>
                    <td>
                        <a class="link-secondary" href="/physicalperson/credit/show?id=5">
                        <xsl:attribute name="href">/physicalperson/credit/show?id=<xsl:value-of select="id" />
                        </xsl:attribute>
                            <i class="bi bi-eye">просмотр</i>
                        </a>
                    </td>
                </tr>;


        </xsl:for-each>
       
    </table>
     </xsl:template>
</xsl:stylesheet>';

