<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Application\Service\Desadv\GetDesadvService\Request;

use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation as Serializer;
use TestTask\Core\Context\Application\Service\RequestInterface;
use TestTask\Core\Context\Domain\Model\Desadv\DesadvID;

class GetDesadvRequest implements RequestInterface
{
    /**
     * @var ?DesadvID
     * @Serializer\Type("int")
     * @Serializer\SerializedName("desadv_id")
     * @Accessor(setter="setDesadvID")
     */
    private $desadvID;

    public function __construct(?int $desadvID = null)
    {
        $this->setDesadvID($desadvID);
    }

    public function desadvID(): ?DesadvID
    {
        return $this->desadvID;
    }

    public function setDesadvID(?int $desadvID): void
    {
        $this->desadvID = $desadvID !== null ? new DesadvID($desadvID) : null;
    }
}
