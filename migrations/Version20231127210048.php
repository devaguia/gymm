<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127210048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_change AS SELECT id, user_id, weight, height, create_at FROM user_change');
        $this->addSql('DROP TABLE user_change');
        $this->addSql('CREATE TABLE user_change (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id_id INTEGER DEFAULT NULL, user_id INTEGER NOT NULL, weight DOUBLE PRECISION NOT NULL, height DOUBLE PRECISION NOT NULL, create_at DATETIME NOT NULL, CONSTRAINT FK_2505E51D9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO user_change (id, user_id, weight, height, create_at) SELECT id, user_id, weight, height, create_at FROM __temp__user_change');
        $this->addSql('DROP TABLE __temp__user_change');
        $this->addSql('CREATE INDEX IDX_2505E51D9D86650F ON user_change (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_change AS SELECT id, user_id, weight, height, create_at FROM user_change');
        $this->addSql('DROP TABLE user_change');
        $this->addSql('CREATE TABLE user_change (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, weight DOUBLE PRECISION NOT NULL, height DOUBLE PRECISION NOT NULL, create_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO user_change (id, user_id, weight, height, create_at) SELECT id, user_id, weight, height, create_at FROM __temp__user_change');
        $this->addSql('DROP TABLE __temp__user_change');
    }
}
