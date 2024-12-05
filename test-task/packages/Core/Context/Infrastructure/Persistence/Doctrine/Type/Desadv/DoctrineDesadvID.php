<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Infrastructure\Persistence\Doctrine\Type\Desadv;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;
use TestTask\Core\Context\Domain\Model\Desadv\DesadvID;

class DoctrineDesadvID extends IntegerType
{
    public const NAME = 'DesadvID';

    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @param DesadvID|null      $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?int
    {
        return null === $value ? null : $value->ID();
    }

    /**
     * @param int|null         $value
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?DesadvID
    {
        return null === $value ? null : new DesadvID($value);
    }
}
