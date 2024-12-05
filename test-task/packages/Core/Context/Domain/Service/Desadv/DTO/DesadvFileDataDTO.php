<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Service\Desadv\DTO;

use JMS\Serializer\Annotation as Serializer;

class DesadvFileDataDTO
{
    /**
     * @var DesadvDTO
     * @Serializer\Type("TestTask\Core\Context\Domain\Service\Desadv\DTO\DesadvDTO")
     * @Serializer\SerializedName("DESADV")
     * @Serializer\XmlValue
     */
    private $desadv;

    public function desadv(): DesadvDTO
    {
        return $this->desadv;
    }

    public function setDesadv(DesadvDTO $desadv): self
    {
        $this->desadv = $desadv;
        return $this;
    }
}
