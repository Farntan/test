<?php

namespace classes;

class DepositProduct
{
    public string $openData;
    public string $closeData;
    public string $periodDeposit;
    public float $percent;
    public string $capitalization_frequency;

    /**
     * @param string $openData deposit opening date
     * @param string $closeData deposit closing date
     * @param string $periodDeposit deposit period
     * @param float $percent the percentage of the deposit
     * @param string $capitalization_frequency type of capitalization
     */
    public function __construct(string $openData,string $closeData,string $periodDeposit, float $percent, string $capitalization_frequency)
    {
        $this->openData = $openData;
        $this->closeData = $closeData;
        $this->periodDeposit = $periodDeposit;
        $this->percent = $percent;
        $this->capitalization_frequency = $capitalization_frequency;
    }
}