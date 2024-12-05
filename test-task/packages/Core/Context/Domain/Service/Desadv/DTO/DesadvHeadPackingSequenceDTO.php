<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Service\Desadv\DTO;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class DesadvHeadPackingSequenceDTO
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("HIERARCHICALID")
     */
    private $hierarchIcalid;

    /**
     * @var DesadvHeadPackingSequencePositionDTO[]
     *
     * @Assert\Valid(traverse="true")
     * @Serializer\XmlList(inline=true, entry="POSITION")
     * @Serializer\Type("array<TestTask\Core\Context\Domain\Service\Desadv\DTO\DesadvHeadPackingSequencePositionDTO>")
     * @Serializer\SerializedName("POSITIONS")
     */
    private $positions = [];

    public function hierarchIcalid(): int
    {
        return $this->hierarchIcalid;
    }

    public function setHierarchIcalid(int $hierarchIcalid): self
    {
        $this->hierarchIcalid = $hierarchIcalid;
        return $this;
    }

    /**
     * @return DesadvHeadPackingSequencePositionDTO[]
     */
    public function positions(): array
    {
        return $this->positions;
    }

    public function setPositions(DesadvHeadPackingSequencePositionDTO ...$positions): self
    {
        $this->positions = $positions;
        return $this;
    }
}
