<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Application\Service;

interface ApplicationServiceInterface
{
    public function execute(RequestInterface $request): ResponseInterface;
}
