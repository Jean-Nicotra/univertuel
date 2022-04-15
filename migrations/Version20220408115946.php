<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220408115946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8D75FD4EF9');
        $this->addSql('CREATE TABLE prophecy_sphere (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, maximum_value INT NOT NULL, min_value INT NOT NULL, xp_increase INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_EDC9F1D5F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prophecy_sphere ADD CONSTRAINT FK_EDC9F1D5F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('DROP TABLE sphere');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8DA5522701');
        $this->addSql('DROP INDEX IDX_D03FCD8D75FD4EF9 ON spell');
        $this->addSql('DROP INDEX IDX_D03FCD8DA5522701 ON spell');
        $this->addSql('ALTER TABLE spell ADD discipline VARCHAR(180) NOT NULL, DROP discipline_id, DROP sphere_id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D03FCD8D75BEEE3F ON spell (discipline)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sphere (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE prophecy_sphere');
        $this->addSql('ALTER TABLE campaign CHANGE name name VARCHAR(120) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE game CHANGE code code VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_advantage CHANGE name name VARCHAR(120) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_advantage_category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_age CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_armor CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE village_rarety village_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city_rarety city_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE material material VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_armor_category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_benefit CHANGE name name VARCHAR(120) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_caracteristic CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code code VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_caste CHANGE name name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_currency CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code code VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_disadvantage CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_discipline CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_favour CHANGE name name VARCHAR(120) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_figure CHANGE name name VARCHAR(120) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_major_attribute CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_minor_attribute CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_nation CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_omen CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE personnality personnality VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE motivation motivation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE quality quality VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fault fault VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_prohibited CHANGE name name VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_shield CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE village_rarety village_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city_rarety city_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE material material VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_skill CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_skill_category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_status CHANGE name name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description TINYTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_technic CHANGE name name VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_tendency CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_weapon CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE village_rarety village_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city_rarety city_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE special special VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE damages damages VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_weapon_category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_D03FCD8D75BEEE3F ON spell');
        $this->addSql('ALTER TABLE spell ADD discipline_id INT NOT NULL, ADD sphere_id INT NOT NULL, DROP discipline, CHANGE name name VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE casting_time casting_time VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D75FD4EF9 FOREIGN KEY (sphere_id) REFERENCES sphere (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8DA5522701 FOREIGN KEY (discipline_id) REFERENCES prophecy_discipline (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D03FCD8D75FD4EF9 ON spell (sphere_id)');
        $this->addSql('CREATE INDEX IDX_D03FCD8DA5522701 ON spell (discipline_id)');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE username username VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
