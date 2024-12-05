<?php

declare(strict_types=1);

namespace TestTask\Core\Context\Infrastructure\Persistence\Doctrine\Migration;

use Doctrine\DBAL\Migrations\AbortMigrationException;
use Doctrine\DBAL\Schema\Schema;
use TestTask\Core\Context\Infrastructure\Persistence\Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20241204163821 extends AbstractMigration
{
    /**
     * @throws AbortMigrationException
     */
    public function up(Schema $schema): void
    {
        $this->abortIf(
            $this->connection->getDatabasePlatform()
                ->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addUpSqlFromFile(__DIR__);
    }

    /**
     * @throws AbortMigrationException
     */
    public function down(Schema $schema): void
    {
        $this->abortIf(
            $this->connection->getDatabasePlatform()
                ->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addDownSqlFromFile(__DIR__);
    }
}
