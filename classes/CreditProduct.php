<?php

namespace classes;

class CreditProduct
{
    public string $openData;
    public string $closeData;
    public string $amount;
    public string $periodCredit;
    public string $chart_type;
    public function __construct($openData,$closeData,$amount,$periodCredit,$chart_type)
    {
        $this->openData = $openData;
        $this->closeData = $closeData;
        $this->amount = $amount;
        $this->periodCredit = $periodCredit;
        $this->chart_type = $chart_type;
    }
}