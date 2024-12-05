<?php

declare(strict_types=1);

namespace TestTask\Core\Common\Exception\Model;

use TestTask\Core\Common\Exception\RuntimeException;

class ResourceNotFoundException extends RuntimeException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 404);
    }
}
