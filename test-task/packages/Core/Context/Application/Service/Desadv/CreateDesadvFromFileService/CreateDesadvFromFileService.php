<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Application\Service\Desadv\CreateDesadvFromFileService;

use TestTask\Core\Context\Application\Service\ApplicationService;
use TestTask\Core\Context\Application\Service\Desadv\CreateDesadvFromFileService\Request\CreateDesadvFromFileRequest;
use TestTask\Core\Context\Application\Service\Desadv\CreateDesadvFromFileService\Response\CreateDesadvFromFileResponse;
use TestTask\Core\Context\Application\Service\RequestInterface;
use TestTask\Core\Context\Application\Service\ResponseInterface;
use TestTask\Core\Context\Domain\Service\Desadv\CreatorFromFile\CreatorFromFileInterface;

/**
 * @method CreateDesadvFromFileResponse execute(CreateDesadvFromFileRequest $request);
 */
class CreateDesadvFromFileService extends ApplicationService
{
    /**
     * @var CreatorFromFileInterface
     */
    private $desadvCreator;

    public function __construct(CreatorFromFileInterface $desadvCreator)
    {
        $this->desadvCreator = $desadvCreator;
    }

    protected function supports(RequestInterface $request): bool
    {
        return $request instanceof CreateDesadvFromFileRequest;
    }

    /**
     * @param CreateDesadvFromFileRequest $request
     *
     * @return CreateDesadvFromFileResponse
     */
    protected function process(RequestInterface $request): ResponseInterface
    {
        $this->desadvCreator->createFromBase64($request->fileBase64());
        return new CreateDesadvFromFileResponse();
    }
}
