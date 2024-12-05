<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Service\Desadv\CreatorFromFile;

interface CreatorFromFileInterface
{
    public function createFromLocalFile(string $fileName): void;

    public function createFromBase64(string $fileBase64): void;
}
