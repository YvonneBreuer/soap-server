<?php

declare(strict_types=1);

namespace SoapServerTest\WebService;

use PHPUnit\Framework\TestCase;
use SoapServer\WebService\StringMatch;

class StringMatchTest extends TestCase
{

    public function test_get_first_match(): void
    {
        $pattern = '/https?:\/\/\K([^\/]+)/';
        $subject = 'https://example.com/test';
        preg_match($pattern, $subject, $matches);
        self::assertEquals(
            $matches[0],
            (new StringMatch())->get_first_match($pattern, $subject)
        );
    }
}
