<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106174822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exercise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, series INTEGER DEFAULT NULL, repetitions INTEGER DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, update_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , create_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE exercise_change (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, exercise_id INTEGER NOT NULL, series INTEGER NOT NULL, repetitions INTEGER NOT NULL, weight DOUBLE PRECISION NOT NULL, create_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE sheet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, update_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , create_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE sheets_exercises (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sheet_id INTEGER NOT NULL, exercise_id INTEGER NOT NULL, create_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , update_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, weight DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, gender BOOLEAN DEFAULT NULL, age DATETIME NOT NULL, profile_picture VARCHAR(255) NOT NULL, update_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , create_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE user_change (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, weight DOUBLE PRECISION NOT NULL, height DOUBLE PRECISION NOT NULL, create_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE exercise');
        $this->addSql('DROP TABLE exercise_change');
        $this->addSql('DROP TABLE sheet');
        $this->addSql('DROP TABLE sheets_exercises');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_change');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
