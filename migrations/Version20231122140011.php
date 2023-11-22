<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231122140011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__exercise AS SELECT id, name, series, repetitions, weight, description, updated_at, created_at FROM exercise');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('CREATE TABLE exercise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, series INTEGER DEFAULT NULL, repetitions INTEGER DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, description CLOB DEFAULT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, CONSTRAINT FK_AEDAD51CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO exercise (id, name, series, repetitions, weight, description, updated_at, created_at) SELECT id, name, series, repetitions, weight, description, updated_at, created_at FROM __temp__exercise');
        $this->addSql('DROP TABLE __temp__exercise');
        $this->addSql('CREATE INDEX IDX_AEDAD51CA76ED395 ON exercise (user_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__sheet AS SELECT id, name, description, updated_at, created_at FROM sheet');
        $this->addSql('DROP TABLE sheet');
        $this->addSql('CREATE TABLE sheet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, CONSTRAINT FK_873C91E2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO sheet (id, name, description, updated_at, created_at) SELECT id, name, description, updated_at, created_at FROM __temp__sheet');
        $this->addSql('DROP TABLE __temp__sheet');
        $this->addSql('CREATE INDEX IDX_873C91E2A76ED395 ON sheet (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__exercise AS SELECT id, name, series, repetitions, weight, description, updated_at, created_at FROM exercise');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('CREATE TABLE exercise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, series INTEGER DEFAULT NULL, repetitions INTEGER DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, description CLOB DEFAULT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO exercise (id, name, series, repetitions, weight, description, updated_at, created_at) SELECT id, name, series, repetitions, weight, description, updated_at, created_at FROM __temp__exercise');
        $this->addSql('DROP TABLE __temp__exercise');
        $this->addSql('CREATE TEMPORARY TABLE __temp__sheet AS SELECT id, name, description, updated_at, created_at FROM sheet');
        $this->addSql('DROP TABLE sheet');
        $this->addSql('CREATE TABLE sheet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO sheet (id, name, description, updated_at, created_at) SELECT id, name, description, updated_at, created_at FROM __temp__sheet');
        $this->addSql('DROP TABLE __temp__sheet');
    }
}
