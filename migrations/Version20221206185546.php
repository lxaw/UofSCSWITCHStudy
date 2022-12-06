<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221206185546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usda_non_branded_food (id INT AUTO_INCREMENT NOT NULL, fdc_id BIGINT DEFAULT NULL, description VARCHAR(255) NOT NULL, serving_amount VARCHAR(255) DEFAULT NULL, serving_text VARCHAR(255) DEFAULT NULL, serving_size DOUBLE PRECISION DEFAULT NULL, protein_unit VARCHAR(255) DEFAULT NULL, carb_unit VARCHAR(255) DEFAULT NULL, fat_unit VARCHAR(255) DEFAULT NULL, carb_amount DOUBLE PRECISION DEFAULT NULL, energy_amount DOUBLE PRECISION DEFAULT NULL, protein_amount DOUBLE PRECISION DEFAULT NULL, fiber_amount DOUBLE PRECISION DEFAULT NULL, fiber_unit VARCHAR(255) DEFAULT NULL, potassium_amount DOUBLE PRECISION DEFAULT NULL, potassium_unit VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE usda_non_branded_food');
    }
}
