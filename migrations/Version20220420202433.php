<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420202433 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prophecy_figures_weapons (figure_id INT NOT NULL, weapon_id INT NOT NULL, INDEX IDX_662476CC5C011B5 (figure_id), INDEX IDX_662476CC95B82273 (weapon_id), PRIMARY KEY(figure_id, weapon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_figures_armors (figure_id INT NOT NULL, armor_id INT NOT NULL, INDEX IDX_EBAE87AB5C011B5 (figure_id), INDEX IDX_EBAE87ABF5AA3663 (armor_id), PRIMARY KEY(figure_id, armor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_figures_spells (figure_id INT NOT NULL, spell_id INT NOT NULL, INDEX IDX_CCC3DE325C011B5 (figure_id), INDEX IDX_CCC3DE32479EC90D (spell_id), PRIMARY KEY(figure_id, spell_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prophecy_figures_weapons ADD CONSTRAINT FK_662476CC5C011B5 FOREIGN KEY (figure_id) REFERENCES prophecy_figure (id)');
        $this->addSql('ALTER TABLE prophecy_figures_weapons ADD CONSTRAINT FK_662476CC95B82273 FOREIGN KEY (weapon_id) REFERENCES prophecy_weapon (id)');
        $this->addSql('ALTER TABLE prophecy_figures_armors ADD CONSTRAINT FK_EBAE87AB5C011B5 FOREIGN KEY (figure_id) REFERENCES prophecy_figure (id)');
        $this->addSql('ALTER TABLE prophecy_figures_armors ADD CONSTRAINT FK_EBAE87ABF5AA3663 FOREIGN KEY (armor_id) REFERENCES prophecy_armor (id)');
        $this->addSql('ALTER TABLE prophecy_figures_spells ADD CONSTRAINT FK_CCC3DE325C011B5 FOREIGN KEY (figure_id) REFERENCES prophecy_figure (id)');
        $this->addSql('ALTER TABLE prophecy_figures_spells ADD CONSTRAINT FK_CCC3DE32479EC90D FOREIGN KEY (spell_id) REFERENCES prophecy_spell (id)');
        $this->addSql('DROP TABLE figures_armors');
        $this->addSql('DROP TABLE figures_spells');
        $this->addSql('DROP TABLE figures_weapons');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE figures_armors (figure_id INT NOT NULL, armor_id INT NOT NULL, INDEX IDX_F20F7FDA5C011B5 (figure_id), INDEX IDX_F20F7FDAF5AA3663 (armor_id), PRIMARY KEY(figure_id, armor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE figures_spells (figure_id INT NOT NULL, spell_id INT NOT NULL, INDEX IDX_D5622643479EC90D (spell_id), INDEX IDX_D56226435C011B5 (figure_id), PRIMARY KEY(figure_id, spell_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE figures_weapons (figure_id INT NOT NULL, weapon_id INT NOT NULL, INDEX IDX_413F969E5C011B5 (figure_id), INDEX IDX_413F969E95B82273 (weapon_id), PRIMARY KEY(figure_id, weapon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE figures_armors ADD CONSTRAINT FK_F20F7FDA5C011B5 FOREIGN KEY (figure_id) REFERENCES prophecy_figure (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE figures_armors ADD CONSTRAINT FK_F20F7FDAF5AA3663 FOREIGN KEY (armor_id) REFERENCES prophecy_armor (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE figures_spells ADD CONSTRAINT FK_D5622643479EC90D FOREIGN KEY (spell_id) REFERENCES prophecy_spell (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE figures_spells ADD CONSTRAINT FK_D56226435C011B5 FOREIGN KEY (figure_id) REFERENCES prophecy_figure (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE figures_weapons ADD CONSTRAINT FK_413F969E5C011B5 FOREIGN KEY (figure_id) REFERENCES prophecy_figure (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE figures_weapons ADD CONSTRAINT FK_413F969E95B82273 FOREIGN KEY (weapon_id) REFERENCES prophecy_weapon (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE prophecy_figures_weapons');
        $this->addSql('DROP TABLE prophecy_figures_armors');
        $this->addSql('DROP TABLE prophecy_figures_spells');
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
        $this->addSql('ALTER TABLE prophecy_figure CHANGE name name VARCHAR(120) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE weight weight VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE size size VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
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
        $this->addSql('ALTER TABLE prophecy_wound CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE damages damages VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE thread CHANGE purpose purpose VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE username username VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
