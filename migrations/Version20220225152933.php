<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220225152933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, nom_c VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluateur (id INT AUTO_INCREMENT NOT NULL, nom_e VARCHAR(255) NOT NULL, prenom_e VARCHAR(255) NOT NULL, email_e VARCHAR(255) NOT NULL, tel_e INT NOT NULL, login VARCHAR(20) NOT NULL, password VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, id_c_id INT DEFAULT NULL, nom_s VARCHAR(30) NOT NULL, desc_s VARCHAR(255) NOT NULL, technologie VARCHAR(255) NOT NULL, INDEX IDX_5E3DE4771AF787D1 (id_c_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_cand (id INT AUTO_INCREMENT NOT NULL, skill_id INT NOT NULL, candidat_id INT NOT NULL, id_e_id INT NOT NULL, date DATETIME NOT NULL, level VARCHAR(255) NOT NULL, INDEX IDX_B722593C5585C142 (skill_id), INDEX IDX_B722593C8D0EB82 (candidat_id), INDEX IDX_B722593C3F9CD80D (id_e_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, tel INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4771AF787D1 FOREIGN KEY (id_c_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE skill_cand ADD CONSTRAINT FK_B722593C5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE skill_cand ADD CONSTRAINT FK_B722593C8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE skill_cand ADD CONSTRAINT FK_B722593C3F9CD80D FOREIGN KEY (id_e_id) REFERENCES evaluateur (id)');
        $this->addSql('ALTER TABLE candidat CHANGE nom_ca nom_ca VARCHAR(30) NOT NULL, CHANGE prenom_ca prenom_ca VARCHAR(30) NOT NULL, CHANGE univ univ VARCHAR(50) NOT NULL, CHANGE email email VARCHAR(100) NOT NULL, CHANGE tel tel INT NOT NULL, CHANGE diplome diplome VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE4771AF787D1');
        $this->addSql('ALTER TABLE skill_cand DROP FOREIGN KEY FK_B722593C3F9CD80D');
        $this->addSql('ALTER TABLE skill_cand DROP FOREIGN KEY FK_B722593C5585C142');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE evaluateur');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_cand');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE candidat CHANGE nom_ca nom_ca VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom_ca prenom_ca VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE univ univ VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE diplome diplome VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
