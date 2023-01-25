<?php

declare(strict_types=1);

namespace SoapServer\Model\AddressBook;

use SoapServer\Model\AddressBook\Address;

class AddressBookEntry
{
    private $name;
    private $address;

    function __construct(string $name, Address $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    function getName(): string
    {
        return $this->name;
    }

    function getAddress(): Address
    {
        return $this->address;
    }
}
