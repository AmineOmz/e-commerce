<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190613163955 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE pannier_hardware');
        $this->addSql('ALTER TABLE pannier DROP FOREIGN KEY FK_AED0E5EBA76ED395');
        $this->addSql('DROP INDEX UNIQ_AED0E5EBA76ED395 ON pannier');
        $this->addSql('ALTER TABLE pannier ADD idarticle INT NOT NULL, CHANGE user_id iduser INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pannier_hardware (pannier_id INT NOT NULL, hardware_id INT NOT NULL, INDEX IDX_2BDFEB68C9CC762B (hardware_id), INDEX IDX_2BDFEB68662C2FA2 (pannier_id), PRIMARY KEY(pannier_id, hardware_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pannier_hardware ADD CONSTRAINT FK_2BDFEB68662C2FA2 FOREIGN KEY (pannier_id) REFERENCES pannier (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pannier_hardware ADD CONSTRAINT FK_2BDFEB68C9CC762B FOREIGN KEY (hardware_id) REFERENCES hardware (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pannier ADD user_id INT NOT NULL, DROP iduser, DROP idarticle');
        $this->addSql('ALTER TABLE pannier ADD CONSTRAINT FK_AED0E5EBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AED0E5EBA76ED395 ON pannier (user_id)');
    }
}
