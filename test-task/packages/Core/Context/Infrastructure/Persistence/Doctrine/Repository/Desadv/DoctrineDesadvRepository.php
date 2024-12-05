<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Infrastructure\Persistence\Doctrine\Repository\Desadv;

use TestTask\Core\Context\Domain\Model\Desadv\Desadv;
use TestTask\Core\Context\Domain\Model\Desadv\DesadvID;
use TestTask\Core\Context\Domain\Model\Desadv\DesadvRepositoryInterface;
use TestTask\Core\Context\Infrastructure\Persistence\Doctrine\Repository\DoctrineRepository;

/**
 * @method Desadv|null find(DesadvID $id)
 * @method Desadv      findOrFail(DesadvID $id)
 * @method Desadv[]    findAll()
 * @method Desadv[]    findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
 * @method Desadv|null findOneBy(array $criteria, array $orderBy = null)
 */
class DoctrineDesadvRepository extends DoctrineRepository implements DesadvRepositoryInterface
{
    public function getClassName(): string
    {
        return Desadv::class;
    }
}
