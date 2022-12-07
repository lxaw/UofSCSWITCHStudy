<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221206183829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menustat_food (id INT AUTO_INCREMENT NOT NULL, menustat_id BIGINT NOT NULL, restaurant VARCHAR(255) NOT NULL, food_category VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, item_description VARCHAR(255) DEFAULT NULL, serving_size DOUBLE PRECISION DEFAULT NULL, serving_size_text VARCHAR(255) DEFAULT NULL, serving_size_unit VARCHAR(255) DEFAULT NULL, serving_size_household VARCHAR(255) DEFAULT NULL, energy_amount DOUBLE PRECISION DEFAULT NULL, fat_amount DOUBLE PRECISION DEFAULT NULL, saturated_foat_amount DOUBLE PRECISION DEFAULT NULL, trans_fat_amount DOUBLE PRECISION DEFAULT NULL, cholesterol_amount DOUBLE PRECISION DEFAULT NULL, sodium_amount DOUBLE PRECISION DEFAULT NULL, potassium_amount DOUBLE PRECISION DEFAULT NULL, carb_amount DOUBLE PRECISION DEFAULT NULL, protein_amount DOUBLE PRECISION DEFAULT NULL, sugar_amount DOUBLE PRECISION DEFAULT NULL, fiber_amount DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE menustat_food');
    }
}
