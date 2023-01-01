<?php

declare(strict_types=1);

namespace SoapServerTest\WebService;

use PHPUnit\Framework\TestCase;
use SoapServer\WebService\Calculator;

class CalculatorTest extends TestCase
{

    public function test_add(): void
    {
        $input1 = 1;
        $input2 = 2;
        self::assertEquals(
            $input1 + $input2,
            (new Calculator())->add($input1, $input2)
        );
    }
}
