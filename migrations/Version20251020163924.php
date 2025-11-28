<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251020163924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE editeur (id SERIAL NOT NULL, nom VARCHAR(150) NOT NULL, pays VARCHAR(100) DEFAULT NULL, site_web VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN editeur.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN editeur.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE genre (id SERIAL NOT NULL, nom VARCHAR(100) DEFAULT NULL, description TEXT DEFAULT NULL, actif BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN genre.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN genre.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE jeu_video (id SERIAL NOT NULL, editeur_id INT NOT NULL, genre_id INT NOT NULL, titre VARCHAR(255) NOT NULL, developpeur VARCHAR(255) NOT NULL, date_sortie DATE DEFAULT NULL, prix NUMERIC(6, 2) DEFAULT NULL, description TEXT DEFAULT NULL, image_url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4E22D9D43375BD21 ON jeu_video (editeur_id)');
        $this->addSql('CREATE INDEX IDX_4E22D9D44296D31F ON jeu_video (genre_id)');
        $this->addSql('ALTER TABLE jeu_video ADD CONSTRAINT FK_4E22D9D43375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jeu_video ADD CONSTRAINT FK_4E22D9D44296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE jeu_video DROP CONSTRAINT FK_4E22D9D43375BD21');
        $this->addSql('ALTER TABLE jeu_video DROP CONSTRAINT FK_4E22D9D44296D31F');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE jeu_video');
    }
}
