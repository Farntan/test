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

    public function __construct($surname, $name, $middleName, $inn, $dateBirth, $passportSeries, $passportNumber, $passportData)
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

    public function save () {

    }

}