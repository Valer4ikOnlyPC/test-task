<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Service;

interface EntityManagerAwareInterface
{
    public function setEntityManager(EntityManagerInterface $em): void;
}