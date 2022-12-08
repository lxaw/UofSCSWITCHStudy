<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221208193151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usda_non_branded_food ADD user_id INT DEFAULT NULL, ADD db_id BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE usda_non_branded_food ADD CONSTRAINT FK_7D76CF76A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7D76CF76A76ED395 ON usda_non_branded_food (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usda_non_branded_food DROP FOREIGN KEY FK_7D76CF76A76ED395');
        $this->addSql('DROP INDEX IDX_7D76CF76A76ED395 ON usda_non_branded_food');
        $this->addSql('ALTER TABLE usda_non_branded_food DROP user_id, DROP db_id');
    }
}
