<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412185400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prophecy_figure ADD caste_id INT NOT NULL, ADD omen_id INT NOT NULL, ADD age_id INT NOT NULL, ADD is_finish TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE prophecy_figure ADD CONSTRAINT FK_9767242829B1D13 FOREIGN KEY (caste_id) REFERENCES prophecy_caste (id)');
        $this->addSql('ALTER TABLE prophecy_figure ADD CONSTRAINT FK_9767242847D39BD9 FOREIGN KEY (omen_id) REFERENCES prophecy_omen (id)');
        $this->addSql('ALTER TABLE prophecy_figure ADD CONSTRAINT FK_97672428CC80CD12 FOREIGN KEY (age_id) REFERENCES prophecy_age (id)');
        $this->addSql('CREATE INDEX IDX_9767242829B1D13 ON prophecy_figure (caste_id)');
        $this->addSql('CREATE INDEX IDX_9767242847D39BD9 ON prophecy_figure (omen_id)');
        $this->addSql('CREATE INDEX IDX_97672428CC80CD12 ON prophecy_figure (age_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campaign CHANGE name name VARCHAR(120) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE game CHANGE code code VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_advantage CHANGE name name VARCHAR(120) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_advantage_category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_age CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_armor CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE village_rarety village_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city_rarety city_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE material material VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_armor_category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_benefit CHANGE name name VARCHAR(120) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_caracteristic CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code code VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_carrier CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE caste caste VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prohibited prohibited VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE campaign campaign VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE technic technic VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_caste CHANGE name name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_currency CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code code VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_disadvantage CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_discipline CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_favour CHANGE name name VARCHAR(120) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_figure DROP FOREIGN KEY FK_9767242829B1D13');
        $this->addSql('ALTER TABLE prophecy_figure DROP FOREIGN KEY FK_9767242847D39BD9');
        $this->addSql('ALTER TABLE prophecy_figure DROP FOREIGN KEY FK_97672428CC80CD12');
        $this->addSql('DROP INDEX IDX_9767242829B1D13 ON prophecy_figure');
        $this->addSql('DROP INDEX IDX_9767242847D39BD9 ON prophecy_figure');
        $this->addSql('DROP INDEX IDX_97672428CC80CD12 ON prophecy_figure');
        $this->addSql('ALTER TABLE prophecy_figure DROP caste_id, DROP omen_id, DROP age_id, DROP is_finish, CHANGE name name VARCHAR(120) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_major_attribute CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_minor_attribute CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_nation CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_omen CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE personnality personnality VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE motivation motivation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE quality quality VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fault fault VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_prohibited CHANGE name name VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_shield CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE village_rarety village_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city_rarety city_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE material material VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_skill CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_skill_category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_spell CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE casting_time casting_time VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE spell_keys spell_keys VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_sphere CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_start_caracteristic CHANGE value2 value2 VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_status CHANGE name name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description TINYTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_technic CHANGE name name VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_tendency CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_weapon CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE village_rarety village_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city_rarety city_rarety VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE special special VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE damages damages VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prophecy_weapon_category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE thread CHANGE purpose purpose VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE username username VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
