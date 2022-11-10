<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221108171546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE food (id INT AUTO_INCREMENT NOT NULL, food_name LONGTEXT NOT NULL, restaurant LONGTEXT DEFAULT NULL, food_category LONGTEXT DEFAULT NULL, serving_size DOUBLE PRECISION DEFAULT NULL, serving_size_unit LONGTEXT DEFAULT NULL, energy_amount DOUBLE PRECISION DEFAULT NULL, energy_unit LONGTEXT DEFAULT NULL, fat_amount DOUBLE PRECISION DEFAULT NULL, fat_unit LONGTEXT DEFAULT NULL, carb_amount DOUBLE PRECISION DEFAULT NULL, carb_unit LONGTEXT DEFAULT NULL, protein_amount DOUBLE PRECISION DEFAULT NULL, protein_unit LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE food');
    }
}
