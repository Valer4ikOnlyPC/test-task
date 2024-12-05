<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Application\Service\NumberGeneration\NumberGenerationService;

use TestTask\Core\Context\Application\Service\ApplicationService;
use TestTask\Core\Context\Application\Service\NumberGeneration\NumberGenerationService\Request\NumberGenerationRequest;
use TestTask\Core\Context\Application\Service\NumberGeneration\NumberGenerationService\Response\NumberGenerationResponse;
use TestTask\Core\Context\Application\Service\RequestInterface;
use TestTask\Core\Context\Application\Service\ResponseInterface;
use TestTask\Core\Context\Domain\Service\NumberGeneration\NumberGenerationService\NumberGenerationInterface as NumberGenerator;

/**
 * @method NumberGenerationResponse execute(NumberGenerationRequest $request);
 */
class NumberGenerationService extends ApplicationService
{
    /**
     * @var NumberGenerator
     */
    private $numberGenerator;

    public function __construct(NumberGenerator $numberGenerator)
    {
        $this->numberGenerator = $numberGenerator;
    }

    protected function supports(RequestInterface $request): bool
    {
        return $request instanceof NumberGenerationRequest;
    }

    /**
     * @param NumberGenerationRequest $request
     *
     * @return NumberGenerationResponse
     */
    protected function process(RequestInterface $request): ResponseInterface
    {
        return new NumberGenerationResponse(
            $this->numberGenerator->generate()
        );
    }
}
