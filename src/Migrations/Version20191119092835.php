<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191119092835 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lieu ADD ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lieu ADD CONSTRAINT FK_2F577D59A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_2F577D59A73F0036 ON lieu (ville_id)');
        $this->addSql('ALTER TABLE participant ADD site_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B11F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
        $this->addSql('CREATE INDEX IDX_D79F6B11F6BD1646 ON participant (site_id)');
        $this->addSql('ALTER TABLE sortie ADD site_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
        $this->addSql('CREATE INDEX IDX_3C3FD3F2F6BD1646 ON sortie (site_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lieu DROP FOREIGN KEY FK_2F577D59A73F0036');
        $this->addSql('DROP INDEX IDX_2F577D59A73F0036 ON lieu');
        $this->addSql('ALTER TABLE lieu DROP ville_id');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B11F6BD1646');
        $this->addSql('DROP INDEX IDX_D79F6B11F6BD1646 ON participant');
        $this->addSql('ALTER TABLE participant DROP site_id');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F2F6BD1646');
        $this->addSql('DROP INDEX IDX_3C3FD3F2F6BD1646 ON sortie');
        $this->addSql('ALTER TABLE sortie DROP site_id');
    }
}
