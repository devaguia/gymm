<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231118121813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, name, mail, weight, height, gender, age, profile_picture, lastname, password, updated_at, created_at FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, weight DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, gender BOOLEAN DEFAULT NULL, age DATETIME NOT NULL, profile_picture VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO user (id, name, mail, weight, height, gender, age, profile_picture, lastname, password, updated_at, created_at) SELECT id, name, mail, weight, height, gender, age, profile_picture, lastname, password, updated_at, created_at FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, name, lastname, mail, password, weight, height, gender, age, profile_picture, updated_at, created_at FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, weight DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, gender BOOLEAN DEFAULT NULL, age DATETIME NOT NULL, profile_picture VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO user (id, name, lastname, mail, password, weight, height, gender, age, profile_picture, updated_at, created_at) SELECT id, name, lastname, mail, password, weight, height, gender, age, profile_picture, updated_at, created_at FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }
}
