<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Service\NumberGeneration\NumberGenerationService;

interface NumberGenerationInterface
{
    public function generate(): string;
}
