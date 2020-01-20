<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190613161545 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pannier (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, UNIQUE INDEX UNIQ_AED0E5EBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pannier_hardware (pannier_id INT NOT NULL, hardware_id INT NOT NULL, INDEX IDX_2BDFEB68662C2FA2 (pannier_id), INDEX IDX_2BDFEB68C9CC762B (hardware_id), PRIMARY KEY(pannier_id, hardware_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pannier ADD CONSTRAINT FK_AED0E5EBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pannier_hardware ADD CONSTRAINT FK_2BDFEB68662C2FA2 FOREIGN KEY (pannier_id) REFERENCES pannier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pannier_hardware ADD CONSTRAINT FK_2BDFEB68C9CC762B FOREIGN KEY (hardware_id) REFERENCES hardware (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE roles roles VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pannier_hardware DROP FOREIGN KEY FK_2BDFEB68662C2FA2');
        $this->addSql('DROP TABLE pannier');
        $this->addSql('DROP TABLE pannier_hardware');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\'');
    }
}
