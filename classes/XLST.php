<?php

namespace classes;

use DOMDocument;
use XSLTProcessor;

class XLST
{
    private DOMDocument $xml;
    private string $xlst;

    public function __construct(DOMDocument $xml, string $xlst)
{
    $this->xml = $xml;
    $this->xlst = $xlst;
}

    public function transform () {


        $xml=$this->xml;
// Объект стиля
        $xsl = new DOMDocument("1.0", "utf-8");
        $xsl->loadXML($this->xlst);

// Создание парсера
        $proc = new XSLTProcessor();

// Подключение стиля к парсеру
        $proc->importStylesheet($xsl);

// Обработка парсером исходного XML-документа
        $parsed = $proc->transformToXml($xml);
        echo ($parsed);

    }


}