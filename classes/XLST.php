<?php

namespace classes;

use DOMDocument;

class XLST
{
    private string $xml;
    private string $xlst;
    public function __construct(string $xml, string $xlst)
    {
        $this->xlst=$xlst;
        $this->xml=$xml;
    }
    public function createDOM () {
        return new DOMDocument("1.0", "utf-8");
    }

    
    public function transform () {
        $xml = $this->createDOM();
        $xsl = new DOMDocument(null, 'windows-1251');


    }



}