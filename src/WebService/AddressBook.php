<?php

declare(strict_types=1);

namespace SoapServer\WebService;

use SoapServer\Model\AddressBook\Address;
use SoapServer\Model\AddressBook\AddressBookEntry;

define(
    'ADDRESSBOOK',
    [
        'Ellinor Hering' => [
            'Bachmannstraße 04',
            '68037',
            'Mühldorf am Inn'
        ],
        'Denny Schuchhardt' => [
            'Handestraße 694',
            '18441',
            'Schwäbisch Gmünd'
        ],
        'Antonio Ring' => [
            'Nurten-Flantz-Gasse 87',
            '09726',
            'Gerolzhofen'
        ],
        'Zeki Roskoth' => [
            'Gabriel-Zahn-Ring 316',
            '15863',
            'Neuruppin'
        ],
        'Dr. Hans-Martin Bolander' => [
            'Eimerallee 2/6',
            '06530',
            'Neustadtner Waldnaab'
        ],
        'Frau Edith Sorgatz' => [
            'Pia-Heinz-Straße 788',
            '23782',
            'Lübz'
        ],
        'Kunigunde Mohaupt' => [
            'Hesseweg 96',
            '51336',
            'Mühlhausen'
        ],
        'Gesine Gorlitz' => [
            'Sorgatzring 197',
            '90498',
            'Viechtach'
        ],
        'Hildegart Mangold' => [
            'Beckmanngasse 3',
            '47339',
            'Mühlhausen'
        ],
        'Frau Marie-Luise Bonbach' => [
            'Heydrichweg 67',
            '01657',
            'Böblingen'
        ],
    ]
);

class AddressBook
{

    /**
     * @return array
     */
    public function getAllEntries(): array
    {
        $addressbook = [];
        foreach (ADDRESSBOOK as $e_name => $e_address) {
            $address = new Address($e_address[0], $e_address[1], $e_address[2]);
            $addressbook[] = new AddressBookEntry($e_name, $address);
        }
        return $addressbook;
    }

    /**
     * @param string $name
     * @return SoapServer\Model\AddressBook\AddressBookEntry
     */
    public function getEntryForName(string $name): AddressBookEntry
    {
        if (array_key_exists($name, ADDRESSBOOK)) {
            $entry = ADDRESSBOOK[$name];
            $address = new Address($entry[0], $entry[1], $entry[2]);
            return new AddressBookEntry($name, $address);
        }
        return null;
    }

    /**
     * @param SoapServer\Model\AddressBook\Address
     * @return SoapServer\Model\AddressBook\AddressBookEntry
     */
    public function getEntryForAddress(Address $address): AddressBookEntry
    {
        foreach (ADDRESSBOOK as $e_name => $e_address) {
            if ($address->equals(new Address($e_address[0], $e_address[1], $e_address[2]))) {
                return new AddressBookEntry($e_name, $address);
            }
        }
        return null;
    }
}
