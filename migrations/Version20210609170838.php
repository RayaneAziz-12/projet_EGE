<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210609170838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE batiment (id INT AUTO_INCREMENT NOT NULL, num_batiment VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bulletins (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, salle_id INT DEFAULT NULL, emploi_temps_id INT DEFAULT NULL, presence_id INT NOT NULL, personnel_id INT DEFAULT NULL, matiere_id INT DEFAULT NULL, h_debut TIME NOT NULL, h_fin TIME NOT NULL, date DATE NOT NULL, INDEX IDX_FDCA8C9CDC304035 (salle_id), INDEX IDX_FDCA8C9C15728A20 (emploi_temps_id), INDEX IDX_FDCA8C9CF328FFC4 (presence_id), INDEX IDX_FDCA8C9C1C109075 (personnel_id), INDEX IDX_FDCA8C9CF46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emploi_temps (id INT AUTO_INCREMENT NOT NULL, date_deb DATE NOT NULL, date_fin DATE NOT NULL, h_debut TIME NOT NULL, h_fin TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, presence_id INT NOT NULL, user_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, bulletins VARCHAR(255) NOT NULL, INDEX IDX_717E22E3F328FFC4 (presence_id), UNIQUE INDEX UNIQ_717E22E3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examen (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, intitule_exam VARCHAR(255) NOT NULL, INDEX IDX_514C8FEC5200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, bulletins_id INT DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_404021BF281A820E (bulletins_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, ue_id INT DEFAULT NULL, formation_id INT NOT NULL, nom VARCHAR(255) NOT NULL, coeff_mat INT NOT NULL, lib_mat VARCHAR(255) NOT NULL, moy_mat DOUBLE PRECISION NOT NULL, nb_heures TIME NOT NULL, respo_mat VARCHAR(255) NOT NULL, INDEX IDX_9014574A62E883B1 (ue_id), INDEX IDX_9014574A5200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notes (id INT AUTO_INCREMENT NOT NULL, bulletins_id INT NOT NULL, examen_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_11BA68C281A820E (bulletins_id), INDEX IDX_11BA68C5C8659A (examen_id), INDEX IDX_11BA68CDDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parents (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, UNIQUE INDEX UNIQ_FD501D6AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, poste VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presence (id INT AUTO_INCREMENT NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, batiment_id INT NOT NULL, respo_salle VARCHAR(255) NOT NULL, statut_salle VARCHAR(255) NOT NULL, INDEX IDX_4E977E5CD6F6891B (batiment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ue (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, nom_ue VARCHAR(255) NOT NULL, respo_ue VARCHAR(255) NOT NULL, moy_ue DOUBLE PRECISION NOT NULL, coeff_ue INT NOT NULL, INDEX IDX_2E490A9B5200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(200) NOT NULL, email VARCHAR(100) DEFAULT NULL, telephone VARCHAR(20) NOT NULL, telephone2 VARCHAR(20) DEFAULT NULL, adresse LONGTEXT NOT NULL, date_naissance DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649AA08CB10 (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C15728A20 FOREIGN KEY (emploi_temps_id) REFERENCES emploi_temps (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CF328FFC4 FOREIGN KEY (presence_id) REFERENCES presence (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C1C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3F328FFC4 FOREIGN KEY (presence_id) REFERENCES presence (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE examen ADD CONSTRAINT FK_514C8FEC5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF281A820E FOREIGN KEY (bulletins_id) REFERENCES bulletins (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A62E883B1 FOREIGN KEY (ue_id) REFERENCES ue (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68C281A820E FOREIGN KEY (bulletins_id) REFERENCES bulletins (id)');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68C5C8659A FOREIGN KEY (examen_id) REFERENCES examen (id)');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68CDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6AA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5CD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id)');
        $this->addSql('ALTER TABLE ue ADD CONSTRAINT FK_2E490A9B5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5CD6F6891B');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF281A820E');
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68C281A820E');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C15728A20');
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68CDDEAB1A3');
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68C5C8659A');
        $this->addSql('ALTER TABLE examen DROP FOREIGN KEY FK_514C8FEC5200282E');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A5200282E');
        $this->addSql('ALTER TABLE ue DROP FOREIGN KEY FK_2E490A9B5200282E');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CF46CD258');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C1C109075');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CF328FFC4');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3F328FFC4');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CDC304035');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A62E883B1');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3A76ED395');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6AA76ED395');
        $this->addSql('DROP TABLE batiment');
        $this->addSql('DROP TABLE bulletins');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE emploi_temps');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE examen');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE notes');
        $this->addSql('DROP TABLE parents');
        $this->addSql('DROP TABLE personnel');
        $this->addSql('DROP TABLE presence');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE ue');
        $this->addSql('DROP TABLE `user`');
    }
}
