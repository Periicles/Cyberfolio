<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117000850 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profile CHANGE etc etc VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE project CHANGE etc etc VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE technology CHANGE etc etc VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profile CHANGE etc etc VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE project CHANGE etc etc VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE technology CHANGE etc etc VARCHAR(50) NOT NULL');
    }
}
