<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221206185221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usda_branded_food (id INT AUTO_INCREMENT NOT NULL, fdc_id BIGINT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, brand_name VARCHAR(255) DEFAULT NULL, brand_owner VARCHAR(255) DEFAULT NULL, ingredients VARCHAR(255) DEFAULT NULL, serving_size VARCHAR(255) DEFAULT NULL, serving_size_unit VARCHAR(255) DEFAULT NULL, food_category VARCHAR(255) DEFAULT NULL, sugar_amount DOUBLE PRECISION DEFAULT NULL, sugar_unit VARCHAR(255) DEFAULT NULL, fatty_acid_total_saturated_amount INT DEFAULT NULL, fatty_acid_total_saturated_unit VARCHAR(255) DEFAULT NULL, cholesterol_amount DOUBLE PRECISION DEFAULT NULL, cholestol_unit VARCHAR(255) DEFAULT NULL, vitamin_ctotal_ascorbid_acid_amount DOUBLE PRECISION DEFAULT NULL, vitamin_ctotal_ascorbic_acid_unit VARCHAR(255) DEFAULT NULL, vitamin_ctotal_ascorbic_acid_amount DOUBLE PRECISION DEFAULT NULL, vitamin_damount DOUBLE PRECISION DEFAULT NULL, vitamin_dunit VARCHAR(255) DEFAULT NULL, vitamin_aamount DOUBLE PRECISION DEFAULT NULL, vitamin_aunit DOUBLE PRECISION DEFAULT NULL, sodium_amount DOUBLE PRECISION DEFAULT NULL, sodium_unit VARCHAR(255) DEFAULT NULL, potassium_amount DOUBLE PRECISION DEFAULT NULL, potassium_unit VARCHAR(255) DEFAULT NULL, iron_amount VARCHAR(255) DEFAULT NULL, iron_unit VARCHAR(255) DEFAULT NULL, calcium_amount VARCHAR(255) NOT NULL, calcium_unit VARCHAR(255) NOT NULL, fiber_amount DOUBLE PRECISION DEFAULT NULL, fiber_unit VARCHAR(255) DEFAULT NULL, energy_amount DOUBLE PRECISION DEFAULT NULL, energy_unit VARCHAR(255) NOT NULL, carb_amount DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE usda_branded_food');
    }
}
