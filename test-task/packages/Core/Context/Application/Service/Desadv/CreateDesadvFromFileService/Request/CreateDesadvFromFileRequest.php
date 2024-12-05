<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Application\Service\Desadv\CreateDesadvFromFileService\Request;

use JMS\Serializer\Annotation as Serializer;
use TestTask\Core\Context\Application\Service\RequestInterface;

class CreateDesadvFromFileRequest implements RequestInterface
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("fileBase64")
     */
    private $fileBase64;

    public function __construct(string $fileBase64)
    {
        $this->setFileBase64($fileBase64);
    }

    public function fileBase64(): string
    {
        return $this->fileBase64;
    }

    private function setFileBase64(string $fileBase64): void
    {
        $this->fileBase64 = $fileBase64;
    }
}
