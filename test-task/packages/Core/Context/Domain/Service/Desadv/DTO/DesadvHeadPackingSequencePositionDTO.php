<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Service\Desadv\DTO;

use JMS\Serializer\Annotation as Serializer;

class DesadvHeadPackingSequencePositionDTO
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("POSITIONNUMBER")
     */
    private $positionNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PRODUCT")
     */
    private $product;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PRODUCTIDSUPPLIER")
     */
    private $productIDSupplier;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PRODUCTIDBUYER")
     */
    private $productIDBuyer;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("DELIVEREDQUANTITY")
     */
    private $deliveredQuantity;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DELIVEREDUNIT")
     */
    private $deliveredUnit;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ORDEREDQUANTITY")
     */
    private $orderedQuantity;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("QUANTITYOFCUINTU")
     */
    private $quantityOfCuintu;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDERUNIT")
     */
    private $orderUnit;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PRICE")
     */
    private $price;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TAXRATE")
     */
    private $taxRate;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DESCRIPTION")
     */
    private $description;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PRICEWITHVAT")
     */
    private $priceWithVAT;

    public function positionNumber(): int
    {
        return $this->positionNumber;
    }

    public function setPositionNumber(int $positionNumber): self
    {
        $this->positionNumber = $positionNumber;
        return $this;
    }

    public function product(): string
    {
        return $this->product;
    }

    public function setProduct(string $product): self
    {
        $this->product = $product;
        return $this;
    }

    public function productIDSupplier(): string
    {
        return $this->productIDSupplier;
    }

    public function setProductIDSupplier(string $productIDSupplier): self
    {
        $this->productIDSupplier = $productIDSupplier;
        return $this;
    }

    public function productIDBuyer(): string
    {
        return $this->productIDBuyer;
    }

    public function setProductIDBuyer(string $productIDBuyer): self
    {
        $this->productIDBuyer = $productIDBuyer;
        return $this;
    }

    public function deliveredQuantity(): float
    {
        return $this->deliveredQuantity;
    }

    public function setDeliveredQuantity(float $deliveredQuantity): self
    {
        $this->deliveredQuantity = $deliveredQuantity;
        return $this;
    }

    public function deliveredUnit(): string
    {
        return $this->deliveredUnit;
    }

    public function setDeliveredUnit(string $deliveredUnit): self
    {
        $this->deliveredUnit = $deliveredUnit;
        return $this;
    }

    public function orderedQuantity(): float
    {
        return $this->orderedQuantity;
    }

    public function setOrderedQuantity(float $orderedQuantity): self
    {
        $this->orderedQuantity = $orderedQuantity;
        return $this;
    }

    public function quantityOfCuintu(): float
    {
        return $this->quantityOfCuintu;
    }

    public function setQuantityOfCuintu(float $quantityOfCuintu): self
    {
        $this->quantityOfCuintu = $quantityOfCuintu;
        return $this;
    }

    public function orderUnit(): string
    {
        return $this->orderUnit;
    }

    public function setOrderUnit(string $orderUnit): self
    {
        $this->orderUnit = $orderUnit;
        return $this;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function taxRate(): float
    {
        return $this->taxRate;
    }

    public function setTaxRate(float $taxRate): self
    {
        $this->taxRate = $taxRate;
        return $this;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function priceWithVAT(): float
    {
        return $this->priceWithVAT;
    }

    public function setPriceWithVAT(float $priceWithVAT): self
    {
        $this->priceWithVAT = $priceWithVAT;
        return $this;
    }
}
