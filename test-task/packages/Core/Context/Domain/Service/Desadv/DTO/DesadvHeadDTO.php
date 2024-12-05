<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Service\Desadv\DTO;

use JMS\Serializer\Annotation as Serializer;

class DesadvHeadDTO
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SENDER")
     */
    private $sender;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("RECIPIENT")
     */
    private $recipient;

    /**
     * @var DesadvHeadPackingSequenceDTO
     * @Serializer\SerializedName("PACKINGSEQUENCE")
     * @Serializer\Type("TestTask\Core\Context\Domain\Service\Desadv\DTO\DesadvHeadPackingSequenceDTO")
     */
    private $packingSequence;

    public function sender(): string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    public function recipient(): string
    {
        return $this->recipient;
    }

    public function setRecipient(string $recipient): self
    {
        $this->recipient = $recipient;
        return $this;
    }

    public function packingSequence(): DesadvHeadPackingSequenceDTO
    {
        return $this->packingSequence;
    }

    public function setPackingSequence(DesadvHeadPackingSequenceDTO $packingSequence): self
    {
        $this->packingSequence = $packingSequence;
        return $this;
    }
}
