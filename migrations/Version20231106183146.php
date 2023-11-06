<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106183146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__exercise AS SELECT id, user_id, name, series, repetitions, weight, update_at, create_at FROM exercise');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('CREATE TABLE exercise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, series INTEGER DEFAULT NULL, repetitions INTEGER DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, update_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , create_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , description CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO exercise (id, user_id, name, series, repetitions, weight, update_at, create_at) SELECT id, user_id, name, series, repetitions, weight, update_at, create_at FROM __temp__exercise');
        $this->addSql('DROP TABLE __temp__exercise');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__exercise AS SELECT id, user_id, name, series, repetitions, weight, update_at, create_at FROM exercise');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('CREATE TABLE exercise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, series INTEGER DEFAULT NULL, repetitions INTEGER DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, update_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , create_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , picture VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO exercise (id, user_id, name, series, repetitions, weight, update_at, create_at) SELECT id, user_id, name, series, repetitions, weight, update_at, create_at FROM __temp__exercise');
        $this->addSql('DROP TABLE __temp__exercise');
    }
}
