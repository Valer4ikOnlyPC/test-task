<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Application\Service\NumberGeneration\NumberGenerationService\Response;

use JMS\Serializer\Annotation as Serializer;
use TestTask\Core\Context\Application\Service\ResponseInterface;

class NumberGenerationResponse implements ResponseInterface
{
    /**
     * @var string
     * @Serializer\SerializedName("generated_number")
     */
    private $generatedNumber;

    public function __construct(string $generatedNumber)
    {
        $this->setGeneratedNumber($generatedNumber);
    }

    public function generatedNumber(): string
    {
        return $this->generatedNumber;
    }

    private function setGeneratedNumber(string $generatedNumber): void
    {
        $this->generatedNumber = $generatedNumber;
    }
}
