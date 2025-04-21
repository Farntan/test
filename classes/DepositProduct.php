<?php

namespace classes;

class DepositProduct
{
    public string $openData;
    public string $closeData;
    public string $periodDeposit;
    public string $capitalization_frequency;
    public function __construct($openData,$closeData,$periodDeposit,$capitalization_frequency)
    {
        $this->openData = $openData;
        $this->closeData = $closeData;
        $this->periodDeposit = $periodDeposit;
        $this->capitalization_frequency = $capitalization_frequency;
    }
}