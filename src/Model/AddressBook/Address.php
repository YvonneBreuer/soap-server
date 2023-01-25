<?php

declare(strict_types=1);

namespace SoapServer\Model\AddressBook;

class Address
{
    private $street;
    private $zip;
    private $city;

    function __construct(string $street, string $zip, string $city)
    {
        $this->street = $street;
        $this->zip = $zip;
        $this->city = $city;
    }

    function getStreet(): string
    {
        return $this->street;
    }

    function getZip(): string
    {
        return $this->zip;
    }

    function getCity(): string
    {
        return $this->city;
    }

    function equals(Address $other): bool
    {
        return ($this->street === $other->street)
            && ($this->zip === $other->zip)
            && ($this->city === $other->city);
    }
}
