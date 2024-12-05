<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Exception;

class FileResourceNotFoundException extends \RuntimeException
{
    public function __construct(string $path)
    {
        parent::__construct(sprintf('Файл "%s" не найден.', $path), 404);
    }
}
