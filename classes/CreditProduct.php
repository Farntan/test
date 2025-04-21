<?php

namespace classes;

class CreditProduct
{
    public string $openData;
    public string $closeData;
    public string $amount;
    public string $periodCredit;
    public string $chart_type;

    /**
     * @param string $openData loan opening date
     * @param string $closeData loan closing date
     * @param string $amount loan amount
     * @param string $periodCredit loan period
     * @param string $chart_type type of payment schedule
     */
    public function __construct(string $openData,string $closeData,string $amount,string $periodCredit,string $chart_type)
    {
        $this->openData = $openData;
        $this->closeData = $closeData;
        $this->amount = $amount;
        $this->periodCredit = $periodCredit;
        $this->chart_type = $chart_type;
    }
}