<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220731090618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14A7F12751');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14F3E43022');
        $this->addSql('DROP INDEX IDX_CFBDFA14A7F12751 ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA14F3E43022 ON note');
        $this->addSql('ALTER TABLE note ADD matiere_id INT DEFAULT NULL, ADD joueur_id INT DEFAULT NULL, DROP matiere_id_id, DROP joueur_id_id');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA14F46CD258 ON note (matiere_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14A9E2D76C ON note (joueur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14F46CD258');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14A9E2D76C');
        $this->addSql('DROP INDEX UNIQ_CFBDFA14F46CD258 ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA14A9E2D76C ON note');
        $this->addSql('ALTER TABLE note ADD matiere_id_id INT DEFAULT NULL, ADD joueur_id_id INT DEFAULT NULL, DROP matiere_id, DROP joueur_id');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A7F12751 FOREIGN KEY (joueur_id_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14F3E43022 FOREIGN KEY (matiere_id_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14A7F12751 ON note (joueur_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA14F3E43022 ON note (matiere_id_id)');
    }
}
