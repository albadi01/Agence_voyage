<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220314155902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE TABLE etape (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) NOT NULL, maj DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, hotel VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, etapes_id INT NOT NULL, reservation_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, photo VARCHAR(255) NOT NULL, maj DATETIME NOT NULL, prix INT NOT NULL, INDEX IDX_29A5EC274F5CEED2 (etapes_id), INDEX IDX_29A5EC27B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('CREATE TABLE produit_destination (produit_id INT NOT NULL, destination_id INT NOT NULL, INDEX IDX_40DE7A2EF347EFB (produit_id), INDEX IDX_40DE7A2E816C6140 (destination_id), PRIMARY KEY(produit_id, destination_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, participants_id INT NOT NULL, reference VARCHAR(255) NOT NULL, date_reservation DATETIME NOT NULL, date_depart DATE NOT NULL, prix_total INT NOT NULL, statut enum(\'attente’, ‘valide’,\'termine\'), INDEX IDX_42C84955838709D5 (participants_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC274F5CEED2 FOREIGN KEY (etapes_id) REFERENCES etape (id)');
        // $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        // $this->addSql('ALTER TABLE produit_destination ADD CONSTRAINT FK_40DE7A2EF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        // $this->addSql('ALTER TABLE produit_destination ADD CONSTRAINT FK_40DE7A2E816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id) ON DELETE CASCADE');
        // $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955838709D5 FOREIGN KEY (participants_id) REFERENCES participant (id)');
        // $this->addSql('ALTER TABLE client ADD reservation_id INT NOT NULL');
        // $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        // $this->addSql('CREATE INDEX IDX_C7440455B83297E7 ON client (reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC274F5CEED2');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955838709D5');
        $this->addSql('ALTER TABLE produit_destination DROP FOREIGN KEY FK_40DE7A2EF347EFB');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455B83297E7');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27B83297E7');
        $this->addSql('DROP TABLE etape');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_destination');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP INDEX IDX_C7440455B83297E7 ON client');
        $this->addSql('ALTER TABLE client DROP reservation_id, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE conseiller CHANGE photo photo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE destination CHANGE titre titre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
