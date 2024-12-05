<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Model\Desadv;

use TestTask\Core\Context\Domain\Model\ResourceInterface;

class Desadv implements ResourceInterface
{
    /**
     * @var DesadvID
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
     * @var string
     */
    private $body;

    public function __construct(
        DesadvID $ID,
        \DateTimeImmutable $date,
        string $sender,
        string $recipient,
        string $body
    ) {
        $this->setID($ID);
        $this->setDate($date);
        $this->setSender($sender);
        $this->setRecipient($recipient);
        $this->setBody($body);
    }

    public function ID(): DesadvID
    {
        return $this->ID;
    }

    public function setID(DesadvID $ID): void
    {
        $this->ID = $ID;
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
        $this->body = $body;
    }
}
