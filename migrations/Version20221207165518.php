<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207165518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menustat_food ADD date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE usda_branded_food ADD date DATETIME DEFAULT NULL, CHANGE fatty_acid_total_saturated_amount fatty_acid_total_saturated_amount DOUBLE PRECISION DEFAULT NULL, CHANGE iron_amount iron_amount DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE usda_non_branded_food ADD date DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menustat_food DROP date');
        $this->addSql('ALTER TABLE usda_branded_food DROP date, CHANGE fatty_acid_total_saturated_amount fatty_acid_total_saturated_amount INT DEFAULT NULL, CHANGE iron_amount iron_amount VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE usda_non_branded_food DROP date');
    }
}
