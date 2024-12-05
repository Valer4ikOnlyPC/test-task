<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Service\Desadv\DTO;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class DesadvDTO
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("NUMBER")
     */
    private $number;

    /**
     * @var DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SerializedName("DATE")
     */
    private $date;

    /**
     * @var DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SerializedName("DELIVERYDATE")
     */
    private $deliveryDate;

    /**
     * @var DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'H:i'>")
     * @Serializer\SerializedName("DELIVERYTIME")
     */
    private $deliveryTime;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDERNUMBER")
     */
    private $orderNumber;

    /**
     * @var DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SerializedName("ORDERDATE")
     */
    private $orderDate;

    /**
     * @var DesadvHeadDTO
     * @Serializer\SerializedName("HEAD")
     * @Serializer\Type("TestTask\Core\Context\Domain\Service\Desadv\DTO\DesadvHeadDTO")
     */
    private $head;

    public function number(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;
        return $this;
    }

    public function date(): DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(DateTimeImmutable $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function head(): DesadvHeadDTO
    {
        return $this->head;
    }

    public function setHead(DesadvHeadDTO $head): self
    {
        $this->head = $head;
        return $this;
    }

    public function deliveryDate(): DateTimeImmutable
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(DateTimeImmutable $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    public function deliveryTime(): DateTimeImmutable
    {
        return $this->deliveryTime;
    }

    public function setDeliveryTime(DateTimeImmutable $deliveryTime): self
    {
        $this->deliveryTime = $deliveryTime;
        return $this;
    }

    public function orderNumber(): string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    public function orderDate(): DateTimeImmutable
    {
        return $this->orderDate;
    }

    public function setOrderDate(DateTimeImmutable $orderDate): self
    {
        $this->orderDate = $orderDate;
        return $this;
    }
}
