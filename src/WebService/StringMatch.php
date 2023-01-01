<?php

declare(strict_types=1);

namespace SoapServer\WebService;

class StringMatch
{
    /**
     * @param string $pattern
     * @param string  $subject
     * @return string
     */
    public function get_first_match(string $pattern, string $subject): array | string
    {
        $matches = [];
        $result = preg_match($pattern, $subject, $matches);
        if (!$result) {
            return 'Invalid input data';
        }
        return $matches[0];
    }
}
