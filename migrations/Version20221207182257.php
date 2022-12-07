<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207182257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menustat_food ADD user_id INT DEFAULT NULL, CHANGE restaurant restaurant VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE menustat_food ADD CONSTRAINT FK_F7E1D255A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F7E1D255A76ED395 ON menustat_food (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menustat_food DROP FOREIGN KEY FK_F7E1D255A76ED395');
        $this->addSql('DROP INDEX IDX_F7E1D255A76ED395 ON menustat_food');
        $this->addSql('ALTER TABLE menustat_food DROP user_id, CHANGE restaurant restaurant VARCHAR(255) NOT NULL');
    }
}
