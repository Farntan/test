<?php

namespace classes;

class LegalEntity
{
    public string $surname;
    public string $name;
    public string $middleName;
    public int $inn;
    public string $address_organization;
    public string $name_organization;
    public int $ogrn;
    public int $inn_organization;
    public int $kpp;

    /**
     * @param string $surname
     * @param string $name
     * @param string $middleName
     * @param int $inn
     * @param string $address_organization
     * @param string $name_organization
     * @param int $ogrn
     * @param int $inn_organization
     * @param int $kpp
     */
    public function __construct(string $surname, string $name, string $middleName, int  $inn, string $address_organization,
                                string $name_organization, int $ogrn, int $inn_organization,int $kpp)
    {

        $this->surname = $surname;
        $this->name = $name;
        $this->middleName = $middleName;
        $this->inn = $inn;
        $this->address_organization=$address_organization;
        $this->name_organization=$name_organization;
        $this->ogrn=$ogrn;
        $this->inn_organization=$inn_organization;
        $this->kpp=$kpp;

    }


}