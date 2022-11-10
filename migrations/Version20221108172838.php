<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221108172838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE food ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE food ADD CONSTRAINT FK_D43829F7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D43829F7A76ED395 ON food (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE food DROP FOREIGN KEY FK_D43829F7A76ED395');
        $this->addSql('DROP INDEX UNIQ_D43829F7A76ED395 ON food');
        $this->addSql('ALTER TABLE food DROP user_id');
    }
}
