<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Service\NumberGeneration\NumberGenerationService;

class NumberGenerationService implements NumberGenerationInterface
{
    public function generate(): string
    {
        $base = '988988';
        $number = str_pad((string) mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        $result = $base . $number;
        $even = 0;
        $odd = 0;
        for ($i = 0; $i < mb_strlen($result); $i++) {
            if ($i % 2 !== 0) {
                $even += (int) $result{$i};
            } else {
                $odd += (int) $result{$i};
            }
        }
        $index = (int) substr((string) ($even + $odd * 3), -1);
        $index = $index !== 0 ? 10 - $index : 0;
        return $result . $index;
    }
}
