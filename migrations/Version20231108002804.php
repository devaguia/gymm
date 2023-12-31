<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231108002804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__sheet AS SELECT id, name, description FROM sheet');
        $this->addSql('DROP TABLE sheet');
        $this->addSql('CREATE TABLE sheet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO sheet (id, name, description) SELECT id, name, description FROM __temp__sheet');
        $this->addSql('DROP TABLE __temp__sheet');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__sheet AS SELECT id, name, description FROM sheet');
        $this->addSql('DROP TABLE sheet');
        $this->addSql('CREATE TABLE sheet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, user_id INTEGER NOT NULL, update_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , create_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO sheet (id, name, description) SELECT id, name, description FROM __temp__sheet');
        $this->addSql('DROP TABLE __temp__sheet');
    }
}
