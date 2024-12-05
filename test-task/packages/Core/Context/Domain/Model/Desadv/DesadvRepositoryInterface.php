<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Domain\Model\Desadv;

use TestTask\Core\Context\Domain\Model\RepositoryInterface;

/**
 * @method Desadv|null find(DesadvID $id)
 * @method Desadv      findOrFail(DesadvID $id)
 * @method Desadv[]    findAll()
 * @method Desadv[]    findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
 * @method Desadv|null findOneBy(array $criteria, array $orderBy = null)
 */
interface DesadvRepositoryInterface extends RepositoryInterface
{
}
