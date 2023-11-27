<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127204600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exercise_sheet (exercise_id INTEGER NOT NULL, sheet_id INTEGER NOT NULL, PRIMARY KEY(exercise_id, sheet_id), CONSTRAINT FK_A20A6620E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_A20A66208B1206A5 FOREIGN KEY (sheet_id) REFERENCES sheet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_A20A6620E934951A ON exercise_sheet (exercise_id)');
        $this->addSql('CREATE INDEX IDX_A20A66208B1206A5 ON exercise_sheet (sheet_id)');
        $this->addSql('DROP TABLE sheets_exercises');
        $this->addSql('DROP TABLE sheets_exercises_exercise');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sheets_exercises (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sheet_id_id INTEGER NOT NULL, create_at DATETIME NOT NULL, CONSTRAINT FK_6D3B43501C118CFE FOREIGN KEY (sheet_id_id) REFERENCES sheet (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_6D3B43501C118CFE ON sheets_exercises (sheet_id_id)');
        $this->addSql('CREATE TABLE sheets_exercises_exercise (sheets_exercises_id INTEGER NOT NULL, exercise_id INTEGER NOT NULL, PRIMARY KEY(sheets_exercises_id, exercise_id), CONSTRAINT FK_4B54F92860A21E0F FOREIGN KEY (sheets_exercises_id) REFERENCES sheets_exercises (id) ON UPDATE NO ACTION ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_4B54F928E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON UPDATE NO ACTION ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_4B54F928E934951A ON sheets_exercises_exercise (exercise_id)');
        $this->addSql('CREATE INDEX IDX_4B54F92860A21E0F ON sheets_exercises_exercise (sheets_exercises_id)');
        $this->addSql('DROP TABLE exercise_sheet');
    }
}
