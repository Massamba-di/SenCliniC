<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260602182058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneaux ADD medecins_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE creneaux ADD CONSTRAINT FK_77F13C6DDA00906 FOREIGN KEY (medecins_id) REFERENCES medecins (id)');
        $this->addSql('CREATE INDEX IDX_77F13C6DDA00906 ON creneaux (medecins_id)');
        $this->addSql('ALTER TABLE paiements ADD patients_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE paiements ADD CONSTRAINT FK_E1B02E12CEC3FD2F FOREIGN KEY (patients_id) REFERENCES patients (id)');
        $this->addSql('CREATE INDEX IDX_E1B02E12CEC3FD2F ON paiements (patients_id)');
        $this->addSql('ALTER TABLE rendez_vous ADD patients_id INT DEFAULT NULL, ADD paiement_id INT DEFAULT NULL, ADD creneau_id INT DEFAULT NULL, ADD medecin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0ACEC3FD2F FOREIGN KEY (patients_id) REFERENCES patients (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A2A4C4478 FOREIGN KEY (paiement_id) REFERENCES paiements (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A7D0729A9 FOREIGN KEY (creneau_id) REFERENCES creneaux (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecins (id)');
        $this->addSql('CREATE INDEX IDX_65E8AA0ACEC3FD2F ON rendez_vous (patients_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_65E8AA0A2A4C4478 ON rendez_vous (paiement_id)');
        $this->addSql('CREATE INDEX IDX_65E8AA0A7D0729A9 ON rendez_vous (creneau_id)');
        $this->addSql('CREATE INDEX IDX_65E8AA0A4F31A84 ON rendez_vous (medecin_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneaux DROP FOREIGN KEY FK_77F13C6DDA00906');
        $this->addSql('DROP INDEX IDX_77F13C6DDA00906 ON creneaux');
        $this->addSql('ALTER TABLE creneaux DROP medecins_id');
        $this->addSql('ALTER TABLE paiements DROP FOREIGN KEY FK_E1B02E12CEC3FD2F');
        $this->addSql('DROP INDEX IDX_E1B02E12CEC3FD2F ON paiements');
        $this->addSql('ALTER TABLE paiements DROP patients_id');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0ACEC3FD2F');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A2A4C4478');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A7D0729A9');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A4F31A84');
        $this->addSql('DROP INDEX IDX_65E8AA0ACEC3FD2F ON rendez_vous');
        $this->addSql('DROP INDEX UNIQ_65E8AA0A2A4C4478 ON rendez_vous');
        $this->addSql('DROP INDEX IDX_65E8AA0A7D0729A9 ON rendez_vous');
        $this->addSql('DROP INDEX IDX_65E8AA0A4F31A84 ON rendez_vous');
        $this->addSql('ALTER TABLE rendez_vous DROP patients_id, DROP paiement_id, DROP creneau_id, DROP medecin_id');
    }
}
