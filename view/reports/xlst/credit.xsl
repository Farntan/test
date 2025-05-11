<?xml version="1.0" ?>
<xsl:stylesheet version = "1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output indent="yes" method="html" />


    <xsl:template match="items/item/credit">
        <div class="row">
            <div class="col-6">
                <label for="date_open" class="form-label">Дата открытия</label>
                <div class="input-group mb-3" id="date_open">
                     <input type="date" class="form-control me-2" placeholder="дата открытия"  name="data_open"
                            aria-label="дата открытия"  required="required">
                         <xsl:attribute name="value">
                             <xsl:value-of select="data_open"/>
                         </xsl:attribute>


                     </input>
                </div>
            </div>
            <div class="col-6">
                <label for="date_close" class="form-label">Дата закрытия</label>
                <div class="input-group mb-3" id="date_open">

                    <input type="date" class="form-control" placeholder="дата закрытия"  name="data_close" value="'.$application->close.'"
                           aria-label="дата закрытия" required="required">
                            <xsl:attribute name="value">
                                <xsl:value-of select="data_close"/>
                            </xsl:attribute>

                    </input>
                </div>
            </div>

        </div>
        <label for="credit_period" class="form-label">Срок (в месяцах)</label>
        <div class="input-group mb-3" id="date_open">

            <input type="number" class="form-control me-2" placeholder="срок (месяцах)"  step="1"
                   name="credit_period" aria-label="срок (в месяцах)" min="0"  required="required">
                    <xsl:attribute name="value">
                        <xsl:value-of select="credit_period"/>
                    </xsl:attribute>

            </input>


        </div>




    </xsl:template>




</xsl:stylesheet>