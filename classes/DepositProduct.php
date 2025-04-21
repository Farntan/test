<?php

namespace classes;

class DepositProduct
{
    public string $openData;
    public string $closeData;
    public string $periodDeposit;
    public string $capitalization_frequency;

    /**
     * @param string $openData deposit opening date
     * @param string $closeData deposit closing date
     * @param string $periodDeposit deposit period
     * @param string $capitalization_frequency type of capitalization
     */
    public function __construct(string $openData,string $closeData,string $periodDeposit,string $capitalization_frequency)
    {
        $this->openData = $openData;
        $this->closeData = $closeData;
        $this->periodDeposit = $periodDeposit;
        $this->capitalization_frequency = $capitalization_frequency;
    }
}