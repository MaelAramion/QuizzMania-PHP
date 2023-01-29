<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220806051244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE defi (id INT AUTO_INCREMENT NOT NULL, joueur_origin_id INT DEFAULT NULL, joueur_destinataire_id INT DEFAULT NULL, question_id INT DEFAULT NULL, created_at DATETIME NOT NULL, limit_date DATETIME NOT NULL, INDEX IDX_DCD5A35EA8FCE994 (joueur_origin_id), INDEX IDX_DCD5A35E4B1BDC0E (joueur_destinataire_id), INDEX IDX_DCD5A35E1E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, question_id INT DEFAULT NULL, reponse VARCHAR(255) NOT NULL, is_valid TINYINT(1) NOT NULL, INDEX IDX_5FB6DEC71E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE defi ADD CONSTRAINT FK_DCD5A35EA8FCE994 FOREIGN KEY (joueur_origin_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE defi ADD CONSTRAINT FK_DCD5A35E4B1BDC0E FOREIGN KEY (joueur_destinataire_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE defi ADD CONSTRAINT FK_DCD5A35E1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC71E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE defi DROP FOREIGN KEY FK_DCD5A35E1E27F6BF');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC71E27F6BF');
        $this->addSql('DROP TABLE defi');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE reponse');
    }
}
