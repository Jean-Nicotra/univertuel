<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508151610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prophecy_status DROP FOREIGN KEY FK_C330F24EF639F774');
        $this->addSql('ALTER TABLE prophecy_status CHANGE campaign_id campaign_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prophecy_status ADD CONSTRAINT FK_C330F24EF639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prophecy_status DROP FOREIGN KEY FK_C330F24EF639F774');
        $this->addSql('ALTER TABLE prophecy_status CHANGE campaign_id campaign_id INT NOT NULL');
        $this->addSql('ALTER TABLE prophecy_status ADD CONSTRAINT FK_C330F24EF639F774 FOREIGN KEY (campaign_id) REFERENCES prophecy_technic (id)');
    }
}
