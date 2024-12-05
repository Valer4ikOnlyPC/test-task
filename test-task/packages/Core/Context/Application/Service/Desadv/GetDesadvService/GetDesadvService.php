<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Application\Service\Desadv\GetDesadvService;

use TestTask\Core\Context\Application\Service\ApplicationService;
use TestTask\Core\Context\Application\Service\Desadv\DTO\DesadvDTO;
use TestTask\Core\Context\Application\Service\Desadv\GetDesadvService\Request\GetDesadvRequest;
use TestTask\Core\Context\Application\Service\Desadv\GetDesadvService\Response\GetDesadvResponse;
use TestTask\Core\Context\Application\Service\RequestInterface;
use TestTask\Core\Context\Application\Service\ResponseInterface;
use TestTask\Core\Context\Domain\Model\Desadv\Desadv;
use TestTask\Core\Context\Domain\Model\Desadv\DesadvRepositoryInterface;

/**
 * @method GetDesadvResponse execute(GetDesadvRequest $request);
 */
class GetDesadvService extends ApplicationService
{
    /**
     * @var DesadvRepositoryInterface
     */
    private $desadvRepository;

    public function __construct(DesadvRepositoryInterface $desadvRepository)
    {
        $this->desadvRepository = $desadvRepository;
    }

    protected function supports(RequestInterface $request): bool
    {
        return $request instanceof GetDesadvRequest;
    }

    /**
     * @param GetDesadvRequest $request
     *
     * @return GetDesadvResponse
     */
    protected function process(RequestInterface $request): ResponseInterface
    {
        if ($request->desadvID() !== null) {
            $desadv = $this->desadvRepository->findOrFail($request->desadvID());
            return new GetDesadvResponse(new DesadvDTO($desadv));
        }

        return new GetDesadvResponse(...array_map(function (Desadv $desadv) {
            return new DesadvDTO($desadv);
        }, $this->desadvRepository->findAll()));
    }
}
