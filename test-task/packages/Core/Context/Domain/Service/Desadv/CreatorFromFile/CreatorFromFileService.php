<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Service\Desadv\CreatorFromFile;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use TestTask\Core\Common\Exception\InvalidArgumentException;
use TestTask\Core\Context\Domain\Exception\FileResourceNotFoundException;
use TestTask\Core\Context\Domain\Model\Desadv\Desadv;
use TestTask\Core\Context\Domain\Model\Desadv\DesadvID;
use TestTask\Core\Context\Domain\Model\Desadv\DesadvRepositoryInterface;
use TestTask\Core\Context\Domain\Service\Desadv\DTO\DesadvFileDataDTO;

class CreatorFromFileService implements CreatorFromFileInterface
{
    /**
     * @var DesadvRepositoryInterface
     */
    private $desadvRepository;

    /**
     * @var string
     */
    private $filesDir;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(DesadvRepositoryInterface $desadvRepository, string $filesDir)
    {
        $this->desadvRepository = $desadvRepository;
        $this->filesDir = sprintf('%s/files', dirname($filesDir, 3));
        $this->serializer = SerializerBuilder::create()
            ->build();
    }

    public function createFromLocalFile(string $fileName): void
    {
        $fileInfo = pathinfo($fileName);
        if (! is_array($fileInfo) || $fileInfo['extension'] !== 'xml') {
            throw new \Exception("Файл '{$fileInfo['extension']}' не поддерживается");
        }

        $fullPath = sprintf('%s/%s', $this->filesDir, $fileName);
        $fileContent = file_get_contents($fullPath, true);
        if (! $fileContent) {
            throw new FileResourceNotFoundException($fullPath);
        }

        $this->createFromFileContent($fileContent);
    }

    public function createFromBase64(string $fileBase64): void
    {
        $fileExtension = (explode('/', (explode(';base64,', $fileBase64))[0]))[1];
        if ($fileExtension !== 'xml') {
            throw new \Exception("Файл '{$fileExtension}' не поддерживается");
        }

        $fileContent = file_get_contents($fileBase64);
        if (! $fileContent) {
            throw new \Exception("Ну удалось прочитать файл");
        }

        $this->createFromFileContent($fileContent);
    }

    private function createFromFileContent(string $fileContent): void
    {
        $result = $this->serializer->deserialize($fileContent, DesadvFileDataDTO::class, 'xml');
        if ($this->desadvRepository->find(new DesadvID($result->desadv()->number())) !== null) {
            throw new InvalidArgumentException("Запись с таким ID уже существует.");
        }

        $desadv = new Desadv(
            new DesadvID($result->desadv()->number()),
            $result->desadv()->date(),
            $result->desadv()->head()->sender(),
            $result->desadv()->head()->recipient(),
            $this->serializer->serialize($result, 'json')
        );
        $this->desadvRepository->add($desadv);
    }
}
