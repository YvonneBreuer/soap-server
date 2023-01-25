<?php

declare(strict_types=1);

namespace SoapServerTest\WebService;

use PHPUnit\Framework\TestCase;
use SoapServer\WebService\AddressBook;
use SoapServer\Model\AddressBook\Address;

use function PHPUnit\Framework\assertEquals;

class AddressBookTest extends TestCase
{

    public function testGetAllEntries(): void
    {
        $result = (new AddressBook())->getAllEntries();
        self::assertIsArray($result);
    }

    public function testGetEntryForName(): void
    {
        $name = 'Antonio Ring';
        $result = (new AddressBook())->getEntryForName($name);
        assertEquals($name, $result->getName());
    }

    public function testGetEntryForAddress(): void
    {
        $street = 'Nurten-Flantz-Gasse 87';
        $zip =  '09726';
        $city =  'Gerolzhofen';
        $address = new Address($street, $zip, $city);
        $result = (new AddressBook())->getEntryForAddress($address);
        $result_address = $result->getAddress();
        assertEquals($street, $result_address->getStreet());
        assertEquals($zip, $result_address->getZip());
        assertEquals($city, $result_address->getCity());
    }
}
