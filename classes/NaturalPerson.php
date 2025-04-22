<?php

namespace classes;

class NaturalPerson
{
    public string $surname;
    public string $name;
    public string $middleName;
    public int $inn;
    public string $dateBirth;
    public string $passportSeries;
    public string $passportNumber;
    public string $passportData;

    /**
     * @param string $surname
     * @param string $name
     * @param string $middleName
     * @param int $inn
     * @param string $dateBirth
     * @param string $passportSeries
     * @param string $passportNumber
     * @param string $passportData
     */
    public function __construct(string $surname, string $name, string $middleName, int  $inn, string $dateBirth, string $passportSeries, string $passportNumber, string $passportData)
    {

        $this->surname = $surname;
        $this->name = $name;
        $this->middleName = $middleName;
        $this->inn = $inn;
        $this->dateBirth = $dateBirth;
        $this->passportSeries = $passportSeries;
        $this->passportNumber = $passportNumber;
        $this->passportData = $passportData;
    }


}