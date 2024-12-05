<?php

declare(strict_types=1);

namespace TestTask\Core\Common\Model;

use TestTask\Core\Common\Exception\InvalidArgumentException;

abstract class IntegerID
{
    /**
     * @var int
     */
    protected $ID;

    final public function __construct(int $ID)
    {
        $this->setID($ID);
    }

    final protected function setID(int $ID): void
    {
        if (0 >= $ID) {
            throw new InvalidArgumentException("ID должно быть положительным целым числом.");
        }
        $this->ID = $ID;
    }

    final public function __toString(): string
    {
        return (string) $this->ID;
    }

    final public function ID(): int
    {
        return $this->ID;
    }

    final public function equals(self $comparedID): bool
    {
        return static::class === get_class($comparedID) && $this->ID() === $comparedID->ID();
    }
}
