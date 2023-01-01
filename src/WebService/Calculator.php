<?php

declare(strict_types=1);

namespace SoapServer\WebService;

class Calculator
{
    /**
     * @param int $inputParam1
     * @param int  $inputParam2
     * @return int
     */
    public function add(int $inputParam1, int $inputParam2): int
    {
        return $inputParam1 + $inputParam2;
    }
}
