<?php

namespace classes;

use DOMDocument;
use DOMException;

class XML
{
    
    public static function merge (DOMDocument $firstDom, DOMDocument $secondDom) :?DOMDocument
    {
        try {
            $dom = new DOMDocument("1.0", "utf-8");

            $root = $dom->createElement('models');
            $root->appendChild(
                $dom->importNode( $firstDom->documentElement, true )
            );
            $root->appendChild(
                $dom->importNode( $secondDom->documentElement, true )
            );
            $dom->appendChild($root);
            return $dom;
        }catch (DOMException $DOMException) {
            echo  $DOMException;
            return null;
        }


    }
}