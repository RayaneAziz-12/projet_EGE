<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210615170440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annee_scolaire (id INT AUTO_INCREMENT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etudiant ADD sexe VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE formation ADD annee_scolaires_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFE639FDE4 FOREIGN KEY (annee_scolaires_id) REFERENCES annee_scolaire (id)');
        $this->addSql('CREATE INDEX IDX_404021BFE639FDE4 ON formation (annee_scolaires_id)');
        $this->addSql('ALTER TABLE user CHANGE adresse adresse LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFE639FDE4');
        $this->addSql('DROP TABLE annee_scolaire');
        $this->addSql('ALTER TABLE etudiant DROP sexe');
        $this->addSql('DROP INDEX IDX_404021BFE639FDE4 ON formation');
        $this->addSql('ALTER TABLE formation DROP annee_scolaires_id');
        $this->addSql('ALTER TABLE `user` CHANGE adresse adresse LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
