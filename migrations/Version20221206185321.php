<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221206185321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usda_branded_food ADD carb_unit VARCHAR(255) DEFAULT NULL, ADD fat_amount DOUBLE PRECISION DEFAULT NULL, ADD fat_unit VARCHAR(255) DEFAULT NULL, ADD protein_amount DOUBLE PRECISION DEFAULT NULL, ADD protein_unit VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usda_branded_food DROP carb_unit, DROP fat_amount, DROP fat_unit, DROP protein_amount, DROP protein_unit');
    }
}
