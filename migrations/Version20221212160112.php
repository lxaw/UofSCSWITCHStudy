<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221212160112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menustat_food ADD quantity DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE usda_branded_food ADD quantity DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE usda_non_branded_food ADD quantity DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menustat_food DROP quantity');
        $this->addSql('ALTER TABLE usda_branded_food DROP quantity');
        $this->addSql('ALTER TABLE usda_non_branded_food DROP quantity');
    }
}
