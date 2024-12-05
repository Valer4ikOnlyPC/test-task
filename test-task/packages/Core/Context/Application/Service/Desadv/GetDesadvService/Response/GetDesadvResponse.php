<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Application\Service\Desadv\GetDesadvService\Response;

use JMS\Serializer\Annotation as Serializer;
use TestTask\Core\Context\Application\Service\Desadv\DTO\DesadvDTO;
use TestTask\Core\Context\Application\Service\ResponseInterface;

class GetDesadvResponse implements ResponseInterface
{
    /**
     * @var DesadvDTO[]
     * @Serializer\SerializedName("desadvs")
     */
    private $desadvs;

    public function __construct(DesadvDTO ...$desadvs)
    {
        $this->setDesadvs(...$desadvs);
    }

    /**
     * @return DesadvDTO[]
     */
    public function desadvs(): array
    {
        return $this->desadvs;
    }

    private function setDesadvs(DesadvDTO ...$desadvs): void
    {
        $this->desadvs = $desadvs;
    }
}
