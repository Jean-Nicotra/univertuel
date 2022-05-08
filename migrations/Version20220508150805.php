<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508150805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prophecy_status DROP FOREIGN KEY FK_C330F24EB517B89');
        $this->addSql('ALTER TABLE prophecy_status DROP FOREIGN KEY FK_C330F24EFAAE137C');
        $this->addSql('ALTER TABLE prophecy_status DROP FOREIGN KEY FK_C330F24EF639F774');
        $this->addSql('DROP INDEX IDX_C330F24EFAAE137C ON prophecy_status');
        $this->addSql('DROP INDEX IDX_C330F24EB517B89 ON prophecy_status');
        $this->addSql('ALTER TABLE prophecy_status DROP technic_id, DROP benefit_id, CHANGE campaign_id campaign_id INT NOT NULL');
        $this->addSql('ALTER TABLE prophecy_status ADD CONSTRAINT FK_C330F24EF639F774 FOREIGN KEY (campaign_id) REFERENCES prophecy_technic (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prophecy_status DROP FOREIGN KEY FK_C330F24EF639F774');
        $this->addSql('ALTER TABLE prophecy_status ADD technic_id INT NOT NULL, ADD benefit_id INT NOT NULL, CHANGE campaign_id campaign_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prophecy_status ADD CONSTRAINT FK_C330F24EB517B89 FOREIGN KEY (benefit_id) REFERENCES prophecy_benefit (id)');
        $this->addSql('ALTER TABLE prophecy_status ADD CONSTRAINT FK_C330F24EFAAE137C FOREIGN KEY (technic_id) REFERENCES prophecy_technic (id)');
        $this->addSql('ALTER TABLE prophecy_status ADD CONSTRAINT FK_C330F24EF639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('CREATE INDEX IDX_C330F24EFAAE137C ON prophecy_status (technic_id)');
        $this->addSql('CREATE INDEX IDX_C330F24EB517B89 ON prophecy_status (benefit_id)');
    }
}
