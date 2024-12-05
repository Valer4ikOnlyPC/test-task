<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Application\Service;

use TestTask\Core\Context\Application\Exception\UnsupportedRequestException;

abstract class ApplicationService implements ApplicationServiceInterface
{
    abstract protected function supports(RequestInterface $request): bool;

    /**
     * @throws UnsupportedRequestException
     */
    final public function execute(RequestInterface $request): ResponseInterface
    {
        if (false === $this->supports($request)) {
            throw new UnsupportedRequestException(sprintf('Unsupported request %s.', get_class($request)));
        }

        return $this->process($request);
    }

    abstract protected function process(RequestInterface $request): ResponseInterface;
}
