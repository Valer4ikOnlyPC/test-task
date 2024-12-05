<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Application\Service\Desadv\DTO;

use JMS\Serializer\Annotation as Serializer;
use TestTask\Core\Context\Domain\Model\Desadv\Desadv;
use TestTask\Core\Context\Domain\Model\Desadv\DesadvID;

class DesadvDTO
{
    /**
     * @var int
     * @Serializer\SerializedName("id")
     */
    private $ID;

    /**
     * @var \DateTimeImmutable
     */
    private $date;

    /**
     * @var string
     */
    private $sender;

    /**
     * @var string
     */
    private $recipient;

    /**
     * @var mixed
     */
    private $body;

    public function __construct(Desadv $desadv)
    {
        $this->setID($desadv->ID());
        $this->setDate($desadv->date());
        $this->setSender($desadv->sender());
        $this->setRecipient($desadv->recipient());
        $this->setBody($desadv->body());
    }

    public function ID(): int
    {
        return $this->ID;
    }

    private function setID(DesadvID $ID): void
    {
        $this->ID = $ID->ID();
    }

    public function date(): \DateTimeImmutable
    {
        return $this->date;
    }

    private function setDate(\DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    public function sender(): string
    {
        return $this->sender;
    }

    private function setSender(string $sender): void
    {
        $this->sender = $sender;
    }

    public function recipient(): string
    {
        return $this->recipient;
    }

    private function setRecipient(string $recipient): void
    {
        $this->recipient = $recipient;
    }

    public function body(): string
    {
        return $this->body;
    }

    private function setBody(string $body): void
    {
        $this->body = json_decode($body);
    }
}
