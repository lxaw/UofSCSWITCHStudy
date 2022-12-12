<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221212160236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE nutrient');
        $this->addSql('ALTER TABLE menustat_food ADD quantity DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE usda_branded_food ADD quantity DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE usda_non_branded_food ADD quantity DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nutrient (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE menustat_food DROP quantity');
        $this->addSql('ALTER TABLE usda_branded_food DROP quantity');
        $this->addSql('ALTER TABLE usda_non_branded_food DROP quantity');
    }
}
