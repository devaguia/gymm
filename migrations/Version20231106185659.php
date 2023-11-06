<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106185659 extends AbstractMigration
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
        $this->addSql('CREATE TABLE exercise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, series INTEGER DEFAULT NULL, repetitions INTEGER DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, description CLOB DEFAULT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO exercise (id, name, series, repetitions, weight, description, updated_at, created_at) SELECT id, name, series, repetitions, weight, description, updated_at, created_at FROM __temp__exercise');
        $this->addSql('DROP TABLE __temp__exercise');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__exercise AS SELECT id, name, series, repetitions, weight, description, updated_at, created_at FROM exercise');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('CREATE TABLE exercise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, series INTEGER DEFAULT NULL, repetitions INTEGER DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, description CLOB DEFAULT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO exercise (id, name, series, repetitions, weight, description, updated_at, created_at) SELECT id, name, series, repetitions, weight, description, updated_at, created_at FROM __temp__exercise');
        $this->addSql('DROP TABLE __temp__exercise');
    }
}
