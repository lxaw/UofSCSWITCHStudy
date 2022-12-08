<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221208192740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usda_branded_food CHANGE calcium_amount calcium_amount DOUBLE PRECISION DEFAULT NULL, CHANGE calcium_unit calcium_unit VARCHAR(255) DEFAULT NULL, CHANGE energy_unit energy_unit VARCHAR(255) DEFAULT NULL, CHANGE carb_amount carb_amount DOUBLE PRECISION DEFAULT NULL, CHANGE protein_unit protein_unit VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usda_branded_food CHANGE calcium_amount calcium_amount DOUBLE PRECISION NOT NULL, CHANGE calcium_unit calcium_unit VARCHAR(255) NOT NULL, CHANGE energy_unit energy_unit VARCHAR(255) NOT NULL, CHANGE carb_amount carb_amount DOUBLE PRECISION NOT NULL, CHANGE protein_unit protein_unit VARCHAR(255) NOT NULL');
    }
}
