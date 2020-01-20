<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190613001711 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F70BEE6D');
        $this->addSql('DROP INDEX IDX_B6BD307F70BEE6D ON message');
        $this->addSql('ALTER TABLE message ADD sender VARCHAR(255) NOT NULL, ADD receiver VARCHAR(255) NOT NULL, DROP visitor_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE message ADD visitor_id INT DEFAULT NULL, DROP sender, DROP receiver');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F70BEE6D FOREIGN KEY (visitor_id) REFERENCES visitor (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_B6BD307F70BEE6D ON message (visitor_id)');
    }
}
