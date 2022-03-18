<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220315083643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455B83297E7');
        $this->addSql('DROP INDEX IDX_C7440455B83297E7 ON client');
        $this->addSql('ALTER TABLE client DROP reservation_id');
        $this->addSql('ALTER TABLE etape ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE etape ADD CONSTRAINT FK_285F75DDF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_285F75DDF347EFB ON etape (produit_id)');
        $this->addSql('ALTER TABLE participant ADD reservation_id INT NOT NULL');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B11B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_D79F6B11B83297E7 ON participant (reservation_id)');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC274F5CEED2');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27B83297E7');
        $this->addSql('DROP INDEX IDX_29A5EC27B83297E7 ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC274F5CEED2 ON produit');
        $this->addSql('ALTER TABLE produit DROP etapes_id, DROP reservation_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955838709D5');
        $this->addSql('DROP INDEX IDX_42C84955838709D5 ON reservation');
        $this->addSql('ALTER TABLE reservation ADD produit_id INT NOT NULL, CHANGE statut statut enum(\'attente\', \'valide\',\'termine\'), CHANGE participants_id client_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_42C8495519EB6921 ON reservation (client_id)');
        $this->addSql('CREATE INDEX IDX_42C84955F347EFB ON reservation (produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD reservation_id INT NOT NULL, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_C7440455B83297E7 ON client (reservation_id)');
        $this->addSql('ALTER TABLE conseiller CHANGE photo photo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE destination CHANGE titre titre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE etape DROP FOREIGN KEY FK_285F75DDF347EFB');
        $this->addSql('DROP INDEX IDX_285F75DDF347EFB ON etape');
        $this->addSql('ALTER TABLE etape DROP produit_id, CHANGE titre titre VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo photo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hotel hotel VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B11B83297E7');
        $this->addSql('DROP INDEX IDX_D79F6B11B83297E7 ON participant');
        $this->addSql('ALTER TABLE participant DROP reservation_id, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE produit ADD etapes_id INT NOT NULL, ADD reservation_id INT NOT NULL, CHANGE titre titre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo photo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC274F5CEED2 FOREIGN KEY (etapes_id) REFERENCES etape (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27B83297E7 ON produit (reservation_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC274F5CEED2 ON produit (etapes_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955F347EFB');
        $this->addSql('DROP INDEX IDX_42C8495519EB6921 ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955F347EFB ON reservation');
        $this->addSql('ALTER TABLE reservation ADD participants_id INT NOT NULL, DROP client_id, DROP produit_id, CHANGE reference reference VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut statut VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955838709D5 FOREIGN KEY (participants_id) REFERENCES participant (id)');
        $this->addSql('CREATE INDEX IDX_42C84955838709D5 ON reservation (participants_id)');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
